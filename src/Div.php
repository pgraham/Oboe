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
 * This class encapsulates a `<div>` element.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class Div extends ElementComposite implements FlowContent {

  /**
   * Constructor.
   *
   * @param string $id [Optional] The value for the element's id attribute.
   */
  public function __construct($id = null) {
    parent::__construct('div');
    $this->_objectTypes = array('oboe\struct\FlowContent');

    if ($id !== null) {
      $this->setId($id);
    }
  }
}
