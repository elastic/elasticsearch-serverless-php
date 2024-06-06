# Elasticsearch Serverless Client

[![main](https://github.com/elastic/elasticsearch-serverless-php/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/elastic/elasticsearch-serverless-php/actions/workflows/tests.yml)

This is the official Elastic client for the **Elasticsearch Serverless** service.

If you're looking to develop your PHP application with the Elasticsearch Stack,
you should look at the [Elasticsearch Client](https://github.com/elastic/elasticsearch-php) instead.

## Installation

You can install the library using [composer](https://getcomposer.org/) with the following command:

```bash
composer require elastic/elasticsearch-serverless
```

You need specify the version, if you want to install an `alpha` or `rc` release.
For instance, if you want to install the latest alpha version:

```bash
composer require elastic/elasticsearch-serverless:*@alpha
```

Please remember that `alpha` releases are quite unstable, the code can change between releases.
Instead, a release candidate `rc` will not break the backward compatibility. Typically an `rc`
version includes only bug fixes.

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