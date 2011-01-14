<?php
namespace Oboe;
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
 */
/**
 * This class encapsulates a List element, either <<ol>> or <<ul>>, That can be
 * added to the Body.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 */
class ListEl extends BaseList implements Item\Body {
    
  /**
   * This list uses Oboe_ListItem instances as its wrapper class.
   *
   * @return string
   */
  protected function getWrapperClass() {
    return 'Oboe\ListItem';
  }
}
