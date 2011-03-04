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
 * This class implements attribute getters and setters.  It also provides
 * syntactic sugar for the id, class and style attributes.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe
 */
abstract class ElementBase implements item\Document {

  /** The element's tag name */
  protected $_tag;

  /** The element's id attribute */
  protected $_id;

  /** The element's css class attribute */
  protected $_class = Array();

  /** The element's style attribute */
  protected $_style;

  /** The element's attributes */
  protected $_attributes;

  /**
   * Base class constructor.
   *
   * @param string The element's tag name
   * @param string The element's id attribute
   * @param string The element's class attribute
   */
  protected function __construct($tag, $id = null, $class = null) {
    $this->_tag = $tag;
    $this->_id = $id;
    $this->_attributes = array();
    $this->_style = array();

    if ($class !== null) {
      $this->setClass($class);
    }
  }

  /**
   * Generates the HTML markup for the element.
   *
   * @return string
   */
  public function __toString() {
    // Get the opening tag for the element
    $str = self::openTag($this);

    // Make the opening tag self closing
    $str = substr($str, 0, -1).'/>';
    return $str;
  }

  /** 
   * Add the given class name to the element.
   *
   * @param string $class
   */
  public function addClass($class) {
    $this->_class[] = $class;
  }

  /**
   * This method adds the element to the <body> element.  In order for this
   * method to work the implementing class needs to implement the
   * item\Body interface.
   */
  public function addToBody() {
    Page::addElementToBody($this);
  }

  /**
   * This method adds the element to the <head> element.  In order for this
   * method to work the implementing class needs to implement the
   * item\Head interface.
   */
  public function addToHead() {
    Page::addElementToHead($this);
  }

  /**
   * Retriever for an attribute value.  If the attribute is not set null is
   * returned.
   *
   * @param string The name of the attribute to retrieve
   * @return string The value of the given attribute
   */
  public function getAttribute($attribute) {
    if ($attribute == 'id') {
      return $this->getId();
    } else if ($attribute == 'class') {
      return $this->getClass();
    } else if ($attribute == 'style') {
      return $this->getStyle();
    } else if (array_key_exists($attribute, $this->_attributes)) {
      return $this->_attributes[$attribute];
    } else {
      return null;
    }
  }

  /**
   * Getter for the element's class attribute.
   *
   * @return string
   */
  public function getClass() {
    return implode(' ', $this->_class);
  }

  /**
   * Getter the elements id attribute.
   *
   * @return string
   */
  public function getId() {
    return $this->_id;
  }

  /**
   * This method retrieves the value of a given style attribute.  If not set 
   * null is returned.
   *
   * @param string The attribute to retrieve, if null the full
   *     style attribute is returned
   * @return string The value of the element's style attribute
   */
  public function getStyle($attribute = null) {
    if ($attribute === null) {
      return self::_buildStyleString($this);
    }
    return $this->_style[$attribute];
  }

  /**
   * This method sets the given attribute to the given value.
   * For style attributes, use the set style method.  If the attribute name
   * is the same as the attribute value the value can be omitted,
   * e.g. $element->setAttribute('selected') results in the attribute being
   * output as selected="selected.
   *
   * This method can also be used as a shorthand for setting the style
   * attribute:
   * <code>
   *     $element->setAttribute('style', 'position:absolute;top:0px;');
   *     $element->setStyle('position');  // absolute
   * </code>
   *
   * @param string The attribute to set
   * @param string The value of the attribute
   */
  public function setAttribute($attribute, $value = null) {
    if ($value === null) {
      $value = $attribute;
    }

    if($attribute == 'id') {
      $this->setId($value);
    } else if ($attribute == 'class') {
      $this->setClass($value);
    } else if ($attribute == 'style') {
      if(preg_match_all('/(.+)\h*:\h*(.+)(?:;|$)/U', $value, $out,
        PREG_SET_ORDER))
      {
        foreach($out AS $matches) {
          $this->setStyle($matches[1], $matches[2]);
        }
      }
    } else {
      $this->_attributes[$attribute] = $value;
    }
  }

  /**
   * Setter for the element's class attribute.
   *
   * @param string The value for the element's class attribute.
   */
  public function setClass($class) {
    $this->_class = explode(' ', $class);
  }

  /**
   * Setter for the element's id attributes.
   *
   * @param string The value for element's id attribute.
   */
  public function setId($id) {
    $this->_id = $id;
  }

  /**
   * This method sets the value of the given style attribute to the given
   * value.
   *
   * @param string The attribute to set
   * @param string The value of the attribute
   */
  public function setStyle($attribute, $value) {
    $this->_style[$attribute] = $value;
  }

  /**
   * This method unsets the given attribute.
   *
   * NOTE: This method won't work for id, class and style attributes.  To
   * unset these attributes pass null to their respective setter methods.
   *
   * @param string The name of the attribute to unset
   */
  public function unsetAttribute($attribute) {
    if (isset($this->_attributes[$attribute])) {
      unset($this->_attributes[$attribute]);
    }
  }

  /**
   * This method generates the opening tag for the given element.
   *
   * @param ElementBase The element to open the tag for
   * @return The opening tag for the given element
   */
  protected static function openTag(ElementBase $element) {
    $str = '<'.$element->_tag;
    if ($element->_id !== null) {
      $str.= ' id="'.$element->_id.'"';
    }
    if (count($element->_class) > 0) {
      $str.= ' class="' . implode(' ', $element->_class) . '"';
    }
        
    if (count($element->_style) > 0) {
      $style = self::_buildStyleString($element);
      $str.= ' style="'.$style.'"';
    }

    $attributes = '';
    foreach ($element->_attributes AS $attribute => $value) {
      $attributes.= ' '.$attribute.'="'.$value.'"';
    }
    $str.= $attributes.'>';
    return $str;
  }

  /**
   * This method generates the closing tag for the given element.
   *
   * @param ElementBase The element for which to generate the closing tag
   * @return The closing tag for the given element
   */
  protected static function closeTag(ElementBase $element) {
    return '</'.$element->_tag.'>';
  }

  /**
   * This method generates the style string for the given element
   *
   * @param ElementBase The element for which to generate the style string
   * @return The style string for the given element
   */
  private static function _buildStyleString(ElementBase $element) {
    $style = '';
    foreach($element->_style AS $attribute => $value) {
      $style.= $attribute.':'.$value.';';
    }
    return $style;
  }
}
