<?php
namespace OboeTest\Struct;
use \OboeTest\Mock;
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
 * This class tests the structure building methods of the Oboe_ElementBase
 * abstract class using mocks
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Struct
 */
class ElementBaseTest extends \PHPUnit_Framework_TestCase {

    public function testAddToHead() {
        $mock = new Mock\HeadElement();

        try {
            $mock->addToHead();
        } catch (Exception $e) {
            $this->fail('Exception caught adding element to head using '
                .'shortcut method: '.$e->__toString());
        }
    }
}
