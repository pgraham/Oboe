<?php
namespace OboeTest\Mock;
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
 * @package OboeTest
 * @subpackage Mock
 */
/**
 * This class is a mock used for test the concrete methods of the Oboe_BaseList
 * class.
 *
 * @author Philip Graham <philip@lightbox.org>
 * @package OboeTest
 * @subpackage Mock
 */
class BaseList extends \Oboe\BaseList {

    protected function getWrapperClass() {
        return 'OboeTest\Mock\ElementWrapper';
    }
}
