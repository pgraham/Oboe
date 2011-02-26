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
 * @package oboe/test/struct
 */
namespace oboe\test\struct;

use \oboe\test\mock\HeadElement;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the structure building methods of the oboe\ElementBase
 * abstract class using mocks
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/struct
 */
class ElementBaseTest extends TestCase {

  public function testAddToHead() {
    $mock = new HeadElement();

    try {
      $mock->addToHead();
    } catch (Exception $e) {
      $this->fail('Exception caught adding element to head using '
        .'shortcut method: '.$e->__toString());
    }
  }
}
