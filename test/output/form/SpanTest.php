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

use \oboe\form\Span;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ .'/../../test-common.php';

/**
 * This class tests the output of the oboe\form\Span element.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class SpanTest extends TestCase {

  public function testOutput() {
    $span = new Span(null, 'strong');
    $span->add('Pay attention to me!');
    $output = $span->__toString();
    $expected = '<span class="strong">Pay attention to me!</span>';
    $this->assertEquals($expected, $output, 'Invalid output for span element');

    $span->setClass(null);
    $span->setStyle('font-weight', 'bold');
    $span->add('  I\'m worthy of attention.');
    $output = $span->__toString();
    $expected = '<span style="font-weight:bold;">'.
      'Pay attention to me!  I\'m worthy of attention.</span>';
    $this->assertEquals($expected, $output, 'Invalid output for span element');
  }
}
