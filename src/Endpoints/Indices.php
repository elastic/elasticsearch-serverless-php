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
class Indices extends AbstractEndpoint
{
	/**
	 * Performs the analysis process on a text and return the tokens breakdown of the text.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-analyze.html
	 *
	 * @param string $index The name of the index to scope the operation
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
	public function analyze(string $index = null, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		if (isset($index)) {
			$url = $this->encode("/{$index}/_analyze");
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_analyze";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Creates an index with optional settings and mappings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-create-index.html
	 *
	 * @param string $index The name of the index
	 * @param array|string $body The request body
	 * @param array{
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     timeout: string|integer, // Explicit operation timeout
	 *     wait_for_active_shards: integer|string, // Set the number of active shards to wait for before the operation returns.
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
	public function create(string $index, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = $this->encode("/{$index}");
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'master_timeout',
			'timeout',
			'wait_for_active_shards',
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
	 * Creates a data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param string $name The name of the data stream
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
	public function createDataStream(string $name, array $params = []): Elasticsearch|Promise
	{
		$url = $this->encode("/_data_stream/{$name}");
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Provides statistics on operations happening in a data stream.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param string $name A comma-separated list of data stream names; use `_all` or empty string to perform the operation on all data streams
	 * @param array{
	 *     expand_wildcards: string|array, //
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
	public function dataStreamsStats(string $name = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($name)) {
			$url = $this->encode("/_data_stream/{$name}/_stats");
			$method = 'GET';
		} else {
			$url = "/_data_stream/_stats";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'expand_wildcards',
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
	 * Deletes an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-delete-index.html
	 *
	 * @param string|array $index A comma-separated list of indices to delete; use `_all` or `*` string to delete all indices
	 * @param array{
	 *     allow_no_indices: bool, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards: string|array, // Whether wildcard expressions should get expanded to open, closed, or hidden indices
	 *     ignore_unavailable: bool, // Ignore unavailable indexes (default: false)
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     timeout: string|integer, // Explicit operation timeout
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
	public function delete(string|array $index, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = $this->encode("/{$index}");
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'ignore_unavailable',
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
	 * Deletes an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param string|array $index A comma-separated list of index names (supports wildcards); use `_all` for all indices
	 * @param string|array $name A comma-separated list of aliases to delete (supports wildcards); use `_all` to delete all aliases for the specified indices.
	 * @param array{
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     timeout: string|integer, // Explicit timestamp for the document
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
	public function deleteAlias(string|array $index, string|array $name, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$name = $this->convertValue($name);
		$url = $this->encode("/{$index}/_alias/{$name}");
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
	 * Deletes the data lifecycle of the selected data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/dlm-delete-lifecycle.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string|array $name A comma-separated list of data streams of which the data lifecycle will be deleted; use `*` to get all data streams
	 * @param array{
	 *     expand_wildcards: string|array, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     timeout: string|integer, // Explicit timestamp for the document
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
	public function deleteDataLifecycle(string|array $name, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = $this->encode("/_data_stream/{$name}/_lifecycle");
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, [
			'expand_wildcards',
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
	 * Deletes a data stream.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param string|array $name A comma-separated list of data streams to delete; use `*` to delete all data streams
	 * @param array{
	 *     expand_wildcards: string|array, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
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
	public function deleteDataStream(string|array $name, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = $this->encode("/_data_stream/{$name}");
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, [
			'expand_wildcards',
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
	 * Deletes an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param string|array $name Comma-separated list of index template names used to limit the request. Wildcard (*) expressions are supported.
	 * @param array{
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error.
	 *     timeout: string|integer, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error.
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
	public function deleteIndexTemplate(string|array $name, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = $this->encode("/_index_template/{$name}");
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
	 * Deletes an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param string $name The name of the template
	 * @param array{
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     timeout: string|integer, // Explicit operation timeout
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
	public function deleteTemplate(string $name, array $params = []): Elasticsearch|Promise
	{
		$url = $this->encode("/_template/{$name}");
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
	 * Analyzes the disk usage of each field of an index or data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-disk-usage.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases used to limit the request. It’s recommended to execute this API with a single index (or the latest backing index of a data stream) as the API consumes resources significantly.
	 * @param array{
	 *     allow_no_indices: bool, // If false, the request returns an error if any wildcard expression, index alias, or _all value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting foo*,bar* returns an error if an index starts with foo but no index starts with bar.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. Supports comma-separated values, such as open,hidden.
	 *     flush: bool, // If true, the API performs a flush before analysis. If false, the response may not include uncommitted data.
	 *     ignore_unavailable: bool, // If true, missing or closed indices are not included in the response.
	 *     run_expensive_tasks: bool, // Analyzing field disk usage is resource-intensive. To use the API, this parameter must be set to true.
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
	public function diskUsage(string|array $index, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = $this->encode("/{$index}/_disk_usage");
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'flush',
			'ignore_unavailable',
			'run_expensive_tasks',
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
	 * Returns information about whether a particular index exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-exists.html
	 *
	 * @param string|array $index A comma-separated list of index names
	 * @param array{
	 *     allow_no_indices: bool, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards: string|array, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     flat_settings: bool, // Return settings in flat format (default: false)
	 *     ignore_unavailable: bool, // Ignore unavailable indexes (default: false)
	 *     include_defaults: bool, // Whether to return all default setting for each of the indices.
	 *     local: bool, // Return local information, do not retrieve the state from master node (default: false)
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
	public function exists(string|array $index, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = $this->encode("/{$index}");
		$method = 'HEAD';
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'flat_settings',
			'ignore_unavailable',
			'include_defaults',
			'local',
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
	 * Returns information about whether a particular alias exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param string|array $name A comma-separated list of alias names to return
	 * @param string|array $index A comma-separated list of index names to filter aliases
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     local: bool, // Return local information, do not retrieve the state from master node (default: false)
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
	public function existsAlias(
		string|array $name,
		string|array $index = null,
		array $params = [],
	): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = $this->encode("/{$index}/_alias/{$name}");
			$method = 'HEAD';
		} else {
			$url = $this->encode("/_alias/{$name}");
			$method = 'HEAD';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'ignore_unavailable',
			'local',
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
	 * Returns information about whether a particular index template exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param string $name Comma-separated list of index template names used to limit the request. Wildcard (*) expressions are supported.
	 * @param array{
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error.
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
	public function existsIndexTemplate(string $name, array $params = []): Elasticsearch|Promise
	{
		$url = $this->encode("/_index_template/{$name}");
		$method = 'HEAD';
		$url = $this->addQueryString($url, $params, ['master_timeout', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns information about whether a particular index template exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param string|array $name The comma separated names of the index templates
	 * @param array{
	 *     flat_settings: bool, // Return settings in flat format (default: false)
	 *     local: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: string|integer, // Explicit operation timeout for connection to master node
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
	public function existsTemplate(string|array $name, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = $this->encode("/_template/{$name}");
		$method = 'HEAD';
		$url = $this->addQueryString($url, $params, [
			'flat_settings',
			'local',
			'master_timeout',
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
	 * Retrieves information about the index's current DLM lifecycle, such as any potential encountered error, time since creation etc.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/dlm-explain-lifecycle.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string|array $index The name of the index to explain
	 * @param array{
	 *     include_defaults: bool, // indicates if the API should return the default values the system uses for the index's lifecycle
	 *     master_timeout: string|integer, // Specify timeout for connection to master
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
	public function explainDataLifecycle(string|array $index, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = $this->encode("/{$index}/_lifecycle/explain");
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'include_defaults',
			'master_timeout',
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
	 * Returns information about one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-index.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and index aliases used to limit the request.
	 * Wildcard expressions (*) are supported.
	 * @param array{
	 *     allow_no_indices: bool, // If false, the request returns an error if any wildcard expression, index alias, or _all value targets onlymissing or closed indices. This behavior applies even if the request targets other open indices. For example,a request targeting foo*,bar* returns an error if an index starts with foo but no index starts with bar.
	 *     expand_wildcards: string|array, // Type of index that wildcard expressions can match. If the request can target data streams, this argumentdetermines whether wildcard expressions match hidden data streams. Supports comma-separated values,such as open,hidden.
	 *     flat_settings: bool, // If true, returns settings in flat format.
	 *     ignore_unavailable: bool, // If false, requests that target a missing index return an error.
	 *     include_defaults: bool, // If true, return all default settings in the response.
	 *     local: bool, // If true, the request retrieves information from the local node only. Defaults to false, which means information is retrieved from the master node.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error.
	 *     features: string|array, // Return only information on specified index features
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
	public function get(string|array $index, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = $this->encode("/{$index}");
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'flat_settings',
			'ignore_unavailable',
			'include_defaults',
			'local',
			'master_timeout',
			'features',
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
	 * Returns an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param string|array $name A comma-separated list of alias names to return
	 * @param string|array $index A comma-separated list of index names to filter aliases
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     local: bool, // Return local information, do not retrieve the state from master node (default: false)
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
	public function getAlias(
		string|array $name = null,
		string|array $index = null,
		array $params = [],
	): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$index = $this->convertValue($index);
		if (isset($index) && isset($name)) {
			$url = $this->encode("/{$index}/_alias/{$name}");
			$method = 'GET';
		} elseif (isset($name)) {
			$url = $this->encode("/_alias/{$name}");
			$method = 'GET';
		} elseif (isset($index)) {
			$url = $this->encode("/{$index}/_alias");
			$method = 'GET';
		} else {
			$url = "/_alias";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'ignore_unavailable',
			'local',
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
	 * Returns the data lifecycle of the selected data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/dlm-get-lifecycle.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string|array $name A comma-separated list of data streams to get; use `*` to get all data streams
	 * @param array{
	 *     expand_wildcards: string|array, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     include_defaults: bool, // Return all relevant default configurations for the data stream (default: false)
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
	public function getDataLifecycle(string|array $name, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = $this->encode("/_data_stream/{$name}/_lifecycle");
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'expand_wildcards',
			'include_defaults',
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
	 * Returns data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param string|array $name A comma-separated list of data streams to get; use `*` to get all data streams
	 * @param array{
	 *     expand_wildcards: string|array, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     include_defaults: bool, // If true, returns all relevant default configurations for the index template.
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
	public function getDataStream(string|array $name = null, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		if (isset($name)) {
			$url = $this->encode("/_data_stream/{$name}");
			$method = 'GET';
		} else {
			$url = "/_data_stream";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'expand_wildcards',
			'include_defaults',
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
	 * Returns an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param string $name Comma-separated list of index template names used to limit the request. Wildcard (*) expressions are supported.
	 * @param array{
	 *     local: bool, // If true, the request retrieves information from the local node only. Defaults to false, which means information is retrieved from the master node.
	 *     flat_settings: bool, // If true, returns settings in flat format.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error.
	 *     include_defaults: bool, // If true, returns all relevant default configurations for the index template.
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
	public function getIndexTemplate(string $name = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($name)) {
			$url = $this->encode("/_index_template/{$name}");
			$method = 'GET';
		} else {
			$url = "/_index_template";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'local',
			'flat_settings',
			'master_timeout',
			'include_defaults',
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
	 * Returns mappings for one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-mapping.html
	 *
	 * @param string|array $index A comma-separated list of index names
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     local: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: string|integer, // Specify timeout for connection to master
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
	public function getMapping(string|array $index = null, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = $this->encode("/{$index}/_mapping");
			$method = 'GET';
		} else {
			$url = "/_mapping";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'ignore_unavailable',
			'local',
			'master_timeout',
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
	 * Returns settings for one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-settings.html
	 *
	 * @param string|array $index A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 * @param string|array $name The name of the settings that should be included
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     flat_settings: bool, // Return settings in flat format (default: false)
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     include_defaults: bool, // Whether to return all default setting for each of the indices.
	 *     local: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: string|integer, // Specify timeout for connection to master
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
	public function getSettings(
		string|array $index = null,
		string|array $name = null,
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$name = $this->convertValue($name);
		if (isset($index) && isset($name)) {
			$url = $this->encode("/{$index}/_settings/{$name}");
			$method = 'GET';
		} elseif (isset($index)) {
			$url = $this->encode("/{$index}/_settings");
			$method = 'GET';
		} elseif (isset($name)) {
			$url = $this->encode("/_settings/{$name}");
			$method = 'GET';
		} else {
			$url = "/_settings";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'flat_settings',
			'ignore_unavailable',
			'include_defaults',
			'local',
			'master_timeout',
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
	 * Returns an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param string|array $name The comma separated names of the index templates
	 * @param array{
	 *     flat_settings: bool, // Return settings in flat format (default: false)
	 *     local: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: string|integer, // Explicit operation timeout for connection to master node
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
	public function getTemplate(string|array $name = null, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		if (isset($name)) {
			$url = $this->encode("/_template/{$name}");
			$method = 'GET';
		} else {
			$url = "/_template";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'flat_settings',
			'local',
			'master_timeout',
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
	 * Migrates an alias to a data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param string $name The name of the alias to migrate
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
	public function migrateToDataStream(string $name, array $params = []): Elasticsearch|Promise
	{
		$url = $this->encode("/_data_stream/_migrate/{$name}");
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Modifies a data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
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
	public function modifyDataStream(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_data_stream/_modify";
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Creates or updates an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param string|array $index A comma-separated list of index names the alias should point to (supports wildcards); use `_all` to perform the operation on all indices.
	 * @param string $name The name of the alias to be created or updated
	 * @param array|string $body The request body
	 * @param array{
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     timeout: string|integer, // Explicit timestamp for the document
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
	public function putAlias(
		string|array $index,
		string $name,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = $this->encode("/{$index}/_alias/{$name}");
		$method = 'PUT';
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
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the data lifecycle of the selected data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/dlm-put-lifecycle.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string|array $name A comma-separated list of data streams whose lifecycle will be updated; use `*` to set the lifecycle to all data streams
	 * @param array|string $body The request body
	 * @param array{
	 *     expand_wildcards: string|array, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     timeout: string|integer, // Explicit timestamp for the document
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
	public function putDataLifecycle(
		string|array $name,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = $this->encode("/_data_stream/{$name}/_lifecycle");
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'expand_wildcards',
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
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Creates or updates an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param string $name Index or template name
	 * @param array|string $body The request body
	 * @param array{
	 *     create: bool, // Whether the index template should only be added if new or can also replace an existing one
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
	public function putIndexTemplate(string $name, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = $this->encode("/_index_template/{$name}");
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['create', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the index mappings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-put-mapping.html
	 *
	 * @param string|array $index A comma-separated list of index names the mapping should be added to (supports wildcards); use `_all` or omit to add the mapping on all indices.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     timeout: string|integer, // Explicit operation timeout
	 *     write_index_only: bool, // When true, applies mappings only to the write index of an alias or data stream
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
	public function putMapping(string|array $index, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = $this->encode("/{$index}/_mapping");
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'ignore_unavailable',
			'master_timeout',
			'timeout',
			'write_index_only',
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
	 * Updates the index settings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-update-settings.html
	 *
	 * @param string|array $index A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     flat_settings: bool, // Return settings in flat format (default: false)
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     preserve_existing: bool, // Whether to update existing settings. If set to `true` existing settings on an index remain unchanged, the default is `false`
	 *     timeout: string|integer, // Explicit operation timeout
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
	public function putSettings(
		string|array $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = $this->encode("/{$index}/_settings");
			$method = 'PUT';
		} else {
			$url = "/_settings";
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'flat_settings',
			'ignore_unavailable',
			'master_timeout',
			'preserve_existing',
			'timeout',
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
	 * Creates or updates an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param string $name The name of the template
	 * @param array|string $body The request body
	 * @param array{
	 *     create: bool, // If true, this request cannot replace or update existing index templates.
	 *     flat_settings: bool, //
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response isreceived before the timeout expires, the request fails and returns an error.
	 *     timeout: string|integer, //
	 *     order: integer, // Order in which Elasticsearch applies this template if indexmatches multiple templates.Templates with lower 'order' values are merged first. Templates with higher'order' values are merged later, overriding templates with lower values.
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
	public function putTemplate(string $name, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = $this->encode("/_template/{$name}");
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'create',
			'flat_settings',
			'master_timeout',
			'timeout',
			'order',
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
	 * Returns information about any matching indices, aliases, and data streams
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-resolve-index-api.html
	 *
	 * @param string|array $name A comma-separated list of names or wildcard expressions
	 * @param array{
	 *     expand_wildcards: string|array, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
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
	public function resolveIndex(string|array $name, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = $this->encode("/_resolve/index/{$name}");
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'expand_wildcards',
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
	 * Updates an alias to point to a new index when the existing index
	 * is considered to be too large or too old.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-rollover-index.html
	 *
	 * @param string $alias The name of the alias to rollover
	 * @param string $new_index The name of the rollover index
	 * @param array|string $body The request body
	 * @param array{
	 *     dry_run: bool, // If set to true the rollover action will only be validated but not actually performed even if a condition matches. The default is false
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     timeout: string|integer, // Explicit operation timeout
	 *     wait_for_active_shards: integer|string, // Set the number of active shards to wait for on the newly created rollover index before the operation returns.
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
	public function rollover(
		string $alias,
		string $new_index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($new_index)) {
			$url = $this->encode("/{$alias}/_rollover/{$new_index}");
			$method = 'POST';
		} else {
			$url = $this->encode("/{$alias}/_rollover");
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'dry_run',
			'master_timeout',
			'timeout',
			'wait_for_active_shards',
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
	 * Simulate matching the given index name against the index templates in the system
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param string $name Index or template name to simulate
	 * @param array|string $body The request body
	 * @param array{
	 *     create: bool, // If `true`, the template passed in the body is only used if no existingtemplates match the same index patterns. If `false`, the simulation usesthe template with the highest priority. Note that the template is notpermanently added or updated in either case; it is only used for thesimulation.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response is receivedbefore the timeout expires, the request fails and returns an error.
	 *     include_defaults: bool, // If true, returns all relevant default configurations for the index template.
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
	public function simulateIndexTemplate(
		string $name,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = $this->encode("/_index_template/_simulate_index/{$name}");
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'create',
			'master_timeout',
			'include_defaults',
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
	 * Simulate resolving the given template name or body
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param string $name Name of the index template to simulate. To test a template configuration before you add it to the cluster, omit
	 * this parameter and specify the template configuration in the request body.
	 * @param array|string $body The request body
	 * @param array{
	 *     create: bool, // If true, the template passed in the body is only used if no existing templates match the same index patterns. If false, the simulation uses the template with the highest priority. Note that the template is not permanently added or updated in either case; it is only used for the simulation.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error.
	 *     include_defaults: bool, // If true, returns all relevant default configurations for the index template.
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
	public function simulateTemplate(
		string $name = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($name)) {
			$url = $this->encode("/_index_template/_simulate/{$name}");
			$method = 'POST';
		} else {
			$url = "/_index_template/_simulate";
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'create',
			'master_timeout',
			'include_defaults',
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
	 * Updates index aliases.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param array|string $body The request body
	 * @param array{
	 *     master_timeout: string|integer, // Specify timeout for connection to master
	 *     timeout: string|integer, // Request timeout
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
	public function updateAliases(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_aliases";
		$method = 'POST';
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
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Allows a user to validate a potentially expensive query without executing it.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-validate.html
	 *
	 * @param string|array $index A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     all_shards: bool, // Execute validation on all shards instead of one random shard per index
	 *     analyzer: string, // The analyzer to use for the query string
	 *     analyze_wildcard: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     default_operator: string, // The default operator for query string query (AND or OR)
	 *     df: string, // The field to use as default where no field prefix is given in the query string
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     explain: bool, // Return detailed information about the error
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     lenient: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     rewrite: bool, // Provide a more detailed explanation showing the actual Lucene query that will be executed.
	 *     q: string, // Query in the Lucene query string syntax
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
	public function validateQuery(
		string|array $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = $this->encode("/{$index}/_validate/query");
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_validate/query";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'all_shards',
			'analyzer',
			'analyze_wildcard',
			'default_operator',
			'df',
			'expand_wildcards',
			'explain',
			'ignore_unavailable',
			'lenient',
			'rewrite',
			'q',
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
