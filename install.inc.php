<?php
 /*
  * Addon Events
  * @author info@nilskoppelmann.de
  * @package redaxo4
  * @version $Id$
 */

$error = '';

if ($error != '') {
    $REX['ADDON']['installmsg']['cronjob'] = $error;
} else {
    $REX['ADDON']['install']['cronjob'] = true;
}


?>
