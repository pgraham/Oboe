<?php
namespace OboeTest\Output;
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
 * @package OboeTest
 * @subpackage Output
 */

require_once __DIR__ . '/../test-common.php';

/**
 * This class builds the suite of test cases that test the output and interface
 * of all OboeTest_Output_* classes.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class AllTests {

    public static function suite() {
        $suite = new \PHPUnit_Framework_TestSuite('Oboe Output Test Suite');

        $suite->addTestSuite('OboeTest\Output\ElementBaseTest');
        $suite->addTestSuite('OboeTest\Output\ElementCompositeTest');
        $suite->addTestSuite('OboeTest\Output\ElementWrapperTest');
        $suite->addTestSuite('OboeTest\Output\BaseListTest');

        $suite->addTestSuite('OboeTest\Output\AnchorTest');
        $suite->addTestSuite('OboeTest\Output\BodyTest');
        $suite->addTestSuite('OboeTest\Output\CommentTest');
        $suite->addTestSuite('OboeTest\Output\DividerTest');
        $suite->addTestSuite('OboeTest\Output\DivTest');
        $suite->addTestSuite('OboeTest\Output\ElArrayTest');
        $suite->addTestSuite('OboeTest\Output\ExceptionTest');
        $suite->addTestSuite('OboeTest\Output\FormTest');
        $suite->addTestSuite('OboeTest\Output\HeadingTest');
        $suite->addTestSuite('OboeTest\Output\HeadTest');
        $suite->addTestSuite('OboeTest\Output\ImageTest');
        $suite->addTestSuite('OboeTest\Output\JavascriptTest');
        $suite->addTestSuite('OboeTest\Output\ListElTest');
        $suite->addTestSuite('OboeTest\Output\ListItemTest');
        $suite->addTestSuite('OboeTest\Output\PageTest');
        $suite->addTestSuite('OboeTest\Output\ParagraphTest');
        $suite->addTestSuite('OboeTest\Output\SpanTest');
        $suite->addTestSuite('OboeTest\Output\StyleTest');
        $suite->addTestSuite('OboeTest\Output\TableTest');

        $suite->addTest(Form\AllTests::suite());
        $suite->addTest(Head\AllTests::suite());
        $suite->addTest(Style\AllTests::suite());
        $suite->addTest(Table\AllTests::suite());
        $suite->addTest(Text\AllTests::suite());

        return $suite;
    }
}
