# Elasticsearch Serverless Client

[![main](https://github.com/elastic/elasticsearch-serverless-php/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/elastic/elasticsearch-serverless-php/actions/workflows/tests.yml)

> [!WARNING]
> Starting with the release of the Elastic Stack 9.0.0, this client will be discontinued. Instead, you can use the latest version of the [Elasticsearch PHP Client](https://github.com/elastic/elasticsearch-php) to build your Elasticsearch Serverless PHP applications.

This is the official Elastic client for the [Elasticsearch Cloud Serverless](https://www.elastic.co/elasticsearch/serverless).

If you're looking to develop your PHP application with the Elasticsearch Stack,
you should look at the [Elasticsearch Client](https://github.com/elastic/elasticsearch-php) instead.

## Installation

You can install the library using [composer](https://getcomposer.org/) with the following command:

```bash
composer require elastic/elasticsearch-serverless
```

### Instantiate the client

When you have installed elasticsearch-php you can start using it with the `Client` class.
You can use the `ClientBuilder` to create this object:

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

You can read to the [official documentation](https://docs.elastic.co/serverless/elasticsearch/php-client-getting-started) 
page for a getting started guide.

## Development

See [CONTRIBUTING](./CONTRIBUTING.md).

## License 📗

[MIT](LICENSE) © [Elastic](https://www.elastic.co/)