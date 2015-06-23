<?php
 /*
  * Addon Events
  * @author info@nilskoppelmann.de
  * @package redaxo4
  * @version $Id$
 */

$error = '';

if ($error != '') {
  $REX['ADDON']['installmsg']['events'] = $error;
} else {
  $REX['ADDON']['install']['events'] = true;
}


?>
