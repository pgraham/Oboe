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

use \oboe\Head;
use \oboe\Page;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the Oboe_Page class.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class PageTest extends TestCase {

  public function testOutput() {
    $page = Page::getInstance();
    $page->removeAll();

    $output = $page->__toString();
    $expected = "<!DOCTYPE html>\n"
      . '<html lang="en"><head><meta charset="utf-8"/><!--[if lt IE 9]>' . "\n"
      . '<script src="' . Head::SHIV_URL . '"></script>' . "\n"
      . '<![endif]-->' . "\n"
      . '</head><body></body></html>';
    $this->assertEquals($expected, $output, 'Invalid output for html element'); 
  }

  public function testSetTitle() {
    $page = Page::getInstance();
    $page->removeAll();
    $page->setTitle('How bout\' it?');

    $output = $page->__toString();
    $expected = "<!DOCTYPE html>\n"
      . '<html lang="en"><head><meta charset="utf-8"/>'
      . '<title>How bout\' it?</title>'
      . '<!--[if lt IE 9]>' . "\n"
      . '<script src="' . Head::SHIV_URL . '"></script>' . "\n"
      . '<![endif]-->' . "\n"
      . '</head><body></body></html>';
    $this->assertEquals($expected, $output);
  }
}
