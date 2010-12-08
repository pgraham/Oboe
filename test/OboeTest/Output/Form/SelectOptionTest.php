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

require_once dirname(__FILE__).'/../../../test-common.php';

/**
 * This class tests the output of the Oboe_Form_SelectOption element
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_Form_SelectOptionTest extends PHPUnit_Framework_TestCase {

    public function testOutput() {
        $option = new Oboe_Form_SelectOption('option1', 'Option 1');
        $output = preg_replace('/[\n\t]/', '', $option->__toString());
        $expected = '<option value="option1">Option 1</option>';
        $this->assertEquals($expected, $output,
            'Invalid output for option element');

        $option = new Oboe_Form_SelectOption('option2', 'Option 2', true);
        $output = preg_replace('/[\n\t]/', '', $option->__toString());
        $expected = '<option value="option2" selected="selected">Option 2'.
            '</option>';
        $this->assertEquals($expected, $output,
            'Invalid output for selected option element');
    }

    /**
     * @expectedException Oboe_Exception
     */
    public function testAddObject() {
        $option = new Oboe_Form_SelectOption('option1',
            new Oboe_Anchor('#', 'Option 1'));
    }
}
