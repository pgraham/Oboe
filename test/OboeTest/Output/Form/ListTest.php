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
 * This class tests the output of the Oboe_Form_List element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_Form_ListTest extends PHPUnit_Framework_TestCase {

    public function testAddListItem() {
        $list = new Oboe_Form_List(Oboe_BaseList::UNORDERED);

        $toAdd = new Oboe_Form_ListItem('YAY');
        $li = $list->add($toAdd);
        $this->assertEquals($toAdd, $li,
            'Returned list item was not the given list item');

        $output = preg_replace('/[\n\t]/', '', $list->__toString());
        $expected = '<ul><li>YAY</li></ul>';
        $this->assertEquals($expected, $output,
            'Invalid output for list element');
    }

    public function testAddByConstructorArgs() {
        $list = new Oboe_Form_List(Oboe_BaseList::UNORDERED);
        
        $li = $list->add('YAY');
        $this->assertEquals('Oboe_Form_ListItem', get_class($li),
            'Returned class was not a Oboe_Form_ListItem');

        $output = preg_replace('/[\n\t]/', '', $list->__toString());
        $expected = '<ul><li>YAY</li></ul>';
        $this->assertEquals($expected, $output,
            'Invalid output for list element');
    }
}
