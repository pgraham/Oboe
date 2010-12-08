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
 * This class encapsulates a favorites icon element.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Head
 */
class Oboe_Head_FavIcon extends Oboe_Head_Link {

    /**
     * Constructor.
     *
     * @param string The href attribute
     */
    public function __construct($href) {
        parent::__construct('shortcut icon', $href);
    }
}
