<?php namespace Anekdotes\File;

class File {

  public static function get($path, $default = null) {
    $default = $default instanceof Closure ? $default() : $default;
    return (file_exists($path)) ? file_get_contents($path) : $default;
  }

  public static function exists($path) {
    return file_exists($path);
  }

  public static function put($path, $contents) {
    return file_put_contents($path, $contents);
  }

  public static function delete($path) {
    return unlink($path);
  }

  public static function move($path, $target) {
    return rename($path, $target);
  }

  public static function copy($path, $target) {
    return copy($path, $target);
  }

  public static function extension($path) {
    return pathinfo($path, PATHINFO_EXTENSION);
  }

  public static function isDirectory($directory) {
    return is_dir($directory);
  }

  public static function directories($path){
    return glob($path . "*" , GLOB_ONLYDIR);
  }

  public static function files($directory){
    $glob = glob($directory . '/*');

    if ($glob === false)
      return array();

    return array_filter($glob, function($file){
      return filetype($file) == 'file';
    });
  }

  public static function isFile($file) {
    return is_file($file);
  }

  public static function glob($pattern, $flags = 0) {
    return glob($pattern, $flags);
  }

  public static function makeDirectory($path, $mode = 0777, $recursive = false) {
    return mkdir($path, $mode, $recursive);
  }

  public static function deleteDirectory($directory, $preserve = false) {
    if ( ! self::isDirectory($directory)) return false;

    $items = new \FilesystemIterator($directory);
    foreach ($items as $item) {
      if ($item->isDir()) {
        self::deleteDirectory($item->getPathname());
      } else {
        self::delete($item->getPathname());
      }
    }

    if ( ! $preserve) @rmdir($directory);
    return true;
  }


}
