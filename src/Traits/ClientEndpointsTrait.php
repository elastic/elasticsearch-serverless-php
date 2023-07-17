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
	 * @param string $index Default index for items which don't provide one
	 * @param array|string $body The request body
	 * @param array{
	 *     pipeline: string, // The pipeline id to preprocess incoming documents with
	 *     refresh: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes.
	 *     routing: string, // Specific routing value
	 *     _source: bool|string, // True or false to return the _source field or not, or default list of fields to return, can be overridden on each sub-request
	 *     _source_excludes: string|array, // Default list of fields to exclude from the returned _source field, can be overridden on each sub-request
	 *     _source_includes: string|array, // Default list of fields to extract and return from the _source field, can be overridden on each sub-request
	 *     timeout: string|integer, // Explicit operation timeout
	 *     wait_for_active_shards: integer|string, // Sets the number of shard copies that must be active before proceeding with the bulk operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     require_alias: bool, // Sets require_alias for all incoming documents. Defaults to unset (false)
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
			$url = $this->encode("/{$index}/_bulk");
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
	 * @param string|array $scroll_id A comma-separated list of scroll IDs to clear
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
			$url = $this->encode("/_search/scroll/{$scroll_id}");
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
	 * @param string|array $index A comma-separated list of indices to restrict the results
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     analyzer: string, // The analyzer to use for the query string
	 *     analyze_wildcard: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     default_operator: string, // The default operator for query string query (AND or OR)
	 *     df: string, // The field to use as default where no field prefix is given in the query string
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     ignore_throttled: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     lenient: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     min_score: float, // Include only documents with a specific `_score` value in the result
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     routing: string, // A comma-separated list of specific routing values
	 *     terminate_after: integer, // The maximum count for each shard, upon reaching which the query execution will terminate early
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
	public function count(string|array $index = null, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = $this->encode("/{$index}/_count");
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
	 * @param string $id Document ID
	 * @param string $index The name of the index
	 * @param array|string $body The request body
	 * @param array{
	 *     pipeline: string, // The pipeline id to preprocess incoming documents with
	 *     refresh: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes.
	 *     routing: string, // Specific routing value
	 *     timeout: string|integer, // Explicit operation timeout
	 *     version: integer, // Explicit version number for concurrency control
	 *     version_type: string, // Specific version type
	 *     wait_for_active_shards: integer|string, // Sets the number of shard copies that must be active before proceeding with the index operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
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
		$url = $this->encode("/{$index}/_create/{$id}");
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
	 * @param string $id The document ID
	 * @param string $index The name of the index
	 * @param array{
	 *     if_primary_term: integer, // only perform the delete operation if the last operation that has changed the document has the specified primary term
	 *     if_seq_no: integer, // only perform the delete operation if the last operation that has changed the document has the specified sequence number
	 *     refresh: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes.
	 *     routing: string, // Specific routing value
	 *     timeout: string|integer, // Explicit operation timeout
	 *     version: integer, // Explicit version number for concurrency control
	 *     version_type: string, // Specific version type
	 *     wait_for_active_shards: integer|string, // Sets the number of shard copies that must be active before proceeding with the delete operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
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
		$url = $this->encode("/{$index}/_doc/{$id}");
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
	 * @param string|array $index A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     analyzer: string, // The analyzer to use for the query string
	 *     analyze_wildcard: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     conflicts: string, // What to do when the delete by query hits version conflicts?
	 *     default_operator: string, // The default operator for query string query (AND or OR)
	 *     df: string, // The field to use as default where no field prefix is given in the query string
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     from: integer, // Starting offset (default: 0)
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     lenient: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     max_docs: integer, // Maximum number of documents to process (default: all documents)
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     refresh: bool, // Should the affected indexes be refreshed?
	 *     request_cache: bool, // Specify if request cache should be used for this request or not, defaults to index level setting
	 *     requests_per_second: float, // The throttle for this request in sub-requests per second. -1 means no throttle.
	 *     routing: string, // A comma-separated list of specific routing values
	 *     q: string, // Query in the Lucene query string syntax
	 *     scroll: string|integer, // Specify how long a consistent view of the index should be maintained for scrolled search
	 *     scroll_size: integer, // Size on the scroll request powering the delete by query
	 *     search_timeout: string|integer, // Explicit timeout for each search request. Defaults to no timeout.
	 *     search_type: string, // Search operation type
	 *     slices: integer|string, // The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`.
	 *     sort: array, // A comma-separated list of <field>:<direction> pairs
	 *     stats: array, // Specific 'tag' of the request for logging and statistical purposes
	 *     terminate_after: integer, // The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
	 *     timeout: string|integer, // Time each individual bulk request should wait for shards that are unavailable.
	 *     version: bool, // Specify whether to return document version as part of a hit
	 *     wait_for_active_shards: integer|string, // Sets the number of shard copies that must be active before proceeding with the delete by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     wait_for_completion: bool, // Should the request should block until the delete by query is complete.
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
		$url = $this->encode("/{$index}/_delete_by_query");
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
	 * @param string $id Script ID
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
	public function deleteScript(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = $this->encode("/_scripts/{$id}");
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
	 * @param string $id The document ID
	 * @param string $index The name of the index
	 * @param array{
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     realtime: bool, // Specify whether to perform the operation in realtime or search mode
	 *     refresh: bool, // Refresh the shard containing the document before performing the operation
	 *     routing: string, // Specific routing value
	 *     _source: bool|string, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes: string|array, // A list of fields to exclude from the returned _source field
	 *     _source_includes: string|array, // A list of fields to extract and return from the _source field
	 *     stored_fields: string|array, // A comma-separated list of stored fields to return in the response
	 *     version: integer, // Explicit version number for concurrency control
	 *     version_type: string, // Specific version type
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
		$url = $this->encode("/{$index}/_doc/{$id}");
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
	 * @param string $id The document ID
	 * @param string $index The name of the index
	 * @param array{
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     realtime: bool, // Specify whether to perform the operation in realtime or search mode
	 *     refresh: bool, // Refresh the shard containing the document before performing the operation
	 *     routing: string, // Specific routing value
	 *     _source: bool|string, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes: string|array, // A list of fields to exclude from the returned _source field
	 *     _source_includes: string|array, // A list of fields to extract and return from the _source field
	 *     version: integer, // Explicit version number for concurrency control
	 *     version_type: string, // Specific version type
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
		$url = $this->encode("/{$index}/_source/{$id}");
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
			$url = $this->encode("/{$index}/_field_caps");
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
	 *     preference: string, // Specifies the node or shard the operation should be performed on. Random by default.
	 *     realtime: bool, // Boolean) If true, the request is real-time as opposed to near-real-time.
	 *     refresh: bool, // If true, Elasticsearch refreshes the affected shards to make this operation visible to search. If false, do nothing with refreshes.
	 *     routing: string, // Target the specified primary shard.
	 *     _source: bool|string, // True or false to return the _source field or not, or a list of fields to return.
	 *     _source_excludes: string|array, // A comma-separated list of source fields to exclude in the response.
	 *     _source_includes: string|array, // A comma-separated list of source fields to include in the response.
	 *     stored_fields: string|array, // A comma-separated list of stored fields to return in the response
	 *     version: integer, // Explicit version number for concurrency control. The specified version must match the current version of the document for the request to succeed.
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
		$url = $this->encode("/{$index}/_doc/{$id}");
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
	 * Returns a script.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
	 *
	 * @param string $id Script ID
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
		$url = $this->encode("/_scripts/{$id}");
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
	 *     version: integer, // Explicit version number for concurrency control. The specified version must match the current version of the document for the request to succeed.
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
		$url = $this->encode("/{$index}/_source/{$id}");
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
	 * @param string $id Document ID
	 * @param string $index The name of the index
	 * @param array|string $body The request body
	 * @param array{
	 *     if_primary_term: integer, // only perform the index operation if the last operation that has changed the document has the specified primary term
	 *     if_seq_no: integer, // only perform the index operation if the last operation that has changed the document has the specified sequence number
	 *     op_type: string, // Explicit operation type. Defaults to `index` for requests with an explicit document ID, and to `create`for requests without an explicit document ID
	 *     pipeline: string, // The pipeline id to preprocess incoming documents with
	 *     refresh: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes.
	 *     routing: string, // Specific routing value
	 *     timeout: string|integer, // Explicit operation timeout
	 *     version: integer, // Explicit version number for concurrency control
	 *     version_type: string, // Specific version type
	 *     wait_for_active_shards: integer|string, // Sets the number of shard copies that must be active before proceeding with the index operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     require_alias: bool, // When true, requires destination to be an alias. Default is false
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
		string $id = null,
		string $index,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($id)) {
			$url = $this->encode("/{$index}/_doc/{$id}");
			$method = 'PUT';
		} else {
			$url = $this->encode("/{$index}/_doc");
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
			$url = $this->encode("/{$index}/_mget");
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_mget";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, [
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
	 *     max_concurrent_searches: integer, // Maximum number of concurrent searches the multi search API can execute.
	 *     max_concurrent_shard_requests: integer, // Maximum number of concurrent shard requests that each sub-search request executes per node.
	 *     pre_filter_shard_size: integer, // Defines a threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method i.e., if date filters are mandatory to match but the shard bounds and the query are disjoint.
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
			$url = $this->encode("/{$index}/_msearch");
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
	 * @param string|array $index A comma-separated list of index names to use as default
	 * @param array|string $body The request body
	 * @param array{
	 *     ccs_minimize_roundtrips: bool, // Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution
	 *     max_concurrent_searches: integer, // Controls the maximum number of concurrent searches the multi search api will execute
	 *     search_type: string, // Search operation type
	 *     rest_total_hits_as_int: bool, // Indicates whether hits.total should be rendered as an integer or an object in the rest search response
	 *     typed_keys: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
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
			$url = $this->encode("/{$index}/_msearch/template");
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
	 * @param string $index The index in which the document resides.
	 * @param array|string $body The request body
	 * @param array{
	 *     ids: array, // A comma-separated list of documents ids. You must define ids as parameter or set "ids" or "docs" in the request body
	 *     fields: string|array, // A comma-separated list of fields to return. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     field_statistics: bool, // Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     offsets: bool, // Specifies if term offsets should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     payloads: bool, // Specifies if term payloads should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     positions: bool, // Specifies if term positions should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random) .Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     realtime: bool, // Specifies if requests are real-time as opposed to near-real-time (default: true).
	 *     routing: string, // Specific routing value. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     term_statistics: bool, // Specifies if total term frequency and document frequency should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     version: integer, // Explicit version number for concurrency control
	 *     version_type: string, // Specific version type
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
			$url = $this->encode("/{$index}/_mtermvectors");
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
	 *     keep_alive: string|integer, // (REQUIRED) Specific the time to live for the point in time
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     routing: string, // Specific routing value
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
		$url = $this->encode("/{$index}/_pit");
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
	 * @param string $id Script ID
	 * @param string $context Script context
	 * @param array|string $body The request body
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
	public function putScript(
		string $id,
		string $context = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($context)) {
			$url = $this->encode("/_scripts/{$id}/{$context}");
			$method = 'PUT';
		} else {
			$url = $this->encode("/_scripts/{$id}");
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
			$url = $this->encode("/{$index}/_rank_eval");
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
	 * Allows to use the Mustache language to pre-render a search definition.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/render-search-template-api.html
	 *
	 * @param string $id The id of the stored search template
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
			$url = $this->encode("/_render/template/{$id}");
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
			$url = $this->encode("/_search/scroll/{$scroll_id}");
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
	 * @param string|array $index A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     allow_partial_search_results: bool, // Indicate if an error should be returned if there is a partial search failure or timeout
	 *     analyzer: string, // The analyzer to use for the query string
	 *     analyze_wildcard: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     batched_reduce_size: integer, // The number of shard results that should be reduced at once on the coordinating node. This value should be used as a protection mechanism to reduce the memory overhead per search request if the potential number of shards in the request can be large.
	 *     ccs_minimize_roundtrips: bool, // Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution
	 *     default_operator: string, // The default operator for query string query (AND or OR)
	 *     df: string, // The field to use as default where no field prefix is given in the query string
	 *     docvalue_fields: string|array, // A comma-separated list of fields to return as the docvalue representation of a field for each hit
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     explain: bool, // Specify whether to return detailed information about score computation as part of a hit
	 *     ignore_throttled: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     lenient: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     max_concurrent_shard_requests: integer, // The number of concurrent shard requests per node this search executes concurrently. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests
	 *     min_compatible_shard_node: string, // The minimum compatible version that all shards involved in search should have for this request to be successful
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     pre_filter_shard_size: integer, // A threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method ie. if date filters are mandatory to match but the shard bounds and the query are disjoint.
	 *     request_cache: bool, // Specify if request cache should be used for this request or not, defaults to index level setting
	 *     routing: string, // A comma-separated list of specific routing values
	 *     scroll: string|integer, // Specify how long a consistent view of the index should be maintained for scrolled search
	 *     search_type: string, // Search operation type
	 *     stats: array, // Specific 'tag' of the request for logging and statistical purposes
	 *     stored_fields: string|array, // A comma-separated list of stored fields to return as part of a hit
	 *     suggest_field: string, // Specifies which field to use for suggestions.
	 *     suggest_mode: string, // Specify suggest mode
	 *     suggest_size: integer, // How many suggestions to return in response
	 *     suggest_text: string, // The source text for which the suggestions should be returned.
	 *     terminate_after: integer, // The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
	 *     timeout: string|integer, // Explicit operation timeout
	 *     track_total_hits: bool|integer, // Indicate if the number of documents that match the query should be tracked. A number can also be specified, to accurately track the total hit count up to the number.
	 *     track_scores: bool, // Whether to calculate and return scores even if they are not used for sorting
	 *     typed_keys: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
	 *     rest_total_hits_as_int: bool, // Indicates whether hits.total should be rendered as an integer or an object in the rest search response
	 *     version: bool, // Specify whether to return document version as part of a hit
	 *     _source: bool|string, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes: string|array, // A list of fields to exclude from the returned _source field
	 *     _source_includes: string|array, // A list of fields to extract and return from the _source field
	 *     seq_no_primary_term: bool, // Specify whether to return sequence number and primary term of the last modification of each hit
	 *     q: string, // Query in the Lucene query string syntax
	 *     size: integer, // Number of hits to return (default: 10)
	 *     from: integer, // Starting offset (default: 0)
	 *     sort: string|array, // A comma-separated list of <field>:<direction> pairs
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
			$url = $this->encode("/{$index}/_search");
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
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-template.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices,
	 * and aliases to search. Supports wildcards (*).
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     ccs_minimize_roundtrips: bool, // Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     explain: bool, // Specify whether to return detailed information about score computation as part of a hit
	 *     ignore_throttled: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     profile: bool, // Specify whether to profile the query execution
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     scroll: string|integer, // Specifies how long a consistent view of the indexshould be maintained for scrolled search.
	 *     search_type: string, // The type of the search operation.
	 *     rest_total_hits_as_int: bool, // If true, hits.total are rendered as an integer in the response.
	 *     typed_keys: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
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
			$url = $this->encode("/{$index}/_search/template");
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
		$url = $this->encode("/{$index}/_terms_enum");
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
	 * @param string $index The index in which the document resides.
	 * @param string $id The id of the document, when not specified a doc param should be supplied.
	 * @param array|string $body The request body
	 * @param array{
	 *     fields: string|array, // A comma-separated list of fields to return.
	 *     field_statistics: bool, // Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned.
	 *     offsets: bool, // Specifies if term offsets should be returned.
	 *     payloads: bool, // Specifies if term payloads should be returned.
	 *     positions: bool, // Specifies if term positions should be returned.
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random).
	 *     realtime: bool, // Specifies if request is real-time as opposed to near-real-time (default: true).
	 *     routing: string, // Specific routing value.
	 *     term_statistics: bool, // Specifies if total term frequency and document frequency should be returned.
	 *     version: integer, // Explicit version number for concurrency control
	 *     version_type: string, // Specific version type
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
			$url = $this->encode("/{$index}/_termvectors/{$id}");
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = $this->encode("/{$index}/_termvectors");
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
	 *     if_primary_term: integer, // Only perform the operation if the document has this primary term.
	 *     if_seq_no: integer, // Only perform the operation if the document has this sequence number.
	 *     lang: string, // The script language.
	 *     refresh: string, // If 'true', Elasticsearch refreshes the affected shards to make this operationvisible to search, if 'wait_for' then wait for a refresh to make this operationvisible to search, if 'false' do nothing with refreshes.
	 *     require_alias: bool, // If true, the destination must be an index alias.
	 *     retry_on_conflict: integer, // Specify how many times should the operation be retried when a conflict occurs.
	 *     routing: string, // Custom value used to route operations to a specific shard.
	 *     timeout: string|integer, // Period to wait for dynamic mapping updates and active shards.This guarantees Elasticsearch waits for at least the timeout before failing.The actual wait time could be longer, particularly when multiple waits occur.
	 *     wait_for_active_shards: integer|string, // The number of shard copies that must be active before proceeding with the operations.Set to 'all' or any positive integer up to the total number of shards in the index(number_of_replicas+1). Defaults to 1 meaning the primary shard.
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
		$url = $this->encode("/{$index}/_update/{$id}");
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
	 * Performs an update on every document in the index without changing the source,
	 * for example to pick up a mapping change.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-update-by-query.html
	 *
	 * @param string|array $index A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     analyzer: string, // The analyzer to use for the query string
	 *     analyze_wildcard: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     conflicts: string, // What to do when the update by query hits version conflicts?
	 *     default_operator: string, // The default operator for query string query (AND or OR)
	 *     df: string, // The field to use as default where no field prefix is given in the query string
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     from: integer, // Starting offset (default: 0)
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     lenient: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     max_docs: integer, // Maximum number of documents to process (default: all documents)
	 *     pipeline: string, // Ingest pipeline to set on index requests made by this action. (default: none)
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     refresh: bool, // Should the affected indexes be refreshed?
	 *     request_cache: bool, // Specify if request cache should be used for this request or not, defaults to index level setting
	 *     requests_per_second: float, // The throttle to set on this request in sub-requests per second. -1 means no throttle.
	 *     routing: string, // A comma-separated list of specific routing values
	 *     scroll: string|integer, // Specify how long a consistent view of the index should be maintained for scrolled search
	 *     scroll_size: integer, // Size on the scroll request powering the update by query
	 *     search_timeout: string|integer, // Explicit timeout for each search request. Defaults to no timeout.
	 *     search_type: string, // Search operation type
	 *     slices: integer|string, // The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`.
	 *     sort: array, // A comma-separated list of <field>:<direction> pairs
	 *     stats: array, // Specific 'tag' of the request for logging and statistical purposes
	 *     terminate_after: integer, // The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
	 *     timeout: string|integer, // Time each individual bulk request should wait for shards that are unavailable.
	 *     version: bool, // Specify whether to return document version as part of a hit
	 *     version_type: bool, // Should the document increment the version number (internal) on hit or not (reindex)
	 *     wait_for_active_shards: integer|string, // Sets the number of shard copies that must be active before proceeding with the update by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     wait_for_completion: bool, // Should the request should block until the update by query operation is complete.
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
		$url = $this->encode("/{$index}/_update_by_query");
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
