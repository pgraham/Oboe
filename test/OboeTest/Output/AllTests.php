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
 * @package OboeTest
 * @subpackage Output
 */

require_once dirname(__FILE__).'/../../test-common.php';

/**
 * This class builds the suite of test cases that test the output and interface
 * of all OboeTest_Output_* classes.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_AllTests {

    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite('Oboe Output Test Suite');

        $suite->addTestSuite('OboeTest_Output_ElementBaseTest');
        $suite->addTestSuite('OboeTest_Output_ElementCompositeTest');
        $suite->addTestSuite('OboeTest_Output_ElementWrapperTest');
        $suite->addTestSuite('OboeTest_Output_BaseListTest');

        $suite->addTestSuite('OboeTest_Output_AnchorTest');
        $suite->addTestSuite('OboeTest_Output_ArrayTest');
        $suite->addTestSuite('OboeTest_Output_BodyTest');
        $suite->addTestSuite('OboeTest_Output_CommentTest');
        $suite->addTestSuite('OboeTest_Output_DividerTest');
        $suite->addTestSuite('OboeTest_Output_DivTest');
        $suite->addTestSuite('OboeTest_Output_ExceptionTest');
        $suite->addTestSuite('OboeTest_Output_FormTest');
        $suite->addTestSuite('OboeTest_Output_HeadingTest');
        $suite->addTestSuite('OboeTest_Output_HeadTest');
        $suite->addTestSuite('OboeTest_Output_ImageTest');
        $suite->addTestSuite('OboeTest_Output_JavascriptTest');
        $suite->addTestSuite('OboeTest_Output_ListItemTest');
        $suite->addTestSuite('OboeTest_Output_ListTest');
        $suite->addTestSuite('OboeTest_Output_PageTest');
        $suite->addTestSuite('OboeTest_Output_ParagraphTest');
        $suite->addTestSuite('OboeTest_Output_SpanTest');
        $suite->addTestSuite('OboeTest_Output_StyleTest');
        $suite->addTestSuite('OboeTest_Output_TableTest');

        $suite->addTest(OboeTest_Output_Form_AllTests::suite());
        $suite->addTest(OboeTest_Output_Head_AllTests::suite());
        $suite->addTest(OboeTest_Output_Style_AllTests::suite());
        $suite->addTest(OboeTest_Output_Table_AllTests::suite());
        $suite->addTest(OboeTest_Output_Text_AllTests::suite());

        return $suite;
    }
}
