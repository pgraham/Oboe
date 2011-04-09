<?php
/**
 * =============================================================================
 * Copyright (c) 2010, Philip Graham
 * All rights reserved.
 *
 * This file is part of Oboe and is licensed by the Copyright holder under the
 * 3-clause BSD License.  The full text of the license can be found in the
 * LICENSE.txt file included in the root directory of this distribution or at
 * the link below.
 * =============================================================================
 *
 * @license http://www.opensource.org/licenses/bsd-license.php
 */
namespace oboe;

/**
 * This class provides the autoloader for the oboe classes.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class Autoloader {

  /* This is the base path where the oboe class files are found. */
  public static $basePath = __DIR__;

  /**
   * Autoload function for oboe class files.
   *
   * @param string - the name of the class to load
   */
  public static function loadClass($className) {
    if (substr($className, 0, 5) != 'oboe\\') {
      return;
    }

    $logicalPath = str_replace('\\', '/', substr($className, 5));
    $fullPath = self::$basePath.'/'.$logicalPath.'.php';
    if (file_exists($fullPath)) {
      require_once $fullPath;
    }
  }
}

# Static initializer
spl_autoload_register(array('oboe\Autoloader', 'loadClass'));
