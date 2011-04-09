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

use \oboe\form\FileUpload;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ .'/../../test-common.php';

/**
 * This class tests the output of the oboe\form\FileUpload class.
 *
 * @author Philip Graham <philip@lightbox.org>
 */
class FileUploadTest extends TestCase {

  public function testOutput() {
    $fileUpload = new FileUpload('uploader');
    $output = $fileUpload->__toString();
    $expected = '<input class="file" type="file" name="uploader"/>';
    $this->assertEquals($expected, $output,
      'Invalid output for file input element');
  }
}
