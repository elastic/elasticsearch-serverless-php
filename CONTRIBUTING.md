## Contribute 🚀

We welcome contributors to the project. Before you begin, some useful info...

+ If you want to contribute to this project you need to subscribe to a 
  [Contributor Agreement](https://www.elastic.co/contributor-agreement).
+ Before opening a pull request, please create an issue to 
  [discuss the scope of your proposal](https://github.com/elastic/elasticsearch-serverless-php/issues).
+ If you want to send a PR for version `8.0` please use the `8.0` branch, for 
  `8.1` use the `8.1` branch and so on. 
+ Never send PR to `master` unless you want to contribute to the development 
  version of the client (`master` represents the next major version).
+ Each PR should include a **unit test** using [PHPUnit](https://phpunit.de/). 
  If you are not familiar with PHPUnit you can have a look at the 
  [reference](https://phpunit.readthedocs.io/en/9.5/). 

## Testing

To execute the tests, you can use the following command:

```bash
composer run-script test
```

We also use [PHPStan](https://phpstan.org/) for code static analysis.
Please remember to run this command before sending the PR:

```bash
composer run-script phpstan
```

Thanks in advance for your contribution! :heart:
