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
 * This class encapsulates a <input/> element with type="button".
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package Oboe
 * @subpackage Form
 */
class Oboe_Form_Button extends Oboe_Form_Input {

    /** Default class for the button */
    const CSS_CLASS = 'button';

    /**
     * Constructor.
     *
     * @param string The prompt that appears on the submit button.
     */
    public function __construct($value = null) {
        parent::__construct('button', self::CSS_CLASS, null, $value);
    }
}
