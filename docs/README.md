# CSS & JS Minify
[<img src="https://img.shields.io/packagist/dt/seekgeeks/cssjsminify.svg">]()
[<img src="https://img.shields.io/packagist/v/seekgeeks/cssjsminify.svg">]()

CSS & JS minify is compact function abstracted on another awesome package *matthiasmullie/minify*. This library provides a universal abstraction where you can use this function for both css and js file and we have added additional feature by which you can automate all stuff, remove duplication and stay updated.

## Requirement ##
- PHP Package : matthiasmullie/minify, will be updated automatically.
- PHP version : 7 (Recomended)
- PHP cli

## Installation ##

You can use **Composer** or simply **Download the Release**

### Composer

The preferred method is via [composer](https://getcomposer.org). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have
composer installed.

Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require seekgeeks/cssjsminify
```

Finally, be sure to include the autoloader:

```php
require_once '/path/to/your-project/vendor/autoload.php';
```

### Download the Release

If you abhor using composer, you can download the package in its entirety. Download the zip/rar file for a package including this library and its dependencies.

Uncompress the zip file you download, and include the autoloader in your project:

```php
require_once '/path/to/seekgeeks/cssjsminify/vendor/autoload.php';
```


## How it works? ##
Using this library along with maintaining is super easy. You can just do following to minify your files

```sh
php path/to/file/autominify.php

```
This will automatically pick files from pre-configured source directory, and will create a directory if not exists say `min/` inside that to place minified files.
It will initiate minification only once the source file is modified within given timespan.

### Example 
Suppose your source file is
```
asset/css/style.css
```

Your destination file will be

```
asset/css/min/style.css
```
