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
namespace oboe\test\output\form;

use \PHPUnit_Framework_TestSuite as TestSuite;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class builds the suite of all OboeTest_Output_Form_* test cases.
 *
 * @author <a href="mailto:philip@lightbox.org">Philip Graham</a>
 */
class AllTests {

  public static function suite() {
    $suite = new TestSuite('Oboe Form Output Test Suite');

    $suite->addTestSuite('oboe\test\output\form\ButtonTest');
    $suite->addTestSuite('oboe\test\output\form\FileUploadTest');
    $suite->addTestSuite('oboe\test\output\form\HiddenTest');
    $suite->addTestSuite('oboe\test\output\form\PasswordTest');
    $suite->addTestSuite('oboe\test\output\form\SelectOptionTest');
    $suite->addTestSuite('oboe\test\output\form\SelectTest');
    $suite->addTestSuite('oboe\test\output\form\SubmitTest');
    $suite->addTestSuite('oboe\test\output\form\TextAreaTest');
    $suite->addTestSuite('oboe\test\output\form\TextInputTest');

    return $suite;
  }
}
