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
 * This class encapsulates the <head> element.  Since a document can only have
 * one <head> element it is implemented as a singleton.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe
 */
class Head extends ElementComposite {
    
  /*
   * ========================================================================
   * SINGLETON
   * ========================================================================
   */

  private static $_instance;
    
  /**
   * Getter for the Head singleton.
   *
   * @return Head Singleton.
   */
  public static function getInstance() {
    if (self::$_instance === null) {
      self::$_instance = new Head();
    }
    return self::$_instance;
  }

  /*===================================*
   * INSTANCE
   *===================================*/

  /* The text to output between the head's <title> tag */
  private $_title;

  /**
   * Constructor.
   */
  protected function __construct() {
    parent::__construct('head', null, null);

    // This object only accepts oboe_Item_Header implementations
    $this->_objectTypes = array('oboe\item\Head');
    $this->_allowText = false;
  }

  /**
   * Overrides the toString() method to add the page's title to the beginning
   * of the <head> element's children.
   *
   * @return HTML markup for the <head> element
   */
  public function __toString() {
    if ($this->_title !== null) {
      $this->add(new Head\Title($this->_title),
        ElementComposite::UNSHIFT);
    }
    return parent::__toString();
  }

  /**
   * Overrides the removeAll() method to unset any title in addition to
   * removing all elements.
   */
  public function removeAll() {
    parent::removeAll();
    $this->_title = null;
  }

  /**
   * Setter for the page's title.
   *
   * @param string The page's title
   */
  public function setTitle($title) {
    $this->_title = $title;
  }
}
