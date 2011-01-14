<?php
namespace OboeTest\Output\Form;
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

require_once __DIR__ . '/../../test-common.php';

/**
 * This class builds the suite of all OboeTest_Output_Form_* test cases.
 *
 * @author <a href="mailto:philip@lightbox.org">Philip Graham</a>
 * @package OboeTest
 * @subpackage Output
 * @subpackage Form
 */
class AllTests {

    public static function suite() {
        $suite = new \PHPUnit_Framework_TestSuite('Oboe Form Output Test Suite');

        $suite->addTestSuite('OboeTest\Output\Form\InputTest');
        $suite->addTestSuite('OboeTest\Output\Form\ButtonTest');
        $suite->addTestSuite('OboeTest\Output\Form\DivTest');
        $suite->addTestSuite('OboeTest\Output\Form\FileUploadTest');
        $suite->addTestSuite('OboeTest\Output\Form\HiddenTest');
        $suite->addTestSuite('OboeTest\Output\Form\ListElTest');
        $suite->addTestSuite('OboeTest\Output\Form\ListItemTest');
        $suite->addTestSuite('OboeTest\Output\Form\PasswordTest');
        $suite->addTestSuite('OboeTest\Output\Form\SelectOptionTest');
        $suite->addTestSuite('OboeTest\Output\Form\SelectTest');
        $suite->addTestSuite('OboeTest\Output\Form\SpanTest');
        $suite->addTestSuite('OboeTest\Output\Form\SubmitTest');
        $suite->addTestSuite('OboeTest\Output\Form\TextAreaTest');
        $suite->addTestSuite('OboeTest\Output\Form\TextInputTest');

        return $suite;
    }
}
