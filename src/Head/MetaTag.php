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
 * @package oboe/head
 */
namespace oboe\head;
use \oboe\ElementBase;
use \oboe\item;

/**
 * This class encapsulates a <meta/> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package oboe/head
 */
class MetaTag extends ElementBase implements item\Head {

  /**
   * Constructor.
   *
   * @param string the name of the meta attribute
   * @param string the content of the meta attribute, if an array is given it
   *     will be output as a comma-delimited list
   */
  public function __construct($name, $content) {
    parent::__construct('meta');
    $this->setAttribute('name', $name);
    if (is_array($content)) {
      $this->setAttribute('content', implode(',', $content));
    } else {
      $this->setAttribute('content', $content);
    }
  }
}
