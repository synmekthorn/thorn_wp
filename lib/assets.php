<?php

namespace Synmek\Thorn\Assets;

/**
 * JsonManifest
 * 
 * Reads the generated asset manifest file and retrieves hashed asset paths.
 */
class JsonManifest {
  private $manifest;

  public function __construct($manifest_path) {
    if (file_exists($manifest_path)) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
    } else {
      $this->manifest = [];
    }
  }

  /**
   * Get the full manifest array
   */
  public function get() {
    return $this->manifest;
  }

  /**
   * Get the path of a specific asset from the manifest
   */
  public function getPath($key = '', $default = null) {
    $collection = $this->manifest;

    if (is_null($key)) {
      return $collection;
    }

    if (isset($collection[$key])) {
      return $collection[$key];
    }

    foreach (explode('.', $key) as $segment) {
      if (!isset($collection[$segment])) {
        return $default;
      }
      $collection = $collection[$segment];
    }

    return $collection;
  }
}

/**
 * Returns the full URI to an asset in the /dist directory
 *
 * If the asset is in the manifest file, it returns the hashed filename.
 * Otherwise, it falls back to a direct reference.
 *
 * @param string $filename
 * @return string
 */
function asset_path($filename) {
  $dist_path = get_template_directory_uri() . '/dist/';
  $directory = dirname($filename) . '/';
  $file = basename($filename);
  static $manifest;

  if (empty($manifest)) {
    $manifest_path = get_template_directory() . '/dist/assets.json';
    $manifest = new JsonManifest($manifest_path);
  }

  if (array_key_exists($file, $manifest->get())) {
    return $dist_path . $directory . $manifest->get()[$file];
  }

  return $dist_path . $directory . $file;
}