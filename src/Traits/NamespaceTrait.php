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
use Elastic\Elasticsearch\Serverless\Endpoints\Enrich;
use Elastic\Elasticsearch\Serverless\Endpoints\Graph;
use Elastic\Elasticsearch\Serverless\Endpoints\Indices;
use Elastic\Elasticsearch\Serverless\Endpoints\Ingest;
use Elastic\Elasticsearch\Serverless\Endpoints\Logstash;
use Elastic\Elasticsearch\Serverless\Endpoints\Ml;
use Elastic\Elasticsearch\Serverless\Endpoints\SearchApplication;
use Elastic\Elasticsearch\Serverless\Endpoints\Security;
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


	public function enrich(): Enrich
	{
		if (!isset($this->namespace['Enrich'])) {
			$this->namespace['Enrich'] = new Enrich($this);
		}
		return $this->namespace['Enrich'];
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


	public function ingest(): Ingest
	{
		if (!isset($this->namespace['Ingest'])) {
			$this->namespace['Ingest'] = new Ingest($this);
		}
		return $this->namespace['Ingest'];
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


	public function transform(): Transform
	{
		if (!isset($this->namespace['Transform'])) {
			$this->namespace['Transform'] = new Transform($this);
		}
		return $this->namespace['Transform'];
	}
}
