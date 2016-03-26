<?php
/**
 * @package easy populate 4 
 * @copyright Copyright 2003-2015 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart-pro.at/license/2_0.txt GNU Public License V2.0
 * $Id: easypopulate_4.php, v4.0.28 01-03-2015 mc12345678 $
 * @version $Id: reg_easypopulate_4.php 2015-01-20 09:19:14 webchills $
*/
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
if (function_exists('zen_register_admin_page')) {
    if (!zen_page_key_exists('easypopulate_4')) {
        // Add easypopulate_4 to Tools menu
        zen_register_admin_page('easypopulate_4', 'BOX_TOOLS_EASYPOPULATE_4','FILENAME_EASYPOPULATE_4', '', 'tools', 'Y', 97);
    }
}