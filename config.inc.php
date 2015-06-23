<?php
$addonkey = 'events';

$REX['ADDON']['rxid'][$addonkey]    = '1337';
$REX['ADDON']['page'][$addonkey]    = $addonkey;
$REX['ADDON']['name'][$addonkey]    = 'Events';
$REX['ADDON']['perm'][$addonkey]    = 'events[]';
$REX['PERM'][]                      = 'events[]';

$REX['ADDON']['dbpref'][$addonkey]  = $REX['TABLE_PREFIX'].$REX['ADDON']['rxid'][$addonkey].'_';

$REX['ADDON']['version'][$addonkey] = '1.0';
$REX['ADDON']['author'][$addonkey] = 'Nils Koppelmann';

$I18N_events = new i18n($REX['LANG'], $REX['INCLUDE_PATH'].'/addons/'.$addonkey.'/lang/');

?>
