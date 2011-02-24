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
 * @package oboe/text
 */
namespace oboe\text;
use \oboe\item;

/**
 * This class outputs horizontal space.  It is created by outputing
 * the specified number of html space entities (&amp;nbsp;).
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/text
 */
class HSpace implements item\Document, item\Body, item\Form {

  /* The amount of white space to output */
  private $_amount;
    
  /**
   * Constructor.
   *
   * @param integer The number of spaces to output.
   */
  public function __construct($amount = 1) {
    $this->_amount = $amount;
  }

  /** 
   * Returns a string representation of the horizontal white space as a number
   * of HTML space (&nbsp;) entities for use in an (X)HTML document.
   *
   * @return string
   */
  public function __toString() {
    $hSpace = '';
    for($i = 0; $i < $this->_amount; $i++) {
      $hSpace.= '&nbsp;';
    }
    return $hSpace;
  }
}
