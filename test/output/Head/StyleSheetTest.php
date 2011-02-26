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
 * @package oboe/test/output/head
 */
namespace oboe\test\output\head;

use \oboe\head\StyleSheet;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the output of the oboe\head\StyleSheet class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output/head
 */
class StyleSheetTest extends TestCase {

  public function testOutput() {
    $sheet = new StyleSheet('/css/style.css');
    $output = $sheet->__toString();
    $expected = '<link rel="stylesheet" href="/css/style.css" '.
      'type="text/css"/>';
    $this->assertEquals($expected, $output,
      'Invalid output for stylesheet element');

    $sheet = new StyleSheet('/css/style.css', 'print');
    $output = $sheet->__toString();
    $expected = '<link rel="stylesheet" href="/css/style.css" '.
      'type="text/css" media="print"/>';
    $this->assertEquals($expected, $output,
      'Invalid output for stylesheet element with media');
  }
}
