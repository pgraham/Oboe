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
 * @package oboe/test/output/table
 */
namespace oboe\test\output\table;

use \oboe\table\Data;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the oboe\table\Data class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output/table
 */
class DataTest extends TestCase {
  
  public function testOutput() {
    $td = new Data('cell');
    $output = $td->__toString();
    $expected = '<td>cell</td>';
    $this->assertEquals($expected, $output, 'Invalid output for td element');
  }
}
