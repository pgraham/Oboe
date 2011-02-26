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
use \oboe\ElementWrapper;
use \oboe\item;

/**
 * This class encapsulates a <<pre>> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/text
 */
class Preformatted extends ElementWrapper implements item\Body, item\Form {

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
}
