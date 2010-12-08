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
 * This class encapsulates a <link/> element with rel="stylesheet" and
 * type="text/css".
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Head
 */
class Oboe_Head_StyleSheet extends Oboe_Head_Link {

    /**
     * Constructor.
     *
     * @param string The path to the stylesheet
     * @param string The stylesheet's media attribute
     */
    public function __construct($href, $media = null) {
        parent::__construct('stylesheet', $href, 'text/css', $media);
    }
}
