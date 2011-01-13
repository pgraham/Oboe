<?php
namespace Oboe\Item;
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
 * @subpackage Item
 */
/**
 * This interface abstracts the __toString() method for any classes that
 * represent an element that can belong to a generated (X)HTML document.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Item
 */
interface Document {

  /**
   * Returns the tag string for inserting the element into a document.
   *
   * @return string
   */
  public function __toString();
}
