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
 * @package oboe/test/output/head
 */
namespace oboe\test\output\head;

use \oboe\head\Link;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the output of the Oboe_Head_Link class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output/head
 */
class LinkTest extends TestCase {

  public function testOutput() {
    $link = new Link('relationship', '/resources/booyah.wow');
    $output = $link->__toString();
    $expected = '<link rel="relationship" href="/resources/booyah.wow"/>';
    $this->assertEquals($expected, $output,
      'Invalid output for link element with default parameters');

    $link = new Link('relationship', '/resources/booyah.wow',
      'omg/awesomeness');
    $output = $link->__toString();
    $expected = '<link rel="relationship" href="/resources/booyah.wow" '.
      'type="omg/awesomeness"/>';
    $this->assertEquals($expected, $output,
      'Invalid output for link element with type specified');

    $link = new Link('relationship', '/resources/booyah.wow',
      null, 'print');
    $output = $link->__toString();
    $expected = '<link rel="relationship" href="/resources/booyah.wow" '.
      'media="print"/>';
    $this->assertEquals($expected, $output,
      'Invalid output for link element with media specified');

    $link = new Link('relationship', '/resources/booyah.wow',
      'type/type', 'media');
    $output = $link->__toString();
    $expected = '<link rel="relationship" href="/resources/booyah.wow" '.
      'type="type/type" media="media"/>';
    $this->assertEquals($expected, $output,
      'Invalid output for link element with type and media specified');
  }
}
