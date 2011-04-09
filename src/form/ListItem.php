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
 */
namespace oboe\form;
use \oboe\ElementWrapper;

/**
 * This class ecapsulates a <li> element when it's part of a form.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class ListItem extends ElementWrapper {

  /**
   * Constructor.
   *
   * @param mixed $item The element to output inside the <li> tag
   * @param string $id The value of the element's id attribute
   * @param string $class The value of the element's class attribute.
   */
  public function __construct($item, $id = null, $class = null) {
    parent::__construct('li', $id, $class);
    $this->_objectTypes = array('oboe\item\form');
    $this->setElement($item);
  }
}
