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
class Sql extends AbstractEndpoint
{
	/**
	 * Clears the SQL cursor
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/clear-sql-cursor-api.html
	 *
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
	public function clearCursor(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_sql/close";
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Deletes an async SQL search or a stored synchronous SQL search. If the search is still running, the API cancels it.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-async-sql-search-api.html
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
	public function deleteAsync(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_sql/async/delete/' . $this->encode($id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns the current status and available results for an async SQL search or stored synchronous SQL search
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-async-sql-search-api.html
	 *
	 * @param string $id Identifier for the search.
	 * @param array{
	 *     delimiter: string, // Separator for CSV results. The API only supports this parameter for CSV responses.
	 *     format: string, // Format for the response. You must specify a format using this parameter or theAccept HTTP header. If you specify both, the API uses this parameter.
	 *     keep_alive: string|integer, // Retention period for the search and its results. Defaultsto the `keep_alive` period for the original SQL search.
	 *     wait_for_completion_timeout: string|integer, // Period to wait for complete results. Defaults to no timeout,meaning the request waits for complete search results.
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
	public function getAsync(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_sql/async/' . $this->encode($id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'delimiter',
			'format',
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
	 * Returns the current status of an async SQL search or a stored synchronous SQL search
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-async-sql-search-status-api.html
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
	public function getAsyncStatus(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_sql/async/status/' . $this->encode($id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Executes a SQL request
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/sql-search-api.html
	 *
	 * @param array|string $body The request body
	 * @param array{
	 *     format: string, // Format for the response.
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
	public function query(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_sql";
		$method = empty($body) ? 'GET' : 'POST';
		$url = $this->addQueryString($url, $params, ['format', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Translates SQL into Elasticsearch queries
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/sql-translate-api.html
	 *
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
	public function translate(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_sql/translate";
		$method = empty($body) ? 'GET' : 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}
}
