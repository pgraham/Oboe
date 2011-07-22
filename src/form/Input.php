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
namespace oboe\form;

use \oboe\attr\HasName;
use \oboe\attr\HasValue;
use \oboe\struct\PhrasingContent;
use \oboe\ElementBase;

/**
 * This class encapsulates an <input/> element.
 *
 * TODO - Create a HasValue interface and have this class implement it
 * TODO - Implement HTML5 conformant constraints for the name attribute
 *
 * @author Philip Graham <philip@lightbox.org>
 */
abstract class Input extends ElementBase implements PhrasingContent, HasName,
  HasValue
{

  const TYPE_BUTTON     = 'button';
  const TYPE_PASSWORD   = 'password';
  const TYPE_SUBMIT     = 'submit';
  const TYPE_TEXT_INPUT = 'text'; // TODO Rename to TYPE_TEXT
  const TYPE_FILE       = 'file';

  /**
   * Constructor.
   *
   * @param string The type of the <input /> element
   * @param string The default class for the input element.
   * @param string Optional name
   * @param string Optional value
   */
  public function __construct($type, $name = null, $value = null) {
    parent::__construct('input');

    $this->setAttribute('type', $type);

    if ($name !== null) {
      $this->setName($name);
      $this->setId($name);
    }

    if ($value !== null) {
      $this->setValue($value);
    }
  }

  public function getName() {
    return $this->getAttribute(HasName::ATTR_NAME);
  }

  public function getValue() {
    return $this->getAttribute(HasValue::ATTR_VALUE);
  }

  public function setName($name) {
    return $this->setAttribute(HasName::ATTR_NAME, $name);
  }

  public function setValue($value) {
    return $this->setAttribute(HasValue::ATTR_VALUE, $value);
  }
}
