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
 * This class tests the output of the Oboe_Head class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_HeadTest extends PHPUnit_Framework_TestCase {

    protected function setUp() {
        // Empty the head before each test
        $head = Oboe_Head::getInstance();
        $head->removeAll();
    }

    /**
     * It's not permissible to add arbitrary test to the <head> element.
     *
     * @expectedException Oboe_Exception
     */
    public function testAddString() {
        $head = Oboe_Head::getInstance();
        $head->add('Invalid head string');
    }

    public function testSingletonOutput() {
        $head1 = Oboe_Head::getInstance();
        $head2 = Oboe_Head::getInstance();

        $head1->add(new OboeTest_Mock_HeadElement());

        $output1 = preg_replace('/[\n\t]/', '', $head1->__toString());
        $output2 = preg_replace('/[\n\t]/', '', $head2->__toString());
        $this->assertEquals($output1, $output2, 'Outputs did not match');
        $expected = '<head><headele/></head>';
        $this->assertEquals($expected, $output1,
            'Invalid ouput for head element');
    }

    public function testSetTitle() {
        $head = Oboe_Head::getInstance();
        $head->setTitle('Look ma, a web page!');

        $output = preg_replace('/[\n\t]/', '', $head->__toString());
        $expected = '<head><title>Look ma, a web page!</title></head>';
        $this->assertEquals($expected, $output,
            'Invalid output for head with a title specified');
    }
}
