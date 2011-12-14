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
namespace oboe;

use \oboe\event\AddElementEvent;
use \oboe\struct\Labelable;
use \oboe\struct\PhrasingContent;
//use \oboe\attr\FormAssociated;

/**
 * This class encapsulates a <label> element.
 *
 *   http://www.whatwg.org/specs/web-apps/current-work/multipage/forms.html#the-label-element
 *
 * @author Philip Graham <philip@zeptech.ca>
 */
class Label extends ElementComposite implements PhrasingContent {

  private $_labelled;

  public function __construct() {
    parent::__construct('label');
    $this->_objectTypes = array('oboe\struct\PhrasingContent');
  }

  public function forInput ($labelableId) {
    return $this->setAttribute('for', $labelableId);
  }

  public function setFor(Labelable $labelable) {
    $this->_labelled = $labelable;

    return $this->setAttribute('for', $labelable->getId());
  }

  protected function onAdd(AddElementEvent $event) {
    // TODO
    // Ensure that there are no <label> element descendants or labelable
    // descendants unless it's the label's labeled control
  }
}
