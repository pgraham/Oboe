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
 */
namespace oboe\test\output;

use \oboe\Comment;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the oboe\Comment class.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class CommentTest extends TestCase {

    public function testOutput() {
        $comment = new Comment('This is a comment, look at how useful it is');

        $output = $comment->__toString();
        $expected = '<!-- This is a comment, look at how useful it is -->';

        $this->assertEquals($expected, $output);
    }
}
