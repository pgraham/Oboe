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
namespace oboe\test\output;

use \oboe\ListItem;
use \oboe\OrderedList;
use \oboe\UnorderedList;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the oboe\List class.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class ListTest extends TestCase {

  public function testAddListItem() {
    $li = new ListItem('YAY');

    $list = new OrderedList();
    $list->add($li);

    $output = $list->__toString();
    $expected = '<ol><li>YAY</li></ol>';
    $this->assertEquals($expected, $output, 'Invalid output for list element');

    $list = new UnorderedList();
    $list->add($li);

    $output = $list->__toString();
    $expected = '<ul><li>YAY</li></ul>';
    $this->assertEquals($expected, $output, 'Invalid output for list element');
  }

  public function testAddByConstructorArgs() {
    $list = new UnorderedList();
    
    $li = $list->add('YAY');
    $this->assertEquals('oboe\ListItem', get_class($li),
      'Returned class was not a oboe\ListItem');

    $output = $list->__toString();
    $expected = '<ul><li>YAY</li></ul>';
    $this->assertEquals($expected, $output, 'Invalid output for list element');
  }
}
