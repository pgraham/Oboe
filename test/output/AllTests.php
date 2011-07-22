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

use \PHPUnit_Framework_TestSuite as TestSuite;

require_once __DIR__ . '/../test-common.php';

/**
 * This class builds the suite of test cases that test the output and interface
 * of all oboe\test\output classes.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class AllTests {

  public static function suite() {
    $suite = new TestSuite('Oboe Output Test Suite');

    $suite->addTestSuite('oboe\test\output\ElementBaseTest');
    $suite->addTestSuite('oboe\test\output\ElementCompositeTest');

    $suite->addTestSuite('oboe\test\output\AnchorTest');
    $suite->addTestSuite('oboe\test\output\BodyTest');
    $suite->addTestSuite('oboe\test\output\CommentTest');
    $suite->addTestSuite('oboe\test\output\DividerTest');
    $suite->addTestSuite('oboe\test\output\DivTest');
    $suite->addTestSuite('oboe\test\output\ExceptionTest');
    $suite->addTestSuite('oboe\test\output\FormTest');
    $suite->addTestSuite('oboe\test\output\HeadingTest');
    $suite->addTestSuite('oboe\test\output\HeadTest');
    $suite->addTestSuite('oboe\test\output\ImageTest');
    $suite->addTestSuite('oboe\test\output\JavascriptTest');
    $suite->addTestSuite('oboe\test\output\ListTest');
    $suite->addTestSuite('oboe\test\output\ListItemTest');
    $suite->addTestSuite('oboe\test\output\PageTest');
    $suite->addTestSuite('oboe\test\output\ParagraphTest');
    $suite->addTestSuite('oboe\test\output\SpanTest');
    $suite->addTestSuite('oboe\test\output\StyleTest');
    $suite->addTestSuite('oboe\test\output\TableTest');

    $suite->addTest(form\AllTests::suite());
    $suite->addTest(head\AllTests::suite());
    $suite->addTest(style\AllTests::suite());
    $suite->addTest(table\AllTests::suite());
    $suite->addTest(text\AllTests::suite());

    return $suite;
  }
}
