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
 * This class tests the output of the concrete methods of Oboe_BaseList abstract
 * class using a mock.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_BaseListTest extends PHPUnit_Framework_TestCase {

    public function testConstructor() {
        $list = new OboeTest_Mock_BaseList(Oboe_BaseList::ORDERED);
        $output = preg_replace('/[\n\t]/', '', $list->__toString());
        $expected = '<ol></ol>';
        $this->assertEquals($expected, $output,
            'Invalid output for BaseList');

        $list = new OboeTest_Mock_BaseList(Oboe_BaseList::UNORDERED);
        $output = preg_replace('/[\n\t]/', '', $list->__toString());
        $expected = '<ul></ul>';
        $this->assertEquals($expected, $output,
            'Invalid output for BaseList');
    }

    /**
     * @expectedException Oboe_Exception
     */
    public function testInvalidType() {
        $list = new OboeTest_Mock_BaseList('badlisttype');
    }

    public function testAdd() {
        $list = new OboeTest_Mock_BaseList(Oboe_BaseList::UNORDERED);

        $toAdd = new OboeTest_Mock_ElementWrapper();
        $toAdd->add('Item 1');
        $liByObj = $list->add($toAdd);
        $this->assertEquals($toAdd, $liByObj,
            'Returned list item wrapper was not the given list item wrapper');

        $li = $list->add('Item 2');
        $this->assertEquals('OboeTest_Mock_ElementWrapper', get_class($li),
            'Returned list item wrappper was not a '.
            'OboeTest_Mock_ElementWrapper');

        $output = preg_replace('/[\n\t]/', '', $list->__toString());
        $expected = '<ul><mock>Item 1</mock><mock>Item 2</mock></ul>';
        $this->assertEquals($expected, $output,
            'Invalid output for list element');
    }
}
