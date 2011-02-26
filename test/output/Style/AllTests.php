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
 * @package oboe/test/output/style
 */
namespace oboe\test\output\style;

use \PHPUnit_Framework_TestSuite as TestSuite;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class builds the suite of all oboe\test\output\style\* test cases.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output/style
 */
class AllTests {

  public static function suite() {
    $suite = new TestSuite('Oboe Style Output Test Suite');

    $suite->addTestSuite('oboe\test\output\style\PropertyTest');
    $suite->addTestSuite('oboe\test\output\style\RuleTest');

    return $suite;
  }
}
