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
	 * Shows information about currently configured aliases to indices including filter and routing infos.
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
			$url = $this->encode("/_cat/aliases/{$name}");
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
	 * Returns information about existing component_templates templates.
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
			$url = $this->encode("/_cat/component_templates/{$name}");
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
	 * Provides quick access to the document count of the entire cluster, or individual indices.
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
			$url = $this->encode("/_cat/count/{$index}");
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
	 * Returns information about indices: number of primaries and replicas, document counts, disk size, ...
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
			$url = $this->encode("/_cat/indices/{$index}");
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
	 * Gets configuration and usage information about data frame analytics jobs.
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
			$url = $this->encode("/_cat/ml/data_frame/analytics/{$id}");
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
	 * Gets configuration and usage information about datafeeds.
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
			$url = $this->encode("/_cat/ml/datafeeds/{$datafeed_id}");
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
	 * Gets configuration and usage information about anomaly detection jobs.
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
			$url = $this->encode("/_cat/ml/anomaly_detectors/{$job_id}");
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
	 * Gets configuration and usage information about inference trained models.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat-trained-model.html
	 *
	 * @param string $model_id The ID of the trained models stats to fetch
	 * @param array{
	 *     allow_no_match: bool, // Whether to ignore if a wildcard expression matches no trained models. (This includes `_all` string or when no trained models have been specified)
	 *     bytes: string, // The unit in which to display byte values
	 *     h: string|array, // Comma-separated list of column names to display
	 *     s: string|array, // Comma-separated list of column names or column aliases to sort by
	 *     from: integer, // skips a number of trained models
	 *     size: integer, // specifies a max number of trained models to get
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
			$url = $this->encode("/_cat/ml/trained_models/{$model_id}");
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
	 * Gets configuration and usage information about transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cat-transforms.html
	 *
	 * @param string $transform_id The id of the transform for which to get stats. '_all' or '*' implies all transforms
	 * @param array{
	 *     allow_no_match: bool, // Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
	 *     from: integer, // skips a number of transform configs, defaults to 0
	 *     h: string|array, // Comma-separated list of column names to display.
	 *     s: string|array, // Comma-separated list of column names or column aliases used to sort theresponse.
	 *     time: string, // Unit used to display time values.
	 *     size: integer, // specifies a max number of transforms to get, defaults to 100
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
			$url = $this->encode("/_cat/transforms/{$transform_id}");
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
