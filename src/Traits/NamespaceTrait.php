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

namespace Elastic\Elasticsearch\Serverless\Traits;

use Elastic\Elasticsearch\Serverless\Endpoints\AsyncSearch;
use Elastic\Elasticsearch\Serverless\Endpoints\Cat;
use Elastic\Elasticsearch\Serverless\Endpoints\Cluster;
use Elastic\Elasticsearch\Serverless\Endpoints\Connector;
use Elastic\Elasticsearch\Serverless\Endpoints\Enrich;
use Elastic\Elasticsearch\Serverless\Endpoints\Eql;
use Elastic\Elasticsearch\Serverless\Endpoints\Graph;
use Elastic\Elasticsearch\Serverless\Endpoints\Indices;
use Elastic\Elasticsearch\Serverless\Endpoints\Inference;
use Elastic\Elasticsearch\Serverless\Endpoints\Ingest;
use Elastic\Elasticsearch\Serverless\Endpoints\License;
use Elastic\Elasticsearch\Serverless\Endpoints\Logstash;
use Elastic\Elasticsearch\Serverless\Endpoints\Ml;
use Elastic\Elasticsearch\Serverless\Endpoints\QueryRules;
use Elastic\Elasticsearch\Serverless\Endpoints\SearchApplication;
use Elastic\Elasticsearch\Serverless\Endpoints\Security;
use Elastic\Elasticsearch\Serverless\Endpoints\Sql;
use Elastic\Elasticsearch\Serverless\Endpoints\Synonyms;
use Elastic\Elasticsearch\Serverless\Endpoints\Tasks;
use Elastic\Elasticsearch\Serverless\Endpoints\Transform;

/**
 * @generated This file is generated, please do not edit
 */
trait NamespaceTrait
{
	/** The endpoint namespace storage */
	protected array $namespace;


	public function asyncSearch(): AsyncSearch
	{
		if (!isset($this->namespace['AsyncSearch'])) {
			$this->namespace['AsyncSearch'] = new AsyncSearch($this);
		}
		return $this->namespace['AsyncSearch'];
	}


	public function cat(): Cat
	{
		if (!isset($this->namespace['Cat'])) {
			$this->namespace['Cat'] = new Cat($this);
		}
		return $this->namespace['Cat'];
	}


	public function cluster(): Cluster
	{
		if (!isset($this->namespace['Cluster'])) {
			$this->namespace['Cluster'] = new Cluster($this);
		}
		return $this->namespace['Cluster'];
	}


	public function connector(): Connector
	{
		if (!isset($this->namespace['Connector'])) {
			$this->namespace['Connector'] = new Connector($this);
		}
		return $this->namespace['Connector'];
	}


	public function enrich(): Enrich
	{
		if (!isset($this->namespace['Enrich'])) {
			$this->namespace['Enrich'] = new Enrich($this);
		}
		return $this->namespace['Enrich'];
	}


	public function eql(): Eql
	{
		if (!isset($this->namespace['Eql'])) {
			$this->namespace['Eql'] = new Eql($this);
		}
		return $this->namespace['Eql'];
	}


	public function graph(): Graph
	{
		if (!isset($this->namespace['Graph'])) {
			$this->namespace['Graph'] = new Graph($this);
		}
		return $this->namespace['Graph'];
	}


	public function indices(): Indices
	{
		if (!isset($this->namespace['Indices'])) {
			$this->namespace['Indices'] = new Indices($this);
		}
		return $this->namespace['Indices'];
	}


	public function inference(): Inference
	{
		if (!isset($this->namespace['Inference'])) {
			$this->namespace['Inference'] = new Inference($this);
		}
		return $this->namespace['Inference'];
	}


	public function ingest(): Ingest
	{
		if (!isset($this->namespace['Ingest'])) {
			$this->namespace['Ingest'] = new Ingest($this);
		}
		return $this->namespace['Ingest'];
	}


	public function license(): License
	{
		if (!isset($this->namespace['License'])) {
			$this->namespace['License'] = new License($this);
		}
		return $this->namespace['License'];
	}


	public function logstash(): Logstash
	{
		if (!isset($this->namespace['Logstash'])) {
			$this->namespace['Logstash'] = new Logstash($this);
		}
		return $this->namespace['Logstash'];
	}


	public function ml(): Ml
	{
		if (!isset($this->namespace['Ml'])) {
			$this->namespace['Ml'] = new Ml($this);
		}
		return $this->namespace['Ml'];
	}


	public function queryRules(): QueryRules
	{
		if (!isset($this->namespace['QueryRules'])) {
			$this->namespace['QueryRules'] = new QueryRules($this);
		}
		return $this->namespace['QueryRules'];
	}


	public function searchApplication(): SearchApplication
	{
		if (!isset($this->namespace['SearchApplication'])) {
			$this->namespace['SearchApplication'] = new SearchApplication($this);
		}
		return $this->namespace['SearchApplication'];
	}


	public function security(): Security
	{
		if (!isset($this->namespace['Security'])) {
			$this->namespace['Security'] = new Security($this);
		}
		return $this->namespace['Security'];
	}


	public function sql(): Sql
	{
		if (!isset($this->namespace['Sql'])) {
			$this->namespace['Sql'] = new Sql($this);
		}
		return $this->namespace['Sql'];
	}


	public function synonyms(): Synonyms
	{
		if (!isset($this->namespace['Synonyms'])) {
			$this->namespace['Synonyms'] = new Synonyms($this);
		}
		return $this->namespace['Synonyms'];
	}


	public function tasks(): Tasks
	{
		if (!isset($this->namespace['Tasks'])) {
			$this->namespace['Tasks'] = new Tasks($this);
		}
		return $this->namespace['Tasks'];
	}


	public function transform(): Transform
	{
		if (!isset($this->namespace['Transform'])) {
			$this->namespace['Transform'] = new Transform($this);
		}
		return $this->namespace['Transform'];
	}
}
