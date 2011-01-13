<?php
namespace Oboe\Form;
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
 * This class encapsulates a <input/> element with type="password".
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Form
 */
class Password extends Input {

  /** Default CSS class for password <input> elements */
  const CSS_CLASS = 'password';

  /**
   * Constructor.
   *
   * @param string The name of the element
   */
  public function __construct($name) {
    parent::__construct('password', self::CSS_CLASS, $name);
  }
}
