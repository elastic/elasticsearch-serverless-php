# Elasticsearch Serverless Client

[![main](https://github.com/elastic/elasticsearch-serverless-php/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/elastic/elasticsearch-serverless-php/actions/workflows/tests.yml)

This is the official Elastic client for the **Elasticsearch Serverless** service. If you're looking to develop your PHP application with the Elasticsearch Stack, you should look at the [Elasticsearch Client](https://github.com/elastic/elasticsearch-php) instead. If you're looking to develop your PHP application with Elastic Enterprise Search, you should look at the [Enterprise Search Client](https://github.com/elastic/enterprise-search-php/).

## Installation

You can install the library using [composer](https://getcomposer.org/) with the following command:

```bash
composer require elastic/elasticsearch-serverless
```

### Instantiate a Client

When you have installed elasticsearch-php you can start using it with the `Client`` class.
You can use the ClientBuilder class to create this object:

```php
require 'vendor/autoload.php';

use Elastic\Elasticsearch\Serverless\ClientBuilder;

$client = ClientBuilder::create()
  ->setEndpoint('<elasticsearch-endpoint>')
  ->setApiKey('<api-key>')
  ->build();

# $client is an object of Elastic\Elasticsearch\Serverless\Client class
```


### Usage

You can read to the [official documentation]() 
page for a getting started guide.

## Development

See [CONTRIBUTING](./CONTRIBUTING.md).

### Docs

Some questions, assumptions and general notes about this project can be found in [the docs directory](./docs/questions-and-assumptions.md).

## License 📗

[MIT](LICENSE) © [Elastic](https://www.elastic.co/)