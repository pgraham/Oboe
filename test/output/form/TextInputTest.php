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
namespace oboe\test\output\form;

use \oboe\form\TextInput;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the output of the Oboe_Form_TextInput element.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class TextInputTest extends TestCase {

  public function testOutput() {
    $text = new TextInput('input');
    $output = $text->__toString();
    $expected = '<input id="input" class="text" type="text" name="input"/>';
    $this->assertEquals($expected, $output,
        'Invalid output for text input element');

    $text = new TextInput('input', 'Something revolutionary');
    $output = $text->__toString();
    $expected = '<input id="input" class="text" type="text" name="input" '.
      'value="Something revolutionary"/>';
    $this->assertEquals($expected, $output,
      'Invalid output for text input element');
  }
}
