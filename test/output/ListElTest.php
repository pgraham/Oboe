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
 * @package oboe/test/output
 */
namespace oboe\test\output;

use \oboe\BaseList;
use \oboe\ListEl;
use \oboe\ListItem;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the oboe\List class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output
 */
class ListElTest extends TestCase {

  public function testAddListItem() {
    $list = new ListEl(BaseList::UNORDERED);

    $toAdd = new ListItem('YAY');
    $li = $list->add($toAdd);
    $this->assertEquals($toAdd, $li,
      'Returned list item was not the given list item');

    $output = $list->__toString();
    $expected = '<ul><li>YAY</li></ul>';
    $this->assertEquals($expected, $output, 'Invalid output for list element');
  }

  public function testAddByConstructorArgs() {
    $list = new ListEl(BaseList::UNORDERED);
    
    $li = $list->add('YAY');
    $this->assertEquals('Oboe\ListItem', get_class($li),
      'Returned class was not a Oboe_ListItem');

    $output = $list->__toString();
    $expected = '<ul><li>YAY</li></ul>';
    $this->assertEquals($expected, $output, 'Invalid output for list element');
  }
}
