<?php
namespace OboeTest\Struct;
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
 * @subpackage Struct
 */

require_once __DIR__ . '/../test-common.php';

/**
 * This class builds the suite of test cases that test the structure building
 * methods.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Struct
 */
class AllTests { 
    public static function suite() {
        $suite = new \PHPUnit_Framework_TestSuite('Oboe Structure Test Suite');

        $suite->addTestSuite('OboeTest\Struct\ElementBaseTest');

        return $suite;
    }
}
