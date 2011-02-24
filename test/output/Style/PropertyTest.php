<?php
namespace OboeTest\Output\Style;
use \Oboe\Style\Property;
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
 * This class tests the output of the Oboe_StyleProperty class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class PropertyTest extends \PHPUnit_Framework_TestCase {

    public function testOutput() {
        $property = new Property('position', 'absolute');
        $output = $property->__toString();
        $expected = 'position:absolute';

        $this->assertEquals($expected, $output,
            'Invalid output for style property');
    }
}
