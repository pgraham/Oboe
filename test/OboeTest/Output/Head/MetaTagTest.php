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
 * This class tests the output of the Oboe_MetaTag class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_Head_MetaTagTest extends PHPUnit_Framework_TestCase {

    public function testOutput() {
        $meta = new Oboe_Head_MetaTag('author', 'Philip Graham');
        $output = preg_replace('/[\n\t]/', '', $meta->__toString());
        $expected = '<meta name="author" content="Philip Graham"/>';
        $this->assertEquals($expected, $output,
            'Invalid output for meta tag element');

        $meta = new Oboe_Head_MetaTag('keywords', array(
            'awesome', 'the greatest', 'stud', 'hero'));
        $output = preg_replace('/[\n\t]/', '', $meta->__toString());
        $expected = '<meta name="keywords" '.
            'content="awesome,the greatest,stud,hero"/>';
        $this->assertEquals($expected, $output,
            'Invalid output for meta tag element');
    }
}
