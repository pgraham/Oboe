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
 * This class tests the output of the Oboe_Style class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_StyleTest extends PHPUnit_Framework_TestCase {

    public function testAddSignature() {
        $style = new Oboe_Style();

        // Add a Oboe_StyleRule object
        $spanStrong = new Oboe_Style_Rule('span.strong');
        $spanStrong->add('font-weight', 'bold');
        $spanStrong->add(new Oboe_Style_Property(
            'text-decoration', 'underline'));
        $style->add($spanStrong);

        // Add a given Oboe_StyleProperty to the rule with the given
        // selector
        $rule = $style->add('div.pageComponent', new Oboe_Style_Property(
            'position', 'absolute'));
        $this->assertEquals('Oboe_Style_Rule', get_class($rule),
            'Returned element was not a Oboe_Style_Rule');

        // Add the declared property to the rule with the given selector
        $rule = $style->add('div.componentContentWrapper', 'position',
            'relative');
        $this->assertEquals('Oboe_Style_Rule', get_class($rule),
            'Returned element was not a Oboe_Style_Rule');

        // Make sure that output is good
        $output = preg_replace('/[\n\t]/', '', $style->__toString());
        $expected = '<style>'.
            'span.strong{font-weight:bold;text-decoration:underline}'.
            'div.pageComponent{position:absolute}'.
            'div.componentContentWrapper{position:relative}</style>';
        $this->assertEquals($expected, $output,
            'Invalid output for style element');
    }
}
