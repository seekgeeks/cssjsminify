# CSS & JS Minify
[<img src="https://img.shields.io/packagist/dt/seekgeeks/cssjsminify.svg">]()
[<img src="https://img.shields.io/packagist/v/seekgeeks/cssjsminify.svg">]()

CSS & JS minify is compact function abstracted on another awesome package *matthiasmullie/minify*. This library provides a universal abstraction where you can use this function for both css and js file and we have added additional feature by which you can automate all stuff, remove duplication and stay updated.

## Requirement
- PHP Package : matthiasmullie/minify, will be updated automatically.
- PHP version : 7 (Recomended)
- PHP cli

## Installation
- Install through composer using
```
composer require seekgeeks/cssjsminify
```
This will update the required dependencies automatically.

- You can also download the .rar file and extract it to /third/party/directory.

## How it works?
Using this library along with maintaining is super easy. You can just do following to minify your files

```
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
