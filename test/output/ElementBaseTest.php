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

use \oboe\test\mock\ElementBase;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ .'/../test-common.php';

/**
 * This class tests the output of the concrete methods of the oboe\ElementBase
 * abstract class using a mock.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe\test\output
 */
class ElementBaseTest extends TestCase {

  public function testBasicOutput() {
    $mock = new ElementBase();

    $output = $mock->__toString();
    $expected = '<mock/>';

    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  public function testConstructorArgs() {
    $mock = new ElementBase('theMock', 'mockElement');

    $output = $mock->__toString();
    $expected = '<mock id="theMock" class="mockElement"/>';

    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  public function testIdGetSet() {
    $mock = new ElementBase('notTheMock');
    
    $this->assertEquals('notTheMock', $mock->getId(),
      'Invalid id for mock element');

    $mock->setId('theMock');

    $this->assertEquals('theMock', $mock->getId(),
      'Invalid id for mock element');

    $output = $mock->__toString();
    $expected = '<mock id="theMock"/>';

    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  public function testClassGetSet() {
    $mock = new ElementBase(null, 'notAMockElement');

    $this->assertEquals('notAMockElement', $mock->getClass(),
      'Invalid class for mock element');

    $mock->setClass('mockElement');

    $this->assertEquals('mockElement', $mock->getClass(),
      'Invalid class for mock element');

    $output = $mock->__toString();
    $expected = '<mock class="mockElement"/>';

    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  public function testAttributeGetSetUnset() {
    $mock = new ElementBase();

    $mock->setAttribute('attr', 'value');
    $this->assertEquals('value', $mock->getAttribute('attr'),
      'Invalid attribute for mock element');

    $output = $mock->__toString();
    $expected = '<mock attr="value"/>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');

    $mock->unsetAttribute('attr');
    $this->assertNull($mock->getAttribute('attr'),
      'Mock element attribute not unset');
  }

  public function testStyleGetSet() {
    $mock = new ElementBase();

    $mock->setStyle('position', 'absolute');
    $this->assertEquals('absolute', $mock->getStyle('position'),
      'Invalid style for mock element');

    $output = $mock->__toString();
    $expected = '<mock style="position:absolute;"/>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');

    $mock->setStyle('top', '0px');
    $output = $mock->__toString();
    $expected = '<mock style="position:absolute;top:0px;"/>';
    $this->assertEquals($expected, $output, 'Invalid output for mock element');
  }

  public function testGetSetIdAttribute() {
    $mock = new ElementBase();

    $mock->setAttribute('id', 'theMock');
    $this->assertEquals('theMock', $mock->getAttribute('id'),
      'Invalid id attribute for mock element');
    $this->assertEquals('theMock', $mock->getId(),
      'Invalid id for mock element');
  }

  public function testGetSetClassAttribute() {
    $mock = new ElementBase();
    
    $mock->setAttribute('class', 'mockElement');
    $this->assertEquals('mockElement', $mock->getAttribute('class'),
      'Invalid class attribute for mock element');
    $this->assertEquals('mockElement', $mock->getClass(),
      'Invalid class for mock element');
  }

  public function testGetSetStyleAttribute() {
    $mock = new ElementBase();
    
    $mock->setAttribute('style', 'position:absolute;top:0px;');
    $this->assertEquals('0px', $mock->getStyle('top'),
      'Invalid top style for mock element');
    $this->assertEquals('position:absolute;top:0px;',
      $mock->getAttribute('style'),
      'Invalid style attribute for mock element');
    $this->assertEquals('position:absolute;top:0px;', $mock->getStyle(),
      'Invalid style for mock element');
    $this->assertEquals('absolute', $mock->getStyle('position'),
      'Invalid position style for mock element');
  }
}
