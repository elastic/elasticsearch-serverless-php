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

namespace Elastic\Elasticsearch\Serverless;

use Elastic\Elasticsearch\Serverless\Response\Elasticsearch;
use Elastic\Elasticsearch\Serverless\Traits\ClientEndpointsTrait;
use Elastic\Elasticsearch\Serverless\Traits\EndpointTrait;
use Elastic\Elasticsearch\Serverless\Traits\NamespaceTrait;
use Elastic\Elasticsearch\Serverless\Transport\AsyncOnSuccess;
use Elastic\Elasticsearch\Serverless\Transport\AsyncOnSuccessNoException;
use Elastic\Transport\Transport;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;

final class Client implements ClientInterface
{
    const CLIENT_NAME = 'esv';
    const VERSION = '0.1.0-alpha2';
    const API_VERSION_HEADER = 'Elastic-Api-Version';
    const API_VERSION = '2023-10-31';
   
    use ClientEndpointsTrait;
    use EndpointTrait;
    use NamespaceTrait;
    
    protected Transport $transport;
    protected LoggerInterface $logger;

    /**
     * Specify is the request is asyncronous
     */
    protected bool $async = false;
    
    /**
     * Enable or disable the x-elastic-meta-header
     */
    protected bool $elasticMetaHeader = true;

    /**
     * Enable or disable the response Exception
     */
    protected bool $responseException = true;

    /**
     * The endpoint namespace storage 
     */
    protected array $namespace;

    public function __construct(
        Transport $transport, 
        LoggerInterface $logger
    ) {
        $this->transport = $transport;
        $this->logger = $logger;       
        
        $this->defaultTransportSettings($this->transport);
    }

    /**
     * @inheritdoc
     */
    public function getTransport(): Transport
    {
        return $this->transport;
    }

    /**
     * @inheritdoc
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Set the default settings for Elasticsearch
     */
    protected function defaultTransportSettings(Transport $transport): void
    {
        $transport->setUserAgent('elasticsearch-serverless', self::VERSION);
    }

    /**
     * @inheritdoc
     */
    public function setAsync(bool $async): self
    {
        $this->async = $async;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getAsync(): bool
    {
        return $this->async;
    }

    /**
     * @inheritdoc
     */
    public function setElasticMetaHeader(bool $active): self
    {
        $this->elasticMetaHeader = $active;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getElasticMetaHeader(): bool
    {
        return $this->elasticMetaHeader;
    }

    /**
     * @inheritdoc
     */
    public function setResponseException(bool $active): self
    {
        $this->responseException = $active;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getResponseException(): bool
    {
        return $this->responseException;
    }

    /**
     * @inheritdoc
     */
    public function sendRequest(RequestInterface $request): Elasticsearch|Promise
    {   
        // If async returns a Promise
        if ($this->getAsync()) {
            if ($this->getElasticMetaHeader()) {
                $this->transport->setElasticMetaHeader(
                    Client::CLIENT_NAME, 
                    sprintf("%s+%s", Client::VERSION, Client::API_VERSION),
                    true
                );
            }
            $this->transport->setAsyncOnSuccess(
                $request->getMethod() === 'HEAD'
                    ? new AsyncOnSuccessNoException
                    : ($this->getResponseException() ? new AsyncOnSuccess : new AsyncOnSuccessNoException)
            );
            return $this->transport->sendAsyncRequest($request);
        }     

        if ($this->getElasticMetaHeader()) {
            $this->transport->setElasticMetaHeader(Client::CLIENT_NAME, Client::VERSION, false);
        }
        $start = microtime(true);
        $response = $this->transport->sendRequest($request);
        $this->logger->info(sprintf("Response time in %.3f sec", microtime(true) - $start));       

        $result = new Elasticsearch;
        $result->setResponse($response, $request->getMethod() === 'HEAD' ? false : $this->getResponseException());
        return $result;
    }
}