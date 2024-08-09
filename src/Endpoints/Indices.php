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
	 * Adds a block to an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/index-modules-blocks.html
	 *
	 * @param string $index A comma separated list of indices to add a block to
	 * @param string $block The block to add (one of read, write, read_only or metadata)
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
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
	public function addBlock(string $index, string $block, array $params = []): Elasticsearch|Promise
	{
		$url = '/' . $this->encode($index) . '/_block/' . $this->encode($block);
		$method = 'PUT';
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
	 * Performs analysis on a text string and returns the resulting tokens.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/indices-analyze.html
	 *
	 * @param string $index Index used to derive the analyzer.
	 * If specified, the `analyzer` or field parameter overrides this value.
	 * If no index is specified or the index does not have a default analyzer, the analyze API uses the standard analyzer.
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
			$url = '/' . $this->encode($index) . '/_analyze';
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
	 * Creates a new index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/indices-create-index.html
	 *
	 * @param string $index Name of the index you wish to create.
	 * @param array|string $body The request body
	 * @param array{
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node.If no response is received before the timeout expires, the request fails and returns an error.
	 *     timeout: string|integer, // Period to wait for a response.If no response is received before the timeout expires, the request fails and returns an error.
	 *     wait_for_active_shards: int|string, // The number of shard copies that must be active before proceeding with the operation.Set to `all` or any positive integer up to the total number of shards in the index (`number_of_replicas+1`).
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
		$url = '/' . $this->encode($index);
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
	 * Creates a data stream.
	 * You must have a matching index template with data stream enabled.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param string $name Name of the data stream, which must meet the following criteria:
	 * Lowercase only;
	 * Cannot include `\`, `/`, `*`, `?`, `"`, `<`, `>`, `|`, `,`, `#`, `:`, or a space character;
	 * Cannot start with `-`, `_`, `+`, or `.ds-`;
	 * Cannot be `.` or `..`;
	 * Cannot be longer than 255 bytes. Multi-byte characters count towards this limit faster.
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
		$url = '/_data_stream/' . $this->encode($name);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Retrieves statistics for one or more data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param string $name Comma-separated list of data streams used to limit the request.
	 * Wildcard expressions (`*`) are supported.
	 * To target all data streams in a cluster, omit this parameter or use `*`.
	 * @param array{
	 *     expand_wildcards: string|array, // Type of data stream that wildcard patterns can match.Supports comma-separated values, such as `open,hidden`.
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
			$url = '/_data_stream/' . $this->encode($name) . '/_stats';
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
	 * Deletes one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-delete-index.html
	 *
	 * @param string|array $index Comma-separated list of indices to delete.
	 * You cannot specify index aliases.
	 * By default, this parameter does not support wildcards (`*`) or `_all`.
	 * To use wildcards or `_all`, set the `action.destructive_requires_name` cluster setting to `false`.
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
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
	public function delete(string|array $index, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = '/' . $this->encode($index);
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
	 * Removes a data stream or index from an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param string|array $index Comma-separated list of data streams or indices used to limit the request.
	 * Supports wildcards (`*`).
	 * @param string|array $name Comma-separated list of aliases to remove.
	 * Supports wildcards (`*`). To remove all aliases, use `*` or `_all`.
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
	public function deleteAlias(string|array $index, string|array $name, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$name = $this->convertValue($name);
		$url = '/' . $this->encode($index) . '/_alias/' . $this->encode($name);
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
	 * Removes the data lifecycle from a data stream rendering it not managed by the data stream lifecycle
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams-delete-lifecycle.html
	 *
	 * @param string|array $name A comma-separated list of data streams of which the data stream lifecycle will be deleted; use `*` to get all data streams
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
		$url = '/_data_stream/' . $this->encode($name) . '/_lifecycle';
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
	 * Deletes one or more data streams and their backing indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param string|array $name Comma-separated list of data streams to delete. Wildcard (`*`) expressions are supported.
	 * @param array{
	 *     expand_wildcards: string|array, // Type of data stream that wildcard patterns can match. Supports comma-separated values,such as `open,hidden`.
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
		$url = '/_data_stream/' . $this->encode($name);
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
	 * Delete an index template.
	 * The provided <index-template> may contain multiple template names separated by a comma. If multiple template
	 * names are specified then there is no wildcard support and the provided names should match completely with
	 * existing templates.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-delete-template.html
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
		$url = '/_index_template/' . $this->encode($name);
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
	 * Checks if a data stream, index, or alias exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-exists.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases. Supports wildcards (`*`).
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     flat_settings: bool, // If `true`, returns settings in flat format.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     include_defaults: bool, // If `true`, return all default settings in the response.
	 *     local: bool, // If `true`, the request retrieves information from the local node only.
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
		$url = '/' . $this->encode($index);
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
	 * Checks if an alias exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param string|array $name Comma-separated list of aliases to check. Supports wildcards (`*`).
	 * @param string|array $index Comma-separated list of data streams or indices used to limit the request. Supports wildcards (`*`).
	 * To target all data streams and indices, omit this parameter or use `*` or `_all`.
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     ignore_unavailable: bool, // If `false`, requests that include a missing data stream or index in the target indices or data streams return an error.
	 *     local: bool, // If `true`, the request retrieves information from the local node only.
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
			$url = '/' . $this->encode($index) . '/_alias/' . $this->encode($name);
			$method = 'HEAD';
		} else {
			$url = '/_alias/' . $this->encode($name);
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
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/index-templates.html
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
		$url = '/_index_template/' . $this->encode($name);
		$method = 'HEAD';
		$url = $this->addQueryString($url, $params, ['master_timeout', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Retrieves information about the index's current data stream lifecycle, such as any potential encountered error, time since creation etc.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/data-streams-explain-lifecycle.html
	 *
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
		$url = '/' . $this->encode($index) . '/_lifecycle/explain';
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
	 * Returns information about one or more indices. For data streams, the API returns information about the
	 * stream’s backing indices.
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
		$url = '/' . $this->encode($index);
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
	 * Retrieves information for one or more aliases.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param string|array $name Comma-separated list of aliases to retrieve.
	 * Supports wildcards (`*`).
	 * To retrieve all aliases, omit this parameter or use `*` or `_all`.
	 * @param string|array $index Comma-separated list of data streams or indices used to limit the request.
	 * Supports wildcards (`*`).
	 * To target all data streams and indices, omit this parameter or use `*` or `_all`.
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     local: bool, // If `true`, the request retrieves information from the local node only.
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
			$url = '/' . $this->encode($index) . '/_alias/' . $this->encode($name);
			$method = 'GET';
		} elseif (isset($name)) {
			$url = '/_alias/' . $this->encode($name);
			$method = 'GET';
		} elseif (isset($index)) {
			$url = '/' . $this->encode($index) . '/_alias';
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
	 * Retrieves the data stream lifecycle configuration of one or more data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams-get-lifecycle.html
	 *
	 * @param string|array $name Comma-separated list of data streams to limit the request.
	 * Supports wildcards (`*`).
	 * To target all data streams, omit this parameter or use `*` or `_all`.
	 * @param array{
	 *     expand_wildcards: string|array, // Type of data stream that wildcard patterns can match.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     include_defaults: bool, // If `true`, return all default settings in the response.
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
		$url = '/_data_stream/' . $this->encode($name) . '/_lifecycle';
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
	 * Retrieves information about one or more data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param string|array $name Comma-separated list of data stream names used to limit the request.
	 * Wildcard (`*`) expressions are supported. If omitted, all data streams are returned.
	 * @param array{
	 *     expand_wildcards: string|array, // Type of data stream that wildcard patterns can match.Supports comma-separated values, such as `open,hidden`.
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
			$url = '/_data_stream/' . $this->encode($name);
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
	 * Get index templates.
	 * Returns information about one or more index templates.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-template.html
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
			$url = '/_index_template/' . $this->encode($name);
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
	 * Retrieves mapping definitions for one or more indices.
	 * For data streams, the API retrieves mappings for the stream’s backing indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-mapping.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases used to limit the request.
	 * Supports wildcards (`*`).
	 * To target all data streams and indices, omit this parameter or use `*` or `_all`.
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     local: bool, // If `true`, the request retrieves information from the local node only.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node.If no response is received before the timeout expires, the request fails and returns an error.
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
			$url = '/' . $this->encode($index) . '/_mapping';
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
	 * Returns setting information for one or more indices. For data streams,
	 * returns setting information for the stream’s backing indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-settings.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases used to limit
	 * the request. Supports wildcards (`*`). To target all data streams and
	 * indices, omit this parameter or use `*` or `_all`.
	 * @param string|array $name Comma-separated list or wildcard expression of settings to retrieve.
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, indexalias, or `_all` value targets only missing or closed indices. Thisbehavior applies even if the request targets other open indices. Forexample, a request targeting `foo*,bar*` returns an error if an indexstarts with foo but no index starts with `bar`.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.
	 *     flat_settings: bool, // If `true`, returns settings in flat format.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     include_defaults: bool, // If `true`, return all default settings in the response.
	 *     local: bool, // If `true`, the request retrieves information from the local node only. If`false`, information is retrieved from the master node.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response isreceived before the timeout expires, the request fails and returns anerror.
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
			$url = '/' . $this->encode($index) . '/_settings/' . $this->encode($name);
			$method = 'GET';
		} elseif (isset($index)) {
			$url = '/' . $this->encode($index) . '/_settings';
			$method = 'GET';
		} elseif (isset($name)) {
			$url = '/_settings/' . $this->encode($name);
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
	 * Converts an index alias to a data stream.
	 * You must have a matching index template that is data stream enabled.
	 * The alias must meet the following criteria:
	 * The alias must have a write index;
	 * All indices for the alias must have a `@timestamp` field mapping of a `date` or `date_nanos` field type;
	 * The alias must not have any filters;
	 * The alias must not use custom routing.
	 * If successful, the request removes the alias and creates a data stream with the same name.
	 * The indices for the alias become hidden backing indices for the stream.
	 * The write index for the alias becomes the write index for the stream.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param string $name Name of the index alias to convert to a data stream.
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
		$url = '/_data_stream/_migrate/' . $this->encode($name);
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Performs one or more data stream modification actions in a single atomic operation.
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
	 * Adds a data stream or index to an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param string|array $index Comma-separated list of data streams or indices to add.
	 * Supports wildcards (`*`).
	 * Wildcard patterns that match both data streams and indices return an error.
	 * @param string $name Alias to update.
	 * If the alias doesn’t exist, the request creates it.
	 * Index alias names support date math.
	 * @param array|string $body The request body
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
	public function putAlias(
		string|array $index,
		string $name,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = '/' . $this->encode($index) . '/_alias/' . $this->encode($name);
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
	 * Update the data lifecycle of the specified data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams-put-lifecycle.html
	 *
	 * @param string|array $name Comma-separated list of data streams used to limit the request.
	 * Supports wildcards (`*`).
	 * To target all data streams use `*` or `_all`.
	 * @param array|string $body The request body
	 * @param array{
	 *     expand_wildcards: string|array, // Type of data stream that wildcard patterns can match.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `hidden`, `open`, `closed`, `none`.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response isreceived before the timeout expires, the request fails and returns anerror.
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
	public function putDataLifecycle(
		string|array $name,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = '/_data_stream/' . $this->encode($name) . '/_lifecycle';
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
	 * Create or update an index template.
	 * Index templates define settings, mappings, and aliases that can be applied automatically to new indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-put-template.html
	 *
	 * @param string $name Index or template name
	 * @param array|string $body The request body
	 * @param array{
	 *     create: bool, // If `true`, this request cannot replace or update existing index templates.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node.If no response is received before the timeout expires, the request fails and returns an error.
	 *     cause: string, // User defined reason for creating/updating the index template
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
		$url = '/_index_template/' . $this->encode($name);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'create',
			'master_timeout',
			'cause',
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
	 * Adds new fields to an existing data stream or index.
	 * You can also use this API to change the search settings of existing fields.
	 * For data streams, these changes are applied to all backing indices by default.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-put-mapping.html
	 *
	 * @param string|array $index A comma-separated list of index names the mapping should be added to (supports wildcards); use `_all` or omit to add the mapping on all indices.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node.If no response is received before the timeout expires, the request fails and returns an error.
	 *     timeout: string|integer, // Period to wait for a response.If no response is received before the timeout expires, the request fails and returns an error.
	 *     write_index_only: bool, // If `true`, the mappings are applied only to the current write index for the target.
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
		$url = '/' . $this->encode($index) . '/_mapping';
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
	 * Changes a dynamic index setting in real time. For data streams, index setting
	 * changes are applied to all backing indices by default.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-update-settings.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases used to limit
	 * the request. Supports wildcards (`*`). To target all data streams and
	 * indices, omit this parameter or use `*` or `_all`.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, indexalias, or `_all` value targets only missing or closed indices. Thisbehavior applies even if the request targets other open indices. Forexample, a request targeting `foo*,bar*` returns an error if an indexstarts with `foo` but no index starts with `bar`.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match. If the request can targetdata streams, this argument determines whether wildcard expressions matchhidden data streams. Supports comma-separated values, such as`open,hidden`.
	 *     flat_settings: bool, // If `true`, returns settings in flat format.
	 *     ignore_unavailable: bool, // If `true`, returns settings in flat format.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response isreceived before the timeout expires, the request fails and returns anerror.
	 *     preserve_existing: bool, // If `true`, existing index settings remain unchanged.
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
	public function putSettings(
		string|array $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_settings';
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
	 * Create or update an index template.
	 * Index templates define settings, mappings, and aliases that can be applied automatically to new indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates-v1.html
	 *
	 * @param string $name The name of the template
	 * @param array|string $body The request body
	 * @param array{
	 *     create: bool, // If true, this request cannot replace or update existing index templates.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response isreceived before the timeout expires, the request fails and returns an error.
	 *     order: int, // Order in which Elasticsearch applies this template if indexmatches multiple templates.Templates with lower 'order' values are merged first. Templates with higher'order' values are merged later, overriding templates with lower values.
	 *     cause: string, //
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
		$url = '/_template/' . $this->encode($name);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'create',
			'master_timeout',
			'order',
			'cause',
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
	 * A refresh makes recent operations performed on one or more indices available for search.
	 * For data streams, the API runs the refresh operation on the stream’s backing indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-refresh.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases used to limit the request.
	 * Supports wildcards (`*`).
	 * To target all data streams and indices, omit this parameter or use `*` or `_all`.
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
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
	public function refresh(string|array $index = null, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_refresh';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_refresh";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'ignore_unavailable',
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
	 * Resolves the specified name(s) and/or index patterns for indices, aliases, and data streams.
	 * Multiple patterns and remote clusters are supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-resolve-index-api.html
	 *
	 * @param string|array $name Comma-separated name(s) or index pattern(s) of the indices, aliases, and data streams to resolve.
	 * Resources on remote clusters can be specified using the `<cluster>`:`<name>` syntax.
	 * @param array{
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
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
		$url = '/_resolve/index/' . $this->encode($name);
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
	 * Creates a new index for a data stream or index alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/indices-rollover-index.html
	 *
	 * @param string $alias Name of the data stream or index alias to roll over.
	 * @param string $new_index Name of the index to create.
	 * Supports date math.
	 * Data streams do not support this parameter.
	 * @param array|string $body The request body
	 * @param array{
	 *     dry_run: bool, // If `true`, checks whether the current index satisfies the specified conditions but does not perform a rollover.
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node.If no response is received before the timeout expires, the request fails and returns an error.
	 *     timeout: string|integer, // Period to wait for a response.If no response is received before the timeout expires, the request fails and returns an error.
	 *     wait_for_active_shards: int|string, // The number of shard copies that must be active before proceeding with the operation.Set to all or any positive integer up to the total number of shards in the index (`number_of_replicas+1`).
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
			$url = '/' . $this->encode($alias) . '/_rollover/' . $this->encode($new_index);
			$method = 'POST';
		} else {
			$url = '/' . $this->encode($alias) . '/_rollover';
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
	 * Simulate an index.
	 * Returns the index configuration that would be applied to the specified index from an existing index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-simulate-index.html
	 *
	 * @param string $name Name of the index to simulate
	 * @param array{
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
	public function simulateIndexTemplate(string $name, array $params = []): Elasticsearch|Promise
	{
		$url = '/_index_template/_simulate_index/' . $this->encode($name);
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
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
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Simulate an index template.
	 * Returns the index configuration that would be applied by a particular index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-simulate-template.html
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
			$url = '/_index_template/_simulate/' . $this->encode($name);
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
	 * Adds a data stream or index to an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param array|string $body The request body
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
	 * Validates a potentially expensive query without executing it.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-validate.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases to search.
	 * Supports wildcards (`*`).
	 * To search all data streams or indices, omit this parameter or use `*` or `_all`.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.
	 *     all_shards: bool, // If `true`, the validation is executed on all shards instead of one random shard per index.
	 *     analyzer: string, // Analyzer to use for the query string.This parameter can only be used when the `q` query string parameter is specified.
	 *     analyze_wildcard: bool, // If `true`, wildcard and prefix queries are analyzed.
	 *     default_operator: string, // The default operator for query string query: `AND` or `OR`.
	 *     df: string, // Field to use as default where no field prefix is given in the query string.This parameter can only be used when the `q` query string parameter is specified.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     explain: bool, // If `true`, the response returns detailed information if an error has occurred.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     lenient: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored.
	 *     rewrite: bool, // If `true`, returns a more detailed explanation showing the actual Lucene query that will be executed.
	 *     q: string, // Query in the Lucene query string syntax.
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
			$url = '/' . $this->encode($index) . '/_validate/query';
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
