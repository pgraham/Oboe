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
 * @package oboe
 */
namespace oboe;

/**
 * This class encapulates a <form> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe
 */
class Form extends ElementWrapper implements item\Body {

  /** The CSS class of the div used to encapsulate the form's contents */
  const DIV_CSS_CLASS = 'formContainer';

  /** Constant for specifying a form that uses a GET method */
  const GET = 'get';

  /** Constant for specifying a form that uses a POST method - Default */
  const POST = 'post';

  /* A <div> element used to encapsultes the form's contents */
  private $_container;

  /**
   * Constructor.
   *
   * @param string The name of the form
   * @param string The file that will process the form.  If not given the
   *     value of $_SERVER['SCRIPT_NAME'] is used
   * @param string The submit method for the form.  Either 'post' (default) or
   *     'get'
   */
  public function __construct($name, $action = null, $method = 'post') {
    parent::__construct('form', $name);

    if ($action === null) {
      $action = $_SERVER['SCRIPT_NAME'];
    }
    $this->setAttribute('action', $action);
    $this->setAttribute('method', $method);
    $this->_hasUpload = false;

    // Set the wrapper's element to a Form_Div
    $this->_container = new form\Div(null, self::DIV_CSS_CLASS);
    $this->_objectTypes = array('oboe\form\Div');
    $this->_elements[0] = $this->_container;
  }

  /**
   * Override the add method to add the given element to the form's container
   *
   * @param mixed The element to add to the form
   * @param boolean Whether to add the element to the end of the array
   *     (default) or the end of the array.  The UNSHIFT constant can be used
   *     to add the element to the beginning of the array.
   */
  public function add($element, $push = true) {
    $this->_container->add($element, $push);
  }

  /**
   * This function adds a specified amount of vertical space to the form.
   *
   * @param integer The amount of space to add
   * @return Text\VSpace The element that was added
   */
  public function addBreak($num = 1) {
    $vSpace = new Text\VSpace();
    for ($i = 0; $i < $num; $i++) {
      $this->add($vSpace);
    }
    return $vSpace;
  }

  /**
   * This method adds an <hr/> element to the form.
   *
   * @param integer The width of the divider as percentage of the form's width
   * @return Divider The element that was added
   */
  public function addDivider($width = null) {
    $hr = new Divider();
    $this->add($hr);
    return $hr;
  }

  /**
   * Setter for whether or not the form has a file upload element.  If set to
   * true the form will output enctype="multipart/form-data" as one of its
   * attributes.  By default the form does not output a value for the enctype
   * attribute meaning that the default of application/x-www-form-urlencoded
   * is used
   *
   * If a form has a file upload element this needs to be set otherwise the
   * upload will not work.
   *
   * @param boolean Whether or not the form has a file upload element.
   */
  public function setHasFileUpload($hasUpload = true) {
    if ($hasUpload) {
      $this->setAttribute('enctype', 'multipart/form-data');
    } else {
      $this->unsetAttribute('enctype');
    }
  }
}
