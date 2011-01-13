<?php
namespace Oboe\Form;
use \Oboe\ElementWrapper;
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
 * This class ecapsulates a <li> element when it's part of a form.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Form
 */
class ListItem extends ElementWrapper {

  /**
   * Constructor.
   *
   * @param Oboe_IPageItem The element to output inside the <li> tag
   * @param string The value of the element's id attribute
   * @param string The value of the element's class attribute.
   */
  public function __construct($item, $id = null, $class = null) {
    parent::__construct('li', $id, $class);
    $this->_objectTypes = array('Oboe\Item\Form');
    $this->setElement($item);
  }
}
