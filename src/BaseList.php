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

use \oboe\event\AddElementEvent;
use \oboe\struct\FlowContent;
use \oboe\ListItem;

/**
 * This class base functionality for list element (<<ol>>, <<ul>>).
 *
 * @author Philip Graham <philip@lightbox.org>
 */
abstract class BaseList extends ElementComposite implements FlowContent {

  /**
   * Constructor.
   * 
   * @param string $tag
   */
  protected function __construct($tag) {
    parent::__construct($tag);
    $this->_objectTypes = array('oboe\ListItem');
    $this->_allowText = false;
  }

  /**
   * Add a single item to the list.
   *
   * @param mixed Either the list item to add to the list or the item to wrap
   *     and add to the list.
   * @param boolean Whether to add the item to the beginning or end of the
   *     list of elements
   * @return The list item wrapper that was added to the list
   */
  protected function onAdd(AddElementEvent $event) {
    $element = $event->getElement();
    if ($element instanceof ListItem) {
      return;
    }

    $li = new ListItem();
    $li->add($element);
    $event->setElement($li, true);
  }
}
