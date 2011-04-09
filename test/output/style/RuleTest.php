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
namespace oboe\test\output\style;

use \oboe\style\Property;
use \oboe\style\Rule;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the output of the oboe\style\StyleRule class.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class RuleTest extends TestCase {

  public function testOutput() {
    $rule = new Rule('span.strong');

    $rule->add(new Property('font-weight', 'bold'));

    $prop = $rule->add('text-decoration', 'underline');
    $this->assertEquals('oboe\style\Property', get_class($prop),
      'Returned wrapper was not a Oboe_Style_Property instance');

    $output = $rule->__toString();
    $expected = 'span.strong{font-weight:bold;text-decoration:underline}';
    $this->assertEquals($expected, $output, 'Invalid output for style rule');
  }

  public function testOverwriteProperty() {
    $rule = new Rule('span.strong');

    $rule->add('font-weight', 'normal');
    $rule->add('font-weight', 'bold');

    $output = $rule->__toString();
    $expected = 'span.strong{font-weight:bold}';
    $this->assertEquals($expected, $output,
      'Invalid output for overwritten style property');
  }
}
