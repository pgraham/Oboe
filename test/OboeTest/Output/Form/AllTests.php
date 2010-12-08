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
 * @subpackage Form
 */

require_once dirname(__FILE__).'/../../../test-common.php';

/**
 * This class builds the suite of all OboeTest_Output_Form_* test cases.
 *
 * @author <a href="mailto:philip@lightbox.org">Philip Graham</a>
 * @package OboeTest
 * @subpackage Output
 * @subpackage Form
 */
class OboeTest_Output_Form_AllTests {

    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite('Oboe Form Output Test Suite');

        $suite->addTestSuite('OboeTest_Output_Form_InputTest');
        $suite->addTestSuite('OboeTest_Output_Form_ButtonTest');
        $suite->addTestSuite('OboeTest_Output_Form_DivTest');
        $suite->addTestSuite('OboeTest_Output_Form_FileUploadTest');
        $suite->addTestSuite('OboeTest_Output_Form_HiddenTest');
        $suite->addTestSuite('OboeTest_Output_Form_ListItemTest');
        $suite->addTestSuite('OboeTest_Output_Form_ListTest');
        $suite->addTestSuite('OboeTest_Output_Form_PasswordTest');
        $suite->addTestSuite('OboeTest_Output_Form_SelectOptionTest');
        $suite->addTestSuite('OboeTest_Output_Form_SelectTest');
        $suite->addTestSuite('OboeTest_Output_Form_SpanTest');
        $suite->addTestSuite('OboeTest_Output_Form_SubmitTest');
        $suite->addTestSuite('OboeTest_Output_Form_TextAreaTest');
        $suite->addTestSuite('OboeTest_Output_Form_TextInputTest');

        return $suite;
    }
}
