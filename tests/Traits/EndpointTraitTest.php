<?php
/**
 * Elasticsearch Serverless PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-serverless-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elastic\Elasticsearch\Serverless\Tests\Traits;

use Elastic\Elasticsearch\Serverless\Client;
use Elastic\Elasticsearch\Serverless\Exception\ContentTypeException;
use Elastic\Elasticsearch\Serverless\Exception\MissingParameterException;
use Elastic\Elasticsearch\Serverless\Traits\EndpointTrait;
use PHPUnit\Framework\TestCase;

class EndpointTraitTest extends TestCase
{
    use EndpointTrait;

    public function getQueryStrings(): array
    {
        return [
            ['http://localhost:9200', ['refresh' => true], ['refresh'], 'http://localhost:9200?refresh=true'],
            ['http://localhost:9200', ['refresh' => 'true'], ['refresh'], 'http://localhost:9200?refresh=true'],
            ['http://localhost', ['refresh' => 'true'], ['refresh', 'pretty'], 'http://localhost?refresh=true'],
            ['http://localhost', ['body' => [], 'foo' => 'bar'], ['refresh'], 'http://localhost']
        ];
    }

    /**
     * @dataProvider getQueryStrings
     */
    public function testAddQueryString(string $url, array $params, array $keys, string $expected)
    {
        $result = $this->addQueryString($url, $params, $keys);
        $this->assertEquals($expected, $result);
    }

    public function getBodySerialized(): array
    {
        return [
            [[ 'foo' => 'bar'], 'application/json', '{"foo":"bar"}'],
            [[[ 'foo' => 'bar'], ['bar' => 'baz']], 'application/x-ndjson', "{\"foo\":\"bar\"}\n{\"bar\":\"baz\"}\n"]
        ];
    }

    /**
     * @dataProvider getBodySerialized
     */
    public function testBodySerialize(array $body, string $contentType, string $expected)
    {
        $result = $this->bodySerialize($body, $contentType);
        $this->assertEquals($expected, $result);
    }

    public function testBodySerializeUnknownContentTypeThrowsException()
    {
        $this->expectException(ContentTypeException::class);
        $this->bodySerialize(['foo' => 'bar'], 'Unknown-content-type');
    }

    
    public function testBuildApiVersion()
    {
        $headers = $this->buildApiVersion([]);
        $this->assertEquals($headers[Client::API_VERSION_HEADER], Client::API_VERSION);
    }

    public function getRequestParts(): array
    {
        return [
            [ 'GET', 'http://localhost:9200', ['Foo' => 'bar', 'Content-Type' => 'application/json'], []],
            [ 'GET', 'http://localhost', ['Foo' => 'bar', 'Content-Type' => 'application/json'], []],
            [ 'POST', 'http://localhost:9200', ['Content-Type' => 'application/json'], ['foo' => 'bar']],
            [ 'POST', 'http://localhost:9200', ['Content-Type' => 'application/x-ndjson'], [[ 'foo' => 'bar'], ['bar' => 'baz']]],
            // test body as string
            [ 'POST', 'http://localhost', ['Content-Type' => 'application/x-ndjson'], '{"foo":"bar"}']
        ];
    }

    /**
     * @dataProvider getRequestParts
     */
    public function testCreateRequest(string $method, string $url, array $headers, $body)
    {
        $request = $this->createRequest($method, $url, $headers, $body);
        $this->assertEquals($method, $request->getMethod());
        $this->assertEquals($url, (string) $request->getUri());
        $host = parse_url($url, PHP_URL_HOST);
        $port = parse_url($url, PHP_URL_PORT);
        $this->assertEquals(empty($port) ? $host : $host . ':' . $port, $request->getHeader('Host')[0]);
        $headers = $this->buildApiVersion($headers);
        foreach ($headers as $name => $value) {
            $header = $request->getHeader($name);
            $this->assertEquals($value, implode(',', $header));
        }
        if (!empty($body)) {
            if (is_array($body)) {
                $this->assertEquals($this->bodySerialize($body, $headers['Content-Type']), (string) $request->getBody());
            } else {
                $this->assertEquals($body, (string) $request->getBody());
            }
        }
    }

    public function getRequiredParams(): array
    {
        return [
            [['index'], ['index' => '1'], false],
            [['index'], ['foo' => 'bar'], true]
        ];
    }

    /**
     * @dataProvider getRequiredParams
     */
    public function testCheckRequiredParameters(array $required, array $params, bool $exception)
    {
        if (!$exception) {
            $this->assertNull($this->checkRequiredParameters($required, $params));
        } else {
            $this->expectException(MissingParameterException::class);
            $this->checkRequiredParameters($required, $params);
        }
    }
}