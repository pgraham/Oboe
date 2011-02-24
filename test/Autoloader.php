<?php
namespace OboeTest;
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
 * @package oboe/test
 */
namespace oboe\test;

/**
 * Autoloader for test cases and mock classes.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 */
class Autoloader {

  /* This is the base path where the Oboe_* test cases are found. */
  public static $basePath = __DIR__;

  /**
   * Autoload function for the Oboe_ * test cases.
   *
   * @param string - the name of the test case to load
   */
  public static function loadClass($className) {
    if (substr($className, 0, 10) != 'oboe\\test\\') {
      return;
    }

    $logicalPath = str_replace('\\', '/', substr($className, 10));
    $fullPath = self::$basePath.'/'.$logicalPath.'.php';
    if (file_exists($fullPath)) {
        require_once $fullPath;
    }
  }
}
spl_autoload_register(array('oboe\test\Autoloader', 'loadClass'));
