# Bootstream

[![Latest Stable Version](https://poser.pugx.org/ipimpat/bootstream/v)](https://packagist.org/packages/ipimpat/bootstream)
[![Total Downloads](https://poser.pugx.org/ipimpat/bootstream/downloads)](https://packagist.org/packages/ipimpat/bootstream)
[![License](https://poser.pugx.org/ipimpat/bootstream/license)](https://packagist.org/packages/ipimpat/bootstream)

## Description

Bootstream is a package for Laravel 9 and 10 that replaces Laravel Jetstream's TailwindCSS based Inertia stack with a Bootstrap 5.2 based Inertia stack.

## Table of Content

  * [Installation](#installation)
    + [Install Jetstream with Inertia](#install-jetstream-with-inertia)
    + [Install Bootstream](#install-bootstream)
    + [Finalizing the Installation](#finalizing-the-installation)
  * [Testing](#testing)
  * [License](#license)

## Installation

This package only supports Jetstream with [Inertia](https://jetstream.laravel.com/2.x/stacks/inertia.html).

> It is important you install and configure [Laravel Jetstream](https://github.com/laravel/jetstream) with the Inertia stack before performing the installation.

You are highly encouraged to read through the entire documentation of [Jetstream](https://jetstream.laravel.com)
before beginning your Bootstream project.

### Install Jetstream with Inertia

You may use Composer to install Jetstream into your new Laravel project:

```bash
composer require laravel/jetstream
```

After installing the Jetstream package, you may use the `jetstream:install` command to install Jetstream With Inertia:

```bash
php artisan jetstream:install inertia

php artisan jetstream:install inertia --teams
```

### Install Bootstream

You may use Composer to install Bootstream into your new Laravel project as dev dependency:

```bash
composer require ipimpat/bootstream --dev
```

The Bootstream install command are very similar to that of Jetstream.

In addition, you may use the `--teams` switch to install team assets just like you would in Jetstream:

```bash
php artisan bootstream:install

php artisan bootstream:install --teams
```

### Finalizing the Installation

After installing Bootstream, install and build your NPM dependencies:

```
npm install
npm run build
php artisan migrate
```

## Testing

Run the tests with:

```bash
vendor/bin/phpunit
```

or

```bash
composer tests
```

## Credit

 - [Jetstrap](https://github.com/nascent-africa/jetstrap)
 - [Laravel Jetstream](https://jetstream.laravel.com)

## License

Bootstream is open-sourced software licensed under the [MIT license](https://github.com/ipimpat/bootstream/blob/master/LICENSE).
