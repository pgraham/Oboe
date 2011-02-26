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
 * This class encapsulates an anchor element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe
 */
class Anchor extends ElementWrapper implements item\Body, item\Form {

  private $_item;

  /**
   * Constructor.
   *
   * @param string The link's URL
   * @param mixed The link's label
   */
  public function __construct($link, $item) {
    parent::__construct('a');

    $this->setAttribute('href', $link);
    $this->_item = $item;
    $this->setElement($item);
  }

  /**
   * Getter for the item that represents the anchor on the screen.
   *
   * @return mixed
   */
  public function getItem() {
    return $this->_item;
  }

  /**
   * Getter for the location that the anchor links to.
   *
   * @return string
   */
  public function getLink() {
    return $this->getAttribute('href');
  }
}
