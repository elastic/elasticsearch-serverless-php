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
class AsyncSearch extends AbstractEndpoint
{
	/**
	 * Deletes an async search by identifier.
	 * If the search is still running, the search request will be cancelled.
	 * Otherwise, the saved search results are deleted.
	 * If the Elasticsearch security features are enabled, the deletion of a specific async search is restricted to: the authenticated user that submitted the original search request; users that have the `cancel_task` cluster privilege.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/async-search.html
	 *
	 * @param string $id A unique identifier for the async search.
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
		$url = '/_async_search/' . $this->encode($id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Retrieves the results of a previously submitted async search request given its identifier.
	 * If the Elasticsearch security features are enabled, access to the results of a specific async search is restricted to the user or API key that submitted it.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/async-search.html
	 *
	 * @param string $id A unique identifier for the async search.
	 * @param array{
	 *     keep_alive: string|integer, // Specifies how long the async search should be available in the cluster.When not specified, the `keep_alive` set with the corresponding submit async request will be used.Otherwise, it is possible to override the value and extend the validity of the request.When this period expires, the search, if still running, is cancelled.If the search is completed, its saved results are deleted.
	 *     typed_keys: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
	 *     wait_for_completion_timeout: string|integer, // Specifies to wait for the search to be completed up until the provided timeout.Final results will be returned if available before the timeout expires, otherwise the currently available results will be returned once the timeout expires.By default no timeout is set meaning that the currently available results will be returned without any additional wait.
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
		$url = '/_async_search/' . $this->encode($id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'keep_alive',
			'typed_keys',
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
	 * Get async search status
	 * Retrieves the status of a previously submitted async search request given its identifier, without retrieving search results.
	 * If the Elasticsearch security features are enabled, use of this API is restricted to the `monitoring_user` role.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/async-search.html
	 *
	 * @param string $id A unique identifier for the async search.
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
	public function status(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_async_search/status/' . $this->encode($id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Runs a search request asynchronously.
	 * When the primary sort of the results is an indexed field, shards get sorted based on minimum and maximum value that they hold for that field, hence partial results become available following the sort criteria that was requested.
	 * Warning: Async search does not support scroll nor search requests that only include the suggest section.
	 * By default, Elasticsearch doesn’t allow you to store an async search response larger than 10Mb and an attempt to do this results in an error.
	 * The maximum allowed size for a stored async search response can be set by changing the `search.max_async_search_response_size` cluster level setting.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/async-search.html
	 *
	 * @param string|array $index A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 * @param array|string $body The request body
	 * @param array{
	 *     wait_for_completion_timeout: string|integer, // Blocks and waits until the search is completed up to a certain timeout.When the async search completes within the timeout, the response won’t include the ID as the results are not stored in the cluster.
	 *     keep_on_completion: bool, // If `true`, results are stored for later retrieval when the search completes within the `wait_for_completion_timeout`.
	 *     keep_alive: string|integer, // Specifies how long the async search needs to be available.Ongoing async searches and any saved search results are deleted after this period.
	 *     allow_no_indices: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     allow_partial_search_results: bool, // Indicate if an error should be returned if there is a partial search failure or timeout
	 *     analyzer: string, // The analyzer to use for the query string
	 *     analyze_wildcard: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     batched_reduce_size: int, // Affects how often partial results become available, which happens whenever shard results are reduced.A partial reduction is performed every time the coordinating node has received a certain number of new shard responses (5 by default).
	 *     ccs_minimize_roundtrips: bool, // The default value is the only supported value.
	 *     default_operator: string, // The default operator for query string query (AND or OR)
	 *     df: string, // The field to use as default where no field prefix is given in the query string
	 *     docvalue_fields: string|array, // A comma-separated list of fields to return as the docvalue representation of a field for each hit
	 *     expand_wildcards: string|array, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     explain: bool, // Specify whether to return detailed information about score computation as part of a hit
	 *     ignore_throttled: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled
	 *     ignore_unavailable: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     lenient: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     max_concurrent_shard_requests: int, // The number of concurrent shard requests per node this search executes concurrently. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests
	 *     min_compatible_shard_node: string, //
	 *     preference: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     pre_filter_shard_size: int, // The default value cannot be changed, which enforces the execution of a pre-filter roundtrip to retrieve statistics from each shard so that the ones that surely don’t hold any document matching the query get skipped.
	 *     request_cache: bool, // Specify if request cache should be used for this request or not, defaults to true
	 *     routing: string, // A comma-separated list of specific routing values
	 *     scroll: string|integer, //
	 *     search_type: string, // Search operation type
	 *     stats: array, // Specific 'tag' of the request for logging and statistical purposes
	 *     stored_fields: string|array, // A comma-separated list of stored fields to return as part of a hit
	 *     suggest_field: string, // Specifies which field to use for suggestions.
	 *     suggest_mode: string, // Specify suggest mode
	 *     suggest_size: int, // How many suggestions to return in response
	 *     suggest_text: string, // The source text for which the suggestions should be returned.
	 *     terminate_after: int, // The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
	 *     timeout: string|integer, // Explicit operation timeout
	 *     track_total_hits: bool|int, // Indicate if the number of documents that match the query should be tracked. A number can also be specified, to accurately track the total hit count up to the number.
	 *     track_scores: bool, // Whether to calculate and return scores even if they are not used for sorting
	 *     typed_keys: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
	 *     rest_total_hits_as_int: bool, //
	 *     version: bool, // Specify whether to return document version as part of a hit
	 *     _source: bool|string, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes: string|array, // A list of fields to exclude from the returned _source field
	 *     _source_includes: string|array, // A list of fields to extract and return from the _source field
	 *     seq_no_primary_term: bool, // Specify whether to return sequence number and primary term of the last modification of each hit
	 *     q: string, // Query in the Lucene query string syntax
	 *     size: int, // Number of hits to return (default: 10)
	 *     from: int, // Starting offset (default: 0)
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
	public function submit(
		string|array $index = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/' . $this->encode($index) . '/_async_search';
			$method = 'POST';
		} else {
			$url = "/_async_search";
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, [
			'wait_for_completion_timeout',
			'keep_on_completion',
			'keep_alive',
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
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}
}
