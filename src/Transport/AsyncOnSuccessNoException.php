<?php
/**
 * Elasticsearch PHP Client
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

namespace Elastic\Elasticsearch\Serverless\Transport;

use Elastic\Elasticsearch\Serverless\Response\Elasticsearch;
use Elastic\Transport\Async\OnSuccessInterface;
use Psr\Http\Message\ResponseInterface;

class AsyncOnSuccessNoException implements OnSuccessInterface
{
    public function success(ResponseInterface $response, int $count): Elasticsearch
    {
        $result = new Elasticsearch;
        $result->setResponse($response, false);
        return $result;
    }
}