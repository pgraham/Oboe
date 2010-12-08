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
 * @subpackage Form
 */

require_once dirname(__FILE__).'/../../../test-common.php';

/**
 * This class tests the Oboe_Form_Div class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 * @subpackage Form
 */
class OboeTest_Output_Form_DivTest extends PHPUnit_Framework_TestCase {

    public function testEmptyOutput() {
        $div = new Oboe_Form_Div();

        $output = preg_replace('/[\n\t]/', '', $div->__toString());
        $expected = '<div></div>';
        $this->assertEquals($expected, $output,
            'Invalid output for div element');
    }

    public function testAddString() {
        $div = new Oboe_Form_Div();
        $div->add('Hello, world');

        $output = preg_replace('/[\n\t]/', '', $div->__toString());
        $expected = '<div>Hello, world</div>';
        $this->assertEquals($expected, $output,
            'Invalid output for div element');
    }

    public function testAddEmptyObject() {
        $div = new Oboe_Form_Div();
        $div->add(new Oboe_Form_Div());

        $output = preg_replace('/[\n\t]/', '', $div->__toString());
        $expected = '<div><div></div></div>';
        $this->assertEquals($expected, $output,
            'Invalid output for div element');
    }

    public function testAddObject() {
        $div = new Oboe_Form_Div();
        $inner = new Oboe_Form_Div();
        $inner->add('Hello, world');
        $div->add($inner);

        $output = preg_replace('/[\n\t]/', '', $div->__toString());
        $expected = '<div><div>Hello, world</div></div>';
        $this->assertEquals($expected, $output,
            'Invalid output for div element');
    }
}
