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
class Eql extends AbstractEndpoint
{
	/**
	 * Deletes an async EQL search by ID. If the search is still running, the search request will be cancelled. Otherwise, the saved search results are deleted.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/eql-search-api.html
	 *
	 * @param string $id Identifier for the search to delete.
	 * A search ID is provided in the EQL search API's response for an async search.
	 * A search ID is also provided if the request’s `keep_on_completion` parameter is `true`.
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
	public function delete(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_eql/search/' . $this->encode($id) . '';
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns async results from previously executed Event Query Language (EQL) search
	 *
	 * @see  https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/get-async-eql-search-api.html
	 *
	 * @param string $id Identifier for the search.
	 * @param array{
	 *     keep_alive: string|integer, // Period for which the search and its results are stored on the cluster.Defaults to the keep_alive value set by the search’s EQL search API request.
	 *     wait_for_completion_timeout: string|integer, // Timeout duration to wait for the request to finish.Defaults to no timeout, meaning the request waits for complete search results.
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
	public function get(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_eql/search/' . $this->encode($id) . '';
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'keep_alive',
			'wait_for_completion_timeout',
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
	 * Returns the status of a previously submitted async or stored Event Query Language (EQL) search
	 *
	 * @see  https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/get-async-eql-status-api.html
	 *
	 * @param string $id Identifier for the search.
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
	public function getStatus(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_eql/search/status/' . $this->encode($id) . '';
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns results matching a query expressed in Event Query Language (EQL)
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/eql-search-api.html
	 *
	 * @param string|array $index The name of the index to scope the operation
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, //
	 *     expand_wildcards: string|array, //
	 *     ignore_unavailable: bool, // If true, missing or closed indices are not included in the response.
	 *     keep_alive: string|integer, // Period for which the search and its results are stored on the cluster.
	 *     keep_on_completion: bool, // If true, the search and its results are stored on the cluster.
	 *     wait_for_completion_timeout: string|integer, // Timeout duration to wait for the request to finish. Defaults to no timeout, meaning the request waits for complete search results.
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
	public function search(string|array $index, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = '/' . $this->encode($index) . '/_eql/search';
		$method = empty($body) ? 'GET' : 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'ignore_unavailable',
			'keep_alive',
			'keep_on_completion',
			'wait_for_completion_timeout',
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
}
