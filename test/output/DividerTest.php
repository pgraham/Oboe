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
 * @package oboe/test/output
 */
namespace oboe\test\output;

use \oboe\Divider;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the oboe\Divider class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output
 */
class DividerTest extends TestCase {

  public function testOutput() {
    $hr = new Divider();

    $output = $hr->__toString();
    $expected = '<hr/>';

    $this->assertEquals($expected, $output,
      'Invalid output for <hr/> element');
  }

  public function testOutputWithWidth() {
    $hr = new Divider(80);
    
    $output = $hr->__toString();
    $expected = '<hr style="width:80%;"/>';

    $this->assertEquals($expected, $output,
      'Invalid output for <hr/> element');
  }
}
