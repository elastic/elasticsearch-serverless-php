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
class Ml extends AbstractEndpoint
{
	/**
	 * Close anomaly detection jobs
	 * A job can be opened and closed multiple times throughout its lifecycle. A closed job cannot receive data or perform analysis operations, but you can still explore and navigate results.
	 * When you close a job, it runs housekeeping tasks such as pruning the model history, flushing buffers, calculating final results and persisting the model snapshots. Depending upon the size of the job, it could take several minutes to close and the equivalent time to re-open. After it is closed, the job has a minimal overhead on the cluster except for maintaining its meta data. Therefore it is a best practice to close jobs that are no longer required to process data.
	 * If you close an anomaly detection job whose datafeed is running, the request first tries to stop the datafeed. This behavior is equivalent to calling stop datafeed API with the same timeout and force parameters as the close job request.
	 * When a datafeed that has a specified end date stops, it automatically closes its associated job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/ml-close-job.html
	 *
	 * @param string $job_id Identifier for the anomaly detection job. It can be a job identifier, a group name, or a wildcard expression. You can close multiple anomaly detection jobs in a single API request by using a group name, a comma-separated list of jobs, or a wildcard expression. You can close all jobs by using `_all` or by specifying `*` as the job identifier.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request: contains wildcard expressions and there are no jobs that match; contains the  `_all` string or no identifiers and there are no matches; or contains wildcard expressions and there are only partial matches. By default, it returns an empty jobs array when there are no matches and the subset of results when there are partial matches.If `false`, the request returns a 404 status code when there are no matches or only partial matches.
	 *     force: bool, // Use to close a failed job, or to forcefully close a job which has not responded to its initial close request; the request returns without performing the associated actions such as flushing buffers and persisting the model snapshots.If you want the job to be in a consistent state after the close job API returns, do not set to `true`. This parameter should be used only in situations where the job has already failed or where you are not interested in results the job might have recently produced or might produce in the future.
	 *     timeout: string|integer, // Controls the time to wait until a job has closed.
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
	public function closeJob(string $job_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/anomaly_detectors/' . $this->encode($job_id) . '/_close';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'force',
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
	 * Removes all scheduled events from a calendar, then deletes it.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/ml-delete-calendar.html
	 *
	 * @param string $calendar_id A string that uniquely identifies a calendar.
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
	public function deleteCalendar(string $calendar_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/calendars/' . $this->encode($calendar_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Deletes scheduled events from a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/ml-delete-calendar-event.html
	 *
	 * @param string $calendar_id A string that uniquely identifies a calendar.
	 * @param string $event_id Identifier for the scheduled event.
	 * You can obtain this identifier by using the get calendar events API.
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
	public function deleteCalendarEvent(string $calendar_id, string $event_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/calendars/' . $this->encode($calendar_id) . '/events/' . $this->encode($event_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Deletes anomaly detection jobs from a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/ml-delete-calendar-job.html
	 *
	 * @param string $calendar_id A string that uniquely identifies a calendar.
	 * @param string|array $job_id An identifier for the anomaly detection jobs. It can be a job identifier, a group name, or a
	 * comma-separated list of jobs or groups.
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
	public function deleteCalendarJob(
		string $calendar_id,
		string|array $job_id,
		array $params = [],
	): Elasticsearch|Promise
	{
		$job_id = $this->convertValue($job_id);
		$url = '/_ml/calendars/' . $this->encode($calendar_id) . '/jobs/' . $this->encode($job_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Deletes a data frame analytics job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/delete-dfanalytics.html
	 *
	 * @param string $id Identifier for the data frame analytics job.
	 * @param array{
	 *     force: bool, // If `true`, it deletes a job that is not stopped; this method is quicker than stopping and deleting the job.
	 *     timeout: string|integer, // The time to wait for the job to be deleted.
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
	public function deleteDataFrameAnalytics(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/data_frame/analytics/' . $this->encode($id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, [
			'force',
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
	 * Deletes an existing datafeed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/ml-delete-datafeed.html
	 *
	 * @param string $datafeed_id A numerical character string that uniquely identifies the datafeed. This
	 * identifier can contain lowercase alphanumeric characters (a-z and 0-9),
	 * hyphens, and underscores. It must start and end with alphanumeric
	 * characters.
	 * @param array{
	 *     force: bool, // Use to forcefully delete a started datafeed; this method is quicker thanstopping and deleting the datafeed.
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
	public function deleteDatafeed(string $datafeed_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/datafeeds/' . $this->encode($datafeed_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['force', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Deletes a filter.
	 * If an anomaly detection job references the filter, you cannot delete the
	 * filter. You must update or delete the job before you can delete the filter.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-filter.html
	 *
	 * @param string $filter_id A string that uniquely identifies a filter.
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
	public function deleteFilter(string $filter_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/filters/' . $this->encode($filter_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Deletes an anomaly detection job.
	 *
	 * All job configuration, model state and results are deleted.
	 * It is not currently possible to delete multiple jobs using wildcards or a
	 * comma separated list. If you delete a job that has a datafeed, the request
	 * first tries to delete the datafeed. This behavior is equivalent to calling
	 * the delete datafeed API with the same timeout and force parameters as the
	 * delete job request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-job.html
	 *
	 * @param string $job_id Identifier for the anomaly detection job.
	 * @param array{
	 *     force: bool, // Use to forcefully delete an opened job; this method is quicker thanclosing and deleting the job.
	 *     delete_user_annotations: bool, // Specifies whether annotations that have been added by theuser should be deleted along with any auto-generated annotations when the job isreset.
	 *     wait_for_completion: bool, // Specifies whether the request should return immediately or wait until thejob deletion completes.
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
	public function deleteJob(string $job_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/anomaly_detectors/' . $this->encode($job_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, [
			'force',
			'delete_user_annotations',
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
	 * Deletes an existing trained inference model that is currently not referenced
	 * by an ingest pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-trained-models.html
	 *
	 * @param string $model_id The unique identifier of the trained model.
	 * @param array{
	 *     force: bool, // Forcefully deletes a trained model that is referenced by ingest pipelines or has a started deployment.
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
	public function deleteTrainedModel(string $model_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/trained_models/' . $this->encode($model_id);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['force', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Deletes a trained model alias.
	 * This API deletes an existing model alias that refers to a trained model. If
	 * the model alias is missing or refers to a model other than the one identified
	 * by the `model_id`, this API returns an error.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-trained-models-aliases.html
	 *
	 * @param string $model_alias The model alias to delete.
	 * @param string $model_id The trained model ID to which the model alias refers.
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
	public function deleteTrainedModelAlias(
		string $model_alias,
		string $model_id,
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_ml/trained_models/' . $this->encode($model_id) . '/model_aliases/' . $this->encode($model_alias);
		$method = 'DELETE';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Makes an estimation of the memory usage for an anomaly detection job model.
	 * It is based on analysis configuration details for the job and cardinality
	 * estimates for the fields it references.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-apis.html
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
	public function estimateModelMemory(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_ml/anomaly_detectors/_estimate_model_memory";
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Evaluates the data frame analytics for an annotated index.
	 * The API packages together commonly used evaluation metrics for various types
	 * of machine learning features. This has been designed for use on indexes
	 * created by data frame analytics. Evaluation requires both a ground truth
	 * field and an analytics result field to be present.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/evaluate-dfanalytics.html
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
	public function evaluateDataFrame(array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = "/_ml/data_frame/_evaluate";
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Forces any buffered data to be processed by the job.
	 * The flush jobs API is only applicable when sending data for analysis using
	 * the post data API. Depending on the content of the buffer, then it might
	 * additionally calculate new results. Both flush and close operations are
	 * similar, however the flush is more efficient if you are expecting to send
	 * more data for analysis. When flushing, the job remains open and is available
	 * to continue analyzing data. A close operation additionally prunes and
	 * persists the model state to disk and the job must be opened again before
	 * analyzing further data.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-flush-job.html
	 *
	 * @param string $job_id Identifier for the anomaly detection job.
	 * @param array|string $body The request body
	 * @param array{
	 *     advance_time: string, // Specifies to advance to a particular time value. Results are generatedand the model is updated for data from the specified time interval.
	 *     calc_interim: bool, // If true, calculates the interim results for the most recent bucket or allbuckets within the latency period.
	 *     end: string, // When used in conjunction with `calc_interim` and `start`, specifies therange of buckets on which to calculate interim results.
	 *     skip_time: string, // Specifies to skip to a particular time value. Results are not generatedand the model is not updated for data from the specified time interval.
	 *     start: string, // When used in conjunction with `calc_interim`, specifies the range ofbuckets on which to calculate interim results.
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
	public function flushJob(string $job_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/anomaly_detectors/' . $this->encode($job_id) . '/_flush';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'advance_time',
			'calc_interim',
			'end',
			'skip_time',
			'start',
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
	 * Retrieves information about the scheduled events in calendars.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-calendar-event.html
	 *
	 * @param string $calendar_id A string that uniquely identifies a calendar. You can get information for multiple calendars by using a comma-separated list of ids or a wildcard expression. You can get information for all calendars by using `_all` or `*` or by omitting the calendar identifier.
	 * @param array{
	 *     end: string, // Specifies to get events with timestamps earlier than this time.
	 *     from: int, // Skips the specified number of events.
	 *     job_id: string, // Specifies to get events for a specific anomaly detection job identifier or job group. It must be used with a calendar identifier of `_all` or `*`.
	 *     size: int, // Specifies the maximum number of events to obtain.
	 *     start: string, // Specifies to get events with timestamps after this time.
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
	public function getCalendarEvents(string $calendar_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/calendars/' . $this->encode($calendar_id) . '/events';
		$method = 'GET';
		$url = $this->addQueryString($url, $params, [
			'end',
			'from',
			'job_id',
			'size',
			'start',
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
	 * Retrieves configuration information for calendars.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-calendar.html
	 *
	 * @param string $calendar_id A string that uniquely identifies a calendar. You can get information for multiple calendars by using a comma-separated list of ids or a wildcard expression. You can get information for all calendars by using `_all` or `*` or by omitting the calendar identifier.
	 * @param array|string $body The request body
	 * @param array{
	 *     from: int, // Skips the specified number of calendars. This parameter is supported only when you omit the calendar identifier.
	 *     size: int, // Specifies the maximum number of calendars to obtain. This parameter is supported only when you omit the calendar identifier.
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
	public function getCalendars(
		string $calendar_id = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($calendar_id)) {
			$url = '/_ml/calendars/' . $this->encode($calendar_id);
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_ml/calendars";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['from', 'size', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Retrieves configuration information for data frame analytics jobs.
	 * You can get information for multiple data frame analytics jobs in a single
	 * API request by using a comma-separated list of data frame analytics jobs or a
	 * wildcard expression.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-dfanalytics.html
	 *
	 * @param string $id Identifier for the data frame analytics job. If you do not specify this
	 * option, the API returns information for the first hundred data frame
	 * analytics jobs.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:1. Contains wildcard expressions and there are no data frame analyticsjobs that match.2. Contains the `_all` string or no identifiers and there are no matches.3. Contains wildcard expressions and there are only partial matches.The default value returns an empty data_frame_analytics array when thereare no matches and the subset of results when there are partial matches.If this parameter is `false`, the request returns a 404 status code whenthere are no matches or only partial matches.
	 *     from: int, // Skips the specified number of data frame analytics jobs.
	 *     size: int, // Specifies the maximum number of data frame analytics jobs to obtain.
	 *     exclude_generated: bool, // Indicates if certain fields should be removed from the configuration onretrieval. This allows the configuration to be in an acceptable format tobe retrieved and then added to another cluster.
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
	public function getDataFrameAnalytics(string $id = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($id)) {
			$url = '/_ml/data_frame/analytics/' . $this->encode($id);
			$method = 'GET';
		} else {
			$url = "/_ml/data_frame/analytics";
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
	 * Retrieves usage information for data frame analytics jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-dfanalytics-stats.html
	 *
	 * @param string $id Identifier for the data frame analytics job. If you do not specify this
	 * option, the API returns information for the first hundred data frame
	 * analytics jobs.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:1. Contains wildcard expressions and there are no data frame analyticsjobs that match.2. Contains the `_all` string or no identifiers and there are no matches.3. Contains wildcard expressions and there are only partial matches.The default value returns an empty data_frame_analytics array when thereare no matches and the subset of results when there are partial matches.If this parameter is `false`, the request returns a 404 status code whenthere are no matches or only partial matches.
	 *     from: int, // Skips the specified number of data frame analytics jobs.
	 *     size: int, // Specifies the maximum number of data frame analytics jobs to obtain.
	 *     verbose: bool, // Defines whether the stats response should be verbose.
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
	public function getDataFrameAnalyticsStats(string $id = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($id)) {
			$url = '/_ml/data_frame/analytics/' . $this->encode($id) . '/_stats';
			$method = 'GET';
		} else {
			$url = "/_ml/data_frame/analytics/_stats";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'from',
			'size',
			'verbose',
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
	 * Retrieves usage information for datafeeds.
	 * You can get statistics for multiple datafeeds in a single API request by
	 * using a comma-separated list of datafeeds or a wildcard expression. You can
	 * get statistics for all datafeeds by using `_all`, by specifying `*` as the
	 * `<feed_id>`, or by omitting the `<feed_id>`. If the datafeed is stopped, the
	 * only information you receive is the `datafeed_id` and the `state`.
	 * This API returns a maximum of 10,000 datafeeds.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-datafeed-stats.html
	 *
	 * @param string|array $datafeed_id Identifier for the datafeed. It can be a datafeed identifier or a
	 * wildcard expression. If you do not specify one of these options, the API
	 * returns information about all datafeeds.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:1. Contains wildcard expressions and there are no datafeeds that match.2. Contains the `_all` string or no identifiers and there are no matches.3. Contains wildcard expressions and there are only partial matches.The default value is `true`, which returns an empty `datafeeds` arraywhen there are no matches and the subset of results when there arepartial matches. If this parameter is `false`, the request returns a`404` status code when there are no matches or only partial matches.
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
	public function getDatafeedStats(string|array $datafeed_id = null, array $params = []): Elasticsearch|Promise
	{
		$datafeed_id = $this->convertValue($datafeed_id);
		if (isset($datafeed_id)) {
			$url = '/_ml/datafeeds/' . $this->encode($datafeed_id) . '/_stats';
			$method = 'GET';
		} else {
			$url = "/_ml/datafeeds/_stats";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Retrieves configuration information for datafeeds.
	 * You can get information for multiple datafeeds in a single API request by
	 * using a comma-separated list of datafeeds or a wildcard expression. You can
	 * get information for all datafeeds by using `_all`, by specifying `*` as the
	 * `<feed_id>`, or by omitting the `<feed_id>`.
	 * This API returns a maximum of 10,000 datafeeds.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-datafeed.html
	 *
	 * @param string|array $datafeed_id Identifier for the datafeed. It can be a datafeed identifier or a
	 * wildcard expression. If you do not specify one of these options, the API
	 * returns information about all datafeeds.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:1. Contains wildcard expressions and there are no datafeeds that match.2. Contains the `_all` string or no identifiers and there are no matches.3. Contains wildcard expressions and there are only partial matches.The default value is `true`, which returns an empty `datafeeds` arraywhen there are no matches and the subset of results when there arepartial matches. If this parameter is `false`, the request returns a`404` status code when there are no matches or only partial matches.
	 *     exclude_generated: bool, // Indicates if certain fields should be removed from the configuration onretrieval. This allows the configuration to be in an acceptable format tobe retrieved and then added to another cluster.
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
	public function getDatafeeds(string|array $datafeed_id = null, array $params = []): Elasticsearch|Promise
	{
		$datafeed_id = $this->convertValue($datafeed_id);
		if (isset($datafeed_id)) {
			$url = '/_ml/datafeeds/' . $this->encode($datafeed_id);
			$method = 'GET';
		} else {
			$url = "/_ml/datafeeds";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
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
	 * Retrieves filters.
	 * You can get a single filter or all filters.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-filter.html
	 *
	 * @param string|array $filter_id A string that uniquely identifies a filter.
	 * @param array{
	 *     from: int, // Skips the specified number of filters.
	 *     size: int, // Specifies the maximum number of filters to obtain.
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
	public function getFilters(string|array $filter_id = null, array $params = []): Elasticsearch|Promise
	{
		$filter_id = $this->convertValue($filter_id);
		if (isset($filter_id)) {
			$url = '/_ml/filters/' . $this->encode($filter_id);
			$method = 'GET';
		} else {
			$url = "/_ml/filters";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['from', 'size', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Retrieves usage information for anomaly detection jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-job-stats.html
	 *
	 * @param string $job_id Identifier for the anomaly detection job. It can be a job identifier, a
	 * group name, a comma-separated list of jobs, or a wildcard expression. If
	 * you do not specify one of these options, the API returns information for
	 * all anomaly detection jobs.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:1. Contains wildcard expressions and there are no jobs that match.2. Contains the _all string or no identifiers and there are no matches.3. Contains wildcard expressions and there are only partial matches.If `true`, the API returns an empty `jobs` array whenthere are no matches and the subset of results when there are partialmatches. If `false`, the API returns a `404` statuscode when there are no matches or only partial matches.
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
	public function getJobStats(string $job_id = null, array $params = []): Elasticsearch|Promise
	{
		if (isset($job_id)) {
			$url = '/_ml/anomaly_detectors/' . $this->encode($job_id) . '/_stats';
			$method = 'GET';
		} else {
			$url = "/_ml/anomaly_detectors/_stats";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Retrieves configuration information for anomaly detection jobs.
	 * You can get information for multiple anomaly detection jobs in a single API
	 * request by using a group name, a comma-separated list of jobs, or a wildcard
	 * expression. You can get information for all anomaly detection jobs by using
	 * `_all`, by specifying `*` as the `<job_id>`, or by omitting the `<job_id>`.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-job.html
	 *
	 * @param string|array $job_id Identifier for the anomaly detection job. It can be a job identifier, a
	 * group name, or a wildcard expression. If you do not specify one of these
	 * options, the API returns information for all anomaly detection jobs.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:1. Contains wildcard expressions and there are no jobs that match.2. Contains the _all string or no identifiers and there are no matches.3. Contains wildcard expressions and there are only partial matches.The default value is `true`, which returns an empty `jobs` array whenthere are no matches and the subset of results when there are partialmatches. If this parameter is `false`, the request returns a `404` statuscode when there are no matches or only partial matches.
	 *     exclude_generated: bool, // Indicates if certain fields should be removed from the configuration onretrieval. This allows the configuration to be in an acceptable format tobe retrieved and then added to another cluster.
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
	public function getJobs(string|array $job_id = null, array $params = []): Elasticsearch|Promise
	{
		$job_id = $this->convertValue($job_id);
		if (isset($job_id)) {
			$url = '/_ml/anomaly_detectors/' . $this->encode($job_id);
			$method = 'GET';
		} else {
			$url = "/_ml/anomaly_detectors";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
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
	 * Retrieves overall bucket results that summarize the bucket results of
	 * multiple anomaly detection jobs.
	 *
	 * The `overall_score` is calculated by combining the scores of all the
	 * buckets within the overall bucket span. First, the maximum
	 * `anomaly_score` per anomaly detection job in the overall bucket is
	 * calculated. Then the `top_n` of those scores are averaged to result in
	 * the `overall_score`. This means that you can fine-tune the
	 * `overall_score` so that it is more or less sensitive to the number of
	 * jobs that detect an anomaly at the same time. For example, if you set
	 * `top_n` to `1`, the `overall_score` is the maximum bucket score in the
	 * overall bucket. Alternatively, if you set `top_n` to the number of jobs,
	 * the `overall_score` is high only when all jobs detect anomalies in that
	 * overall bucket. If you set the `bucket_span` parameter (to a value
	 * greater than its default), the `overall_score` is the maximum
	 * `overall_score` of the overall buckets that have a span equal to the
	 * jobs' largest bucket span.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-overall-buckets.html
	 *
	 * @param string $job_id Identifier for the anomaly detection job. It can be a job identifier, a
	 * group name, a comma-separated list of jobs or groups, or a wildcard
	 * expression.
	 *
	 * You can summarize the bucket results for all anomaly detection jobs by
	 * using `_all` or by specifying `*` as the `<job_id>`.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:1. Contains wildcard expressions and there are no jobs that match.2. Contains the `_all` string or no identifiers and there are no matches.3. Contains wildcard expressions and there are only partial matches.If `true`, the request returns an empty `jobs` array when there are nomatches and the subset of results when there are partial matches. If thisparameter is `false`, the request returns a `404` status code when thereare no matches or only partial matches.
	 *     bucket_span: string|integer, // The span of the overall buckets. Must be greater or equal to the largestbucket span of the specified anomaly detection jobs, which is the defaultvalue.By default, an overall bucket has a span equal to the largest bucket spanof the specified anomaly detection jobs. To override that behavior, usethe optional `bucket_span` parameter.
	 *     end: string, // Returns overall buckets with timestamps earlier than this time.
	 *     exclude_interim: bool, // If `true`, the output excludes interim results.
	 *     overall_score: float|string, // Returns overall buckets with overall scores greater than or equal to thisvalue.
	 *     start: string, // Returns overall buckets with timestamps after this time.
	 *     top_n: int, // The number of top anomaly detection job bucket scores to be used in the`overall_score` calculation.
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
	public function getOverallBuckets(string $job_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/anomaly_detectors/' . $this->encode($job_id) . '/results/overall_buckets';
		$method = empty($body) ? 'GET' : 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'bucket_span',
			'end',
			'exclude_interim',
			'overall_score',
			'start',
			'top_n',
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
	 * Retrieves configuration information for a trained model.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-trained-models.html
	 *
	 * @param string|array $model_id The unique identifier of the trained model or a model alias.
	 *
	 * You can get information for multiple trained models in a single API
	 * request by using a comma-separated list of model IDs or a wildcard
	 * expression.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:- Contains wildcard expressions and there are no models that match.- Contains the _all string or no identifiers and there are no matches.- Contains wildcard expressions and there are only partial matches.If true, it returns an empty array when there are no matches and thesubset of results when there are partial matches.
	 *     decompress_definition: bool, // Specifies whether the included model definition should be returned as aJSON map (true) or in a custom compressed format (false).
	 *     exclude_generated: bool, // Indicates if certain fields should be removed from the configuration onretrieval. This allows the configuration to be in an acceptable format tobe retrieved and then added to another cluster.
	 *     from: int, // Skips the specified number of models.
	 *     include: string, // A comma delimited string of optional fields to include in the responsebody.
	 *     size: int, // Specifies the maximum number of models to obtain.
	 *     tags: string|array, // A comma delimited string of tags. A trained model can have many tags, ornone. When supplied, only trained models that contain all the suppliedtags are returned.
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
	public function getTrainedModels(string|array $model_id = null, array $params = []): Elasticsearch|Promise
	{
		$model_id = $this->convertValue($model_id);
		if (isset($model_id)) {
			$url = '/_ml/trained_models/' . $this->encode($model_id);
			$method = 'GET';
		} else {
			$url = "/_ml/trained_models";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'decompress_definition',
			'exclude_generated',
			'from',
			'include',
			'size',
			'tags',
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
	 * Retrieves usage information for trained models. You can get usage information for multiple trained
	 * models in a single API request by using a comma-separated list of model IDs or a wildcard expression.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-trained-models-stats.html
	 *
	 * @param string|array $model_id The unique identifier of the trained model or a model alias. It can be a
	 * comma-separated list or a wildcard expression.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:- Contains wildcard expressions and there are no models that match.- Contains the _all string or no identifiers and there are no matches.- Contains wildcard expressions and there are only partial matches.If true, it returns an empty array when there are no matches and thesubset of results when there are partial matches.
	 *     from: int, // Skips the specified number of models.
	 *     size: int, // Specifies the maximum number of models to obtain.
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
	public function getTrainedModelsStats(string|array $model_id = null, array $params = []): Elasticsearch|Promise
	{
		$model_id = $this->convertValue($model_id);
		if (isset($model_id)) {
			$url = '/_ml/trained_models/' . $this->encode($model_id) . '/_stats';
			$method = 'GET';
		} else {
			$url = "/_ml/trained_models/_stats";
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'from',
			'size',
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
	 * Evaluates a trained model.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/infer-trained-model.html
	 *
	 * @param string $model_id The unique identifier of the trained model.
	 * @param array|string $body The request body
	 * @param array{
	 *     timeout: string|integer, // Controls the amount of time to wait for inference results.
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
	public function inferTrainedModel(
		string $model_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_ml/trained_models/' . $this->encode($model_id) . '/_infer';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['timeout', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Opens one or more anomaly detection jobs.
	 * An anomaly detection job must be opened in order for it to be ready to
	 * receive and analyze data. It can be opened and closed multiple times
	 * throughout its lifecycle.
	 * When you open a new job, it starts with an empty model.
	 * When you open an existing job, the most recent model state is automatically
	 * loaded. The job is ready to resume its analysis from where it left off, once
	 * new data is received.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-open-job.html
	 *
	 * @param string $job_id Identifier for the anomaly detection job.
	 * @param array|string $body The request body
	 * @param array{
	 *     timeout: string|integer, // Controls the time to wait until a job has opened.
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
	public function openJob(string $job_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/anomaly_detectors/' . $this->encode($job_id) . '/_open';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['timeout', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Adds scheduled events to a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-post-calendar-event.html
	 *
	 * @param string $calendar_id A string that uniquely identifies a calendar.
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
	public function postCalendarEvents(
		string $calendar_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_ml/calendars/' . $this->encode($calendar_id) . '/events';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Previews the extracted features used by a data frame analytics config.
	 *
	 * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/preview-dfanalytics.html
	 *
	 * @param string $id Identifier for the data frame analytics job.
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
	public function previewDataFrameAnalytics(
		string $id = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($id)) {
			$url = '/_ml/data_frame/analytics/' . $this->encode($id) . '/_preview';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_ml/data_frame/analytics/_preview";
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
	 * Previews a datafeed.
	 * This API returns the first "page" of search results from a datafeed.
	 * You can preview an existing datafeed or provide configuration details for a datafeed
	 * and anomaly detection job in the API. The preview shows the structure of the data
	 * that will be passed to the anomaly detection engine.
	 * IMPORTANT: When Elasticsearch security features are enabled, the preview uses the credentials of the user that
	 * called the API. However, when the datafeed starts it uses the roles of the last user that created or updated the
	 * datafeed. To get a preview that accurately reflects the behavior of the datafeed, use the appropriate credentials.
	 * You can also use secondary authorization headers to supply the credentials.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-preview-datafeed.html
	 *
	 * @param string $datafeed_id A numerical character string that uniquely identifies the datafeed. This identifier can contain lowercase
	 * alphanumeric characters (a-z and 0-9), hyphens, and underscores. It must start and end with alphanumeric
	 * characters. NOTE: If you use this path parameter, you cannot provide datafeed or anomaly detection job
	 * configuration details in the request body.
	 * @param array|string $body The request body
	 * @param array{
	 *     start: string, // The start time from where the datafeed preview should begin
	 *     end: string, // The end time when the datafeed preview should stop
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
	public function previewDatafeed(
		string $datafeed_id = null,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		if (isset($datafeed_id)) {
			$url = '/_ml/datafeeds/' . $this->encode($datafeed_id) . '/_preview';
			$method = empty($body) ? 'GET' : 'POST';
		} else {
			$url = "/_ml/datafeeds/_preview";
			$method = empty($body) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['start', 'end', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Creates a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-calendar.html
	 *
	 * @param string $calendar_id A string that uniquely identifies a calendar.
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
	public function putCalendar(string $calendar_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/calendars/' . $this->encode($calendar_id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Adds an anomaly detection job to a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-calendar-job.html
	 *
	 * @param string $calendar_id A string that uniquely identifies a calendar.
	 * @param string|array $job_id An identifier for the anomaly detection jobs. It can be a job identifier, a group name, or a comma-separated list of jobs or groups.
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
	public function putCalendarJob(string $calendar_id, string|array $job_id, array $params = []): Elasticsearch|Promise
	{
		$job_id = $this->convertValue($job_id);
		$url = '/_ml/calendars/' . $this->encode($calendar_id) . '/jobs/' . $this->encode($job_id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Instantiates a data frame analytics job.
	 * This API creates a data frame analytics job that performs an analysis on the
	 * source indices and stores the outcome in a destination index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/{branch}/put-dfanalytics.html
	 *
	 * @param string $id Identifier for the data frame analytics job. This identifier can contain
	 * lowercase alphanumeric characters (a-z and 0-9), hyphens, and
	 * underscores. It must start and end with alphanumeric characters.
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
	public function putDataFrameAnalytics(string $id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/data_frame/analytics/' . $this->encode($id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Instantiates a datafeed.
	 * Datafeeds retrieve data from Elasticsearch for analysis by an anomaly detection job.
	 * You can associate only one datafeed with each anomaly detection job.
	 * The datafeed contains a query that runs at a defined interval (`frequency`).
	 * If you are concerned about delayed data, you can add a delay (`query_delay') at each interval.
	 * When Elasticsearch security features are enabled, your datafeed remembers which roles the user who created it had
	 * at the time of creation and runs the query using those same roles. If you provide secondary authorization headers,
	 * those credentials are used instead.
	 * You must use Kibana, this API, or the create anomaly detection jobs API to create a datafeed. Do not add a datafeed
	 * directly to the `.ml-config` index. Do not give users `write` privileges on the `.ml-config` index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-datafeed.html
	 *
	 * @param string $datafeed_id A numerical character string that uniquely identifies the datafeed.
	 * This identifier can contain lowercase alphanumeric characters (a-z and 0-9), hyphens, and underscores.
	 * It must start and end with alphanumeric characters.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If true, wildcard indices expressions that resolve into no concrete indices are ignored. This includes the `_all`string or when no indices are specified.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match. If the request can target data streams, this argument determineswhether wildcard expressions match hidden data streams. Supports comma-separated values.
	 *     ignore_throttled: bool, // If true, concrete, expanded, or aliased indices are ignored when frozen.
	 *     ignore_unavailable: bool, // If true, unavailable indices (missing or closed) are ignored.
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
	public function putDatafeed(string $datafeed_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/datafeeds/' . $this->encode($datafeed_id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'ignore_throttled',
			'ignore_unavailable',
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
	 * Instantiates a filter.
	 * A filter contains a list of strings. It can be used by one or more anomaly detection jobs.
	 * Specifically, filters are referenced in the `custom_rules` property of detector configuration objects.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-filter.html
	 *
	 * @param string $filter_id A string that uniquely identifies a filter.
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
	public function putFilter(string $filter_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/filters/' . $this->encode($filter_id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Instantiates an anomaly detection job. If you include a `datafeed_config`, you must have read index privileges on the source index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-job.html
	 *
	 * @param string $job_id The identifier for the anomaly detection job. This identifier can contain lowercase alphanumeric characters (a-z and 0-9), hyphens, and underscores. It must start and end with alphanumeric characters.
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
	public function putJob(string $job_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/anomaly_detectors/' . $this->encode($job_id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Enables you to supply a trained model that is not created by data frame analytics.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-models.html
	 *
	 * @param string $model_id The unique identifier of the trained model.
	 * @param array|string $body The request body
	 * @param array{
	 *     defer_definition_decompression: bool, // If set to `true` and a `compressed_definition` is provided,the request defers definition decompression and skips relevantvalidations.
	 *     wait_for_completion: bool, // Whether to wait for all child operations (e.g. model download)to complete.
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
	public function putTrainedModel(string $model_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/trained_models/' . $this->encode($model_id);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, [
			'defer_definition_decompression',
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
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Creates or updates a trained model alias. A trained model alias is a logical
	 * name used to reference a single trained model.
	 * You can use aliases instead of trained model identifiers to make it easier to
	 * reference your models. For example, you can use aliases in inference
	 * aggregations and processors.
	 * An alias must be unique and refer to only a single trained model. However,
	 * you can have multiple aliases for each trained model.
	 * If you use this API to update an alias such that it references a different
	 * trained model ID and the model uses a different type of data frame analytics,
	 * an error occurs. For example, this situation occurs if you have a trained
	 * model for regression analysis and a trained model for classification
	 * analysis; you cannot reassign an alias from one type of trained model to
	 * another.
	 * If you use this API to update an alias and there are very few input fields in
	 * common between the old and new trained models for the model alias, the API
	 * returns a warning.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-models-aliases.html
	 *
	 * @param string $model_alias The alias to create or update. This value cannot end in numbers.
	 * @param string $model_id The identifier for the trained model that the alias refers to.
	 * @param array{
	 *     reassign: bool, // Specifies whether the alias gets reassigned to the specified trainedmodel if it is already assigned to a different model. If the alias isalready assigned and this parameter is false, the API returns an error.
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
	public function putTrainedModelAlias(
		string $model_alias,
		string $model_id,
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_ml/trained_models/' . $this->encode($model_id) . '/model_aliases/' . $this->encode($model_alias);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['reassign', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Creates part of a trained model definition.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-model-definition-part.html
	 *
	 * @param string $model_id The unique identifier of the trained model.
	 * @param int $part The definition part number. When the definition is loaded for inference the definition parts are streamed in the
	 * order of their part number. The first part must be `0` and the final part must be `total_parts - 1`.
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
	public function putTrainedModelDefinitionPart(
		string $model_id,
		int $part,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_ml/trained_models/' . $this->encode($model_id) . '/definition/' . $this->encode($part);
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Creates a trained model vocabulary.
	 * This API is supported only for natural language processing (NLP) models.
	 * The vocabulary is stored in the index as described in `inference_config.*.vocabulary` of the trained model definition.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-model-vocabulary.html
	 *
	 * @param string $model_id The unique identifier of the trained model.
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
	public function putTrainedModelVocabulary(
		string $model_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_ml/trained_models/' . $this->encode($model_id) . '/vocabulary';
		$method = 'PUT';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Resets an anomaly detection job.
	 * All model state and results are deleted. The job is ready to start over as if
	 * it had just been created.
	 * It is not currently possible to reset multiple jobs using wildcards or a
	 * comma separated list.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-reset-job.html
	 *
	 * @param string $job_id The ID of the job to reset.
	 * @param array{
	 *     wait_for_completion: bool, // Should this request wait until the operation has completed beforereturning.
	 *     delete_user_annotations: bool, // Specifies whether annotations that have been added by theuser should be deleted along with any auto-generated annotations when the job isreset.
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
	public function resetJob(string $job_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/anomaly_detectors/' . $this->encode($job_id) . '/_reset';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'wait_for_completion',
			'delete_user_annotations',
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
	 * Starts a data frame analytics job.
	 * A data frame analytics job can be started and stopped multiple times
	 * throughout its lifecycle.
	 * If the destination index does not exist, it is created automatically the
	 * first time you start the data frame analytics job. The
	 * `index.number_of_shards` and `index.number_of_replicas` settings for the
	 * destination index are copied from the source index. If there are multiple
	 * source indices, the destination index copies the highest setting values. The
	 * mappings for the destination index are also copied from the source indices.
	 * If there are any mapping conflicts, the job fails to start.
	 * If the destination index exists, it is used as is. You can therefore set up
	 * the destination index in advance with custom settings and mappings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/start-dfanalytics.html
	 *
	 * @param string $id Identifier for the data frame analytics job. This identifier can contain
	 * lowercase alphanumeric characters (a-z and 0-9), hyphens, and
	 * underscores. It must start and end with alphanumeric characters.
	 * @param array{
	 *     timeout: string|integer, // Controls the amount of time to wait until the data frame analytics jobstarts.
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
	public function startDataFrameAnalytics(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/data_frame/analytics/' . $this->encode($id) . '/_start';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['timeout', 'pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Starts one or more datafeeds.
	 *
	 * A datafeed must be started in order to retrieve data from Elasticsearch. A datafeed can be started and stopped
	 * multiple times throughout its lifecycle.
	 *
	 * Before you can start a datafeed, the anomaly detection job must be open. Otherwise, an error occurs.
	 *
	 * If you restart a stopped datafeed, it continues processing input data from the next millisecond after it was stopped.
	 * If new data was indexed for that exact millisecond between stopping and starting, it will be ignored.
	 *
	 * When Elasticsearch security features are enabled, your datafeed remembers which roles the last user to create or
	 * update it had at the time of creation or update and runs the query using those same roles. If you provided secondary
	 * authorization headers when you created or updated the datafeed, those credentials are used instead.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-start-datafeed.html
	 *
	 * @param string $datafeed_id A numerical character string that uniquely identifies the datafeed. This identifier can contain lowercase
	 * alphanumeric characters (a-z and 0-9), hyphens, and underscores. It must start and end with alphanumeric
	 * characters.
	 * @param array|string $body The request body
	 * @param array{
	 *     end: string, // The time that the datafeed should end, which can be specified by using one of the following formats:* ISO 8601 format with milliseconds, for example `2017-01-22T06:00:00.000Z`* ISO 8601 format without milliseconds, for example `2017-01-22T06:00:00+00:00`* Milliseconds since the epoch, for example `1485061200000`Date-time arguments using either of the ISO 8601 formats must have a time zone designator, where `Z` is acceptedas an abbreviation for UTC time. When a URL is expected (for example, in browsers), the `+` used in time zonedesignators must be encoded as `%2B`.The end time value is exclusive. If you do not specify an end time, the datafeedruns continuously.
	 *     start: string, // The time that the datafeed should begin, which can be specified by using the same formats as the `end` parameter.This value is inclusive.If you do not specify a start time and the datafeed is associated with a new anomaly detection job, the analysisstarts from the earliest time for which data is available.If you restart a stopped datafeed and specify a start value that is earlier than the timestamp of the latestprocessed record, the datafeed continues from 1 millisecond after the timestamp of the latest processed record.
	 *     timeout: string|integer, // Specifies the amount of time to wait until a datafeed starts.
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
	public function startDatafeed(
		string $datafeed_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_ml/datafeeds/' . $this->encode($datafeed_id) . '/_start';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'end',
			'start',
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
	 * Starts a trained model deployment, which allocates the model to every machine learning node.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/start-trained-model-deployment.html
	 *
	 * @param string $model_id The unique identifier of the trained model. Currently, only PyTorch models are supported.
	 * @param array{
	 *     cache_size: int|string, // The inference cache size (in memory outside the JVM heap) per node for the model.The default value is the same size as the `model_size_bytes`. To disable the cache,`0b` can be provided.
	 *     deployment_id: string, // A unique identifier for the deployment of the model.
	 *     number_of_allocations: int, // The number of model allocations on each node where the model is deployed.All allocations on a node share the same copy of the model in memory but usea separate set of threads to evaluate the model.Increasing this value generally increases the throughput.If this setting is greater than the number of hardware threadsit will automatically be changed to a value less than the number of hardware threads.
	 *     priority: string, // The deployment priority.
	 *     queue_capacity: int, // Specifies the number of inference requests that are allowed in the queue. After the number of requests exceedsthis value, new requests are rejected with a 429 error.
	 *     threads_per_allocation: int, // Sets the number of threads used by each model allocation during inference. This generally increasesthe inference speed. The inference process is a compute-bound process; any numbergreater than the number of available hardware threads on the machine does not increase theinference speed. If this setting is greater than the number of hardware threadsit will automatically be changed to a value less than the number of hardware threads.
	 *     timeout: string|integer, // Specifies the amount of time to wait for the model to deploy.
	 *     wait_for: string, // Specifies the allocation status to wait for before returning.
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
	public function startTrainedModelDeployment(string $model_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/trained_models/' . $this->encode($model_id) . '/deployment/_start';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'cache_size',
			'deployment_id',
			'number_of_allocations',
			'priority',
			'queue_capacity',
			'threads_per_allocation',
			'timeout',
			'wait_for',
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
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Stops one or more data frame analytics jobs.
	 * A data frame analytics job can be started and stopped multiple times
	 * throughout its lifecycle.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/stop-dfanalytics.html
	 *
	 * @param string $id Identifier for the data frame analytics job. This identifier can contain
	 * lowercase alphanumeric characters (a-z and 0-9), hyphens, and
	 * underscores. It must start and end with alphanumeric characters.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:1. Contains wildcard expressions and there are no data frame analyticsjobs that match.2. Contains the _all string or no identifiers and there are no matches.3. Contains wildcard expressions and there are only partial matches.The default value is true, which returns an empty data_frame_analyticsarray when there are no matches and the subset of results when there arepartial matches. If this parameter is false, the request returns a 404status code when there are no matches or only partial matches.
	 *     force: bool, // If true, the data frame analytics job is stopped forcefully.
	 *     timeout: string|integer, // Controls the amount of time to wait until the data frame analytics jobstops. Defaults to 20 seconds.
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
	public function stopDataFrameAnalytics(string $id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/data_frame/analytics/' . $this->encode($id) . '/_stop';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'force',
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
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Stops one or more datafeeds.
	 * A datafeed that is stopped ceases to retrieve data from Elasticsearch. A datafeed can be started and stopped
	 * multiple times throughout its lifecycle.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-stop-datafeed.html
	 *
	 * @param string $datafeed_id Identifier for the datafeed. You can stop multiple datafeeds in a single API request by using a comma-separated
	 * list of datafeeds or a wildcard expression. You can close all datafeeds by using `_all` or by specifying `*` as
	 * the identifier.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request:* Contains wildcard expressions and there are no datafeeds that match.* Contains the `_all` string or no identifiers and there are no matches.* Contains wildcard expressions and there are only partial matches.If `true`, the API returns an empty datafeeds array when there are no matches and the subset of results whenthere are partial matches. If `false`, the API returns a 404 status code when there are no matches or onlypartial matches.
	 *     force: bool, // If `true`, the datafeed is stopped forcefully.
	 *     timeout: string|integer, // Specifies the amount of time to wait until a datafeed stops.
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
	public function stopDatafeed(string $datafeed_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/datafeeds/' . $this->encode($datafeed_id) . '/_stop';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'force',
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
	 * Stops a trained model deployment.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/stop-trained-model-deployment.html
	 *
	 * @param string $model_id The unique identifier of the trained model.
	 * @param array{
	 *     allow_no_match: bool, // Specifies what to do when the request: contains wildcard expressions and there are no deployments that match;contains the  `_all` string or no identifiers and there are no matches; or contains wildcard expressions andthere are only partial matches. By default, it returns an empty array when there are no matches and the subset of results when there are partial matches.If `false`, the request returns a 404 status code when there are no matches or only partial matches.
	 *     force: bool, // Forcefully stops the deployment, even if it is used by ingest pipelines. You can't use these pipelines until yourestart the model deployment.
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
	public function stopTrainedModelDeployment(string $model_id, array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/trained_models/' . $this->encode($model_id) . '/deployment/_stop';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_match',
			'force',
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
		return $this->client->sendRequest($this->createRequest($method, $url, $headers));
	}


	/**
	 * Updates an existing data frame analytics job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/update-dfanalytics.html
	 *
	 * @param string $id Identifier for the data frame analytics job. This identifier can contain
	 * lowercase alphanumeric characters (a-z and 0-9), hyphens, and
	 * underscores. It must start and end with alphanumeric characters.
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
	public function updateDataFrameAnalytics(
		string $id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_ml/data_frame/analytics/' . $this->encode($id) . '/_update';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates the properties of a datafeed.
	 * You must stop and start the datafeed for the changes to be applied.
	 * When Elasticsearch security features are enabled, your datafeed remembers which roles the user who updated it had at
	 * the time of the update and runs the query using those same roles. If you provide secondary authorization headers,
	 * those credentials are used instead.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-datafeed.html
	 *
	 * @param string $datafeed_id A numerical character string that uniquely identifies the datafeed.
	 * This identifier can contain lowercase alphanumeric characters (a-z and 0-9), hyphens, and underscores.
	 * It must start and end with alphanumeric characters.
	 * @param array|string $body The request body
	 * @param array{
	 *     allow_no_indices: bool, // If `true`, wildcard indices expressions that resolve into no concrete indices are ignored. This includes the`_all` string or when no indices are specified.
	 *     expand_wildcards: string|array, // Type of index that wildcard patterns can match. If the request can target data streams, this argument determineswhether wildcard expressions match hidden data streams. Supports comma-separated values. Valid values are:* `all`: Match any data stream or index, including hidden ones.* `closed`: Match closed, non-hidden indices. Also matches any non-hidden data stream. Data streams cannot be closed.* `hidden`: Match hidden data streams and hidden indices. Must be combined with `open`, `closed`, or both.* `none`: Wildcard patterns are not accepted.* `open`: Match open, non-hidden indices. Also matches any non-hidden data stream.
	 *     ignore_throttled: bool, // If `true`, concrete, expanded or aliased indices are ignored when frozen.
	 *     ignore_unavailable: bool, // If `true`, unavailable indices (missing or closed) are ignored.
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
	public function updateDatafeed(
		string $datafeed_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_ml/datafeeds/' . $this->encode($datafeed_id) . '/_update';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'allow_no_indices',
			'expand_wildcards',
			'ignore_throttled',
			'ignore_unavailable',
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
	 * Updates the description of a filter, adds items, or removes items from the list.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-filter.html
	 *
	 * @param string $filter_id A string that uniquely identifies a filter.
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
	public function updateFilter(string $filter_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/filters/' . $this->encode($filter_id) . '/_update';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Updates certain properties of an anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-job.html
	 *
	 * @param string $job_id Identifier for the job.
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
	public function updateJob(string $job_id, array|string $body = [], array $params = []): Elasticsearch|Promise
	{
		$url = '/_ml/anomaly_detectors/' . $this->encode($job_id) . '/_update';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, ['pretty', 'human', 'error_trace', 'source', 'filter_path']);
		$headers = [
		    'Accept' => 'application/json',
		    'Content-Type' => 'application/json'
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $body));
	}


	/**
	 * Starts a trained model deployment, which allocates the model to every machine learning node.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/update-trained-model-deployment.html
	 *
	 * @param string $model_id The unique identifier of the trained model. Currently, only PyTorch models are supported.
	 * @param array|string $body The request body
	 * @param array{
	 *     number_of_allocations: int, // The number of model allocations on each node where the model is deployed.All allocations on a node share the same copy of the model in memory but usea separate set of threads to evaluate the model.Increasing this value generally increases the throughput.If this setting is greater than the number of hardware threadsit will automatically be changed to a value less than the number of hardware threads.
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
	public function updateTrainedModelDeployment(
		string $model_id,
		array|string $body = [],
		array $params = [],
	): Elasticsearch|Promise
	{
		$url = '/_ml/trained_models/' . $this->encode($model_id) . '/deployment/_update';
		$method = 'POST';
		$url = $this->addQueryString($url, $params, [
			'number_of_allocations',
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
