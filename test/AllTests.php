<?php
namespace OboeTest;
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
namespace oboe\test;

use \PHPUnit_Framework_TestSuite as TestSuite;

require_once __DIR__ . '/test-common.php';

/**
 * This class builds the complete test suite for Oboe.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class AllTests {

    public static function suite() {
        $suite = new TestSuite('Oboe Test Suite');
        
        $suite->addTest(output\AllTests::suite());
        $suite->addTest(struct\AllTests::suite());

        return $suite;
    }
}
