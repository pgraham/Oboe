<?php
namespace Oboe;
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
 */
/**
 * This class encapsulates a <img/> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 */
class Image extends ElementBase implements Item\Body, Item\Form {

  /**
   * Constructor.
   *
   * @param string The logical path to the image.
   * @param string The XHTML 1.1 standard requires an alt attribute
   * @param string The DOM id of the image element.
   * @param string The css class of the image element.
   */
  public function __construct($src, $alt, $id = null, $class = null) {
    parent::__construct('img', $id, $class);
    $this->setAttribute('src', $src);
    $this->setAttribute('alt', $alt);
  }
}
