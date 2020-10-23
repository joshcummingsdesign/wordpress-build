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

* [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)
* [PHP-CS-Fixer](https://marketplace.visualstudio.com/items?itemName=junstyle.php-cs-fixer)
* [phpcs](https://marketplace.visualstudio.com/items?itemName=ikappas.phpcs)
* [Prettier - Code formatter](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)

And add the following settings:

```json
{
  "php.suggest.basic": false,
  "php.validate.executablePath": "/your/path/to/php",
  "phpcs.executablePath": "./vendor/bin/phpcs",
  "phpcs.standard": "./phpcs.xml",
  "php-cs-fixer.executable": "./vendor/bin/php-cs-fixer",
  "php-cs-fixer.configFile": "./.php_cs",
}
```
