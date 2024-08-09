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
	 * Deletes component templates.
	 * Component templates are building blocks for constructing index templates that specify index mappings, settings, and aliases.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/indices-component-template.html
	 *
	 * @param string|array $name Comma-separated list or wildcard expression of component template names used to limit the request.
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
	public function deleteComponentTemplate(string|array $name, array $params = []): Elasticsearch|Promise
	{
		$name = $this->convertValue($name);
		$url = '/_component_template/' . $this->encode($name);
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
		$url = '/_component_template/' . $this->encode($name);
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
	 * Retrieves information about component templates.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/indices-component-template.html
	 *
	 * @param string $name Comma-separated list of component template names used to limit the request.
	 * Wildcard (`*`) expressions are supported.
	 * @param array{
	 *     flat_settings: bool, // If `true`, returns settings in flat format.
	 *     include_defaults: bool, // Return all default configurations for the component template (default: false)
	 *     local: bool, // If `true`, the request retrieves information from the local node only.If `false`, information is retrieved from the master node.
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
	public function getComponentTemplate(string $name = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($name)) {
			$url = '/_component_template/' . $this->encode($name);
			$method = 'GET';
		} else {
			$url = "/_component_template";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'flat_settings',
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
		$url = '/_info/' . $this->encode($target);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Creates or updates a component template.
	 * Component templates are building blocks for constructing index templates that specify index mappings, settings, and aliases.
	 *
	 * An index template can be composed of multiple component templates.
	 * To use a component template, specify it in an index template’s `composed_of` list.
	 * Component templates are only applied to new data streams and indices as part of a matching index template.
	 *
	 * Settings and mappings specified directly in the index template or the create index request override any settings or mappings specified in a component template.
	 *
	 * Component templates are only used during index creation.
	 * For data streams, this includes data stream creation and the creation of a stream’s backing indices.
	 * Changes to component templates do not affect existing indices, including a stream’s backing indices.
	 *
	 * You can use C-style `/* *\/` block comments in component templates.
	 * You can include comments anywhere in the request body except before the opening curly bracket.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/indices-component-template.html
	 *
	 * @param string $name Name of the component template to create.
	 * Elasticsearch includes the following built-in component templates: `logs-mappings`; 'logs-settings`; `metrics-mappings`; `metrics-settings`;`synthetics-mapping`; `synthetics-settings`.
	 * Elastic Agent uses these templates to configure backing indices for its data streams.
	 * If you use Elastic Agent and want to overwrite one of these templates, set the `version` for your replacement template higher than the current version.
	 * If you don’t use Elastic Agent and want to disable all built-in component and index templates, set `stack.templates.enabled` to `false` using the cluster update settings API.
	 * @param array|string $body The request body
	 * @param array{
	 *     create: bool, // If `true`, this request cannot replace or update existing component templates.
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
	public function putComponentTemplate(
		string $name,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_component_template/' . $this->encode($name);
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
}
