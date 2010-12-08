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
 * This class tests the output of the Oboe_Form_Select element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 * @subpackage Form
 */
class OboeTest_Output_Form_SelectTest extends PHPUnit_Framework_TestCase {
    
    public function testOutput() {
        $select = new Oboe_Form_Select('sel');
        $output = preg_replace('/[\n\t]/', '', $select->__toString());
        $expected = '<select name="sel"></select>';
        $this->assertEquals($expected, $output,
            'Invalid output for select element');
    }

    public function testAddObject() {
        $select = new Oboe_Form_Select('sel');

        $expected = '<select name="sel">';
        for ($i = 1; $i <= 10; $i++) {
            $opt = new Oboe_Form_SelectOption('opt'.$i, 'Option '.$i);
            $select->add($opt);
            $expected .= '<option value="opt'.$i.'">Option '.$i.'</option>';
        }
        $expected .= '</select>';

        $output = preg_replace('/[\n\t]/', '', $select->__toString());
        $this->assertEquals($expected, $output,
            'Invalid output for select element when adding option by object');
    }

    public function testAddConstructorArgs() {
        $select = new Oboe_Form_Select('sel');

        $expected = '<select name="sel">';
        for ($i = 1; $i <= 10; $i++) {
            $opt = $select->add('opt'.$i, 'Option '.$i);
            $expected .= '<option value="opt'.$i.'">Option '.$i.'</option>';
        }
        $expected .= '</select>';
        $output = preg_replace('/[\n\t]/', '', $select->__toString());
        $this->assertEquals($expected, $output, 'Invalid output for select '.
            'element when adding options by constructor arguments');
    }

    /**
     * @expectedException Oboe_Exception
     */
    public function testAddBadObject() {
        $select = new Oboe_Form_Select('sel');
        $select->add('opt', new Oboe_Anchor('#', 'Click me'));
    }
}
