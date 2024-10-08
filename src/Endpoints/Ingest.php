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
class Ingest extends AbstractEndpoint
{
	/**
	 * Deletes one or more existing ingest pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-pipeline-api.html
	 *
	 * @param string $id Pipeline ID or wildcard expression of pipeline IDs used to limit the request.
	 * To delete all ingest pipelines in a cluster, use a value of `*`.
	 * @param array{
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node.If no response is received before the timeout expires, the request fails and returns an error.
	 *     timeout: string|integer, // Period to wait for a response.If no response is received before the timeout expires, the request fails and returns an error.
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
	public function deletePipeline(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ingest/pipeline/' . $this->encode($id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, [
			'master_timeout',
			'timeout',
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
	 * Returns information about one or more ingest pipelines.
	 * This API returns a local reference of the pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-pipeline-api.html
	 *
	 * @param string $id Comma-separated list of pipeline IDs to retrieve.
	 * Wildcard (`*`) expressions are supported.
	 * To get all ingest pipelines, omit this parameter or use `*`.
	 * @param array{
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node.If no response is received before the timeout expires, the request fails and returns an error.
	 *     summary: bool, // Return pipelines without their definitions (default: false)
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
	public function getPipeline(string $id = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($id)) {
			$url = '/_ingest/pipeline/' . $this->encode($id);
			$method = 'GET';
		} else {
			$url = "/_ingest/pipeline";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'master_timeout',
			'summary',
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
	 * Extracts structured fields out of a single text field within a document.
	 * You choose which field to extract matched fields from, as well as the grok pattern you expect will match.
	 * A grok pattern is like a regular expression that supports aliased expressions that can be reused.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/grok-processor.html
	 *
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
	public function processorGrok(array $params = []): Elasticsearch|Promise
	{
		$url = "/_ingest/processor/grok";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Creates or updates an ingest pipeline.
	 * Changes made using this API take effect immediately.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/ingest.html
	 *
	 * @param string $id ID of the ingest pipeline to create or update.
	 * @param array|string $body The request body
	 * @param array{
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error.
	 *     timeout: string|integer, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error.
	 *     if_version: int, // Required version for optimistic concurrency control for pipeline updates
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
	public function putPipeline(string $id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ingest/pipeline/' . $this->encode($id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'master_timeout',
			'timeout',
			'if_version',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Executes an ingest pipeline against a set of provided documents.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/simulate-pipeline-api.html
	 *
	 * @param string $id Pipeline to test.
	 * If you don’t specify a `pipeline` in the request body, this parameter is required.
	 * @param array|string $body The request body
	 * @param array{
	 *     verbose: bool, // If `true`, the response includes output data for each processor in the executed pipeline.
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
	public function simulate(string $id = null, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		if (isset($id)) {
			$url = '/_ingest/pipeline/' . $this->encode($id) . '/_simulate';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_ingest/pipeline/_simulate";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['verbose', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}
}
