<?php
 /*
  * Addon Events
  * @author info@nilskoppelmann.de
  * @package redaxo4
  * @version $Id: install.inc.php, v1.0
 */

$error = "";

if ($error != '') {
  $REX['ADDON']['installmsg']['events'] = $error;
} else {
  $REX['ADDON']['install']['events'] = false;
}


?>
