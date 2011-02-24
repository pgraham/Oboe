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
 * @package oboe/form
 */
namespace oboe\form;

/**
 * This class encapsulates an <input/> element with type="submit".
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/form
 */
class Submit extends Input {

  /** Default CSS Class for <input/> elements with type 'submit' */
  const CSS_CLASS = 'submit';

  /**
   * Constructor.
   *
   * @param string The prompt that appreas on the submit button.
   * @param string An optional name for the submit button
   */
  public function __construct($value = null, $name = null) {
    parent::__construct('submit', self::CSS_CLASS, $name, $value);
  }
}
