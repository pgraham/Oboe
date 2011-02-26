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

use \oboe\test\mock;
use \oboe\BaseList;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the concrete methods of Oboe_BaseList abstract
 * class using a mock.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output
 */
class BaseListTest extends TestCase {

  public function testConstructor() {
    $list = new Mock\BaseList(BaseList::ORDERED);
    $output = $list->__toString();
    $expected = '<ol></ol>';
    $this->assertEquals($expected, $output,
      'Invalid output for BaseList');

    $list = new Mock\BaseList(BaseList::UNORDERED);
    $output = $list->__toString();
    $expected = '<ul></ul>';
    $this->assertEquals($expected, $output,
      'Invalid output for BaseList');
  }

  /**
   * @expectedException oboe\Exception
   */
  public function testInvalidType() {
    $list = new Mock\BaseList('badlisttype');
  }

  public function testAdd() {
    $list = new Mock\BaseList(BaseList::UNORDERED);

    $toAdd = new Mock\ElementWrapper();
    $toAdd->add('Item 1');
    $liByObj = $list->add($toAdd);
    $this->assertEquals($toAdd, $liByObj,
      'Returned list item wrapper was not the given list item wrapper');

    $li = $list->add('Item 2');
    $this->assertEquals('oboe\test\mock\ElementWrapper', get_class($li),
      'Returned list item wrappper was not a '.
      'oboe\test\mock\ElementWrapper');

    $output = $list->__toString();
    $expected = '<ul><mock>Item 1</mock><mock>Item 2</mock></ul>';
    $this->assertEquals($expected, $output,
      'Invalid output for list element');
  }
}
