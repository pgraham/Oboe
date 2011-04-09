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
namespace oboe\form;
use \oboe\ElementComposite;
use \oboe\item;

/**
 * This class encapsulates a <select> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class Select extends ElementComposite implements item\Form {

  /**
   * Constructor.
   *
   * @param string The name of the select box
   */
  public function __construct($name) {
    parent::__construct('select');
    $this->setAttribute('name', $name);
    $this->_objectTypes = array('oboe\form\SelectOption');
    $this->_allowText = false;
  }

  /**
   * Override the add function to also allow adding by passing the parameters
   * for the SelectOption constructor.
   *
   * @param mixed Either the SelectOption to add to the list of the value of
   *     the select option to create
   * @param string The label for the select option, ignored if the first
   *     parameter is a SelectOption
   * @param boolean Whether or not the added option should be selected by
   *     default, ignored of the first parameter is a SelectOption
   * @param boolean Whether to push or shift the element into the container
   * @return oboe\form\SelectOption The <option> element that was added to the
   *     <select> element
   */
  public function add($element, $lbl = null, $selected = false, $push = true) {
    if ($element instanceof SelectOption) {
      parent::add($element, $push);
      return $element;
    }

    $opt = new SelectOption($element, $lbl, $selected);
    parent::add($opt, $push);
    return $opt;
  }
}
