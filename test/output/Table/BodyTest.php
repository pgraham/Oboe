<?php
namespace OboeTest\Output\Table;
use \Oboe\Table\Body;
use \Oboe\Table\Data;
use \Oboe\Table\Row;
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

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the Oboe_Table_Body class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 * @subpackage Table
 */
class BodyTest extends \PHPUnit_Framework_TestCase {
    
    public function testOutput() {
        $tRow = new Row();
        $tRow->add(new Data('cell'));

        $tBody = new Body();
        $tBody->add($tRow);
        $output = $tBody->__toString();
        $expected = '<tbody><tr><td>cell</td></tr></tbody>';
        $this->assertEquals($expected, $output,
            'Invalid output for tbody element');
    }
}
