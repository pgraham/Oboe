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
namespace oboe\test\output\head;

use \oboe\head\Javascript;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the output of the oboe\head\Javascript class.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class JavascriptTest extends TestCase {

  public function testOutput() {
    $js = new Javascript('/js/myScript.js');
    $output = $js->__toString();
    $expected = '<script src="/js/myScript.js"></script>';
    $this->assertEquals($expected, $output,
      'Invalid output the head javascript element');
  }
}
