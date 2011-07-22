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

use \oboe\struct\FlowContent;

/**
 * This class encapsulates a <h#> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class Heading extends ElementComposite implements FlowContent {

  /**
   * Constructor.
   *
   * @param integer $prominency The heading's level, ie, 1 = <h1>
   * @param mixed $ctnt The heading's text
   */
  public function __construct($prominence = 1, $ctnt = null) {
    parent::__construct('h'.$prominence);
    $this->_objectTypes = array('oboe\struct\PhrasingContent');

    if ($ctnt !== null) {
      $this->add($ctnt);
    }
  }
}
