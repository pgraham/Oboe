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
 * @package oboe/form
 */
namespace oboe\form;
use \oboe\ElementWrapper;
use \oboe\item;

/**
 * This class encapsulates a <textarea> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/form
 */
class TextArea extends ElementWrapper implements item\Form {

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
}
