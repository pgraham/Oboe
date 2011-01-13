<?php
namespace Oboe\Table;
use \Oboe\ElementWrapper;
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
 * @subpackage Table
 */
/**
 * This class encapsulates a <td> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Table
 */
class Data extends ElementWrapper {

  /**
   * Constructor.
   *
   * @param mixed The contents of the cell
   * @param string The value of the element's id attribute
   * @param string The value of the element's class attribute
   */
  public function __construct($contents = null, $id = null, $class = null) {
    parent::__construct('td', $id, $class);
    if ($contents !== null) {
      $this->setElement($contents);
    }
  }
}
