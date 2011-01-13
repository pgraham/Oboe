<?php
namespace Oboe\Form;
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
 * @subpackage Form
 */
/**
 * This class encapsulates a <textarea> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Form
 */
class TextArea extends ElementWrapper implements Item\Form {

  /**
   * Constructor.
   *
   * @param string The name of the text area
   * @param string The original contents of the text area
   */
  public function __construct($name, $text = null) {
    parent::__construct('textarea');
    $this->setAttribute('name', $name);

    $this->_objectTypes = array();
    if ($text !== null) {
      $this->setElement($text);
    }
  }

  /**
   * Override the parent's toString method to make sure that the given text
   * doesn't have any whitespace added to it
   *
   * @return string
   */
  public function __toString() {
    $str = str_replace("\n", '', self::openTag($this));
    if (array_key_exists(0, $this->_elements)) {
      $str.= $this->_elements[0];
    }
    $str.= str_replace("\t", '', self::closeTag($this));
    return $str;
  }
}
