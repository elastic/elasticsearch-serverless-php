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

namespace Elastic\Elasticsearch\Serverless\Tests\Response;

use Elastic\Elasticsearch\Serverless\Exception\ArrayAccessException;
use Elastic\Elasticsearch\Serverless\Exception\ClientResponseException;
use Elastic\Elasticsearch\Serverless\Exception\ProductCheckException;
use Elastic\Elasticsearch\Serverless\Exception\ServerResponseException;
use Elastic\Elasticsearch\Serverless\Response\Elasticsearch;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class ElasticsearchTest extends TestCase
{
    public function setUp(): void
    {
        $this->psr17Factory = new Psr17Factory();
        $this->elasticsearch = new Elasticsearch();
        
        $this->response200 = $this->psr17Factory->createResponse(200)
            ->withHeader('X-Elastic-Product', 'Elasticsearch')
            ->withHeader('Content-Type', 'application/json');

        $this->response400 = $this->psr17Factory->createResponse(400)
            ->withHeader('X-Elastic-Product', 'Elasticsearch')
            ->withHeader('Content-Type', 'application/json');

        $this->response500 = $this->psr17Factory->createResponse(500)
            ->withHeader('X-Elastic-Product', 'Elasticsearch')
            ->withHeader('Content-Type', 'application/json');
    }

    public function testWithStatus()
    {
        $this->elasticsearch->setResponse($this->response200);
        $response = $this->elasticsearch->withStatus(403);
        $this->assertEquals(403, $response->getStatusCode());
    }

    public function testAsArray()
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));
        $this->assertEquals($array, $this->elasticsearch->asArray());
    }

    public function testAsString()
    {
        $json = json_encode(['foo' => 'bar']);
        $body = $this->psr17Factory->createStream($json);
        $this->elasticsearch->setResponse($this->response200->withBody($body));
        $this->assertEquals($json, $this->elasticsearch->asString());
    }

    public function testAsObject()
    {
        $json = json_encode(['foo' => 'bar']);
        $body = $this->psr17Factory->createStream($json);
        $this->elasticsearch->setResponse($this->response200->withBody($body));
        $obj = $this->elasticsearch->asObject();
        $this->assertIsObject($obj);
        $this->assertEquals('bar', $obj->foo);
    }

    public function testAsBoolIsTrueWith200()
    {
        $this->elasticsearch->setResponse($this->response200);
        $this->assertTrue($this->elasticsearch->asBool());
    }

    public function testAsBoolIsFalseWith400()
    {
        try {
            $this->elasticsearch->setResponse($this->response400);
        } catch (ClientResponseException $e) {
            $this->assertFalse($this->elasticsearch->asBool());
        }
    }

    /**
     * @covers Elastic\Elasticsearch\Serverless\Response\Elasticsearch::__toString()
     */
    public function testSerializeAsString()
    {
        $json = json_encode(['foo' => 'bar']);
        $body = $this->psr17Factory->createStream($json);
        $this->elasticsearch->setResponse($this->response200->withBody($body));
        $this->assertEquals($json, (string) $this->elasticsearch);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testSetResponse()
    {
        $this->elasticsearch->setResponse($this->response200);
    }

    public function testSetResponseFromUnknownSourceThrowProductCheckException()
    {
        $response = $this->psr17Factory->createResponse(200)
            ->withHeader('Content-Type', 'application/json');

        $this->expectException(ProductCheckException::class);
        $this->elasticsearch->setResponse($response);
    }

    public function testSetResponseWith400ThrowException()
    {
        $this->expectException(ClientResponseException::class);
        $this->elasticsearch->setResponse($this->response400);
    }

    public function testSetResponseWith500ThrowException()
    {
        $this->expectException(ServerResponseException::class);
        $this->elasticsearch->setResponse($this->response500);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testSetResponseWith400AndThrowFalseDoesNotThrowException()
    {
        $this->elasticsearch->setResponse($this->response400, false);
    }

     /**
     * @doesNotPerformAssertions
     */
    public function testSetResponseWith500AndThrowFalseDoesNotThrowException()
    {
        $this->elasticsearch->setResponse($this->response500, false);
    }

    /**
     * @covers Elastic\Elasticsearch\Serverless\Response\Elasticsearch::offsetGet
     */
    public function testAccessAsArray()
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->assertEquals($array['foo'], $this->elasticsearch['foo']);
    }

    /**
     * @covers Elastic\Elasticsearch\Serverless\Response\Elasticsearch::offsetExists
     */
    public function testIsSetArrayAccess()
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->assertTrue(isset($this->elasticsearch['foo']));
    }

    /**
     * @covers Elastic\Elasticsearch\Serverless\Response\Elasticsearch::offsetSet
     */
    public function testSetArrayAccessThrowException()
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->expectException(ArrayAccessException::class);
        $this->elasticsearch['foo'] = 'test';
    }

    /**
     * @covers Elastic\Elasticsearch\Serverless\Response\Elasticsearch::offsetSet
     */
    public function testUnsetArrayAccessThrowException()
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->expectException(ArrayAccessException::class);
        unset($this->elasticsearch['foo']);
    }

    /**
     * @covers Elastic\Elasticsearch\Serverless\Response\Elasticsearch::__get()
     */
    public function testAccessAsObject()
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->assertEquals($array['foo'], $this->elasticsearch->foo);
    }
}