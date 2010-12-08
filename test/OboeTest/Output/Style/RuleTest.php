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
 * This class tests the output of the Oboe_StyleRule class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_Style_RuleTest extends PHPUnit_Framework_TestCase {

    public function testOutput() {
        $rule = new Oboe_Style_Rule('span.strong');

        $rule->add(new Oboe_Style_Property('font-weight', 'bold'));

        $prop = $rule->add('text-decoration', 'underline');
        $this->assertEquals('Oboe_Style_Property', get_class($prop),
            'Returned wrapper was not a Oboe_Style_Property instance');

        $output = preg_replace('/[\n\t]/', '', $rule->__toString());
        $expected = 'span.strong{font-weight:bold;text-decoration:underline}';
        $this->assertEquals($expected, $output,
            'Invalid output for style rule');
    }

    public function testOverwriteProperty() {
        $rule = new Oboe_Style_Rule('span.strong');

        $rule->add('font-weight', 'normal');
        $rule->add('font-weight', 'bold');

        $output = preg_replace('/[\n\t]/', '', $rule->__toString());
        $expected = 'span.strong{font-weight:bold}';
        $this->assertEquals($expected, $output,
            'Invalid output for overwritten style property');
    }
}
