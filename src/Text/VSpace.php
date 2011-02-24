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
 * @package oboe/text
 */
namespace oboe\text;
use \oboe\ElementBase;
use \oboe\item;

/**
 * This class encapsulates a specified number of <br/> elements.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/text
 */
class VSpace extends ElementBase implements item\Body, item\Form {

  /* This is the number of <br/> elements to ouptut. */
  private $_num;

  /**
   * Constructor.
   *
   * @param integer The number of lines of vertical space to output.
   * @param boolean Whether or not the vertical space is output with tabbing
   *     and a line break, default true.
   */
  public function __construct($num = 1) {
    parent::__construct('br', null, null);
    $this->_num = $num;
  }

  /**
   * Returns a string representation of the vertical space as a number of
   * <br/> elements for use in an (X)HTML document.
   *
   * @return string
   */
  public function __toString() {
    $vSpace = '';
    for($i = 0; $i < $this->_num; $i++) {
      $vSpace.= parent::__toString();
    }
    return $vSpace;
  }
}
