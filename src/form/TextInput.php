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

/**
 * This class encapsulates a <input/> element with type="text".
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class TextInput extends Input {

  /** Default CSS class for 'text' <input> elements */
  const CSS_CLASS = 'text';

  /**
   * Constructor.
   *
   * @param string The name of the text box.
   * @param string An optional initial value for the element
   */
  public function __construct($name, $value = null) {
    parent::__construct('text', self::CSS_CLASS, $name, $value);
  }
}
