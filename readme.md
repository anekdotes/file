# Anekdotes File

[![Latest Stable Version](https://poser.pugx.org/anekdotes/file/v/stable)](https://packagist.org/packages/anekdotes/file)
[![Build Status](https://travis-ci.org/anekdotes/file.svg?branch=master)](https://travis-ci.org/anekdotes/file)
[![codecov.io](https://codecov.io/gh/anekdotes/file/branch/master/graph/badge.svg)](https://codecov.io/github/anekdotes/file?branch=master)
[![StyleCI](https://styleci.io/repos/54150642/shield?style=flat)](https://styleci.io/repos/54150642)
[![License](https://poser.pugx.org/anekdotes/file/license)](https://packagist.org/packages/anekdotes/file)
[![Total Downloads](https://poser.pugx.org/anekdotes/file/downloads)](https://packagist.org/packages/anekdotes/file)

A library that provides an easy way to manipulate file for common use like move,rename etc.

## Installation

Install via composer into your project:

```
composer require anekdotes/file
```

## Usage

Use the class where ever you need it:

```
use Anekdotes\Manager\File;
```

### Methods

Multiple methods are availables:

#### get

Get the content of a file.

* **$path**: path of the file
* **$default**: closure or string

```
    File::get($path, $default = null);
```

#### exists

Check if file exists.

* **$path**: path of the file

```
    File::exists($path)
```
#### Put

Create a new file.

* **$path**: path of the desired file location
* **$contents**: content of the file

```
    File::put($path, $contents)
```

#### size

Get the file size in bytes.

* **$path**: path of the file

```
size($path)
```

#### delete

Delete a file.

* **$path**: path of the file

```
delete($path)
```

#### move

Move/rename a file.

* **$path**: path of the file to move
* **$target**: target of the file

```
move($path, $target)
```

#### copy

Copy a file.

* **$path**: path of the file to copy
* **$target**: target of the file

```
copy($path, $target)
```

#### extension

Get the file extension.

* **$path**: path of the file

```
extension($path)
```

#### isDirectory

Check if path is a directory.

* **$path**: path of the directory

```
isDirectory($directory)
```

#### directories

Returns an array of all folders inside a directory

* **$path**: path of the directory

```
directories($path)
```

#### files

Returns an array of all files inside a directory

* **$directory**: path of the directory

```
files($directory)
```

#### isFile

Check if path is a file.

* **$path**: path of the file

```
isFile($file)
```

#### makeDirectory

Create a directory.

* **$path**: desired path
* **$mode**: folder mod

```
makeDirectory($path, $mode = 0777)
```

#### deleteDirectory

Delete a directory.

* **$directory**: path of directory

```
deleteDirectory($directory)
```
