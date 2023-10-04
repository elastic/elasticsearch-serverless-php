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

use Elastic\Elasticsearch\Serverless\Exception\ClientResponseException;
use Elastic\Elasticsearch\Serverless\Exception\ServerResponseException;
use Elastic\Elasticsearch\Serverless\Response\Elasticsearch;
use Elastic\Elasticsearch\Serverless\Transport\AsyncOnSuccess;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;

class AsyncOnSuccessTest extends TestCase
{
    public function setUp(): void
    {
        $this->asyncOnSuccess = new AsyncOnSuccess();
        $this->psr17Factory = new Psr17Factory();
    }

    public function testSuccessWith200()
    {
        $response = $this->psr17Factory->createResponse(200)
            ->withHeader('X-Elastic-Product', 'Elasticsearch')
            ->withHeader('Content-Type', 'application/json');

        $result = $this->asyncOnSuccess->success($response, 0);
        $this->assertInstanceOf(Elasticsearch::class, $result);
    }

    public function testSuccessWith400ThrowClientResponseException()
    {
        $response = $this->psr17Factory->createResponse(400)
            ->withHeader('X-Elastic-Product', 'Elasticsearch')
            ->withHeader('Content-Type', 'application/json');

        $this->expectException(ClientResponseException::class);
        $result = $this->asyncOnSuccess->success($response, 0);
    }

    public function testSuccessWith500ThrowServerResponseException()
    {
        $response = $this->psr17Factory->createResponse(500)
            ->withHeader('X-Elastic-Product', 'Elasticsearch')
            ->withHeader('Content-Type', 'application/json');

        $this->expectException(ServerResponseException::class);
        $result = $this->asyncOnSuccess->success($response, 0);
    }
}