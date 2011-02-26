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
 * @package oboe
 */
namespace oboe;

/**
 * This class encapsulates a <h#> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe
 */
class Heading extends ElementWrapper implements item\Body, item\Form {

  /**
   * Constructor.
   *
   * @param string - The heading's text
   * @param integer - The heading's level, ie, 1 = <h1>
   */
  public function __construct($text, $prominence = 1) {
    parent::__construct('h'.$prominence);
    $this->setElement($text);
  }
}
