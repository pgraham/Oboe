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
 * This class encapsulate an HTML comment. Comments are output between
 * <!-- ... --> tags
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 */
class Comment implements Item\Document, Item\Head, Item\Body, Item\Form {

  /* The encapsulated comment */
  private $_comment;

  /**
   * Constructor.
   *
   * @param string The comment.  Don't include opening and closing tags.
   */
  public function __construct($comment) {
    $this->_comment = $comment;
  }

  /**
   * Returns a string representation of the object.
   *
   * @return string
   */
  public function __toString() {
    return '<!-- '.$this->_comment.' -->';
  }
}
