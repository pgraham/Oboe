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
 * @package oboe\test\output\style
 */
namespace oboe\test\output\style;

use \oboe\style\Property;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the output of the oboe\StyleProperty class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe\test\output\style
 */
class PropertyTest extends TestCase {

  public function testOutput() {
    $property = new Property('position', 'absolute');
    $output = $property->__toString();
    $expected = 'position:absolute';

    $this->assertEquals($expected, $output,
      'Invalid output for style property');
  }
}
