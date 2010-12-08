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
 * This class tests the output of the Oboe_Head_Link class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_Head_LinkTest extends PHPUnit_Framework_TestCase {

    public function testOutput() {
        $link = new Oboe_Head_Link('relationship', '/resources/booyah.wow');
        $output = preg_replace('/[\n\t]/', '', $link->__toString());
        $expected = '<link rel="relationship" href="/resources/booyah.wow"/>';
        $this->assertEquals($expected, $output,
            'Invalid output for link element with default parameters');

        $link = new Oboe_Head_Link('relationship', '/resources/booyah.wow',
            'omg/awesomeness');
        $output = preg_replace('/[\n\t]/', '', $link->__toString());
        $expected = '<link rel="relationship" href="/resources/booyah.wow" '.
            'type="omg/awesomeness"/>';
        $this->assertEquals($expected, $output,
            'Invalid output for link element with type specified');

        $link = new Oboe_Head_Link('relationship', '/resources/booyah.wow',
            null, 'print');
        $output = preg_replace('/[\n\t]/', '', $link->__toString());
        $expected = '<link rel="relationship" href="/resources/booyah.wow" '.
            'media="print"/>';
        $this->assertEquals($expected, $output,
            'Invalid output for link element with media specified');

        $link = new Oboe_Head_Link('relationship', '/resources/booyah.wow',
            'type/type', 'media');
        $output = preg_replace('/[\n\t]/', '', $link->__toString());
        $expected = '<link rel="relationship" href="/resources/booyah.wow" '.
            'type="type/type" media="media"/>';
        $this->assertEquals($expected, $output,
            'Invalid output for link element with type and media specified');
    }
}
