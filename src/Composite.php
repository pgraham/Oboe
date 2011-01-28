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
 * This class allows for a widget to be created by extending an Oboe element
 * without exposing the interface of the element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 */
abstract class Composite implements Item\Document {

  /* The base element for the widget */
  protected $elm;

  public function __toString() {
    if ($this->elm === null) {
      throw new Exception(
        'A Composite must have an element specified using initElement(...)');
    }

    return $this->elm->__toString();
  }

  public function initElement(Item\Document $elm) {
    if ($this->elm !== null) {
      throw new Exception(
        'Cannot initialize a Composite\'s element more than once');
    }

    $this->elm = $elm;
  }
}
