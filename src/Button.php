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

use \oboe\struct\PhrasingContent;

/**
 * This class encapsulates a `<button>` element.
 *
 * TODO This class needs to filter Interactive content.
 *
 * @author Philip Graham <philip@zeptech.ca>
 */
class Button extends ElementComposite implements PhrasingContent {

  /**
   * Constructor. Creates a new button element.
   *
   * @param string $lbl [Optional] Label for the button
   */
  public function __construct($lbl = null) {
    parent::__construct('button');
    $this->_objectTypes = array('oboe\struct\PhrasingContent');

    $this->setAttribute('type', 'button');

    if ($lbl !== null) {
      $this->add($lbl);
    }
  }
}
