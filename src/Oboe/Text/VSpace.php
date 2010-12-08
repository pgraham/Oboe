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
 * This class encapsulates a specified number of <br/> elements.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Text
 */
class Oboe_Text_VSpace extends Oboe_ElementBase implements Oboe_Item_Body,
    Oboe_Item_Form
{

    /* This is the number of <br/> elements to ouptut. */
    private $_num;

    /*
     * Boolean indicating whether or not the vertical space is output with
     * tabbing and a line break.
     */
    private $_ownLine;

    /**
     * Constructor.
     *
     * @param integer The number of lines of vertical space to output.
     * @param boolean Whether or not the vertical space is output with tabbing
     *     and a line break, default true.
     */
    public function __construct($num = 1, $ownLine = true) {
        parent::__construct('br', null, null);
        $this->_num = $num;
        $this->_ownLine = $ownLine;
    }

    /**
     * Returns a string representation of the vertical space as a number of
     * <br/> elements for use in an (X)HTML document.
     *
     * @return string
     */
    public function __toString() {
        $vSpace = '';
        for($i = 0; $i < $this->_num; $i++) {
            $vSpace.= parent::__toString();
        }
        if ($this->_ownLine) {
            $vSpace = Oboe_Text_Tabs::getTabs().$vSpace."\n";
        }
        return $vSpace;
    }
}
