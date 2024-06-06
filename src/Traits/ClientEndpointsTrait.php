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

namespace Elastic\Elasticsearch\Serverless\Traits;

use Elastic\Elasticsearch\Serverless\Exception\ClientResponseException;
use Elastic\Elasticsearch\Serverless\Exception\MissingParameterException;
use Elastic\Elasticsearch\Serverless\Exception\ServerResponseException;
use Elastic\Elasticsearch\Serverless\Response\Elasticsearch;
use Elastic\Transport\Exception\NoNodeAvailableException;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
trait ClientEndpointsTrait
{
	/**
	 * Allows to perform multiple index/update/delete operations in a single request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/docs-bulk.html
	 *
	 * @param string $index Name of the data stream, index, or index alias to perform bulk actions on.
	 * @param array|string $body The request body
	 * @param array{
	 *     pipeline: string, // ID of the pipeline to use to preprocess incoming documents.If the index has a default ingest pipeline specified, then setting the value to `_none` disables the default ingest pipeline for this request.If a final pipeline is configured it will always run, regardless of the value of this parameter.
	 *     refresh: string, // If `true`, Elasticsearch refreshes the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` do nothing with refreshes.Valid values: `true`, `false`, `wait_for`.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     _source: bool|string, // `true` or `false` to return the `_source` field or not, or a list of fields to return.
	 *     _source_excludes: string|array, // A comma-separated list of source fields to exclude from the response.
	 *     _source_includes: string|array, // A comma-separated list of source fields to include in the response.
	 *     timeout: string|integer, // Period each action waits for the following operations: automatic index creation, dynamic mapping updates, waiting for active shards.
	 *     wait_for_active_shards: int|string, // The number of shard copies that must be active before proceeding with the operation.Set to all or any positive integer up to the total number of shards in the index (`number_of_replicas+1`).
	 *     require_alias: bool, // If `true`, the request’s actions must target an index alias.
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
	public function bulk(string $index = null, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_bulk';
			$method = 'POST';
		} else {
			$url = "/_bulk";
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'pipeline',
			'refresh',
			'routing',
			'_source',
			'_source_excludes',
			'_source_includes',
			'timeout',
			'wait_for_active_shards',
			'require_alias',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/x-ndjson'
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Explicitly clears the search context for a scroll.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/clear-scroll-api.html
	 *
	 * @param string|array $scroll_id Comma-separated list of scroll IDs to clear.
	 * To clear all scroll IDs, use `_all`.
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
	public function clearScroll(
		string|array $scroll_id = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$scroll_id = $this->convertValue($scroll_id);
		if (isset($scroll_id)) {
			$url = '/_search/scroll/' . $this->encode($scroll_id);
			$method = 'DELETE';
		} else {
			$url = "/_search/scroll";
			$method = 'DELETE';
		}
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json', 'text/plain'
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Close a point in time
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/point-in-time-api.html
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
	public function closePointInTime(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_pit";
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Returns number of documents matching a query.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-count.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases to search.
	 * Supports wildcards (`*`).
	 * To search all data streams and indices, omit this parameter or use `*` or `_all`.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.
	 *     analyzer: string, // Analyzer to use for the query string.This parameter can only be used when the `q` query string parameter is specified.
	 *     analyze_wildcard: bool, // If `true`, wildcard and prefix queries are analyzed.This parameter can only be used when the `q` query string parameter is specified.
	 *     default_operator: string, // The default operator for query string query: `AND` or `OR`.This parameter can only be used when the `q` query string parameter is specified.
	 *     df: string, // Field to use as default where no field prefix is given in the query string.This parameter can only be used when the `q` query string parameter is specified.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.
	 *     ignore_throttled: bool, // If `true`, concrete, expanded or aliased indices are ignored when frozen.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     lenient: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored.
	 *     min_score: float, // Sets the minimum `_score` value that documents must have to be included in the result.
	 *     preference: string, // Specifies the node or shard the operation should be performed on.Random by default.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     terminate_after: int, // Maximum number of documents to collect for each shard.If a query reaches this limit, Elasticsearch terminates the query early.Elasticsearch collects documents before sorting.
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
	public function count(string|array $index = null, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_count';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_count";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'analyzer',
			'analyze_wildcard',
			'default_operator',
			'df',
			'expand_wildcards',
			'ignore_throttled',
			'ignore_unavailable',
			'lenient',
			'min_score',
			'preference',
			'routing',
			'terminate_after',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Creates a new document in the index.
	 *
	 * Returns a 409 response when a document with a same ID already exists in the index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-index_.html
	 *
	 * @param string $id Unique identifier for the document.
	 * @param string $index Name of the data stream or index to target.
	 * If the target doesn’t exist and matches the name or wildcard (`*`) pattern of an index template with a `data_stream` definition, this request creates the data stream.
	 * If the target doesn’t exist and doesn’t match a data stream template, this request creates the index.
	 * @param array|string $body The request body
	 * @param array{
	 *     pipeline: string, // ID of the pipeline to use to preprocess incoming documents.If the index has a default ingest pipeline specified, then setting the value to `_none` disables the default ingest pipeline for this request.If a final pipeline is configured it will always run, regardless of the value of this parameter.
	 *     refresh: string, // If `true`, Elasticsearch refreshes the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` do nothing with refreshes.Valid values: `true`, `false`, `wait_for`.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     timeout: string|integer, // Period the request waits for the following operations: automatic index creation, dynamic mapping updates, waiting for active shards.
	 *     version: int, // Explicit version number for concurrency control.The specified version must match the current version of the document for the request to succeed.
	 *     version_type: string, // Specific version type: `external`, `external_gte`.
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
	public function create(string $id, string $index, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/' . $this->encode($index) . '/_create/' . $this->encode($id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'pipeline',
			'refresh',
			'routing',
			'timeout',
			'version',
			'version_type',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Removes a document from the index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-delete.html
	 *
	 * @param string $id Unique identifier for the document.
	 * @param string $index Name of the target index.
	 * @param array{
	 *     if_primary_term: int, // Only perform the operation if the document has this primary term.
	 *     if_seq_no: int, // Only perform the operation if the document has this sequence number.
	 *     refresh: string, // If `true`, Elasticsearch refreshes the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` do nothing with refreshes.Valid values: `true`, `false`, `wait_for`.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     timeout: string|integer, // Period to wait for active shards.
	 *     version: int, // Explicit version number for concurrency control.The specified version must match the current version of the document for the request to succeed.
	 *     version_type: string, // Specific version type: `external`, `external_gte`.
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
	public function delete(string $id, string $index, array $params = []): Elasticsearch|Promise
	{
		$url = '/' . $this->encode($index) . '/_doc/' . $this->encode($id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, [
			'if_primary_term',
			'if_seq_no',
			'refresh',
			'routing',
			'timeout',
			'version',
			'version_type',
			'wait_for_active_shards',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Deletes documents matching the provided query.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-delete-by-query.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases to search.
	 * Supports wildcards (`*`).
	 * To search all data streams or indices, omit this parameter or use `*` or `_all`.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`.
	 *     analyzer: string, // Analyzer to use for the query string.
	 *     analyze_wildcard: bool, // If `true`, wildcard and prefix queries are analyzed.
	 *     conflicts: string, // What to do if delete by query hits version conflicts: `abort` or `proceed`.
	 *     default_operator: string, // The default operator for query string query: `AND` or `OR`.
	 *     df: string, // Field to use as default where no field prefix is given in the query string.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`. Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     from: int, // Starting offset (default: 0)
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     lenient: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored.
	 *     max_docs: int, // Maximum number of documents to process.Defaults to all documents.
	 *     preference: string, // Specifies the node or shard the operation should be performed on.Random by default.
	 *     refresh: bool, // If `true`, Elasticsearch refreshes all shards involved in the delete by query after the request completes.
	 *     request_cache: bool, // If `true`, the request cache is used for this request.Defaults to the index-level setting.
	 *     requests_per_second: float, // The throttle for this request in sub-requests per second.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     q: string, // Query in the Lucene query string syntax.
	 *     scroll: string|integer, // Period to retain the search context for scrolling.
	 *     scroll_size: int, // Size of the scroll request that powers the operation.
	 *     search_timeout: string|integer, // Explicit timeout for each search request.Defaults to no timeout.
	 *     search_type: string, // The type of the search operation.Available options: `query_then_fetch`, `dfs_query_then_fetch`.
	 *     slices: int|string, // The number of slices this task should be divided into.
	 *     sort: array, // A comma-separated list of <field>:<direction> pairs.
	 *     stats: array, // Specific `tag` of the request for logging and statistical purposes.
	 *     terminate_after: int, // Maximum number of documents to collect for each shard.If a query reaches this limit, Elasticsearch terminates the query early.Elasticsearch collects documents before sorting.Use with caution.Elasticsearch applies this parameter to each shard handling the request.When possible, let Elasticsearch perform early termination automatically.Avoid specifying this parameter for requests that target data streams with backing indices across multiple data tiers.
	 *     timeout: string|integer, // Period each deletion request waits for active shards.
	 *     version: bool, // If `true`, returns the document version as part of a hit.
	 *     wait_for_active_shards: int|string, // The number of shard copies that must be active before proceeding with the operation.Set to all or any positive integer up to the total number of shards in the index (`number_of_replicas+1`).
	 *     wait_for_completion: bool, // If `true`, the request blocks until the operation is complete.
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
	public function deleteByQuery(
		string|array $index,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = '/' . $this->encode($index) . '/_delete_by_query';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'analyzer',
			'analyze_wildcard',
			'conflicts',
			'default_operator',
			'df',
			'expand_wildcards',
			'from',
			'ignore_unavailable',
			'lenient',
			'max_docs',
			'preference',
			'refresh',
			'request_cache',
			'requests_per_second',
			'routing',
			'q',
			'scroll',
			'scroll_size',
			'search_timeout',
			'search_type',
			'slices',
			'sort',
			'stats',
			'terminate_after',
			'timeout',
			'version',
			'wait_for_active_shards',
			'wait_for_completion',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Deletes a script.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
	 *
	 * @param string $id Identifier for the stored script or search template.
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
	public function deleteScript(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_scripts/' . $this->encode($id);
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
		return $this->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns information about whether a document exists in an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
	 *
	 * @param string $id Identifier of the document.
	 * @param string $index Comma-separated list of data streams, indices, and aliases.
	 * Supports wildcards (`*`).
	 * @param array{
	 *     preference: string, // Specifies the node or shard the operation should be performed on.Random by default.
	 *     realtime: bool, // If `true`, the request is real-time as opposed to near-real-time.
	 *     refresh: bool, // If `true`, Elasticsearch refreshes all shards involved in the delete by query after the request completes.
	 *     routing: string, // Target the specified primary shard.
	 *     _source: bool|string, // `true` or `false` to return the `_source` field or not, or a list of fields to return.
	 *     _source_excludes: string|array, // A comma-separated list of source fields to exclude in the response.
	 *     _source_includes: string|array, // A comma-separated list of source fields to include in the response.
	 *     stored_fields: string|array, // List of stored fields to return as part of a hit.If no fields are specified, no stored fields are included in the response.If this field is specified, the `_source` parameter defaults to false.
	 *     version: int, // Explicit version number for concurrency control.The specified version must match the current version of the document for the request to succeed.
	 *     version_type: string, // Specific version type: `external`, `external_gte`.
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
	public function exists(string $id, string $index, array $params = []): Elasticsearch|Promise
	{
		$url = '/' . $this->encode($index) . '/_doc/' . $this->encode($id);
		$method = 'HEAD';
		$url = $this->addQueryString($url, $params, [
			'preference',
			'realtime',
			'refresh',
			'routing',
			'_source',
			'_source_excludes',
			'_source_includes',
			'stored_fields',
			'version',
			'version_type',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns information about whether a document source exists in an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
	 *
	 * @param string $id Identifier of the document.
	 * @param string $index Comma-separated list of data streams, indices, and aliases.
	 * Supports wildcards (`*`).
	 * @param array{
	 *     preference: string, // Specifies the node or shard the operation should be performed on.Random by default.
	 *     realtime: bool, // If true, the request is real-time as opposed to near-real-time.
	 *     refresh: bool, // If `true`, Elasticsearch refreshes all shards involved in the delete by query after the request completes.
	 *     routing: string, // Target the specified primary shard.
	 *     _source: bool|string, // `true` or `false` to return the `_source` field or not, or a list of fields to return.
	 *     _source_excludes: string|array, // A comma-separated list of source fields to exclude in the response.
	 *     _source_includes: string|array, // A comma-separated list of source fields to include in the response.
	 *     version: int, // Explicit version number for concurrency control.The specified version must match the current version of the document for the request to succeed.
	 *     version_type: string, // Specific version type: `external`, `external_gte`.
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
	public function existsSource(string $id, string $index, array $params = []): Elasticsearch|Promise
	{
		$url = '/' . $this->encode($index) . '/_source/' . $this->encode($id);
		$method = 'HEAD';
		$url = $this->addQueryString($url, $params, [
			'preference',
			'realtime',
			'refresh',
			'routing',
			'_source',
			'_source_excludes',
			'_source_includes',
			'version',
			'version_type',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns information about why a specific matches (or doesn't match) a query.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-explain.html
	 *
	 * @param string $id Defines the document ID.
	 * @param string $index Index names used to limit the request.
	 * Only a single index name can be provided to this parameter.
	 * @param array|string $body The request body
	 * @param array{
	 *     analyzer: string, // Analyzer to use for the query string.This parameter can only be used when the `q` query string parameter is specified.
	 *     analyze_wildcard: bool, // If `true`, wildcard and prefix queries are analyzed.
	 *     default_operator: string, // The default operator for query string query: `AND` or `OR`.
	 *     df: string, // Field to use as default where no field prefix is given in the query string.
	 *     lenient: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored.
	 *     preference: string, // Specifies the node or shard the operation should be performed on.Random by default.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     _source: bool|string, // True or false to return the `_source` field or not, or a list of fields to return.
	 *     _source_excludes: string|array, // A comma-separated list of source fields to exclude from the response.
	 *     _source_includes: string|array, // A comma-separated list of source fields to include in the response.
	 *     stored_fields: string|array, // A comma-separated list of stored fields to return in the response.
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
	public function explain(
		string $id,
		string $index,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/' . $this->encode($index) . '/_explain/' . $this->encode($id);
		$method = empty($body) ? 'GET' : 'POST';
		$url = $this->addQueryString($url, $params, [
			'analyzer',
			'analyze_wildcard',
			'default_operator',
			'df',
			'lenient',
			'preference',
			'routing',
			'_source',
			'_source_excludes',
			'_source_includes',
			'stored_fields',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Returns the information about the capabilities of fields among multiple indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-field-caps.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases used to limit the request. Supports wildcards (*). To target all data streams and indices, omit this parameter or use * or _all.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If false, the request returns an error if any wildcard expression, index alias,or `_all` value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a requesttargeting `foo*,bar*` returns an error if an index starts with foo but no index starts with bar.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. Supports comma-separated values, such as `open,hidden`.
	 *     fields: string|array, // Comma-separated list of fields to retrieve capabilities for. Wildcard (`*`) expressions are supported.
	 *     ignore_unavailable: bool, // If `true`, missing or closed indices are not included in the response.
	 *     include_unmapped: bool, // If true, unmapped fields are included in the response.
	 *     filters: string, // An optional set of filters: can include +metadata,-metadata,-nested,-multifield,-parent
	 *     types: array, // Only return results for fields that have one of the types in the list
	 *     include_empty_fields: bool, // If false, empty fields are not included in the response.
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
	public function fieldCaps(
		string|array $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_field_caps';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_field_caps";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'fields',
			'ignore_unavailable',
			'include_unmapped',
			'filters',
			'types',
			'include_empty_fields',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Returns a document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
	 *
	 * @param string $id Unique identifier of the document.
	 * @param string $index Name of the index that contains the document.
	 * @param array{
	 *     force_synthetic_source: bool, // Should this request force synthetic _source?Use this to test if the mapping supports synthetic _source and to get a sense of the worst case performance.Fetches with this enabled will be slower the enabling synthetic source natively in the index.
	 *     preference: string, // Specifies the node or shard the operation should be performed on. Random by default.
	 *     realtime: bool, // If `true`, the request is real-time as opposed to near-real-time.
	 *     refresh: bool, // If true, Elasticsearch refreshes the affected shards to make this operation visible to search. If false, do nothing with refreshes.
	 *     routing: string, // Target the specified primary shard.
	 *     _source: bool|string, // True or false to return the _source field or not, or a list of fields to return.
	 *     _source_excludes: string|array, // A comma-separated list of source fields to exclude in the response.
	 *     _source_includes: string|array, // A comma-separated list of source fields to include in the response.
	 *     stored_fields: string|array, // List of stored fields to return as part of a hit.If no fields are specified, no stored fields are included in the response.If this field is specified, the `_source` parameter defaults to false.
	 *     version: int, // Explicit version number for concurrency control. The specified version must match the current version of the document for the request to succeed.
	 *     version_type: string, // Specific version type: internal, external, external_gte.
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
	public function get(string $id, string $index, array $params = []): Elasticsearch|Promise
	{
		$url = '/' . $this->encode($index) . '/_doc/' . $this->encode($id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'force_synthetic_source',
			'preference',
			'realtime',
			'refresh',
			'routing',
			'_source',
			'_source_excludes',
			'_source_includes',
			'stored_fields',
			'version',
			'version_type',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns a script.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
	 *
	 * @param string $id Identifier for the stored script or search template.
	 * @param array{
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
	public function getScript(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_scripts/' . $this->encode($id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['master_timeout', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns the source of a document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
	 *
	 * @param string $id Unique identifier of the document.
	 * @param string $index Name of the index that contains the document.
	 * @param array{
	 *     preference: string, // Specifies the node or shard the operation should be performed on. Random by default.
	 *     realtime: bool, // Boolean) If true, the request is real-time as opposed to near-real-time.
	 *     refresh: bool, // If true, Elasticsearch refreshes the affected shards to make this operation visible to search. If false, do nothing with refreshes.
	 *     routing: string, // Target the specified primary shard.
	 *     _source: bool|string, // True or false to return the _source field or not, or a list of fields to return.
	 *     _source_excludes: string|array, // A comma-separated list of source fields to exclude in the response.
	 *     _source_includes: string|array, // A comma-separated list of source fields to include in the response.
	 *     stored_fields: string|array, //
	 *     version: int, // Explicit version number for concurrency control. The specified version must match the current version of the document for the request to succeed.
	 *     version_type: string, // Specific version type: internal, external, external_gte.
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
	public function getSource(string $id, string $index, array $params = []): Elasticsearch|Promise
	{
		$url = '/' . $this->encode($index) . '/_source/' . $this->encode($id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'preference',
			'realtime',
			'refresh',
			'routing',
			'_source',
			'_source_excludes',
			'_source_includes',
			'stored_fields',
			'version',
			'version_type',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Creates or updates a document in an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-index_.html
	 *
	 * @param string $id Unique identifier for the document.
	 * @param string $index Name of the data stream or index to target.
	 * @param array|string $body The request body
	 * @param array{
	 *     if_primary_term: int, // Only perform the operation if the document has this primary term.
	 *     if_seq_no: int, // Only perform the operation if the document has this sequence number.
	 *     op_type: string, // Set to create to only index the document if it does not already exist (put if absent).If a document with the specified `_id` already exists, the indexing operation will fail.Same as using the `<index>/_create` endpoint.Valid values: `index`, `create`.If document id is specified, it defaults to `index`.Otherwise, it defaults to `create`.
	 *     pipeline: string, // ID of the pipeline to use to preprocess incoming documents.If the index has a default ingest pipeline specified, then setting the value to `_none` disables the default ingest pipeline for this request.If a final pipeline is configured it will always run, regardless of the value of this parameter.
	 *     refresh: string, // If `true`, Elasticsearch refreshes the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` do nothing with refreshes.Valid values: `true`, `false`, `wait_for`.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     timeout: string|integer, // Period the request waits for the following operations: automatic index creation, dynamic mapping updates, waiting for active shards.
	 *     version: int, // Explicit version number for concurrency control.The specified version must match the current version of the document for the request to succeed.
	 *     version_type: string, // Specific version type: `external`, `external_gte`.
	 *     wait_for_active_shards: int|string, // The number of shard copies that must be active before proceeding with the operation.Set to all or any positive integer up to the total number of shards in the index (`number_of_replicas+1`).
	 *     require_alias: bool, // If `true`, the destination must be an index alias.
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
	public function index(
		string $index,
		string $id = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($id)) {
			$url = '/' . $this->encode($index) . '/_doc/' . $this->encode($id);
			$method = 'PUT';
		} else {
			$url = '/' . $this->encode($index) . '/_doc';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'if_primary_term',
			'if_seq_no',
			'op_type',
			'pipeline',
			'refresh',
			'routing',
			'timeout',
			'version',
			'version_type',
			'wait_for_active_shards',
			'require_alias',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Returns basic information about the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html
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
	public function info(array $params = []): Elasticsearch|Promise
	{
		$url = "/";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Allows to get multiple documents in one request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-multi-get.html
	 *
	 * @param string $index Name of the index to retrieve documents from when `ids` are specified, or when a document in the `docs` array does not specify an index.
	 * @param array|string $body The request body
	 * @param array{
	 *     force_synthetic_source: bool, // Should this request force synthetic _source?Use this to test if the mapping supports synthetic _source and to get a sense of the worst case performance.Fetches with this enabled will be slower the enabling synthetic source natively in the index.
	 *     preference: string, // Specifies the node or shard the operation should be performed on. Random by default.
	 *     realtime: bool, // If `true`, the request is real-time as opposed to near-real-time.
	 *     refresh: bool, // If `true`, the request refreshes relevant shards before retrieving documents.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     _source: bool|string, // True or false to return the `_source` field or not, or a list of fields to return.
	 *     _source_excludes: string|array, // A comma-separated list of source fields to exclude from the response.You can also use this parameter to exclude fields from the subset specified in `_source_includes` query parameter.
	 *     _source_includes: string|array, // A comma-separated list of source fields to include in the response.If this parameter is specified, only these source fields are returned. You can exclude fields from this subset using the `_source_excludes` query parameter.If the `_source` parameter is `false`, this parameter is ignored.
	 *     stored_fields: string|array, // If `true`, retrieves the document fields stored in the index rather than the document `_source`.
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
	public function mget(string $index = null, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_mget';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_mget";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'force_synthetic_source',
			'preference',
			'realtime',
			'refresh',
			'routing',
			'_source',
			'_source_excludes',
			'_source_includes',
			'stored_fields',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Allows to execute several search operations in one request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-multi-search.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and index aliases to search.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If false, the request returns an error if any wildcard expression, index alias, or _all value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting foo*,bar* returns an error if an index starts with foo but no index starts with bar.
	 *     ccs_minimize_roundtrips: bool, // If true, network roundtrips between the coordinating node and remote clusters are minimized for cross-cluster search requests.
	 *     expand_wildcards: string|array, // Type of index that wildcard expressions can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.
	 *     ignore_throttled: bool, // If true, concrete, expanded or aliased indices are ignored when frozen.
	 *     ignore_unavailable: bool, // If true, missing or closed indices are not included in the response.
	 *     max_concurrent_searches: int, // Maximum number of concurrent searches the multi search API can execute.
	 *     max_concurrent_shard_requests: int, // Maximum number of concurrent shard requests that each sub-search request executes per node.
	 *     pre_filter_shard_size: int, // Defines a threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method i.e., if date filters are mandatory to match but the shard bounds and the query are disjoint.
	 *     rest_total_hits_as_int: bool, // If true, hits.total are returned as an integer in the response. Defaults to false, which returns an object.
	 *     routing: string, // Custom routing value used to route search operations to a specific shard.
	 *     search_type: string, // Indicates whether global term and document frequencies should be used when scoring returned documents.
	 *     typed_keys: bool, // Specifies whether aggregation and suggester names should be prefixed by their respective types in the response.
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
	public function msearch(
		string|array $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_msearch';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_msearch";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'ccs_minimize_roundtrips',
			'expand_wildcards',
			'ignore_throttled',
			'ignore_unavailable',
			'max_concurrent_searches',
			'max_concurrent_shard_requests',
			'pre_filter_shard_size',
			'rest_total_hits_as_int',
			'routing',
			'search_type',
			'typed_keys',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/x-ndjson'
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Allows to execute several search template operations in one request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-multi-search.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases to search.
	 * Supports wildcards (`*`).
	 * To search all data streams and indices, omit this parameter or use `*`.
	 * @param array|string $body The request body
	 * @param array{
	 *     ccs_minimize_roundtrips: bool, // If `true`, network round-trips are minimized for cross-cluster search requests.
	 *     max_concurrent_searches: int, // Maximum number of concurrent searches the API can run.
	 *     search_type: string, // The type of the search operation.Available options: `query_then_fetch`, `dfs_query_then_fetch`.
	 *     rest_total_hits_as_int: bool, // If `true`, the response returns `hits.total` as an integer.If `false`, it returns `hits.total` as an object.
	 *     typed_keys: bool, // If `true`, the response prefixes aggregation and suggester names with their respective types.
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
	public function msearchTemplate(
		string|array $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_msearch/template';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_msearch/template";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'ccs_minimize_roundtrips',
			'max_concurrent_searches',
			'search_type',
			'rest_total_hits_as_int',
			'typed_keys',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/x-ndjson'
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Returns multiple termvectors in one request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-multi-termvectors.html
	 *
	 * @param string $index Name of the index that contains the documents.
	 * @param array|string $body The request body
	 * @param array{
	 *     ids: array, // A comma-separated list of documents ids. You must define ids as parameter or set "ids" or "docs" in the request body
	 *     fields: string|array, // Comma-separated list or wildcard expressions of fields to include in the statistics.Used as the default list unless a specific field list is provided in the `completion_fields` or `fielddata_fields` parameters.
	 *     field_statistics: bool, // If `true`, the response includes the document count, sum of document frequencies, and sum of total term frequencies.
	 *     offsets: bool, // If `true`, the response includes term offsets.
	 *     payloads: bool, // If `true`, the response includes term payloads.
	 *     positions: bool, // If `true`, the response includes term positions.
	 *     preference: string, // Specifies the node or shard the operation should be performed on.Random by default.
	 *     realtime: bool, // If true, the request is real-time as opposed to near-real-time.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     term_statistics: bool, // If true, the response includes term frequency and document frequency.
	 *     version: int, // If `true`, returns the document version as part of a hit.
	 *     version_type: string, // Specific version type.
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
	public function mtermvectors(
		string $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_mtermvectors';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_mtermvectors";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'ids',
			'fields',
			'field_statistics',
			'offsets',
			'payloads',
			'positions',
			'preference',
			'realtime',
			'routing',
			'term_statistics',
			'version',
			'version_type',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Open a point in time that can be used in subsequent searches
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/point-in-time-api.html
	 *
	 * @param string|array $index A comma-separated list of index names to open point in time; use `_all` or empty string to perform the operation on all indices
	 * @param array{
	 *     keep_alive: string|integer, // (REQUIRED) Extends the time to live of the corresponding point in time.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     preference: string, // Specifies the node or shard the operation should be performed on.Random by default.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`. Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
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
	public function openPointInTime(string|array $index, array $params): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$this->checkRequiredParameters(['keep_alive'], $params);
		$url = '/' . $this->encode($index) . '/_pit';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'keep_alive',
			'ignore_unavailable',
			'preference',
			'routing',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns whether the cluster is running.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html
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
	public function ping(array $params = []): Elasticsearch|Promise
	{
		$url = "/";
		$method = 'HEAD';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Creates or updates a script.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
	 *
	 * @param string $id Identifier for the stored script or search template.
	 * Must be unique within the cluster.
	 * @param string $context Context in which the script or search template should run.
	 * To prevent errors, the API immediately compiles the script or template in this context.
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
	public function putScript(
		string $id,
		string $context = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($context)) {
			$url = '/_scripts/' . $this->encode($id) . '/' . $this->encode($context);
			$method = 'PUT';
		} else {
			$url = '/_scripts/' . $this->encode($id);
			$method = 'PUT';
		}
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Allows to evaluate the quality of ranked search results over a set of typical search queries
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-rank-eval.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and index aliases used to limit the request. Wildcard (`*`) expressions are supported.
	 * To target all data streams and indices in a cluster, omit this parameter or use `_all` or `*`.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`.
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     ignore_unavailable: bool, // If `true`, missing or closed indices are not included in the response.
	 *     search_type: string, // Search operation type
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
	public function rankEval(
		string|array $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_rank_eval';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_rank_eval";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'ignore_unavailable',
			'search_type',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Allows to copy documents from one index to another, optionally filtering the source
	 * documents by a query, changing the destination index settings, or fetching the
	 * documents from a remote cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-reindex.html
	 *
	 * @param array|string $body The request body
	 * @param array{
	 *     refresh: bool, // If `true`, the request refreshes affected shards to make this operation visible to search.
	 *     requests_per_second: float, // The throttle for this request in sub-requests per second.Defaults to no throttle.
	 *     scroll: string|integer, // Specifies how long a consistent view of the index should be maintained for scrolled search.
	 *     slices: int|string, // The number of slices this task should be divided into.Defaults to 1 slice, meaning the task isn’t sliced into subtasks.
	 *     timeout: string|integer, // Period each indexing waits for automatic index creation, dynamic mapping updates, and waiting for active shards.
	 *     wait_for_active_shards: int|string, // The number of shard copies that must be active before proceeding with the operation.Set to `all` or any positive integer up to the total number of shards in the index (`number_of_replicas+1`).
	 *     wait_for_completion: bool, // If `true`, the request blocks until the operation is complete.
	 *     require_alias: bool, // If `true`, the destination must be an index alias.
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
	public function reindex(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_reindex";
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'refresh',
			'requests_per_second',
			'scroll',
			'slices',
			'timeout',
			'wait_for_active_shards',
			'wait_for_completion',
			'require_alias',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Allows to use the Mustache language to pre-render a search definition.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/render-search-template-api.html
	 *
	 * @param string $id ID of the search template to render.
	 * If no `source` is specified, this or the `id` request body parameter is required.
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
	public function renderSearchTemplate(
		string $id = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($id)) {
			$url = '/_render/template/' . $this->encode($id);
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_render/template";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Allows an arbitrary script to be executed and a result to be returned
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/painless/master/painless-execute-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
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
	public function scriptsPainlessExecute(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_scripts/painless/_execute";
		$method = empty($body) ? 'GET' : 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Allows to retrieve a large numbers of results from a single search request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-request-body.html#request-body-search-scroll
	 *
	 * @param string $scroll_id The scroll ID
	 * @param array|string $body The request body
	 * @param array{
	 *     scroll: string|integer, // Period to retain the search context for scrolling.
	 *     scroll_id: string, // The scroll ID for scrolled search
	 *     rest_total_hits_as_int: bool, // If true, the API response’s hit.total property is returned as an integer. If false, the API response’s hit.total property is returned as an object.
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
	public function scroll(string $scroll_id = null, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		if (isset($scroll_id)) {
			$url = '/_search/scroll/' . $this->encode($scroll_id);
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_search/scroll";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'scroll',
			'scroll_id',
			'rest_total_hits_as_int',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Returns results matching a query.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-search.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases to search.
	 * Supports wildcards (`*`).
	 * To search all data streams and indices, omit this parameter or use `*` or `_all`.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`.
	 *     allow_partial_search_results: bool, // If true, returns partial results if there are shard request timeouts or shard failures. If false, returns an error with no partial results.
	 *     analyzer: string, // Analyzer to use for the query string.This parameter can only be used when the q query string parameter is specified.
	 *     analyze_wildcard: bool, // If true, wildcard and prefix queries are analyzed.This parameter can only be used when the q query string parameter is specified.
	 *     batched_reduce_size: int, // The number of shard results that should be reduced at once on the coordinating node.This value should be used as a protection mechanism to reduce the memory overhead per search request if the potential number of shards in the request can be large.
	 *     ccs_minimize_roundtrips: bool, // If true, network round-trips between the coordinating node and the remote clusters are minimized when executing cross-cluster search (CCS) requests.
	 *     default_operator: string, // The default operator for query string query: AND or OR.This parameter can only be used when the `q` query string parameter is specified.
	 *     df: string, // Field to use as default where no field prefix is given in the query string.This parameter can only be used when the q query string parameter is specified.
	 *     docvalue_fields: string|array, // A comma-separated list of fields to return as the docvalue representation for each hit.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.
	 *     explain: bool, // If `true`, returns detailed information about score computation as part of a hit.
	 *     ignore_throttled: bool, // If `true`, concrete, expanded or aliased indices will be ignored when frozen.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     lenient: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored.This parameter can only be used when the `q` query string parameter is specified.
	 *     max_concurrent_shard_requests: int, // Defines the number of concurrent shard requests per node this search executes concurrently.This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests.
	 *     min_compatible_shard_node: string, // The minimum version of the node that can handle the requestAny handling node with a lower version will fail the request.
	 *     preference: string, // Nodes and shards used for the search.By default, Elasticsearch selects from eligible nodes and shards using adaptive replica selection, accounting for allocation awareness. Valid values are:`_only_local` to run the search only on shards on the local node;`_local` to, if possible, run the search on shards on the local node, or if not, select shards using the default method;`_only_nodes:<node-id>,<node-id>` to run the search on only the specified nodes IDs, where, if suitable shards exist on more than one selected node, use shards on those nodes using the default method, or if none of the specified nodes are available, select shards from any available node using the default method;`_prefer_nodes:<node-id>,<node-id>` to if possible, run the search on the specified nodes IDs, or if not, select shards using the default method;`_shards:<shard>,<shard>` to run the search only on the specified shards;`<custom-string>` (any string that does not start with `_`) to route searches with the same `<custom-string>` to the same shards in the same order.
	 *     pre_filter_shard_size: int, // Defines a threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold.This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method (if date filters are mandatory to match but the shard bounds and the query are disjoint).When unspecified, the pre-filter phase is executed if any of these conditions is met:the request targets more than 128 shards;the request targets one or more read-only index;the primary sort of the query targets an indexed field.
	 *     request_cache: bool, // If `true`, the caching of search results is enabled for requests where `size` is `0`.Defaults to index level settings.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     scroll: string|integer, // Period to retain the search context for scrolling. See Scroll search results.By default, this value cannot exceed `1d` (24 hours).You can change this limit using the `search.max_keep_alive` cluster-level setting.
	 *     search_type: string, // How distributed term frequencies are calculated for relevance scoring.
	 *     stats: array, // Specific `tag` of the request for logging and statistical purposes.
	 *     stored_fields: string|array, // A comma-separated list of stored fields to return as part of a hit.If no fields are specified, no stored fields are included in the response.If this field is specified, the `_source` parameter defaults to `false`.You can pass `_source: true` to return both source fields and stored fields in the search response.
	 *     suggest_field: string, // Specifies which field to use for suggestions.
	 *     suggest_mode: string, // Specifies the suggest mode.This parameter can only be used when the `suggest_field` and `suggest_text` query string parameters are specified.
	 *     suggest_size: int, // Number of suggestions to return.This parameter can only be used when the `suggest_field` and `suggest_text` query string parameters are specified.
	 *     suggest_text: string, // The source text for which the suggestions should be returned.This parameter can only be used when the `suggest_field` and `suggest_text` query string parameters are specified.
	 *     terminate_after: int, // Maximum number of documents to collect for each shard.If a query reaches this limit, Elasticsearch terminates the query early.Elasticsearch collects documents before sorting.Use with caution.Elasticsearch applies this parameter to each shard handling the request.When possible, let Elasticsearch perform early termination automatically.Avoid specifying this parameter for requests that target data streams with backing indices across multiple data tiers.If set to `0` (default), the query does not terminate early.
	 *     timeout: string|integer, // Specifies the period of time to wait for a response from each shard.If no response is received before the timeout expires, the request fails and returns an error.
	 *     track_total_hits: bool|int, // Number of hits matching the query to count accurately.If `true`, the exact number of hits is returned at the cost of some performance.If `false`, the response does not include the total number of hits matching the query.
	 *     track_scores: bool, // If `true`, calculate and return document scores, even if the scores are not used for sorting.
	 *     typed_keys: bool, // If `true`, aggregation and suggester names are be prefixed by their respective types in the response.
	 *     rest_total_hits_as_int: bool, // Indicates whether `hits.total` should be rendered as an integer or an object in the rest search response.
	 *     version: bool, // If `true`, returns document version as part of a hit.
	 *     _source: bool|string, // Indicates which source fields are returned for matching documents.These fields are returned in the `hits._source` property of the search response.Valid values are:`true` to return the entire document source;`false` to not return the document source;`<string>` to return the source fields that are specified as a comma-separated list (supports wildcard (`*`) patterns).
	 *     _source_excludes: string|array, // A comma-separated list of source fields to exclude from the response.You can also use this parameter to exclude fields from the subset specified in `_source_includes` query parameter.If the `_source` parameter is `false`, this parameter is ignored.
	 *     _source_includes: string|array, // A comma-separated list of source fields to include in the response.If this parameter is specified, only these source fields are returned.You can exclude fields from this subset using the `_source_excludes` query parameter.If the `_source` parameter is `false`, this parameter is ignored.
	 *     seq_no_primary_term: bool, // If `true`, returns sequence number and primary term of the last modification of each hit.
	 *     q: string, // Query in the Lucene query string syntax using query parameter search.Query parameter searches do not support the full Elasticsearch Query DSL but are handy for testing.
	 *     size: int, // Defines the number of hits to return.By default, you cannot page through more than 10,000 hits using the `from` and `size` parameters.To page through more hits, use the `search_after` parameter.
	 *     from: int, // Starting document offset.Needs to be non-negative.By default, you cannot page through more than 10,000 hits using the `from` and `size` parameters.To page through more hits, use the `search_after` parameter.
	 *     sort: string|array, // A comma-separated list of <field>:<direction> pairs.
	 *     force_synthetic_source: bool, // Should this request force synthetic _source?Use this to test if the mapping supports synthetic _source and to get a sense of the worst case performance.Fetches with this enabled will be slower the enabling synthetic source natively in the index.
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
	public function search(
		string|array $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_search';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_search";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'allow_partial_search_results',
			'analyzer',
			'analyze_wildcard',
			'batched_reduce_size',
			'ccs_minimize_roundtrips',
			'default_operator',
			'df',
			'docvalue_fields',
			'expand_wildcards',
			'explain',
			'ignore_throttled',
			'ignore_unavailable',
			'lenient',
			'max_concurrent_shard_requests',
			'min_compatible_shard_node',
			'preference',
			'pre_filter_shard_size',
			'request_cache',
			'routing',
			'scroll',
			'search_type',
			'stats',
			'stored_fields',
			'suggest_field',
			'suggest_mode',
			'suggest_size',
			'suggest_text',
			'terminate_after',
			'timeout',
			'track_total_hits',
			'track_scores',
			'typed_keys',
			'rest_total_hits_as_int',
			'version',
			'_source',
			'_source_excludes',
			'_source_includes',
			'seq_no_primary_term',
			'q',
			'size',
			'from',
			'sort',
			'force_synthetic_source',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Searches a vector tile for geospatial values. Returns results as a binary Mapbox vector tile.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-vector-tile-api.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, or aliases to search
	 * @param string $field Field containing geospatial data to return
	 * @param int $zoom Zoom level for the vector tile to search
	 * @param int $x X coordinate for the vector tile to search
	 * @param int $y Y coordinate for the vector tile to search
	 * @param array|string $body The request body
	 * @param array{
	 *     exact_bounds: bool, // If false, the meta layer’s feature is the bounding box of the tile.If true, the meta layer’s feature is a bounding box resulting from ageo_bounds aggregation. The aggregation runs on <field> values that intersectthe <zoom>/<x>/<y> tile with wrap_longitude set to false. The resultingbounding box may be larger than the vector tile.
	 *     extent: int, // Size, in pixels, of a side of the tile. Vector tiles are square with equal sides.
	 *     grid_agg: string, // Aggregation used to create a grid for `field`.
	 *     grid_precision: int, // Additional zoom levels available through the aggs layer. For example, if <zoom> is 7and grid_precision is 8, you can zoom in up to level 15. Accepts 0-8. If 0, resultsdon’t include the aggs layer.
	 *     grid_type: string, // Determines the geometry type for features in the aggs layer. In the aggs layer,each feature represents a geotile_grid cell. If 'grid' each feature is a Polygonof the cells bounding box. If 'point' each feature is a Point that is the centroidof the cell.
	 *     size: int, // Maximum number of features to return in the hits layer. Accepts 0-10000.If 0, results don’t include the hits layer.
	 *     with_labels: bool, // If `true`, the hits and aggs layers will contain additional point features representingsuggested label positions for the original features.
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
	public function searchMvt(
		string|array $index,
		string $field,
		int $zoom,
		int $x,
		int $y,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = '/' . $this->encode($index) . '/_mvt/' . $this->encode($field) . '/' . $this->encode($zoom) . '/' . $this->encode($x) . '/' . $this->encode($y);
		$method = empty($body) ? 'GET' : 'POST';
		$url = $this->addQueryString($url, $params, [
			'exact_bounds',
			'extent',
			'grid_agg',
			'grid_precision',
			'grid_type',
			'size',
			'with_labels',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'application/vnd.mapbox-vector-tile',
		    'Content-Type' => 'application/json'
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Allows to use the Mustache language to pre-render a search definition.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-template.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices,
	 * and aliases to search. Supports wildcards (*).
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`.
	 *     ccs_minimize_roundtrips: bool, // If `true`, network round-trips are minimized for cross-cluster search requests.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     explain: bool, // If `true`, the response includes additional details about score computation as part of a hit.
	 *     ignore_throttled: bool, // If `true`, specified concrete, expanded, or aliased indices are not included in the response when throttled.
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     preference: string, // Specifies the node or shard the operation should be performed on.Random by default.
	 *     profile: bool, // If `true`, the query execution is profiled.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     scroll: string|integer, // Specifies how long a consistent view of the indexshould be maintained for scrolled search.
	 *     search_type: string, // The type of the search operation.
	 *     rest_total_hits_as_int: bool, // If true, hits.total are rendered as an integer in the response.
	 *     typed_keys: bool, // If `true`, the response prefixes aggregation and suggester names with their respective types.
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
	public function searchTemplate(
		string|array $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_search/template';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_search/template";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'ccs_minimize_roundtrips',
			'expand_wildcards',
			'explain',
			'ignore_throttled',
			'ignore_unavailable',
			'preference',
			'profile',
			'routing',
			'scroll',
			'search_type',
			'rest_total_hits_as_int',
			'typed_keys',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * The terms enum API  can be used to discover terms in the index that begin with the provided string. It is designed for low-latency look-ups used in auto-complete scenarios.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-terms-enum.html
	 *
	 * @param string $index Comma-separated list of data streams, indices, and index aliases to search. Wildcard (*) expressions are supported.
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
	public function termsEnum(string $index, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/' . $this->encode($index) . '/_terms_enum';
		$method = empty($body) ? 'GET' : 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Returns information and statistics about terms in the fields of a particular document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-termvectors.html
	 *
	 * @param string $index Name of the index that contains the document.
	 * @param string $id Unique identifier of the document.
	 * @param array|string $body The request body
	 * @param array{
	 *     fields: string|array, // Comma-separated list or wildcard expressions of fields to include in the statistics.Used as the default list unless a specific field list is provided in the `completion_fields` or `fielddata_fields` parameters.
	 *     field_statistics: bool, // If `true`, the response includes the document count, sum of document frequencies, and sum of total term frequencies.
	 *     offsets: bool, // If `true`, the response includes term offsets.
	 *     payloads: bool, // If `true`, the response includes term payloads.
	 *     positions: bool, // If `true`, the response includes term positions.
	 *     preference: string, // Specifies the node or shard the operation should be performed on.Random by default.
	 *     realtime: bool, // If true, the request is real-time as opposed to near-real-time.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     term_statistics: bool, // If `true`, the response includes term frequency and document frequency.
	 *     version: int, // If `true`, returns the document version as part of a hit.
	 *     version_type: string, // Specific version type.
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
	public function termvectors(
		string $index,
		string $id = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($id)) {
			$url = '/' . $this->encode($index) . '/_termvectors/' . $this->encode($id);
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = '/' . $this->encode($index) . '/_termvectors';
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'fields',
			'field_statistics',
			'offsets',
			'payloads',
			'positions',
			'preference',
			'realtime',
			'routing',
			'term_statistics',
			'version',
			'version_type',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates a document with a script or partial document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-update.html
	 *
	 * @param string $id Document ID
	 * @param string $index The name of the index
	 * @param array|string $body The request body
	 * @param array{
	 *     if_primary_term: int, // Only perform the operation if the document has this primary term.
	 *     if_seq_no: int, // Only perform the operation if the document has this sequence number.
	 *     lang: string, // The script language.
	 *     refresh: string, // If 'true', Elasticsearch refreshes the affected shards to make this operationvisible to search, if 'wait_for' then wait for a refresh to make this operationvisible to search, if 'false' do nothing with refreshes.
	 *     require_alias: bool, // If true, the destination must be an index alias.
	 *     retry_on_conflict: int, // Specify how many times should the operation be retried when a conflict occurs.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     timeout: string|integer, // Period to wait for dynamic mapping updates and active shards.This guarantees Elasticsearch waits for at least the timeout before failing.The actual wait time could be longer, particularly when multiple waits occur.
	 *     wait_for_active_shards: int|string, // The number of shard copies that must be active before proceeding with the operations.Set to 'all' or any positive integer up to the total number of shards in the index(number_of_replicas+1). Defaults to 1 meaning the primary shard.
	 *     _source: bool|string, // Set to false to disable source retrieval. You can also specify a comma-separatedlist of the fields you want to retrieve.
	 *     _source_excludes: string|array, // Specify the source fields you want to exclude.
	 *     _source_includes: string|array, // Specify the source fields you want to retrieve.
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
	public function update(string $id, string $index, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/' . $this->encode($index) . '/_update/' . $this->encode($id);
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'if_primary_term',
			'if_seq_no',
			'lang',
			'refresh',
			'require_alias',
			'retry_on_conflict',
			'routing',
			'timeout',
			'wait_for_active_shards',
			'_source',
			'_source_excludes',
			'_source_includes',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates documents that match the specified query. If no query is specified,
	 *  performs an update on every document in the index without changing the source,
	 * for example to pick up a mapping change.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-update-by-query.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases to search.
	 * Supports wildcards (`*`).
	 * To search all data streams or indices, omit this parameter or use `*` or `_all`.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices.This behavior applies even if the request targets other open indices.For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`.
	 *     analyzer: string, // Analyzer to use for the query string.
	 *     analyze_wildcard: bool, // If `true`, wildcard and prefix queries are analyzed.
	 *     conflicts: string, // What to do if update by query hits version conflicts: `abort` or `proceed`.
	 *     default_operator: string, // The default operator for query string query: `AND` or `OR`.
	 *     df: string, // Field to use as default where no field prefix is given in the query string.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match.If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams.Supports comma-separated values, such as `open,hidden`.Valid values are: `all`, `open`, `closed`, `hidden`, `none`.
	 *     from: int, // Starting offset (default: 0)
	 *     ignore_unavailable: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     lenient: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored.
	 *     max_docs: int, // Maximum number of documents to process.Defaults to all documents.
	 *     pipeline: string, // ID of the pipeline to use to preprocess incoming documents.If the index has a default ingest pipeline specified, then setting the value to `_none` disables the default ingest pipeline for this request.If a final pipeline is configured it will always run, regardless of the value of this parameter.
	 *     preference: string, // Specifies the node or shard the operation should be performed on.Random by default.
	 *     refresh: bool, // If `true`, Elasticsearch refreshes affected shards to make the operation visible to search.
	 *     request_cache: bool, // If `true`, the request cache is used for this request.
	 *     requests_per_second: float, // The throttle for this request in sub-requests per second.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     scroll: string|integer, // Period to retain the search context for scrolling.
	 *     scroll_size: int, // Size of the scroll request that powers the operation.
	 *     search_timeout: string|integer, // Explicit timeout for each search request.
	 *     search_type: string, // The type of the search operation. Available options: `query_then_fetch`, `dfs_query_then_fetch`.
	 *     slices: int|string, // The number of slices this task should be divided into.
	 *     sort: array, // A comma-separated list of <field>:<direction> pairs.
	 *     stats: array, // Specific `tag` of the request for logging and statistical purposes.
	 *     terminate_after: int, // Maximum number of documents to collect for each shard.If a query reaches this limit, Elasticsearch terminates the query early.Elasticsearch collects documents before sorting.Use with caution.Elasticsearch applies this parameter to each shard handling the request.When possible, let Elasticsearch perform early termination automatically.Avoid specifying this parameter for requests that target data streams with backing indices across multiple data tiers.
	 *     timeout: string|integer, // Period each update request waits for the following operations: dynamic mapping updates, waiting for active shards.
	 *     version: bool, // If `true`, returns the document version as part of a hit.
	 *     version_type: bool, // Should the document increment the version number (internal) on hit or not (reindex)
	 *     wait_for_active_shards: int|string, // The number of shard copies that must be active before proceeding with the operation.Set to `all` or any positive integer up to the total number of shards in the index (`number_of_replicas+1`).
	 *     wait_for_completion: bool, // If `true`, the request blocks until the operation is complete.
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
	public function updateByQuery(
		string|array $index,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		$url = '/' . $this->encode($index) . '/_update_by_query';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'analyzer',
			'analyze_wildcard',
			'conflicts',
			'default_operator',
			'df',
			'expand_wildcards',
			'from',
			'ignore_unavailable',
			'lenient',
			'max_docs',
			'pipeline',
			'preference',
			'refresh',
			'request_cache',
			'requests_per_second',
			'routing',
			'scroll',
			'scroll_size',
			'search_timeout',
			'search_type',
			'slices',
			'sort',
			'stats',
			'terminate_after',
			'timeout',
			'version',
			'version_type',
			'wait_for_active_shards',
			'wait_for_completion',
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
		return $this->sendRequest($this->createRequest($method, $url, $headers, $body));
	}
}
