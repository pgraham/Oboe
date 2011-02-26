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

use \oboe\Anchor;
use \oboe\ElementComposite;
use \oboeTest\Mock;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ .'/../test-common.php';

/**
 * This class tests the output of the concrete methods of the
 * oboe\ElementComposite abstract class using a mock.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output
 */
class ElementCompositeTest extends TestCase {

  public function testAddString() {
    $mock = new Mock\ElementComposite();
    $mock->add('Hello, world');

    $output = $mock->__toString();
    $expected = '<mock>Hello, world</mock>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  public function testAddMultipleStrings() {
    $mock = new Mock\ElementComposite();
    $mock->add('Hello');
    $mock->add(', world');

    $output = $mock->__toString();
    $expected = '<mock>Hello, world</mock>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  public function testUnshiftString() {
    $mock = new Mock\ElementComposite();
    $mock->add(', world');
    $mock->add('Hello', ElementComposite::UNSHIFT);

    $output = preg_replace('/[\n\t]/', '', $mock->__toString());
    $expected = '<mock>Hello, world</mock>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  public function testAddObject() {
    $mock = new Mock\ElementComposite();

    $helloWorld = new Mock\ElementComposite();
    $helloWorld->add('Hello, world');

    $mock->add($helloWorld);

    $output = $mock->__toString();
    $expected = '<mock><mock>Hello, world</mock></mock>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  public function testAddMultipleObjects() {
    $mock = new Mock\ElementComposite();

    $hello = new Mock\ElementComposite();
    $hello->add('Hello');
    $world = new Mock\ElementComposite();
    $world->add(', world');

    $mock->add($hello);
    $mock->add($world);

    $output = $mock->__toString();
    $expected = '<mock><mock>Hello</mock><mock>, world</mock></mock>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  public function testUnshiftObject() {
    $mock = new Mock\ElementComposite();

    $hello = new Mock\ElementComposite();
    $hello->add('Hello');
    $world = new Mock\ElementComposite();
    $world->add(', world');

    $mock->add($world);
    $mock->add($hello, ElementComposite::UNSHIFT);

    $output = $mock->__toString();
    $expected = '<mock><mock>Hello</mock><mock>, world</mock></mock>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  /**
   * @expectedException Oboe\Exception
   */
  public function testAddInvalidObject() {
    $mock = new Mock\ElementComposite();
    $mock->add(new Anchor('#', 'Click me'));
  }
}
