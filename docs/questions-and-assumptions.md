# Questions and assumptions

## Initial questions

### Do we have a specification?

We're using the [elasticsearch-specification](https://github.com/elastic/elasticsearch-specification/) and the availability tag in our generators to generate the APIs for Elasticsearch Serverless.

### How do we test against a running server?

We are currently testing against a QA serverless instance, recording the requests in tests with [VCR](https://github.com/vcr/vcr/). We want to automate the testing against serverless eventually.

### YAML Tests

The Elasticsearch team is working on YAML tests. Enrico proposed we could maintain our own set of lighter YAML tests for Serverless clients since the API will be smaller. This way we wouldn't need to worry about the cleanup phase and all the errors it produces, and we wouldn't need to be on top of the changes in the Java code to understand how to run our integration tests.

### What Namespace should I use?


## Docs

One of the outcomes of this work is coordinating with the docs team to create doc books for this client and tie that up together with the docs infra.

There's been talk about hosting our own reference docs, in the way Ruby doc does (see e.g.: [elasticsearch](https://rubydoc.info/gems/elasticsearch)) as far as I understand.

## Assumptions

### Assumption: Regarding implementation of libraries:

In the Elasticsearch Ruby Client, `elasticsearch` and `elasticsearch-api` are two separate libraries. The whole client is `elasticsearch`, which requires `elasticsearch-api` (the generated API code). But you can also use `elasticsearch-api` as a library on its own in your code. Josh told me in JS it's all just one package. I see why it could make sense when it was built to have these separated in the Ruby client, but for Serverless, I'm going to assume we want to have just the one library which includes the client and the API generated code. At least that's how I'll build the prototype now and we can refactor for a different approach in the future.

## Notes

### Code generation

The code is being generated with [client-generator-ruby](https://github.com/elastic/elastic-client-generator-ruby) with the [elasticsearch-specification](https://github.com/elastic/elasticsearch-specification/) and the availability tag.

There's a pending task in `elastic-transport` to add a namespace for utils, such as `api/utils` and `api/response` to avoid the duplication of a couple of classes (which are also being duplicated in Enterprise Search Ruby).
