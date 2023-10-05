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

namespace Elastic\Elasticsearch\Serverless\Tests;

use Elastic\Elasticsearch\Serverless\Client;
use Elastic\Elasticsearch\Serverless\ClientBuilder;
use Elastic\Elasticsearch\Serverless\Exception\AuthenticationException;
use Elastic\Elasticsearch\Serverless\Exception\ConfigException;
use Elastic\Elasticsearch\Serverless\Exception\InvalidArgumentException;
use Elastic\Transport\NodePool\NodePoolInterface;
use Http\Client\HttpAsyncClient;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\Psr18Client;
use Symfony\Component\HttpClient\HttplugClient;

class ClientBuilderTest extends TestCase
{
    protected ClientInterface $httpClient;
    protected LoggerInterface $logger;

    public function setUp(): void
    {
        $this->httpClient = $this->createStub(ClientInterface::class);
        $this->asyncHttpClient = $this->createStub(HttpAsyncClient::class);
        $this->logger = $this->createStub(LoggerInterface::class);
        $this->nodePool = $this->createStub(NodePoolInterface::class);
        $this->psr17Factory = new Psr17Factory();
        $this->builder = ClientBuilder::create()
            ->setEndpoint('xxx.elastic.cloud:443')
            ->setApiKey('apikey-value');
    }

    public function testCreate()
    {
        $this->assertInstanceOf(ClientBuilder::class, $this->builder);
    }

    public function getConfig()
    {
        return [
            [[
                'endpoint'   => 'xxx.elastic.cloud:443',
                'apiKey' => 'apikey-value'
            ]]
        ];
    }

    /**
     * @dataProvider getConfig
     */
    public function testFromConfigWithQuietFalse(array $params)
    {
        $client = ClientBuilder::fromConfig($params);
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testFromConfigWithInvalidDataQuietFalseThrowsException()
    {
        $config = [
            'httpClient' => $this->httpClient,
            'logger' => $this->logger,
            'foo' => 'bar'
        ];
        $this->expectException(ConfigException::class);
        $client = ClientBuilder::fromConfig($config);
    }

    public function testFromConfigWithInvalidDataQuietTrue()
    {
        $config = [
            'httpClient' => $this->httpClient,
            'logger' => $this->logger,
            'foo' => 'bar',
            'endpoint'   => 'xxx.elastic.cloud:443',
            'apiKey' => 'apikey-value'
        ];
        $client = ClientBuilder::fromConfig($config, true);
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testBuild()
    {
        $this->assertInstanceOf(Client::class, $this->builder->build());
    }

    public function testSetHttpClient()
    {
        $result = $this->builder->setHttpClient($this->httpClient);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetAsyncHttpClient()
    {
        $result = $this->builder->setAsyncHttpClient($this->asyncHttpClient);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetLogger()
    {
        $result = $this->builder->setLogger($this->logger);
        $this->assertEquals($this->builder, $result);
    }

    public function testsetEndpoint()
    {
        $result = $this->builder->setEndpoint('yyy.elastic.cloud:443');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetApiKeyWithEmptyId()
    {
        $result = $this->builder->setApiKey('xxx');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetApiKeyWithId()
    {
        $result = $this->builder->setApiKey('xxx', 'yyy');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetApiKeyWithEmptyIdSetAuthorizationHeader()
    {
        $this->builder->setApiKey('xxx');

        $response = $this->psr17Factory->createResponse(200);
        $this->httpClient->method('sendRequest')
             ->willReturn($response);
        $this->builder->setHttpClient($this->httpClient);
        
        $client = $this->builder->build();
        $this->assertInstanceOf(Client::class, $client);
        
        $transport = $client->getTransport();
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $transport->sendRequest($request);

        $this->assertContains('ApiKey xxx', $transport->getLastRequest()->getHeader('Authorization'));
    }

    public function testSetApiKeyWithIdSetAuthorizationHeaderWithBase64()
    {
        $apiKey = 'xxx';
        $this->builder->setApiKey($apiKey);

        $response = $this->psr17Factory->createResponse(200);
        $this->httpClient->method('sendRequest')
             ->willReturn($response);
        $this->builder->setHttpClient($this->httpClient);
        
        $client = $this->builder->build();
        $this->assertInstanceOf(Client::class, $client);
        
        $transport = $client->getTransport();
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $transport->sendRequest($request);

        $this->assertContains("ApiKey $apiKey", $transport->getLastRequest()->getHeader('Authorization'));
    }

    public function testSetElasticCloudId()
    {
        $result = $this->builder->setElasticCloudId('xxx');
        $this->assertEquals($this->builder, $result);
    }

    public function getCloudIdExamples()
    {
        return [
            ['cluster:d2VzdGV1cm9wZS5henVyZS5lbGFzdGljLWNsb3VkLmNvbTo5MjQzJGM2NjM3ZjMxMmM1MjQzY2RhN2RlZDZlOTllM2QyYzE5JA==', 'c6637f312c5243cda7ded6e99e3d2c19.westeurope.azure.elastic-cloud.com', 9243],
            ['cluster:d2VzdGV1cm9wZS5henVyZS5lbGFzdGljLWNsb3VkLmNvbSRlN2RlOWYxMzQ1ZTQ0OTAyODNkOTAzYmU1YjZmOTE5ZSQ=', 'e7de9f1345e4490283d903be5b6f919e.westeurope.azure.elastic-cloud.com', null],
            ['cluster:d2VzdGV1cm9wZS5henVyZS5lbGFzdGljLWNsb3VkLmNvbSQ4YWY3ZWUzNTQyMGY0NThlOTAzMDI2YjQwNjQwODFmMiQyMDA2MTU1NmM1NDA0OTg2YmZmOTU3ZDg0YTZlYjUxZg==', '8af7ee35420f458e903026b4064081f2.westeurope.azure.elastic-cloud.com', null]
        ];
    }

    /**
     * @dataProvider getCloudIdExamples
     */
    public function testSetCloudIdWithExamples(string $cloudId, string $url, ?int $port)
    {
        $this->builder->setElasticCloudId($cloudId);
        
        $response = $this->psr17Factory->createResponse(200);
        $this->httpClient->method('sendRequest')
             ->willReturn($response);
        $this->builder->setHttpClient($this->httpClient);
        
        $client = $this->builder->build();
        $this->assertInstanceOf(Client::class, $client);
        
        $transport = $client->getTransport();
        $request = $this->psr17Factory->createRequest('GET', '');
        $transport->sendRequest($request);

        $this->assertEquals($url, $transport->getLastRequest()->getUri()->getHost());
        $this->assertEquals($port, $transport->getLastRequest()->getUri()->getPort());
    }

    public function testSetRetries()
    {
        $result = $this->builder->setRetries(10);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetRetriesWithNegativeThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);
        $result = $this->builder->setRetries(-10);
    }

    public function testSetRetriesSetTheTransport()
    {
        $result = $this->builder->setRetries(10);

        $client = $this->builder->build();
        $this->assertInstanceOf(Client::class, $client);

        $this->assertEquals(10, $client->getTransport()->getRetries());
    }

    public function testSetSslCert()
    {
        $result = $this->builder->setSSLCert('/tmp/cert.pem');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetSslCertWithPassword()
    {
        $result = $this->builder->setSSLCert('/tmp/cert.pem', 'xxx');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetSslKey()
    {
        $result = $this->builder->setSSLKey('xxx');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetSslKeyWithPassword()
    {
        $result = $this->builder->setSSLKey('xxx', 'yyy');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetSslVerification()
    {
        $result = $this->builder->setSSLVerification(false);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetCaBundle()
    {
        $result = $this->builder->setCABundle('/tmp/ca.pem');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetElasticMetaHeader()
    {
        $result = $this->builder->setElasticMetaHeader(false);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetElasticMetaHeaderSetTheClient()
    {
        $client = $this->builder
            ->setElasticMetaHeader(false)
            ->build();
        
        $this->assertFalse($client->getElasticMetaHeader());
    }

    public function testSetHttpClientOptions()
    {
        $result = $this->builder->setHttpClientOptions([]);
        $this->assertEquals($this->builder, $result);
    }

    public function testClientWithSymfonyPsr18Client()
    {
        $symfonyClient = new Psr18Client();
        $client = $this->builder->setHttpClient($symfonyClient)
            ->build();

        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals($symfonyClient, $client->getTransport()->getClient());    
    }

    public function testClientWithSymfonyHttplugClient()
    {
        $symfonyClient = new HttplugClient();
        $client = $this->builder->setHttpClient($symfonyClient)
            ->build();

        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals($symfonyClient, $client->getTransport()->getClient());    
    }

    public function testAsyncClientWithSymfonyHttplugClient()
    {
        $symfonyClient = new HttplugClient();
        $client = $this->builder->setAsyncHttpClient($symfonyClient)
            ->build();

        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals($symfonyClient, $client->getTransport()->getAsyncClient());    
    }
}