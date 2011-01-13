<?php
namespace Oboe;
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
 * @package Oboe
 */
/**
 * This class encapsulates a <table> element. The table class can contain at
 * most one <thead> and <tfoot> elements and one or more <tbody> elements
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 */
class Table extends ElementComposite implements Item\Body, Item\Form {

  /* The table's <thead> element */
  private $_head;

  /* The table's <tbody> elements */
  private $_bodies;

  /* The table's <tfoot> element */
  private $_foot;

  /**
   * Constructor.
   */
  public function __construct($id = null, $class = null) {
    parent::__construct('table', $id, $class);
    $this->_objectTypes = array(
      'Oboe\Table\Head',
      'Oboe\Table\Body',
      'Oboe\Table\Foot'
    );
    $this->_bodies = array();
  }

  /**
   * Override the add() method to enforce table structure rules.
   *
   * @param Item\Table The item to add to the table
   */
  public function add($element, $push = true) {
    self::_checkElement($this, $element);
    if (!is_object($element)) {
      throw new Exception('Only objects can be added to a ' . __CLASS__
        . ' object');
    }

    $type = get_class($element);
    switch ($type) {

      case 'Oboe\Table\Head':
      if ($this->_head !== null) {
        throw new Exception('Only one head can be added to a table');
      }
      $this->_head = $element;
      break;

      case 'Oboe\Table\Body':
      if ($push) {
        $this->_bodies[] = $element;
      } else {
        array_unshift($this->_bodies, $element);
      }
      break;

      case 'Oboe\Table\Foot':
      if ($this->_foot !== null) {
        throw new Exception('Only one foot can be added to a table');
      }
      $this->_foot = $element;
      break;

      default:
      throw new Exception('Only objects of type '
        . implode(',', $this->_objectTypes) . ' can be added to a '.__CLASS__
        . ' object');
    }
  }

  /**
   * Add the table's components JIT for output.
   *
   * @return string HTML markup for the table
   */
  public function __toString() {
    if ($this->_head !== null) {
      parent::add($this->_head);
    }

    if ($this->_foot !== null) {
      parent::add($this->_foot);
    }

    foreach ($this->_bodies AS $tBody) {
      parent::add($tBody);
    }

    return parent::__toString();
  }

  /*
   * ========================================================================
   * Interface icing
   * ---------------
   * These function are provided for convenience when constructing a table.
   * They mostly hide the use of the thead, tbody and tfoot elements since
   * most tables don't add anything special to these tags.
   * ========================================================================
   */

  /**
   * Adds a <td> to the table's <thead> and returns it
   *
   * @param string The header
   */
  public function addHeader($header) {
    if ($this->_head === null) {
      $this->add(new Table\Head());
    }

    $tHeadRow = $this->_head->getDefaultRow();
    $tHeader = new Table\Data($header);
    $tHeadRow->add($tHeader);
    return $tHeader;
  }

  /**
   * Adds a row to the table body and returns it.
   *
   * @return Table\Row
   */
  public function addRow() {
    $this->_checkBody();
    $row = new Table\Row();
    $this->_bodies[0]->add($row);
    return $row;
  }

  /**
   * Adds a cell to the table.  In order to build a table using this notation
   * you need to give a row id.
   *
   * @param integer The index of the row to add the cell to.  If the row
   *     doesn't exist it will be created.
   * @param string The value of the cell element's id attribute
   * @param string The value of the cell element's class attribute
   * @return Table\Data
   */
  public function addCell($rowIndex, $cellContents = null) {
    $this->_checkBody();

    $row = $this->_bodies[0]->getRow($rowIndex);
    if ($row === null) {
      $row = new Table\Row();
      $this->_bodies[0]->add($row);
    }

    $cell = new Table\Data($cellContents);
    $row->add($cell);
    return $cell;
  }

  /**
   * Populates the table with empty objects for the given dimensions and
   * returns a 2d array containing references to the table's elements
   *
   * @param integer Number of headers to add
   * @param integer Number of rows to add
   * @param integer Number of columns to add
   */
  public function populate($numHeaders, $numRows, $numCols) {
    $tArr = array();

    if ($numHeaders > 0) {
      $tHead = new Table\Head();
      $tHeadRow = $tHead->getDefaultRow();

      $this->add($tHead);
      $tArr['head']['ele'] = $tHead;

      for ($i = 0; $i < $numHeaders; $i++) {
        $header = new Table\Data();
        $tHeadRow->add($header);
        $tArr['head'][$i] = $header;
      }
    }
       
    if ($numRows == 0 || $numCols == 0) {
      return $tArr;
    }

    $tBody = new Table\Body();
    $this->add($tBody);
    $tArr['ele'] = $tBody;
    for ($i = 0; $i < $numRows; $i++) {
      $row = new Table\Row();
      $tArr[$i]['ele'] = $row;

      for ($j = 0; $j < $numCols; $j++) {
        $cell = new Table\Data();
        $row->add($cell);
        $tArr[$i][$j] = $cell;
      }
      $tBody->add($row);
    }

    return $tArr;
  }

  /*
   * ========================================================================
   * Integrity
   * ---------
   * These function help make sure that the structure of the table is valid
   * ========================================================================
   */

  /* This function ensures that the table has at least one tbody element */
  private function _checkBody() {
    if (count($this->_bodies) == 0) {
      $this->add(new Table\Body());
    }
  }
}
