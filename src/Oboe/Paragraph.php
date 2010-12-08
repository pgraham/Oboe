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
 * @package Oboe
 */
/**
 * This class encapsulates a <<p>> element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 */
class Oboe_Paragraph extends Oboe_ElementComposite implements Oboe_Item_Body,
    Oboe_Item_Form
{

    /**
     * Constructor.
     *
     * @param string The paragraph's text
     * @param string The paragraph's id
     * @param string The paragraph's css class
     */
    public function __construct($text = null, $id = null, $class = null) {
        parent::__construct('p', $id, $class);
        $this->_objectTypes = array();

        if ($text !== null) {
            $this->add($text);
        }
    }
}
