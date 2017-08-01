# PhpSpec Multi-Formatter

A library that acts as a facade for two other PhpSpec formatters.  Primarily intended for use on Continuous Integration
servers.  Allows you to use the 'dot formatter' and output a JUnit XML file in a single test run.

## State of Development

In alpha.  Sort of works.  Development/testing ongoing.  Contributions welcome.

## Use

Requires PhpSpec 4 and PHP 7.

```bash
composer require --dev sam-burns/phpspec-multi-formatter 
```

In your `phpspec.yml` file:

```yaml
extensions:
    "SamBurns\\PhpSpecMultiFormatter\\Extension":
        file: 'spec/junit.xml'
```

Running PhpSpec with the multi-formatter:

```bash
./vendor/bin/phpspec run --format=multiformatter
```

## Development

Clone the repository and run Composer.

Run the following command from the project root:

```bash
./vendor/bin/phpspec r -c test/sampleapp/phpspec.yml --format=multiformatter
```

It should create a file called `./test/sampleapp/spec/junit-output/junit.xml` and do 'dot formatter' output at the same
time.  If it does, then you haven't broken anything.
