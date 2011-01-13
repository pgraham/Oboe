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
 * This class encapsulates a list element, either <<ol>> or <<ul>>.  This is an
 * abstract element, use either List or Form_List depending on where
 * the list will be added to the document.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 */
abstract class BaseList extends ElementComposite {

  /** Constant for designating the list as an ordered list */
  const ORDERED = 'ol';
    
  /** Constant for designating the list of an unordered list */
  const UNORDERED = 'ul';

  /**
   * Constructor.  Requires a type to specified.  The type can be one of
   * either ORDERED or UNORDERED
   *
   * @param string The type of the list, one of either:
   *     - self::ORDERED or
   *     - self::UNDORDERED
   * @param string The id of the list. Default null
   * @param string The css clas of the list. Default null
   */
  public function __construct($type, $id = null, $class = null) {
    if ($type != self::ORDERED && $type != self::UNORDERED) {
      throw new Exception('List: Unrecognized list type: '. $type);
    }
    parent::__construct($type, $id, $class);
    $this->_objectTypes = array( $this->getWrapperClass() );
  }

  /**
   * Override the add function to also allow adding by passing the parameters
   * for a ListItem constructor.
   *
   * @param mixed Either the list item to add to the list or the item to wrap
   *     and add to the list.
   * @param string The id of the list item, ignored if first parameter is a
   *     ListItem
   * @param string The class of the list item, ignored if first parameter is a
   *     ListItem
   * @param boolean Whether to add the item to the beginning or end of the
   *     list of elements
   * @return The list item wrapper that was added to the list
   */
  public function add($element, $id = null, $class = null, $push = true) {
    $wrapperClass = $this->getWrapperClass();
    if ($element instanceof $wrapperClass) {
      parent::add($element, $push);
      return $element;
    }

    $liClass = new \ReflectionClass($wrapperClass);
    $li = $liClass->newInstance($element, $id, $class);
    parent::add($li, $push);
    return $li;
  }

  /**
   * This method is responsible for returning the class of object to use as
   * the list's element wrapper.
   *
   * @return string Name of the class to use as the list's element wrapper
   */
  protected abstract function getWrapperClass();
}
