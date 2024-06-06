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
class Connector extends AbstractEndpoint
{
	/**
	 * Updates the last_seen timestamp in the connector document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/check-in-connector-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be checked in
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
	public function checkIn(string $connector_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_check_in';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Deletes a connector.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/delete-connector-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be deleted
	 * @param array{
	 *     delete_sync_jobs: bool, // (REQUIRED) Determines whether associated sync jobs are also deleted.
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
	public function delete(string $connector_id, array $params): Elasticsearch|Promise
	{
		$this->checkRequiredParameters(['delete_sync_jobs'], $params);
		$url = '/_connector/' . $this->encode($connector_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, [
			'delete_sync_jobs',
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
	 * Returns the details about a connector.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/get-connector-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector
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
	public function get(string $connector_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Updates the stats of last sync in the connector document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-last-sync-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function lastSync(string $connector_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_last_sync';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Lists all connectors.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/list-connector-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param array{
	 *     from: int, // Starting offset (default: 0)
	 *     size: int, // Specifies a max number of results to get
	 *     index_name: string|array, // A comma-separated list of connector index names to fetch connector documents for
	 *     connector_name: string|array, // A comma-separated list of connector names to fetch connector documents for
	 *     service_type: string|array, // A comma-separated list of connector service types to fetch connector documents for
	 *     query: string, // A wildcard query string that filters connectors with matching name, description or index name
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
	public function list(array $params = []): Elasticsearch|Promise
	{
		$url = "/_connector";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'from',
			'size',
			'index_name',
			'connector_name',
			'service_type',
			'query',
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
	 * Creates a connector.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/create-connector-api.html
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
	public function post(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_connector";
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Creates or updates a connector.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/create-connector-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be created or updated
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
	public function put(string $connector_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Cancels a connector sync job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/cancel-connector-sync-job-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_sync_job_id The unique identifier of the connector sync job
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
	public function syncJobCancel(string $connector_sync_job_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_connector/_sync_job/' . $this->encode($connector_sync_job_id) . '/_cancel';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Deletes a connector sync job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/delete-connector-sync-job-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_sync_job_id The unique identifier of the connector sync job to be deleted
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
	public function syncJobDelete(string $connector_sync_job_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_connector/_sync_job/' . $this->encode($connector_sync_job_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Returns the details about a connector sync job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/get-connector-sync-job-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_sync_job_id The unique identifier of the connector sync job
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
	public function syncJobGet(string $connector_sync_job_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_connector/_sync_job/' . $this->encode($connector_sync_job_id);
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Lists all connector sync jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/list-connector-sync-jobs-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param array{
	 *     from: int, // Starting offset (default: 0)
	 *     size: int, // Specifies a max number of results to get
	 *     status: string, // A sync job status to fetch connector sync jobs for
	 *     connector_id: string, // A connector id to fetch connector sync jobs for
	 *     job_type: array, // A comma-separated list of job types to fetch the sync jobs for
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
	public function syncJobList(array $params = []): Elasticsearch|Promise
	{
		$url = "/_connector/_sync_job";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'from',
			'size',
			'status',
			'connector_id',
			'job_type',
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
	 * Creates a connector sync job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/create-connector-sync-job-api.html
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
	public function syncJobPost(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_connector/_sync_job";
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Activates the draft filtering rules if they are in a validated state.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-filtering-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateActiveFiltering(string $connector_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_filtering/_activate';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Updates the API key id and/or API key secret id fields in the connector document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-api-key-id-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateApiKeyId(
		string $connector_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_api_key_id';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the connector configuration.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-configuration-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateConfiguration(
		string $connector_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_configuration';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the error field in the connector document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-error-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateError(string $connector_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_error';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the filtering field in the connector document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-filtering-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateFiltering(
		string $connector_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_filtering';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the validation info of the draft filtering rules.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-filtering-validation-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateFilteringValidation(
		string $connector_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_filtering/_validation';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the index name of the connector.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-index-name-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateIndexName(
		string $connector_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_index_name';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the name and/or description fields in the connector document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-name-description-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateName(string $connector_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_name';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the is_native flag of the connector.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-native-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateNative(
		string $connector_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_native';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the pipeline field in the connector document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-pipeline-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updatePipeline(
		string $connector_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_pipeline';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the scheduling field in the connector document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-scheduling-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateScheduling(
		string $connector_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_scheduling';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the service type of the connector.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-service-type-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateServiceType(
		string $connector_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_service_type';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the status of the connector.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/update-connector-status-api.html
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 * @param string $connector_id The unique identifier of the connector to be updated
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
	public function updateStatus(
		string $connector_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_connector/' . $this->encode($connector_id) . '/_status';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}
}
