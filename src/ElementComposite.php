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
 * This class encapsulates functionality common to elements that are composed of * zero or more elements.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 */
abstract class ElementComposite extends ElementBase {

  /**
   * Constant that tells the add() method to shift the given element into the
   * element's array of child elements.
   */
  const UNSHIFT = false;

  /** The element's child children */
  protected $_elements = array();

  /** Array of object types that can be added to the composite */
  protected $_objectTypes = array('Oboe\Item\Body');

  /**
   * Boolean indicating whether or not text can be added directly to the
   * element.
   */
  protected $_allowText = true;

  /** 
   * Constructor.  Calls parent constructor with given parameters and
   * initializes array of child element array.
   *
   * @param string The element's tag
   * @param string The id attribute of the element.
   * @param string The class attribute of the element.
   */
  protected function __construct($tag, $id = null, $class = null) {
    parent::__construct($tag, $id, $class);
  }

  /**
   * Transforms the element into a string.
   *
   * @return string
   */
  public function __toString() {
    $elementStr = self::openTag($this);
    foreach ($this->_elements AS $element) {
      $elementStr .= $element;
    }
    $elementStr.= self::closeTag($this);
    return $elementStr;
  }

  /**
   * Adds an element to the array of child elements.
   *
   * @param mixed The element to add to the array.
   * @param boolean Whether to push or shift the element into the array
   */
  public function add($element, $push = true) {
    if (is_array($element)) {
      foreach ($element AS $ele) {
        $this->add($ele, $push);
      }
    } else {
      // This method will throw an exception if it is not a valid element
      self::_checkElement($this, $element);

      if ($push) {
        $this->_elements[] = $element;
      } else {
        array_unshift($this->_elements, $element);
      }
    }
  }

  /** 
   * This method removes all of the element's children.
   */
  public function removeAll() {
    $this->_elements = array();
  }

  /**
   * This function checks that any objects added to the composite are of
   * the right type.
   *
   * @param ElementComposite Parent element
   * @param mixed Child element
   */
  protected static function _checkElement(ElementComposite $parent, $child) {
    // If the child is not an object make sure that non-object's can be added to
    // the composite
    if (!is_object($child)) {
      if (!$parent->_allowText) {
        throw new Exception('Text can not be added directly to a '
          . get_class($parent) . ' object');
      }
      return;
    }

    // Make sure that object's can be added to the composite
    if ($parent->_objectTypes === null || count($parent->_objectTypes) == 0) {
      throw new Exception('Objects can\'t be added to a '. get_class($parent)
        . ' element');
    }

    // Check if the object is a valid type for the composite
    foreach ($parent->_objectTypes AS $validType) {
      if ($child instanceof $validType) {
        return;
      }
    }

    throw new Exception('Only objects of type '.
      implode(',', $parent->_objectTypes).' can be added to a '.
      get_class($parent).' object');
  }
}
