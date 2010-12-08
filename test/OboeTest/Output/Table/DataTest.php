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
 * This class tests the Oboe_Table_Data class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_Table_DataTest extends PHPUnit_Framework_TestCase {
    
    public function testOutput() {
        $td = new Oboe_Table_Data('cell');
        $output = preg_replace('/[\n\t]/', '', $td->__toString());
        $expected = '<td>cell</td>';
        $this->assertEquals($expected, $output,
            'Invalid output for td element');
    }
}
