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
namespace oboe\event;

/**
 * This class encapsulates an event for when an element is added to an
 * {@link oboe\ElementComposite} implementation.  The event is dispatched by
 * ElementComposite to the implementation and provides capabilities to prevent
 * the element from being added and replace the element being added.
 *
 * Preventing the element from being added is useful when the element has a
 * required order in it's parent so addition is deferred until the element is
 * output.
 *
 * Replacing the element is useful for providing an interface that automatically
 * wraps text in an element, as with <ol>, <ul> wrapping text in <li>
 * elements or <select> wrapping text in <option> elements
 *
 * @author Philip Graham <philip@zeptech.ca>
 */
class AddElementEvent {

  private $_element;
  private $_prevented = false;
  private $_return;

  public function __construct($elm) {
    $this->setElement($elm);
  }

  public function getElement() {
    return $this->_element;
  }

  /**
   * Getter for the element to return as a result of the AddElementEvent.
   * If null then the default is to maintain chainability by return the element
   * on which the AddElementEvent occured.
   *
   * @return string|oboe\struct\HtmlElement Default null
   */
  public function getReturn() {
    return $this->_return;
  }

  public function prevented($prevented = null) {
    if ($prevented === null) {
      return $this->_prevented;
    }

    $this->_prevented = $prevented;
  }

  public function setElement($elm, $return = false) {
    $this->_element = $elm;

    if ($return) {
      $this->setReturn($elm);
    }
  }

  public function setReturn($elm) {
    $this->_return = $elm;
  }

}
