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
 * @package OboeTest
 * @subpackage Output
 */

require_once dirname(__FILE__).'/../../test-common.php';

/**
 * This class tests the output of the concrete methods of the
 * Oboe_ElementComposite abstract class using a mock.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_ElementCompositeTest extends PHPUnit_Framework_TestCase {

    public function testAddString() {
        $mock = new OboeTest_Mock_ElementComposite();
        $mock->add('Hello, world');

        $output = preg_replace('/[\n\t]/', '', $mock->__toString());
        $expected = '<mock>Hello, world</mock>';
        $this->assertEquals($expected, $output,
            'Invalid output for mock element');
    }

    public function testAddMultipleStrings() {
        $mock = new OboeTest_Mock_ElementComposite();
        $mock->add('Hello');
        $mock->add(', world');

        $output = preg_replace('/[\n\t]/', '', $mock->__toString());
        $expected = '<mock>Hello, world</mock>';
        $this->assertEquals($expected, $output,
            'Invalid output for mock element');
    }

    public function testUnshiftString() {
        $mock = new OboeTest_Mock_ElementComposite();
        $mock->add(', world');
        $mock->add('Hello', Oboe_ElementComposite::UNSHIFT);

        $output = preg_replace('/[\n\t]/', '', $mock->__toString());
        $expected = '<mock>Hello, world</mock>';
        $this->assertEquals($expected, $output,
            'Invalid output for mock element');
    }

    public function testAddObject() {
        $mock = new OboeTest_Mock_ElementComposite();

        $helloWorld = new OboeTest_Mock_ElementComposite();
        $helloWorld->add('Hello, world');

        $mock->add($helloWorld);

        $output = preg_replace('/[\n\t]/', '', $mock->__toString());
        $expected = '<mock><mock>Hello, world</mock></mock>';
        $this->assertEquals($expected, $output,
            'Invalid output for mock element');
    }

    public function testAddMultipleObjects() {
        $mock = new OboeTest_Mock_ElementComposite();

        $hello = new OboeTest_Mock_ElementComposite();
        $hello->add('Hello');
        $world = new OboeTest_Mock_ElementComposite();
        $world->add(', world');

        $mock->add($hello);
        $mock->add($world);

        $output = preg_replace('/[\n\t]/', '', $mock->__toString());
        $expected = '<mock><mock>Hello</mock><mock>, world</mock></mock>';
        $this->assertEquals($expected, $output,
            'Invalid output for mock element');
    }

    public function testUnshiftObject() {
        $mock = new OboeTest_Mock_ElementComposite();

        $hello = new OboeTest_Mock_ElementComposite();
        $hello->add('Hello');
        $world = new OboeTest_Mock_ElementComposite();
        $world->add(', world');

        $mock->add($world);
        $mock->add($hello, Oboe_ElementComposite::UNSHIFT);

        $output = preg_replace('/[\n\t]/', '', $mock->__toString());
        $expected = '<mock><mock>Hello</mock><mock>, world</mock></mock>';
        $this->assertEquals($expected, $output,
            'Invalid output for mock element');
    }

    /**
     * @expectedException Oboe_Exception
     */
    public function testAddInvalidObject() {
        $mock = new OboeTest_Mock_ElementComposite();
        $mock->add(new Oboe_Anchor('#', 'Click me'));
    }
}
