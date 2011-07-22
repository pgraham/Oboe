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

use \oboe\test\mock;
use \oboe\Head;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the oboe\Head class.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class HeadTest extends TestCase {

  protected function setUp() {
    // Empty the head before each test
    $head = Head::getInstance();
    $head->removeAll();
  }

  /**
   * It's not permissible to add arbitrary test to the <head> element.
   *
   * @expectedException Oboe\Exception
   */
  public function testAddString() {
    $head = Head::getInstance();
    $head->add('Invalid head string');
  }

  public function testSingletonOutput() {
    $head1 = Head::getInstance();
    $head2 = Head::getInstance();

    $head1->add(new Mock\HeadElement());

    $output = $head1->__toString();
    $expected = '<head><meta charset="utf-8"/>'
      . '<headele/><!--[if lt IE 9]>' . "\n"
      . '<script src="' . Head::SHIV_URL . '"></script>' . "\n"
      . "<![endif]-->\n</head>";
    $this->assertEquals($expected, $output, 'Invalid ouput for head element');
  }

  public function testSetTitle() {
    $head = Head::getInstance();
    $head->setTitle('Look ma, a web page!');

    $output = $head->__toString();
    $expected = '<head><meta charset="utf-8"/>'
      . '<title>Look ma, a web page!</title><!--[if lt IE 9]>' . "\n"
      . '<script src="' . Head::SHIV_URL . '"></script>' . "\n"
      . "<![endif]-->\n</head>";
    $this->assertEquals($expected, $output,
      'Invalid output for head with a title specified');
  }
}
