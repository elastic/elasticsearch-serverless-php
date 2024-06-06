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
class Transform extends AbstractEndpoint
{
	/**
	 * Deletes an existing transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-transform.html
	 *
	 * @param string $transform_id Identifier for the transform.
	 * @param array{
	 *     force: bool, // If this value is false, the transform must be stopped before it can be deleted. If true, the transform isdeleted regardless of its current state.
	 *     delete_dest_index: bool, // If this value is true, the destination index is deleted together with the transform. If false, the destinationindex will not be deleted
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
	public function deleteTransform(string $transform_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_transform/' . $this->encode($transform_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, [
			'force',
			'delete_dest_index',
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
	 * Retrieves configuration information for transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-transform.html
	 *
	 * @param string|array $transform_id Identifier for the transform. It can be a transform identifier or a
	 * wildcard expression. You can get information for all transforms by using
	 * `_all`, by specifying `*` as the `<transform_id>`, or by omitting the
	 * `<transform_id>`.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:1. Contains wildcard expressions and there are no transforms that match.2. Contains the _all string or no identifiers and there are no matches.3. Contains wildcard expressions and there are only partial matches.If this parameter is false, the request returns a 404 status code whenthere are no matches or only partial matches.
	 *     from: int, // Skips the specified number of transforms.
	 *     size: int, // Specifies the maximum number of transforms to obtain.
	 *     exclude_generated: bool, // Excludes fields that were automatically added when creating thetransform. This allows the configuration to be in an acceptable format tobe retrieved and then added to another cluster.
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
	public function getTransform(string|array $transform_id = null, array $params = []): Elasticsearch|Promise
	{
		$transform_id = $this->convertValue($transform_id);
		if (isset($transform_id)) {
			$url = '/_transform/' . $this->encode($transform_id);
			$method = 'GET';
		} else {
			$url = "/_transform";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'from',
			'size',
			'exclude_generated',
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
	 * Retrieves usage information for transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-transform-stats.html
	 *
	 * @param string|array $transform_id Identifier for the transform. It can be a transform identifier or a
	 * wildcard expression. You can get information for all transforms by using
	 * `_all`, by specifying `*` as the `<transform_id>`, or by omitting the
	 * `<transform_id>`.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:1. Contains wildcard expressions and there are no transforms that match.2. Contains the _all string or no identifiers and there are no matches.3. Contains wildcard expressions and there are only partial matches.If this parameter is false, the request returns a 404 status code whenthere are no matches or only partial matches.
	 *     from: int, // Skips the specified number of transforms.
	 *     size: int, // Specifies the maximum number of transforms to obtain.
	 *     timeout: string|integer, // Controls the time to wait for the stats
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
	public function getTransformStats(string|array $transform_id, array $params = []): Elasticsearch|Promise
	{
		$transform_id = $this->convertValue($transform_id);
		$url = '/_transform/' . $this->encode($transform_id) . '/_stats';
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'from',
			'size',
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
	 * Previews a transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/preview-transform.html
	 *
	 * @param string $transform_id Identifier for the transform to preview. If you specify this path parameter, you cannot provide transform
	 * configuration details in the request body.
	 * @param array|string $body The request body
	 * @param array{
	 *     timeout: string|integer, // Period to wait for a response. If no response is received before thetimeout expires, the request fails and returns an error.
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
	public function previewTransform(
		string $transform_id = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($transform_id)) {
			$url = '/_transform/' . $this->encode($transform_id) . '/_preview';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_transform/_preview";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['timeout', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Instantiates a transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-transform.html
	 *
	 * @param string $transform_id Identifier for the transform. This identifier can contain lowercase alphanumeric characters (a-z and 0-9),
	 * hyphens, and underscores. It has a 64 character limit and must start and end with alphanumeric characters.
	 * @param array|string $body The request body
	 * @param array{
	 *     defer_validation: bool, // When the transform is created, a series of validations occur to ensure its success. For example, there is acheck for the existence of the source indices and a check that the destination index is not part of the sourceindex pattern. You can use this parameter to skip the checks, for example when the source index does not existuntil after the transform is created. The validations are always run when you start the transform, however, withthe exception of privilege checks.
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
	public function putTransform(
		string $transform_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_transform/' . $this->encode($transform_id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'defer_validation',
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
	 * Resets an existing transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/reset-transform.html
	 *
	 * @param string $transform_id Identifier for the transform. This identifier can contain lowercase alphanumeric characters (a-z and 0-9),
	 * hyphens, and underscores. It has a 64 character limit and must start and end with alphanumeric characters.
	 * @param array{
	 *     force: bool, // If this value is `true`, the transform is reset regardless of its current state. If it's `false`, the transformmust be stopped before it can be reset.
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
	public function resetTransform(string $transform_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_transform/' . $this->encode($transform_id) . '/_reset';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['force', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Schedules now a transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/schedule-now-transform.html
	 *
	 * @param string $transform_id Identifier for the transform.
	 * @param array{
	 *     timeout: string|integer, // Controls the time to wait for the scheduling to take place
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
	public function scheduleNowTransform(string $transform_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_transform/' . $this->encode($transform_id) . '/_schedule_now';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['timeout', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Starts one or more transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/start-transform.html
	 *
	 * @param string $transform_id Identifier for the transform.
	 * @param array{
	 *     timeout: string|integer, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error.
	 *     from: string, // Restricts the set of transformed entities to those changed after this time. Relative times like now-30d are supported. Only applicable for continuous transforms.
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
	public function startTransform(string $transform_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_transform/' . $this->encode($transform_id) . '/_start';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'timeout',
			'from',
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
	 * Stops one or more transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/stop-transform.html
	 *
	 * @param string $transform_id Identifier for the transform. To stop multiple transforms, use a comma-separated list or a wildcard expression.
	 * To stop all transforms, use `_all` or `*` as the identifier.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request: contains wildcard expressions and there are no transforms that match;contains the `_all` string or no identifiers and there are no matches; contains wildcard expressions and thereare only partial matches.If it is true, the API returns a successful acknowledgement message when there are no matches. When there areonly partial matches, the API stops the appropriate transforms.If it is false, the request returns a 404 status code when there are no matches or only partial matches.
	 *     force: bool, // If it is true, the API forcefully stops the transforms.
	 *     timeout: string|integer, // Period to wait for a response when `wait_for_completion` is `true`. If no response is received before thetimeout expires, the request returns a timeout exception. However, the request continues processing andeventually moves the transform to a STOPPED state.
	 *     wait_for_checkpoint: bool, // If it is true, the transform does not completely stop until the current checkpoint is completed. If it is false,the transform stops as soon as possible.
	 *     wait_for_completion: bool, // If it is true, the API blocks until the indexer state completely stops. If it is false, the API returnsimmediately and the indexer is stopped asynchronously in the background.
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
	public function stopTransform(string $transform_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_transform/' . $this->encode($transform_id) . '/_stop';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'force',
			'timeout',
			'wait_for_checkpoint',
			'wait_for_completion',
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
	 * Updates certain properties of a transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/update-transform.html
	 *
	 * @param string $transform_id Identifier for the transform.
	 * @param array|string $body The request body
	 * @param array{
	 *     defer_validation: bool, // When true, deferrable validations are not run. This behavior may bedesired if the source index does not exist until after the transform iscreated.
	 *     timeout: string|integer, // Period to wait for a response. If no response is received before thetimeout expires, the request fails and returns an error.
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
	public function updateTransform(
		string $transform_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_transform/' . $this->encode($transform_id) . '/_update';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'defer_validation',
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
}
