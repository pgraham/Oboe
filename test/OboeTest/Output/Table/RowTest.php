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
 * This class tests the Oboe_Table_Row class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 * @subpackage Table
 */
class OboeTest_Output_Table_RowTest extends PHPUnit_Framework_TestCase {

    public function testOutput() {
        $tr = new Oboe_Table_Row();
        $tr->add(new Oboe_Table_Data('cell'));
        $output = preg_replace('/[\n\t]/', '', $tr->__toString());
        $expected = '<tr><td>cell</td></tr>';
        $this->assertEquals($expected, $output,
            'Invalid output for tr element');
    }
}
