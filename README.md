# PhpSpec Multi-Formatter

A library that acts as a facade for two other PhpSpec formatters.  Primarily intended for use on Continuous Integration
servers.  Allows you to use the 'dot formatter' and output a JUnit XML file in a single test run.

## Use

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
