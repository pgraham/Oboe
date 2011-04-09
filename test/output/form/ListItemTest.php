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
namespace oboe\test\output\form;

use \oboe\form\ListItem;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ .'/../../test-common.php';

/**
 * This class tests the output of the oboe\form\ListItem element.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class ListItemTest extends TestCase {

  public function testOutput() {
    $li = new ListItem('Item 1');
    $output = $li->__toString();
    $expected = '<li>Item 1</li>';
    $this->assertEquals($expected, $output,
      'Invalid output for list item element');
  }
}
