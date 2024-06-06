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
class Synonyms extends AbstractEndpoint
{
	/**
	 * Deletes a synonym set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-synonyms-set.html
	 *
	 * @param string $id The id of the synonyms set to be deleted
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
	public function deleteSynonym(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_synonyms/' . $this->encode($id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Deletes a synonym rule in a synonym set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-synonym-rule.html
	 *
	 * @param string $set_id The id of the synonym set to be updated
	 * @param string $rule_id The id of the synonym rule to be deleted
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
	public function deleteSynonymRule(string $set_id, string $rule_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_synonyms/' . $this->encode($set_id) . '/' . $this->encode($rule_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Retrieves a synonym set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-synonyms-set.html
	 *
	 * @param string $id "The id of the synonyms set to be retrieved
	 * @param array{
	 *     from: int, // Starting offset for query rules to be retrieved
	 *     size: int, // specifies a max number of query rules to retrieve
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
	public function getSynonym(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_synonyms/' . $this->encode($id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['from', 'size', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Retrieves a synonym rule from a synonym set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-synonym-rule.html
	 *
	 * @param string $set_id The id of the synonym set to retrieve the synonym rule from
	 * @param string $rule_id The id of the synonym rule to retrieve
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
	public function getSynonymRule(string $set_id, string $rule_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_synonyms/' . $this->encode($set_id) . '/' . $this->encode($rule_id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Retrieves a summary of all defined synonym sets
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/list-synonyms-sets.html
	 *
	 * @param array{
	 *     from: int, // Starting offset
	 *     size: int, // specifies a max number of results to get
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
	public function getSynonymsSets(array $params = []): Elasticsearch|Promise
	{
		$url = "/_synonyms";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['from', 'size', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Creates or updates a synonyms set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-synonyms-set.html
	 *
	 * @param string $id The id of the synonyms set to be created or updated
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
	public function putSynonym(string $id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_synonyms/' . $this->encode($id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Creates or updates a synonym rule in a synonym set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-synonym-rule.html
	 *
	 * @param string $set_id The id of the synonym set to be updated with the synonym rule
	 * @param string $rule_id The id of the synonym rule to be updated or created
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
	public function putSynonymRule(
		string $set_id,
		string $rule_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_synonyms/' . $this->encode($set_id) . '/' . $this->encode($rule_id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}
}
