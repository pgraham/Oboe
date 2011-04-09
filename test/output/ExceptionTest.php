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
namespace oboe\test\output;

use \oboe\Exception;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ .'/../test-common.php';

/**
 * This class tests the Oboe_Exception class.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class ExceptionTest extends TestCase {

  public function testException() {
    try {
      throw new Exception('I am a content exception');
    } catch (Exception $e) {
      $this->assertEquals('Oboe: I am a content exception', $e->getMessage(),
        'Invalid message for caught exception');
    }
  }
}
