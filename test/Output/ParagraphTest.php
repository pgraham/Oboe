<?php
namespace OboeTest\Output;
use \Oboe\Paragraph;
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
 * This class tests the output of the Oboe_Paragraph class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Output
 */
class ParagraphTest extends \PHPUnit_Framework_TestCase {

    public function testOutput() {
        $p = new Paragraph('I\'m a block of text');
        $output = $p->__toString();
        $expected = '<p>I\'m a block of text</p>';
        $this->assertEquals($expected, $output,
            'Invalid output for paragraph element');

        $p->add('.  I can be populated piece by piece');
        $output = $p->__toString();
        $expected = '<p>I\'m a block of text.  '.
            'I can be populated piece by piece</p>';
        $this->assertEquals($expected, $output,
            'Invalid output for paragraph element');
    }
}
