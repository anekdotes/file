# Anekdotes File

[![Latest Stable Version](https://poser.pugx.org/anekdotes/file/v/stable)](https://packagist.org/packages/anekdotes/file)
[![Build Status](https://travis-ci.org/anekdotes/file.svg?branch=master)](https://travis-ci.org/anekdotes/file)
[![StyleCI](https://styleci.io/repos/54150642/shield?style=flat)](https://styleci.io/repos/54150642)
[![License](https://poser.pugx.org/anekdotes/file/license)](https://packagist.org/packages/anekdotes/file)
[![Total Downloads](https://poser.pugx.org/anekdotes/file/downloads)](https://packagist.org/packages/anekdotes/file)

A library that provides an easy way to manipulate files for common uses such as move, rename etc.

## Installation

Install via composer into your project:

```
composer require anekdotes/file
```

## Usage

Use the class where ever you need it:

```php
use Anekdotes\File\File;
```

Note : This requires autoloading namespaces. Using composer to do autoloading helps a lot.

### Methods

Multiple static methods are available:

#### get

Get the content of a file.

* **$path**: path of the file
* **$default**: closure or string

```php
File::get($path, $default = null);
```

#### exists

Check if file exists.

* **$path**: path of the file

```php
File::exists($path)
```
#### Put

Create a new file.

* **$path**: path of the desired file location
* **$contents**: content of the file

```php
File::put($path, $contents)
```

#### size

Get the file size in bytes.

* **$path**: path of the file

```php
File::size($path)
```

#### delete

Delete a file.

* **$path**: path of the file

```php
File::delete($path)
```

#### move

Move/rename a file.

* **$path**: path of the file to move
* **$target**: target of the file

```php
File::move($path, $target)
```

#### copy

Copy a file.

* **$path**: path of the file to copy
* **$target**: target of the file

```php
File::copy($path, $target)
```

#### extension

Get the file extension.

* **$path**: path of the file

```
File::extension($path)
```php

#### isDirectory

Check if path is a directory.

* **$path**: path of the directory

```php
isDirectory($directory)
```

#### glob

Returns an array of all files/folder inside a directory

* **$path**: path of the directory

```php
File::glob($path)
```

#### directories

Returns an array of all folders inside a directory

* **$path**: path of the directory

```php
File::directories($path)
```

#### files

Returns an array of all files inside a directory

* **$directory**: path of the directory

```php
File::files($directory)
```

#### isFile

Check if path is a file.

* **$path**: path of the file

```php
File::isFile($file)
```

#### makeDirectory

Create a directory.

* **$path**: desired path
* **$mode**: folder mod

```php
File::makeDirectory($path, $mode = 0777)
```

#### deleteDirectory

Delete a directory.

* **$directory**: path of directory

```php
File::deleteDirectory($directory)
```
