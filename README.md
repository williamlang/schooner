# Introduction

Schooner Dice by William Lang

Note that PHP 8.0 doesn't have enums, so I made due with other options.

## Instructions

### Install PHP

#### Mac

Using `homebrew`

`brew install php@8.0`

https://formulae.brew.sh/formula/php@8.0

#### Linux (Debian)

`sudo apt-get install php`

#### Linux (CentOS)

`yum install php`

### Install Composer (Package Manager)

https://getcomposer.org/download/

`php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`

`php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"`

`php composer-setup.php`

`php -r "unlink('composer-setup.php');"`

### Run Composer

`composer.phar install`

### Run code

`php schooner.php schooner:score ONES 1 1 1 1 1`

`php schooner.php schooner:top-category 1 1 1 1 1`

### Run Tests

`vendor/bin/phpunit src/test/`