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
namespace oboe;

/**
 * This class encapulates the basic functionality for elements that contain a
 * single element.  It extends the ElementComposite class to enforce that at
 * most one element is added to the wrapped element.
 *
 * TODO refactor this class to require an element
 *
 * @author Philip Graham <philip@lightbox.org>
 */
abstract class ElementWrapper extends ElementComposite {
    
  /**
   * Setter for the wrapper element.
   *
   * @param mixed The element to wrap
   */
  public function setElement($element) {
    $this->removeAll();
    $this->add($element, true);
  }

  /**
   * Override the add method to only allow one element to be added to the
   * wrapper
   *
   * @param mixed The element to wrap.
   */
  public function add($element, $push = true) {
    if (count($this->_elements) == 1) {
      throw new Exception('Only one element can be added a '
        .__CLASS__.' object');
    }
    parent::add($element, $push);
  }
}
