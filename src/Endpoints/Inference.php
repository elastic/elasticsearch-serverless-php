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

declare(strict_types=1);

namespace Elastic\Elasticsearch\Serverless\Endpoints;

use Elastic\Elasticsearch\Serverless\Exception\ClientResponseException;
use Elastic\Elasticsearch\Serverless\Exception\MissingParameterException;
use Elastic\Elasticsearch\Serverless\Exception\ServerResponseException;
use Elastic\Elasticsearch\Serverless\Response\Elasticsearch;
use Elastic\Transport\Exception\NoNodeAvailableException;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
class Inference extends AbstractEndpoint
{
	/**
	 * Delete an inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-inference-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $task_type The task type
	 * @param string $inference_id The inference Id
	 * @param array{
	 *     dry_run: bool, // When true, the endpoint is not deleted, and a list of ingest processors which reference this endpoint is returned
	 *     force: bool, // When true, the inference endpoint is forcefully deleted even if it is still being used by ingest processors or semantic text fields
	 *     pretty: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: string, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 * @return Elasticsearch|Promise
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 */
	public function delete(string $inference_id, string $task_type = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($task_type)) {
			$url = '/_inference/' . $this->encode($task_type) . '/' . $this->encode($inference_id);
			$method = 'DELETE';
		} else {
			$url = '/_inference/' . $this->encode($inference_id);
			$method = 'DELETE';
		}
		$url = $this->addQueryString($url, $params, [
			'dry_run',
			'force',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Get an inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-inference-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $task_type The task type
	 * @param string $inference_id The inference Id
	 * @param array{
	 *     pretty: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: string, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 * @return Elasticsearch|Promise
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 */
	public function get(string $task_type = null, string $inference_id = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($task_type) && isset($inference_id)) {
			$url = '/_inference/' . $this->encode($task_type) . '/' . $this->encode($inference_id);
			$method = 'GET';
		} elseif (isset($inference_id)) {
			$url = '/_inference/' . $this->encode($inference_id);
			$method = 'GET';
		} else {
			$url = "/_inference";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Perform inference on the service
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/post-inference-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $task_type The task type
	 * @param string $inference_id The inference Id
	 * @param array|string $body The request body
	 * @param array{
	 *     timeout: string|integer, // Specifies the amount of time to wait for the inference request to complete.
	 *     pretty: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: string, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 * @return Elasticsearch|Promise
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 */
	public function inference(
		string $inference_id,
		string $task_type = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($task_type)) {
			$url = '/_inference/' . $this->encode($task_type) . '/' . $this->encode($inference_id);
			$method = 'POST';
		} else {
			$url = '/_inference/' . $this->encode($inference_id);
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['timeout', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Create an inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-inference-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $task_type The task type
	 * @param string $inference_id The inference Id
	 * @param array|string $body The request body
	 * @param array{
	 *     pretty: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: string, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 * @return Elasticsearch|Promise
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 */
	public function put(
		string $inference_id,
		string $task_type = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($task_type)) {
			$url = '/_inference/' . $this->encode($task_type) . '/' . $this->encode($inference_id);
			$method = 'PUT';
		} else {
			$url = '/_inference/' . $this->encode($inference_id);
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}
}
