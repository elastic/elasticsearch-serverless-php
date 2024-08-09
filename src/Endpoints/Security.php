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
class Security extends AbstractEndpoint
{
	/**
	 * Enables you to submit a request with a basic auth header to authenticate a user and retrieve information about the authenticated user.
	 * A successful call returns a JSON structure that shows user information such as their username, the roles that are assigned to the user, any assigned metadata, and information about the realms that authenticated and authorized the user.
	 * If the user cannot be authenticated, this API returns a 401 status code.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-authenticate.html
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
	public function authenticate(array $params = []): Elasticsearch|Promise
	{
		$url = "/_security/_authenticate";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Creates an API key for access without requiring basic authentication.
	 * A successful request returns a JSON structure that contains the API key, its unique id, and its name.
	 * If applicable, it also returns expiration information for the API key in milliseconds.
	 * NOTE: By default, API keys never expire. You can specify expiration information when you create the API keys.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-create-api-key.html
	 *
	 * @param array|string $body The request body
	 * @param array{
	 *     refresh: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
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
	public function createApiKey(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_security/api_key";
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['refresh', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Retrieves information for one or more API keys.
	 * NOTE: If you have only the `manage_own_api_key` privilege, this API returns only the API keys that you own.
	 * If you have `read_security`, `manage_api_key` or greater privileges (including `manage_security`), this API returns all API keys regardless of ownership.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-api-key.html
	 *
	 * @param array{
	 *     id: string, // An API key id.This parameter cannot be used with any of `name`, `realm_name` or `username`.
	 *     name: string, // An API key name.This parameter cannot be used with any of `id`, `realm_name` or `username`.It supports prefix search with wildcard.
	 *     owner: bool, // A boolean flag that can be used to query API keys owned by the currently authenticated user.The `realm_name` or `username` parameters cannot be specified when this parameter is set to `true` as they are assumed to be the currently authenticated ones.
	 *     realm_name: string, // The name of an authentication realm.This parameter cannot be used with either `id` or `name` or when `owner` flag is set to `true`.
	 *     username: string, // The username of a user.This parameter cannot be used with either `id` or `name` or when `owner` flag is set to `true`.
	 *     with_limited_by: bool, // Return the snapshot of the owner user's role descriptorsassociated with the API key. An API key's actualpermission is the intersection of its assigned roledescriptors and the owner user's role descriptors.
	 *     active_only: bool, // A boolean flag that can be used to query API keys that are currently active. An API key is considered active if it is neither invalidated, nor expired at query time. You can specify this together with other parameters such as `owner` or `name`. If `active_only` is false, the response will include both active and inactive (expired or invalidated) keys.
	 *     with_profile_uid: bool, // Determines whether to also retrieve the profile uid, for the API key owner principal, if it exists.
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
	public function getApiKey(array $params = []): Elasticsearch|Promise
	{
		$url = "/_security/api_key";
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'id',
			'name',
			'owner',
			'realm_name',
			'username',
			'with_limited_by',
			'active_only',
			'with_profile_uid',
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
	 * Determines whether the specified user has a specified list of privileges.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-has-privileges.html
	 *
	 * @param string $user Username
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
	public function hasPrivileges(
		string $user = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($user)) {
			$url = '/_security/user/' . $this->encode($user) . '/_has_privileges';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_security/user/_has_privileges";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Invalidates one or more API keys.
	 * The `manage_api_key` privilege allows deleting any API keys.
	 * The `manage_own_api_key` only allows deleting API keys that are owned by the user.
	 * In addition, with the `manage_own_api_key` privilege, an invalidation request must be issued in one of the three formats:
	 * - Set the parameter `owner=true`.
	 * - Or, set both `username` and `realm_name` to match the user’s identity.
	 * - Or, if the request is issued by an API key, i.e. an API key invalidates itself, specify its ID in the `ids` field.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-invalidate-api-key.html
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
	public function invalidateApiKey(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_security/api_key";
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Retrieves information for API keys in a paginated manner. You can optionally filter the results with a query.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-query-api-key.html
	 *
	 * @param array|string $body The request body
	 * @param array{
	 *     with_limited_by: bool, // Return the snapshot of the owner user's role descriptors associated with the API key.An API key's actual permission is the intersection of its assigned role descriptors and the owner user's role descriptors.
	 *     with_profile_uid: bool, // Determines whether to also retrieve the profile uid, for the API key owner principal, if it exists.
	 *     typed_keys: bool, // Determines whether aggregation names are prefixed by their respective types in the response.
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
	public function queryApiKeys(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_security/_query/api_key";
		$method = empty($body) ? 'GET' : 'POST';
		$url = $this->addQueryString($url, $params, [
			'with_limited_by',
			'with_profile_uid',
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
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates attributes of an existing API key.
	 * Users can only update API keys that they created or that were granted to them.
	 * Use this API to update API keys created by the create API Key or grant API Key APIs.
	 * If you need to apply the same update to many API keys, you can use bulk update API Keys to reduce overhead.
	 * It’s not possible to update expired API keys, or API keys that have been invalidated by invalidate API Key.
	 * This API supports updates to an API key’s access scope and metadata.
	 * The access scope of an API key is derived from the `role_descriptors` you specify in the request, and a snapshot of the owner user’s permissions at the time of the request.
	 * The snapshot of the owner’s permissions is updated automatically on every call.
	 * If you don’t specify `role_descriptors` in the request, a call to this API might still change the API key’s access scope.
	 * This change can occur if the owner user’s permissions have changed since the API key was created or last modified.
	 * To update another user’s API key, use the `run_as` feature to submit a request on behalf of another user.
	 * IMPORTANT: It’s not possible to use an API key as the authentication credential for this API.
	 * To update an API key, the owner user’s credentials are required.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-update-api-key.html
	 *
	 * @param string $id The ID of the API key to update.
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
	public function updateApiKey(string $id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_security/api_key/' . $this->encode($id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}
}
