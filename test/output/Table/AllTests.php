<?php
namespace OboeTest\Output\Table;
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

require_once __DIR__ . '/../../test-common.php';

/**
 * This class builds the suite of all Oboe_Table_* test cases.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class AllTests {

    public static function suite() {
        $suite = new \PHPUnit_Framework_TestSuite(
            'Oboe Table Output Test Suite');

        $suite->addTestSuite('OboeTest\Output\Table\BodyTest');
        $suite->addTestSuite('OboeTest\Output\Table\DataTest');
        $suite->addTestSuite('OboeTest\Output\Table\FootTest');
        $suite->addTestSuite('OboeTest\Output\Table\HeadTest');
        $suite->addTestSuite('OboeTest\Output\Table\RowTest');

        return $suite;
    }
}
