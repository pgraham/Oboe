<?php
namespace Oboe\Text;
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
 * @package Oboe
 * @subpackage Text
 */
/**
 * This class provides tab control for outputting nicely formatted HTML.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Text
 * @deprecated No one looks at source anymore so there is no need to send extra
 *             white space
 */
class Tabs {

  /* Internal counter for the current shift level of default tabs */
  private static $_shiftWidth = 0;

  /**
   * This function returns a string containing the number of tabs specified.
   * If an integer is provided as the first parameter, the string returned
   * will contained the specified number of tabs.  If null the function will
   * return the number of tabs indicated by the internal shift level count.
   * The count can be manipulated using the incTabs() and decTabs() methods.
   *
   * @param integer The number of tabs desired.
   * @return string The number of requested tabs
   */
  public static function getTabs($shiftWidth = null) {
    if ($shiftWidth === null) {
      $shiftWidth = self::$_shiftWidth;
    }

    $tabs = '';
    for ($i = 0; $i < $shiftWidth; $i++) {
      $tabs .= "\t";
    }
    return $tabs;
  }

  /**
   * This method decreases the current indent level by one.
   */
  public static function decTabs() {
    if (self::$_shiftWidth > 0) {
      self::$_shiftWidth--;
    }
  }

  /**
   * This method increases the current indent level by one.
   */
  public static function incTabs() {
    if (self::$_shiftWidth < 0) {
      self::reset();
    }
    self::$_shiftWidth++;
  }

  /**
   * Resets the tab level to 0
   */
  public static function reset() {
    self::$_shiftWidth = 0;
  }
}
