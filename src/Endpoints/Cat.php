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
class Cat extends AbstractEndpoint
{
	/**
	 * Retrieves the cluster’s index aliases, including filter and routing information.
	 * The API does not return data stream aliases.
	 * IMPORTANT: cat APIs are only intended for human consumption using the command line or the Kibana console. They are not intended for use by applications. For application consumption, use the aliases API.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat-alias.html
	 *
	 * @param string|array $name A comma-separated list of aliases to retrieve. Supports wildcards (`*`).  To retrieve all aliases, omit this parameter or use `*` or `_all`.
	 * @param array{
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
	public function aliases(string|array $name = null, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		if (isset($name)) {
			$url = '/_cat/aliases/' . $this->encode($name);
			$method = 'GET';
		} else {
			$url = "/_cat/aliases";
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
		    'Accept' => 'text/plain', 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns information about component templates in a cluster.
	 * Component templates are building blocks for constructing index templates that specify index mappings, settings, and aliases.
	 * IMPORTANT: cat APIs are only intended for human consumption using the command line or Kibana console.
	 * They are not intended for use by applications. For application consumption, use the get component template API.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-component-templates.html
	 *
	 * @param string $name The name of the component template. Accepts wildcard expressions. If omitted, all component templates are returned.
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
	public function componentTemplates(string $name = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($name)) {
			$url = '/_cat/component_templates/' . $this->encode($name);
			$method = 'GET';
		} else {
			$url = "/_cat/component_templates";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'text/plain', 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Provides quick access to a document count for a data stream, an index, or an entire cluster.
	 * NOTE: The document count only includes live documents, not deleted documents which have not yet been removed by the merge process.
	 * IMPORTANT: cat APIs are only intended for human consumption using the command line or Kibana console.
	 * They are not intended for use by applications. For application consumption, use the count API.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat-count.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases used to limit the request.
	 * Supports wildcards (`*`). To target all data streams and indices, omit this parameter or use `*` or `_all`.
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
	public function count(string|array $index = null, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/_cat/count/' . $this->encode($index);
			$method = 'GET';
		} else {
			$url = "/_cat/count";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'text/plain', 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns help for the Cat APIs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat.html
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
	public function help(array $params = []): Elasticsearch|Promise
	{
		$url = "/_cat";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'text/plain',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns high-level information about indices in a cluster, including backing indices for data streams.
	 * IMPORTANT: cat APIs are only intended for human consumption using the command line or Kibana console.
	 * They are not intended for use by applications. For application consumption, use the get index API.
	 * Use the cat indices API to get the following information for each index in a cluster: shard count; document count; deleted document count; primary store size; total store size of all shards, including shard replicas.
	 * These metrics are retrieved directly from Lucene, which Elasticsearch uses internally to power indexing and search. As a result, all document counts include hidden nested documents.
	 * To get an accurate count of Elasticsearch documents, use the cat count or count APIs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat-indices.html
	 *
	 * @param string|array $index Comma-separated list of data streams, indices, and aliases used to limit the request.
	 * Supports wildcards (`*`). To target all data streams and indices, omit this parameter or use `*` or `_all`.
	 * @param array{
	 *     bytes: string, // The unit used to display byte values.
	 *     expand_wildcards: string|array, // The type of index that wildcard patterns can match.
	 *     health: string, // The health status used to limit returned indices. By default, the response includes indices of any health status.
	 *     include_unloaded_segments: bool, // If true, the response includes information from segments that are not loaded into memory.
	 *     pri: bool, // If true, the response only includes information from primary shards.
	 *     time: string, // The unit used to display time values.
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
	public function indices(string|array $index = null, array $params = []): Elasticsearch|Promise
	{
		$index = $this->convertValue($index);
		if (isset($index)) {
			$url = '/_cat/indices/' . $this->encode($index);
			$method = 'GET';
		} else {
			$url = "/_cat/indices";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'bytes',
			'expand_wildcards',
			'health',
			'include_unloaded_segments',
			'pri',
			'time',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'text/plain', 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns configuration and usage information about data frame analytics jobs.
	 *
	 * IMPORTANT: cat APIs are only intended for human consumption using the Kibana
	 * console or command line. They are not intended for use by applications. For
	 * application consumption, use the get data frame analytics jobs statistics API.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat-dfanalytics.html
	 *
	 * @param string $id The ID of the data frame analytics to fetch
	 * @param array{
	 *     allow_no_match: bool, // Whether to ignore if a wildcard expression matches no configs. (This includes `_all` string or when no configs have been specified)
	 *     bytes: string, // The unit in which to display byte values
	 *     h: string|array, // Comma-separated list of column names to display.
	 *     s: string|array, // Comma-separated list of column names or column aliases used to sort theresponse.
	 *     time: string|integer, // Unit used to display time values.
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
	public function mlDataFrameAnalytics(string $id = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($id)) {
			$url = '/_cat/ml/data_frame/analytics/' . $this->encode($id);
			$method = 'GET';
		} else {
			$url = "/_cat/ml/data_frame/analytics";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'bytes',
			'h',
			's',
			'time',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'text/plain', 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns configuration and usage information about datafeeds.
	 * This API returns a maximum of 10,000 datafeeds.
	 * If the Elasticsearch security features are enabled, you must have `monitor_ml`, `monitor`, `manage_ml`, or `manage`
	 * cluster privileges to use this API.
	 *
	 * IMPORTANT: cat APIs are only intended for human consumption using the Kibana
	 * console or command line. They are not intended for use by applications. For
	 * application consumption, use the get datafeed statistics API.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat-datafeeds.html
	 *
	 * @param string $datafeed_id A numerical character string that uniquely identifies the datafeed.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:* Contains wildcard expressions and there are no datafeeds that match.* Contains the `_all` string or no identifiers and there are no matches.* Contains wildcard expressions and there are only partial matches.If `true`, the API returns an empty datafeeds array when there are no matches and the subset of results whenthere are partial matches. If `false`, the API returns a 404 status code when there are no matches or onlypartial matches.
	 *     h: string|array, // Comma-separated list of column names to display.
	 *     s: string|array, // Comma-separated list of column names or column aliases used to sort the response.
	 *     time: string, // The unit used to display time values.
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
	public function mlDatafeeds(string $datafeed_id = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($datafeed_id)) {
			$url = '/_cat/ml/datafeeds/' . $this->encode($datafeed_id);
			$method = 'GET';
		} else {
			$url = "/_cat/ml/datafeeds";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'h',
			's',
			'time',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'text/plain', 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns configuration and usage information for anomaly detection jobs.
	 * This API returns a maximum of 10,000 jobs.
	 * If the Elasticsearch security features are enabled, you must have `monitor_ml`,
	 * `monitor`, `manage_ml`, or `manage` cluster privileges to use this API.
	 *
	 * IMPORTANT: cat APIs are only intended for human consumption using the Kibana
	 * console or command line. They are not intended for use by applications. For
	 * application consumption, use the get anomaly detection job statistics API.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat-anomaly-detectors.html
	 *
	 * @param string $job_id Identifier for the anomaly detection job.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:* Contains wildcard expressions and there are no jobs that match.* Contains the `_all` string or no identifiers and there are no matches.* Contains wildcard expressions and there are only partial matches.If `true`, the API returns an empty jobs array when there are no matches and the subset of results when thereare partial matches. If `false`, the API returns a 404 status code when there are no matches or only partialmatches.
	 *     bytes: string, // The unit used to display byte values.
	 *     h: string|array, // Comma-separated list of column names to display.
	 *     s: string|array, // Comma-separated list of column names or column aliases used to sort the response.
	 *     time: string, // The unit used to display time values.
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
	public function mlJobs(string $job_id = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($job_id)) {
			$url = '/_cat/ml/anomaly_detectors/' . $this->encode($job_id);
			$method = 'GET';
		} else {
			$url = "/_cat/ml/anomaly_detectors";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'bytes',
			'h',
			's',
			'time',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'text/plain', 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns configuration and usage information about inference trained models.
	 *
	 * IMPORTANT: cat APIs are only intended for human consumption using the Kibana
	 * console or command line. They are not intended for use by applications. For
	 * application consumption, use the get trained models statistics API.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat-trained-model.html
	 *
	 * @param string $model_id A unique identifier for the trained model.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request: contains wildcard expressions and there are no models that match; contains the `_all` string or no identifiers and there are no matches; contains wildcard expressions and there are only partial matches.If `true`, the API returns an empty array when there are no matches and the subset of results when there are partial matches.If `false`, the API returns a 404 status code when there are no matches or only partial matches.
	 *     bytes: string, // The unit used to display byte values.
	 *     h: string|array, // A comma-separated list of column names to display.
	 *     s: string|array, // A comma-separated list of column names or aliases used to sort the response.
	 *     from: int, // Skips the specified number of transforms.
	 *     size: int, // The maximum number of transforms to display.
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
	public function mlTrainedModels(string $model_id = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($model_id)) {
			$url = '/_cat/ml/trained_models/' . $this->encode($model_id);
			$method = 'GET';
		} else {
			$url = "/_cat/ml/trained_models";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'bytes',
			'h',
			's',
			'from',
			'size',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'text/plain', 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns configuration and usage information about transforms.
	 *
	 * IMPORTANT: cat APIs are only intended for human consumption using the Kibana
	 * console or command line. They are not intended for use by applications. For
	 * application consumption, use the get transform statistics API.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat-transforms.html
	 *
	 * @param string $transform_id A transform identifier or a wildcard expression.
	 * If you do not specify one of these options, the API returns information for all transforms.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request: contains wildcard expressions and there are no transforms that match; contains the `_all` string or no identifiers and there are no matches; contains wildcard expressions and there are only partial matches.If `true`, it returns an empty transforms array when there are no matches and the subset of results when there are partial matches.If `false`, the request returns a 404 status code when there are no matches or only partial matches.
	 *     from: int, // Skips the specified number of transforms.
	 *     h: string|array, // Comma-separated list of column names to display.
	 *     s: string|array, // Comma-separated list of column names or column aliases used to sort the response.
	 *     time: string, // The unit used to display time values.
	 *     size: int, // The maximum number of transforms to obtain.
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
	public function transforms(string $transform_id = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($transform_id)) {
			$url = '/_cat/transforms/' . $this->encode($transform_id);
			$method = 'GET';
		} else {
			$url = "/_cat/transforms";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'from',
			'h',
			's',
			'time',
			'size',
			'pretty',
			'human',
			'error_trace',
			'source',
			'filter_path',
		]);
		$headers = [
		    'Accept' => 'text/plain', 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}
}
