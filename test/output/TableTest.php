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

use \oboe\Table;
use \oboe\table\Body;
use \oboe\table\Data;
use \oboe\table\Head;
use \oboe\table\Row;

use \PHPUnit_Framework_TestCase as TestCase;

require_once __DIR__ .'/../test-common.php';

/**
 * This class tests the output of the oboe\Table class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/test/output
 */
class TableTest extends TestCase {

  public function testNormalBuild() {
    $tHeadRow = new Row();
    $tHeadRow->add(new Data('Column 1'));
    $tHeadRow->add(new Data('Column 2'));
    $tHeadRow->add(new Data('Column 3'));

    $tHead = new Head();
    $tHead->add($tHeadRow);

    $row1 = new Row();
    $row1->add(new Data('(1, 1)'));
    $row1->add(new Data('(1, 2)'));
    $row1->add(new Data('(1, 3)'));

    $row2 = new Row();
    $row2->add(new Data('(2, 1)'));
    $row2->add(new Data('(2, 2)'));
    $row2->add(new Data('(2, 3)'));

    $row3 = new Row();
    $row3->add(new Data('(3, 1)'));
    $row3->add(new Data('(3, 2)'));
    $row3->add(new Data('(3, 3)'));

    $tBody = new Body();
    $tBody->add(array($row1, $row2, $row3));

    $table = new Table();
    $table->add($tHead);
    $table->add($tBody);
    
    $output = $table->__toString();
    $expected = '<table>'.
      '<thead><tr>'.
      '<td>Column 1</td><td>Column 2</td><td>Column 3</td>'.
      '</tr></thead>'.
      '<tbody>'.
      '<tr><td>(1, 1)</td><td>(1, 2)</td><td>(1, 3)</td></tr>'.
      '<tr><td>(2, 1)</td><td>(2, 2)</td><td>(2, 3)</td></tr>'.
      '<tr><td>(3, 1)</td><td>(3, 2)</td><td>(3, 3)</td></tr>'.
      '</tbody></table>';

    $this->assertEquals($expected, $output,
      'Unexpected markup returned for the table');
  }

  public function testTableOnlyBuild() {
    $table = new Table();

    $table->addHeader('Column 1');
    $table->addHeader('Column 2');
    $table->addHeader('Column 3');

    $table->addCell(0, '(1, 1)');
    $table->addCell(0, '(1, 2)');
    $table->addCell(0, '(1, 3)');

    $table->addCell(1, '(2, 1)');
    $table->addCell(1, '(2, 2)');
    $table->addCell(1, '(2, 3)');

    $table->addCell(2, '(3, 1)');
    $table->addCell(2, '(3, 2)');
    $table->addCell(2, '(3, 3)');

    $tableHtml = $table->__toString();
    $expected = '<table>'.
      '<thead><tr>'.
      '<td>Column 1</td><td>Column 2</td><td>Column 3</td>'.
      '</tr></thead>'.
      '<tbody>'.
      '<tr><td>(1, 1)</td><td>(1, 2)</td><td>(1, 3)</td></tr>'.
      '<tr><td>(2, 1)</td><td>(2, 2)</td><td>(2, 3)</td></tr>'.
      '<tr><td>(3, 1)</td><td>(3, 2)</td><td>(3, 3)</td></tr>'.
      '</tbody></table>';

    $this->assertEquals($expected, $tableHtml,
      'Unexpected markup returned for the table');
  }

  public function testTablePopulate() {
    $table = new Table();

    $tArr = $table->populate(3, 3, 3);

    $tArr['head'][0]->setElement('Column 1');
    $tArr['head'][1]->setElement('Column 2');
    $tArr['head'][2]->setElement('Column 3');

    $tArr[0][0]->setElement('(1, 1)');
    $tArr[0][1]->setElement('(1, 2)');
    $tArr[0][2]->setElement('(1, 3)');

    $tArr[1][0]->setElement('(2, 1)');
    $tArr[1][1]->setElement('(2, 2)');
    $tArr[1][2]->setElement('(2, 3)');

    $tArr[2][0]->setElement('(3, 1)');
    $tArr[2][1]->setElement('(3, 2)');
    $tArr[2][2]->setElement('(3, 3)');

    $tableHtml = $table->__toString();
    $expected = '<table>'.
      '<thead><tr>'.
      '<td>Column 1</td><td>Column 2</td><td>Column 3</td>'.
      '</tr></thead>'.
      '<tbody>'.
      '<tr><td>(1, 1)</td><td>(1, 2)</td><td>(1, 3)</td></tr>'.
      '<tr><td>(2, 1)</td><td>(2, 2)</td><td>(2, 3)</td></tr>'.
      '<tr><td>(3, 1)</td><td>(3, 2)</td><td>(3, 3)</td></tr>'.
      '</tbody></table>';

    $this->assertEquals($expected, $tableHtml,
      'Unexpected markup returned for the table');
  }
}
