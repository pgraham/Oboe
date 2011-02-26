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
 * @package oboe/test/output/form
 */
namespace oboe\test\output\form;

use \oboe\form\Input;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the output of the oboe\form\Input element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output/form
 */
class InputTest extends TestCase {

  public function testOutput() {
    $input = new Input('input', 'input', 'input', 'input');
    $output = $input->__toString();
    $expected = '<input class="input" type="input" name="input" '.
      'value="input"/>';
    $this->assertEquals($expected, $output, 'Invalid output for input element');
  }
}
