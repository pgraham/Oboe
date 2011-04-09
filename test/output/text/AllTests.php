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
namespace oboe\test\output\text;

use \PHPUnit_Framework_TestSuite as TestSuite;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class build the suite of all oboe\text\* test cases.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class AllTests {

  public static function suite() {
    $suite = new TestSuite('Oboe Text Output Test Suite');

    $suite->addTestSuite('oboe\test\output\text\HSpaceTest');
    $suite->addTestSuite('oboe\test\output\text\PreformattedTest');
    $suite->addTestSuite('oboe\test\output\text\VSpaceTest');

    return $suite;
  }
}
