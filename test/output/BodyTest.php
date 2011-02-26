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
 * @package oboe/test/output
 */
namespace oboe\test\output;

use \oboe\Body;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the Oboe_Body class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output
 */
class BodyTest extends TestCase {

    public function testSingleton() {
        $body = Body::getInstance();
        $body->add('Look ma, ');

        $anotherBody = Body::getInstance();
        $anotherBody->add('I\'m a big boy!');
        
        $bodyStr = $body->__toString();
        $anotherBodyStr = $anotherBody->__toString();

        $this->assertEquals($bodyStr, $anotherBodyStr);

        $bodyStr = $bodyStr;
        $expected = '<body>Look ma, I\'m a big boy!</body>';

        $this->assertEquals($bodyStr, $expected);
    }
}
