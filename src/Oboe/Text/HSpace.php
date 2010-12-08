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
 * @subpackage Text
 */
/**
 * This class outputs horizontal space.  It is created by outputing
 * the specified number of html space entities (&amp;nbsp;).
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Text
 */
class Oboe_Text_HSpace implements Oboe_Item_Document, Oboe_Item_Body,
    Oboe_Item_Form
{
    /* The amount of white space to output */
    private $_amount;
    
    /*
     * Whether or not extra white space should be output so that the element's
     * output appears on its own line.  Default, true.
     */
    private $_ownLine;

    /**
     * Constructor.
     *
     * @param integer The number of spaces to output.
     * @param boolean - Whether or not to output the space on it's own line in
     *     the page source.
     */
    public function __construct($amount = 1, $ownLine = true) {
        $this->_amount = $amount;
        $this->_ownLine = $ownLine;
    }

    /** 
     * Returns a string representation of the horizontal white space as a number
     * of HTML space (&nbsp;) entities for use in an (X)HTML document.
     *
     * @return string
     */
    public function __toString() {
        $hSpace = '';
        if($this->_ownLine) {
            $tabs = Oboe_Text_Tabs::getTabs();
            $hSpace.= $tabs;
        }
        for($i = 0; $i < $this->_amount; $i++) {
            $hSpace.= '&nbsp;';
        }
        if($this->_ownLine) {
            $hSpace.= "\n";
        }
        return $hSpace;
    }
}
