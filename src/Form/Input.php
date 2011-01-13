<?php
namespace Oboe\Form;
use \Oboe\ElementBase;
use \Oboe\Item;
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
 * This class encapsulates an <input/> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Form
 */
class Input extends ElementBase implements Item\Form {

  /**
   * Constructor.
   *
   * @param string The type of the <input /> element
   * @param string The default class for the input element.
   * @param string Optional name
   * @param string Optional value
   */
  public function __construct($type, $class, $name = null, $value = null) {
    parent::__construct('input', null, $class);

    $this->setAttribute('type', $type);
       
    if ($name !== null) {
      $this->setAttribute('name', $name);
    }

    if ($value !== null) {
      $this->setAttribute('value', $value);
    }
  }
}
