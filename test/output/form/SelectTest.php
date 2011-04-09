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

use \oboe\form\Select;
use \oboe\form\SelectOption;
use \oboe\Anchor;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../../test-common.php';

/**
 * This class tests the output of the oboe\form\Select element.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class SelectTest extends TestCase {
  
  public function testOutput() {
    $select = new Select('sel');
    $output = $select->__toString();
    $expected = '<select name="sel"></select>';
    $this->assertEquals($expected, $output,
      'Invalid output for select element');
  }

  public function testAddObject() {
    $select = new Select('sel');

    $expected = '<select name="sel">';
    for ($i = 1; $i <= 10; $i++) {
      $opt = new SelectOption('opt'.$i, 'Option '.$i);
      $select->add($opt);
      $expected .= '<option value="opt'.$i.'">Option '.$i.'</option>';
    }
    $expected .= '</select>';

    $output = $select->__toString();
    $this->assertEquals($expected, $output,
      'Invalid output for select element when adding option by object');
  }

  public function testAddConstructorArgs() {
    $select = new Select('sel');

    $expected = '<select name="sel">';
    for ($i = 1; $i <= 10; $i++) {
      $opt = $select->add('opt'.$i, 'Option '.$i);
      $expected .= '<option value="opt'.$i.'">Option '.$i.'</option>';
    }
    $expected .= '</select>';
    $output = $select->__toString();
    $this->assertEquals($expected, $output, 'Invalid output for select '.
      'element when adding options by constructor arguments');
  }

  /**
   * @expectedException Oboe\Exception
   */
  public function testAddBadObject() {
    $select = new Select('sel');
    $select->add('opt', new Anchor('#', 'Click me'));
  }
}
