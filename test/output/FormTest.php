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
 * @package oboe/test/output
 */
namespace oboe\test\output;

use \oboe\Form;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ . '/../test-common.php';

/**
 * This class tests the output of the Form class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output
 */
class FormTest extends TestCase {

  public function testConstructor() {
    $form = new Form('myForm');
    $output = $form->__toString();
    $expected = '<form id="myForm" action="'.$_SERVER['SCRIPT_NAME'].
      '" method="post"><div class="'.Form::DIV_CSS_CLASS.'">'.
      '</div></form>';
    $this->assertEquals($expected, $output, 'Invalid output for form element');

    $form = new Form('myForm', 'doIt.php', 'get');
    $output = $form->__toString();
    $expected = '<form id="myForm" action="doIt.php" method="get">'.
      '<div class="'.Form::DIV_CSS_CLASS.'"></div></form>';
    $this->assertEquals($expected, $output, 'Invalid output for form element');
  }

  public function testAdd() {
    $form = new Form('myForm', 'doIt.php');
    $form->add('I\'m a form');
    $output = $form->__toString();
    $expected = '<form id="myForm" action="doIt.php" method="post">'.
      '<div class="'.Form::DIV_CSS_CLASS.'">'.
      'I\'m a form</div></form>';
    $this->assertEquals($expected, $output, 'Invalid output for form element');
  }

  public function testSetHasUpload() {
    $form = new Form('myForm', 'doIt.php', 'get');
    $form->setHasFileUpload(true);
    $output = $form->__toString();
    $expected = '<form id="myForm" action="doIt.php" method="get" '.
      'enctype="multipart/form-data">'.
      '<div class="'.Form::DIV_CSS_CLASS.'"></div></form>';
    $this->assertEquals($expected, $output, 'Invalid output for form element');
  }
}
