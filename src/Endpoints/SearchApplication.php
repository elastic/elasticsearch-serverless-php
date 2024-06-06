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
class SearchApplication extends AbstractEndpoint
{
	/**
	 * Deletes a search application.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-search-application.html
	 *
	 * @param string $name The name of the search application to delete
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
	public function delete(string $name, array $params = []): Elasticsearch|Promise
	{
		$url = '/_application/search_application/' . $this->encode($name);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Delete a behavioral analytics collection.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-analytics-collection.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $name The name of the analytics collection to be deleted
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
	public function deleteBehavioralAnalytics(string $name, array $params = []): Elasticsearch|Promise
	{
		$url = '/_application/analytics/' . $this->encode($name);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns the details about a search application.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-search-application.html
	 *
	 * @param string $name The name of the search application
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
	public function get(string $name, array $params = []): Elasticsearch|Promise
	{
		$url = '/_application/search_application/' . $this->encode($name);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns the existing behavioral analytics collections.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/list-analytics-collection.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param array $name A list of analytics collections to limit the returned information
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
	public function getBehavioralAnalytics(array $name = null, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		if (isset($name)) {
			$url = '/_application/analytics/' . $this->encode($name);
			$method = 'GET';
		} else {
			$url = "/_application/analytics";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns the existing search applications.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/list-search-applications.html
	 *
	 * @param array{
	 *     q: string, // Query in the Lucene query string syntax.
	 *     from: int, // Starting offset.
	 *     size: int, // Specifies a max number of results to get.
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
	public function list(array $params = []): Elasticsearch|Promise
	{
		$url = "/_application/search_application";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'q',
			'from',
			'size',
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
	 * Creates or updates a search application.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-search-application.html
	 *
	 * @param string $name The name of the search application to be created or updated.
	 * @param array|string $body The request body
	 * @param array{
	 *     create: bool, // If `true`, this request cannot replace or update existing Search Applications.
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
	public function put(string $name, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_application/search_application/' . $this->encode($name);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['create', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Creates a behavioral analytics collection.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-analytics-collection.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $name The name of the analytics collection to be created or updated.
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
	public function putBehavioralAnalytics(string $name, array $params = []): Elasticsearch|Promise
	{
		$url = '/_application/analytics/' . $this->encode($name);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Perform a search against a search application
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-application-search.html
	 *
	 * @param string $name The name of the search application to be searched.
	 * @param array|string $body The request body
	 * @param array{
	 *     typed_keys: bool, // Determines whether aggregation names are prefixed by their respective types in the response.
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
	public function search(string $name, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_application/search_application/' . $this->encode($name) . '/_search';
		$method = empty($body) ? 'GET' : 'POST';
		$url = $this->addQueryString($url, $params, ['typed_keys', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}
}
