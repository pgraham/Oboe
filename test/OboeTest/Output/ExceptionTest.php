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

require_once dirname(__FILE__).'/../../test-common.php';

/**
 * This class tests the Oboe_Exception class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_ExceptionTest extends PHPUnit_Framework_TestCase {

    public function testException() {
        try {
            throw new Oboe_Exception('I am a content exception');
        } catch (Oboe_Exception $e) {
            $this->assertEquals('I am a content exception', $e->getMessage(),
                'Invalid message for caught exception');
        }
    }
}
