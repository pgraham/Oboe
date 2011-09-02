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
namespace oboe;

use \oboe\form\Password;
use \oboe\form\Submit;
use \oboe\form\TextInput;
use \oboe\head\Javascript;
use \oboe\head\StyleSheet;

/**
 * This class provides factory methods for different elements.  The purpose of
 * this is to allow chaining with creation:
 *
 * $div = Element::div()
 *   ->setId('my-div')
 *   ->addClass('a-class')
 *   ->add("Some text");
 *
 * This is necessary because PHP does not allow chaining as part of the new
 * statement:
 *
 * $div = new Div()->setId('my-div');  // FATAL ERROR
 *
 * @author Philip Graham <philip@zeptech.ca>
 */
class Element {
  
  /**
   * <a/> element factory method.  Alias for anchor().
   *
   * @param string $href The value of the anchor's href attribute.
   *   [default: '#']
   * @param mixed $ctnt The anchor's content. [optional]
   * @return Anchor
   */
  public static function a($href = '#', $ctnt = null) {
    return self::anchor($href, $ctnt);
  }

  /**
   * <a/> element factory method. Aliases by a().
   *
   * @param string $href The value of the anchor's href attribute.
   *   [default: '#']
   * @param mixed $ctnt The anchor's content. [optional]
   * @return Anchor
   */
  public static function anchor($href = '#', $ctnt = null) {
    return Anchor($href, $ctnt);
  }

  /**
   * <button/> element factory method.
   *
   * @param string $lbl The button's label. [optional]
   * @return Button
   */
  public static function button($lbl = null) {
    return new Button($lbl);
  }

  /**
   * <div/> element factory method.
   *
   * @return Div
   */
  public static function div() {
    return new Div();
  }

  /**
   * <fieldset/> factory method.
   *
   * @return Fieldset
   */
  public static function fieldset() {
    return new Fieldset();
  }

  /**
   * <form/> factory method.
   *
   * @return Form
   */
  public static function form() {
    return new Form();
  }

  /**
   * <h#> factory method.
   *
   * @param integer $prominence The heading element's prominence. Default: 1
   * @return Heading
   */
  public static function heading($prominence = 1) {
    return new Heading($prominence);
  }

  /**
   * <hr/> factory method.  Aliased by for hr()
   *
   * @return Divider
   */
  public static function horizontalRule() {
    return new Divider();
  }

  /**
   * <hr/> factory method.  Alias for horizontalRule()
   *
   * @return Divider
   */
  public static function hr() {
    return self::horizontalRule();
  }

  /**
   * <img/> element factory method. Alias for image().
   *
   * @param string $src The value of the img's src attribute.
   * @return Image
   */
  public static function img($src) {
    return self::image($src);
  }

  /**
   * <img/> element factory method. Aliased by img().
   *
   * @param string $src The value of the img's src attribute.
   * @return Image
   */
  public static function image($src) {
    return new Image($src);
  }

  /**
   * <script/> element factory method.
   *
   * @param string $src URL of the script
   * @return
   */
  public static function javascript($src) {
    return new Javascript($src);
  }

  /**
   * <label/> element factory method.
   *
   * @param String $text The label's text. [optional]
   * @return Label
   */
  public static function label($text = null) {
    $lbl = new Label();
    if ($text !== null) {
      $lbl->add($text);
    }
    return $lbl;
  }

  /**
   * <p/> element factory method.  Alias for paragraph().
   *
   * @return Paragraph
   */
  public static function p() {
    return self::paragraph();
  }

  /**
   * <p/> element factory method.  Aliases by p().
   *
   * @return Paragraph
   */
  public static function paragraph() {
    return new Paragraph();
  }

  /**
   * <input/> element with type="password" factory method.
   *
   * @param string $name The input element's name attribute
   * @return Password
   */
  public static function password($name) {
    return new Password($name);
  }

  /**
   * <span/> element factory method.
   *
   * @return Span
   */
  public static function span() {
    return new Span();
  }

  /**
   * <link/> element with rel="stylesheet" factory method.
   *
   * @param string $href Path to the stylesheet
   * @return StyleSheet
   */
  public static function styleSheet($href) {
    return new StyleSheet($href);
  }

  /**
   * <input/> element with type="submit" factory method.
   *
   * @param string $lbl
   * @return Submit
   */
  public static function submit($lbl = null) {
    return new Submit($lbl);
  }

  /**
   * <input/> element with type="text" factory method.
   *
   * @param string $name The input element's name attribute
   * @return TextInput
   */
  public static function textInput($name) {
    return new TextInput($name);
  }
}
