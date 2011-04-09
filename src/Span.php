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

/**
 * This class encapsulates a <span> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class Span extends ElementComposite implements Item\Body {

  /**
   * Constructor.
   *
   * @param string The id attribute for the span
   * @param string The class attribute for the span
   */
  public function __construct($id = null, $class = null) {
    parent::__construct('span', $id, $class);
  }
}
