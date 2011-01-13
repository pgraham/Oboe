<?php
namespace Oboe\Text;
use \Oboe\ElementWrapper;
use \Oboe\Item;
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
 * This class encapsulates a <<pre>> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Text
 */
class Preformatted extends ElementWrapper implements Item\Body, Item\Form {

  /**
   * Constructor.
   *
   * @param string The preformatted text.
   * @param string The value of the element's id attribute
   * @param string The value of the element's class attribute
   */
  public function __construct($text, $id = null, $class = null) {
    parent::__construct('pre', $id, $class);
    $this->_objectTypes = array();
    $this->setElement($text);
  }

  /**
   * Override the toString() method to not output extra tabs and line breaks
   * inside of the pre tags.
   *
   * @return string
   */
  public function __toString() {
    $elementStr = substr($this->openTag($this), 0, -1);
    $elementStr.= $this->_elements[0];
    $elementStr.= '</pre>'."\n";
    return $elementStr;
  }
}
