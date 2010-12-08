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
 */

require_once dirname(__FILE__).'/../test-common.php';

/**
 * This class builds the complete test suite for Oboe.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 */
class OboeTest_AllTests {

    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite('Oboe Test Suite');
        
        $suite->addTest(OboeTest_Output_AllTests::suite());
        $suite->addTest(OboeTest_Struct_AllTests::suite());

        return $suite;
    }
}
