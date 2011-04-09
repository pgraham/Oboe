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
namespace oboe\test\output\head;

use \oboe\head\MetaTag;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the output of the oboe\head\MetaTag class.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class MetaTagTest extends TestCase {

  public function testOutput() {
    $meta = new MetaTag('author', 'Philip Graham');
    $output = $meta->__toString();
    $expected = '<meta name="author" content="Philip Graham"/>';
    $this->assertEquals($expected, $output,
      'Invalid output for meta tag element');

    $meta = new MetaTag('keywords', array('awesome', 'the greatest', 'stud',
      'hero'));
    $output = $meta->__toString();
    $expected = '<meta name="keywords" '.
      'content="awesome,the greatest,stud,hero"/>';
    $this->assertEquals($expected, $output,
      'Invalid output for meta tag element');
  }
}
