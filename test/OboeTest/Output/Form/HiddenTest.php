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
 * This class tests the output of the Oboe_Form_Hidden class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_Form_HiddenTest extends PHPUnit_Framework_TestCase {

    public function testOutput() {
        $hidden = new Oboe_Form_Hidden('whosgreat', 'philip');
        $output = preg_replace('/[\n\t]/', '', $hidden->__toString());
        $expected = '<input type="hidden" name="whosgreat" value="philip"/>';
        $this->assertEquals($expected, $output,
            'Invalid output for hidden input element');
    }
}
