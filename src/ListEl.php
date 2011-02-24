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
 * This class encapsulates a List element, either <<ol>> or <<ul>>, That can be
 * added to the Body.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe
 */
class ListEl extends BaseList implements item\Body {
    
  /**
   * This list uses oboe\ListItem instances as its wrapper class.
   *
   * @return string
   */
  protected function getWrapperClass() {
    return 'oboe\ListItem';
  }
}
