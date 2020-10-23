# WordPress Build

A nice little WordPress starter build.

## Requirements

- Node ^12.19.0
- Yarn ^1.22.5
- Local ^5.8.2

## Getting Started

1.  Add a new site in Local and click `Open Site Shell`

2.  Install the project dependencies

        yarn

## VSCode

VSCode users are encouraged to install the following extensions:

* PHP Intelephense
* PHP-CS-Fixer
* phpcs
* Prettier - Code formatter

And add the following settings:

```json
{
  "php.validate.executablePath": "/your/path/to/php",
  "php.suggest.basic": false,
  "phpcs.executablePath": "./vendor/bin/phpcs",
  "phpcs.standard": "./phpcs.xml",
  "php-cs-fixer.executable": "./vendor/bin/php-cs-fixer",
  "php-cs-fixer.configFile": "./.php_cs",
  "php-cs-fixer.onSave": true
}
```
