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
 * This class encapsulates a <script> element that can be added to the
 * <body> or <head> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 */
class Javascript extends ElementWrapper implements Item\Body, Item\Head {

  /* The script's code */
  private $_code;

  /**
   * Constructor.
   */
  public function __construct() {
    parent::__construct('script');
    $this->setAttribute('type', 'text/javascript');
  }

  /**
   * Override the toString() method add any source code to the script
   * element.
   *
   * @return string HTML markup for the script element
   */
  public function __toString() {
    if ($this->_code !== null) {
      $this->setElement($this->_code);
    }
    return parent::__toString();
  }

  /**
   * Adds the given string to the scripts body.  No validation is done
   * on the given string.
   *
   * @param string What to add to the script's body.
   */
  public function addCode($code) {
    if ($this->_code === null) {
      $this->_code = $code;
    } else {
      $this->_code.= $code;
    }
  }
}
