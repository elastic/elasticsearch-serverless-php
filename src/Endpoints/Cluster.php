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
class Cluster extends AbstractEndpoint
{
	/**
	 * Deletes a component template
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/indices-component-template.html
	 *
	 * @param string|array $name Comma-separated list or wildcard expression of component template names used to limit the request.
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
	public function deleteComponentTemplate(string|array $name, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = $this->encode("/_component_template/{$name}");
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
	 * Returns information about whether a particular component template exist
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/indices-component-template.html
	 *
	 * @param string|array $name Comma-separated list of component template names used to limit the request.
	 * Wildcard (*) expressions are supported.
	 * @param array{
	 *     master_timeout: string|integer, // Period to wait for a connection to the master node. If no response isreceived before the timeout expires, the request fails and returns anerror.
	 *     local: bool, // If true, the request retrieves information from the local node only.Defaults to false, which means information is retrieved from the master node.
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
	public function existsComponentTemplate(string|array $name, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = $this->encode("/_component_template/{$name}");
		$method = 'HEAD';
		$url = $this->addQueryString($url, $params, [
			'master_timeout',
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
	 * Returns one or more component templates
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/indices-component-template.html
	 *
	 * @param string $name The comma separated names of the component templates
	 * @param array{
	 *     flat_settings: bool, //
	 *     local: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: string|integer, // Explicit operation timeout for connection to master node
	 *     include_defaults: bool, // Return all default configurations for the component template (default: false)
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
	public function getComponentTemplate(string $name = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($name)) {
			$url = $this->encode("/_component_template/{$name}");
			$method = 'GET';
		} else {
			$url = "/_component_template";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'flat_settings',
			'local',
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
	 * Returns cluster settings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cluster-get-settings.html
	 *
	 * @param array{
	 *     flat_settings: bool, // Return settings in flat format (default: false)
	 *     include_defaults: bool, // Whether to return all default clusters setting.
	 *     master_timeout: string|integer, // Explicit operation timeout for connection to master node
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
	public function getSettings(array $params = []): Elasticsearch|Promise
	{
		$url = "/_cluster/settings";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'flat_settings',
			'include_defaults',
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
	 * Returns different information about the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cluster-info.html
	 *
	 * @param string|array $target Limits the information returned to the specific target. Supports a comma-separated list, such as http,ingest.
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
	public function info(string|array $target, array $params = []): Elasticsearch|Promise
	{
		$target = $this->convertValue($target);
		$url = $this->encode("/_info/{$target}");
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns a list of any cluster-level changes (e.g. create index, update mapping,
	 * allocate or fail shard) which have not yet been executed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cluster-pending.html
	 *
	 * @param array{
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
	public function pendingTasks(array $params = []): Elasticsearch|Promise
	{
		$url = "/_cluster/pending_tasks";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
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
	 * Creates or updates a component template
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/indices-component-template.html
	 *
	 * @param string $name The name of the template
	 * @param array|string $body The request body
	 * @param array{
	 *     create: bool, // Whether the index template should only be added if new or can also replace an existing one
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
	public function putComponentTemplate(
		string $name,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = $this->encode("/_component_template/{$name}");
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'create',
			'master_timeout',
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
	 * Updates the cluster settings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cluster-update-settings.html
	 *
	 * @param array|string $body The request body
	 * @param array{
	 *     flat_settings: bool, // Return settings in flat format (default: false)
	 *     master_timeout: string|integer, // Explicit operation timeout for connection to master node
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
	public function putSettings(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_cluster/settings";
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'flat_settings',
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
	 * Returns high-level overview of cluster statistics.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cluster-stats.html
	 *
	 * @param string|array $node_id Comma-separated list of node filters used to limit returned information. Defaults to all nodes in the cluster.
	 * @param array{
	 *     flat_settings: bool, // Return settings in flat format (default: false)
	 *     timeout: string|integer, // Period to wait for each node to respond. If a node does not respond before its timeout expires, the response does not include its stats. However, timed out nodes are included in the response’s _nodes.failed property. Defaults to no timeout.
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
	public function stats(string|array $node_id = null, array $params = []): Elasticsearch|Promise
	{
		$node_id = $this->convertValue($node_id);
		if (isset($node_id)) {
			$url = $this->encode("/_cluster/stats/nodes/{$node_id}");
			$method = 'GET';
		} else {
			$url = "/_cluster/stats";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'flat_settings',
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
}
