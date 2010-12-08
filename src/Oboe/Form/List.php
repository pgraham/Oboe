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
 * @subpackage Form
 */
/**
 * This class encapsulates a list element, either &lt;ul&gt; or &lt;ol&gt;.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Form
 */
class Oboe_Form_List extends Oboe_BaseList implements Oboe_Item_Form {

    /**
     * This list uses Oboe_Form_ListItem instance as its wrapper class.
     *
     * @return string
     */
    public function getWrapperClass() {
        return 'Oboe_Form_ListItem';
    }
}
