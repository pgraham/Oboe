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
 * This class tests the Oboe_Text_Tabs class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class OboeTest_Output_Text_TabsTest extends PHPUnit_Framework_TestCase {

    public function testOutput() {
        for ($i = 1; $i <= 10; $i++) {
            $output = preg_replace('/[\t]/', '.', Oboe_Text_Tabs::getTabs($i));
            $expected = '';
            for ($j = 0; $j < $i; $j++) {
                $expected .= ".";
            }
            $this->assertEquals($expected, $output,
                'Invalid output for '.$i.' tabs');
        }

        $output = Oboe_Text_Tabs::getTabs();
        $expected = '';
        $this->assertEquals($expected, $output,
            'Invalid output for base tabs');

        for ($i = 0; $i < 10; $i++) {
            Oboe_Text_Tabs::incTabs();
            $output = preg_replace('/[\t]/', '.', Oboe_Text_Tabs::getTabs());
            $expected .= '.';
            $this->assertEquals($expected, $output,
                'Invalid output for incremented tabs '.$i);
        }

        for ($i = 0; $i < 10; $i++) {
            Oboe_Text_Tabs::decTabs();
            $output = preg_replace('/[\t]/', '.', Oboe_Text_Tabs::getTabs());
            $expected = substr($expected, 0, -1);
            $this->assertEquals($expected, $output,
                'Invalid output for decremented tabs '.$i);
        }
    }
}
