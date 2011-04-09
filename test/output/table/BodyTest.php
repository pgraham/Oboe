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
 */
namespace oboe\test\output\table;

use \oboe\table\Body;
use \oboe\table\Data;
use \oboe\table\Row;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the oboe\table\Body class.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class BodyTest extends TestCase {
  
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
