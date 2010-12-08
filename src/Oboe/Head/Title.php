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
 * @subpackage Head
 */
/**
 * This class encapsulates a &lt;title&gt; element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Head
 */
class Oboe_Head_Title implements Oboe_Item_Document, Oboe_Item_Head {

    /* The title */
    private $_title;

    /**
     * Constructor.
     *
     * @param string The title
     */
    public function __construct($title) {
        $this->_title = $title;
    }

    /**
     * Creates the HTML markup for the element.
     *
     * @return string
     */
    public function __toString() {
        return Oboe_Text_Tabs::getTabs().
            '<title>'.$this->_title.'</title>'."\n";
    }
}
