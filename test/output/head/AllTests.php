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

use \PHPUnit_Framework_TestSuite as TestSuite;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class builds the suite of all oboe\head\* test cases.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output/head
 */
class AllTests {
    
  public static function suite() {
    $suite = new TestSuite('Oboe Head Output Test Suite');

    $suite->addTestSuite('oboe\test\output\head\FavIconTest');
    $suite->addTestSuite('oboe\test\output\head\JavascriptTest');
    $suite->addTestSuite('oboe\test\output\head\LinkTest');
    $suite->addTestSuite('oboe\test\output\head\MetaTagTest');
    $suite->addTestSuite('oboe\test\output\head\StyleSheetTest');
    $suite->addTestSuite('oboe\test\output\head\TitleTest');

    return $suite;
  }
}
