<?php
namespace OboeTest\Output;
use \Oboe\Anchor;
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

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the Oboe\Anchor class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class AnchorTest extends \PHPUnit_Framework_TestCase {

    public function testOutput() {
        $anchor = new Anchor('#', 'Click Me');

        $output = $anchor->__toString();

        $this->assertEquals('<a href="#">Click Me</a>', $output,
            'Unexpected anchor out');
    }
}
