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

require_once dirname(__FILE__).'/../../../test-common.php';

/**
 * This class builds the suite of all OboeTest_Output_Style_* test cases.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_Style_AllTests {

    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite(
            'Oboe Style Output Test Suite');

        $suite->addTestSuite('OboeTest_Output_Style_PropertyTest');
        $suite->addTestSuite('OboeTest_Output_Style_RuleTest');

        return $suite;
    }
}
