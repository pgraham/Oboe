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
 * @package oboe
 */
namespace oboe;

/**
 * This class encapsulates a group of Item\Body objects.
 * This class is useful for passing more than one object to a method that only
 * accepts one element.  The object implements the SPL ArrayAccess interface so
 * that instantiations can be accessed using square bracket notation.
 * ONLY NUMERIC, INCREMENTAL ACCESS IS SUPPORTED.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe
 */
class ElArray implements Item\Document, Item\Body, \ArrayAccess, \Countable,
  \Iterator
{

  /* The array's elements. */
  private $_elements;

  /** Constructor. */
  public function __construct() {
    $this->_elements = array();
  }

  /**
   * Creates a string representing the contained elements.
   *
   * @return string
   */
  public function __toString() {
    $arrayStr = '';

    foreach ($this->_elements AS $element) {
      $arrayStr.= $element;
    }

    return $arrayStr;
  }

  /**
   * Add the encapsulated elements to the body.
   */
  public function addToBody() {
    Page::addElementToBody($this);
  }

  /**
   * Add an element to the end array.
   *
   * @param IPageItem the item to add to the array.
   */
  public function push(Item\Body $item) {
    $this->_elements[] = $item;
  }

  /**
   * Add an element to the beginning of the array.
   *
   * @param IPageItem the item to add to the array.
   */
  public function unshift(Item\Body $item) {
    array_unshift($this->_elements, $item);
  }

  /*
   * =========================================================================
   * Array Access Implementation
   * ---------------------------
   * Only incremental, numeric indexes are allowed
   * =========================================================================
   */

  /**
   * Returns a boolean indicating whether or not the given index is set
   *
   * @param integer $offset - The array index to check
   * @return boolean
   */
  public function offsetExists($offset) {
    if (!$this->_checkOffset($offset)) {
      return false;
    }

    return array_key_exists($offset, $this->_elements);
  }

  /**
   * Returns the value at the given index.
   *
   * @param integer $offset - The index of the element to retrieve.
   * @return mixed
   */
  public function offsetGet($offset) {
    if (!$this->offsetExists($offset)) {
      return null;
    }
    return $this->_elements[$offset];
  }

  /**
   * Sets the given index to the given value.  Only strings and
   * Item\Body objects are accepted.
   *
   * @param integer - The index to set.
   * @param mixed - The value to set to.
   */
  public function offsetSet($offset, $value) {
    // Handle cases of adding using the [] operator to add the element
    // to the end of the array
    if ($offset === null) {
      $offset = count($this->_elements);
    }

    // Validate offset
    if (!$this->_checkOffset($offset)) {
      throw new \OutOfBoundsException('Array only supports numeric, incremental'
        . ' indexes');
    }

    // Validate value
    if (is_array($value)) {
      throw new Exception('Cannot add arrays to an Array... yet');
    }

    if (is_object($value)) {
      if (!($value instanceof Item\Body)) {
        throw new Exception('Only objects of type Item\Body can be added to an'
          . ' Array');
      }
    } else {
      $value = (string) $value;
    }

    // Add the element
    $this->_elements[$offset] = (string) $value;
  }

  /**
   * Unsets the array element at the given index.
   *
   * @param integer $offset - The index to unset
   */
  public function offsetUnset($offset) {
    if (!$this->_checkOffset($offset)) {
      throw new \OutOfBoundsException('Array only supports numeric, incremental'
        . ' indexes');
    }
        
    $maxIndex = count($this->_elements) - 1;
    unset($this->_elements[$offset]);
    for ($i = $offset; $i < $maxIndex; $i++) {
      $this->_elements[$i] = $this->_elements[$i+1];
      unset($this->_elements[$i+1]);
    }
  }

  /* Checks that a given offset is valid */
  private function _checkOffset($offset) {
    return
      is_int($offset) && $offset >= 0 && $offset <= count($this->_elements);
  }

  /*
   * =========================================================================
   * Countable Implementation
   * =========================================================================
   */

  /**
   * Returns the number of elements in the array.
   *
   * @return integer
   */
  public function count() {
    return count($this->_elements);
  }

  /*========================================================================*
   * Iterator interface.
   *========================================================================*/

  /**
   * Returns the current element in the iteration.
   *
   * @return mixed - The current element in the iteration.
   */
  public function current() {
    return current($this->_elements);
  }

  /**
   * Returns the key of the current element
   *
   * @return integer
   */
  public function key() {
    return key($this->_elements);
  }

  /**
   * Moves forward to the next element
   */
  public function next() {
    next($this->_elements);
  }

  /**
   * Moves to the first element in the iteration.
   */
  public function rewind() {
    reset($this->_elements);
  }

  /**
   * Returns a boolean indicating whether the current element is valid.
   *
   * @return boolean
   */
  public function valid() {
    return current($this->_elements) !== false;
  }
}
