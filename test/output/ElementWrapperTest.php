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

use \oboe\test\mock;

use \PHPUnit_Framework_TestCase as TestCase;
 
require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the concrete methods of the
 * oboe\ElementWrapper abstract class using a mock.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class ElementWrapperTest extends TestCase {

  public function testSetElement() {
    $mock = new Mock\ElementWrapper();
    $mock->add('Hello, world');
    $output = $mock->__toString();
    $expected = '<mock>Hello, world</mock>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');

    $mock->setElement('I\'m alive');
    $output = $mock->__toString();
    $expected = '<mock>I\'m alive</mock>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');

    $mock->setElement(new Mock\ElementWrapper());
    $output = $mock->__toString();
    $expected = '<mock><mock></mock></mock>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  /**
   * @expectedException Oboe\Exception
   */
  public function testAddSecondElement() {
    $mock = new Mock\ElementWrapper();
    $mock->add('Hello');
    $mock->add(', world');
  }
}
