<?php
$addonkey = 'events';
$I18N_events = new i18n($REX['LANG']), $REX['INCLUDE_PATH'].'/addons/'.$addonkey.'/lang/');
$REX['ADDON']['rxid'][$addonkey] = 'events';
$REX['ADDON']['page'][$addonkey] = $addonkey;
$REX['ADDON']['name'][$addonkey] = 'Events';
$REX['ADDON']['perm'][$addonkey] = $addonkey;
$REX['PERM'][] = 'events[]';
$REX['ADDON']['version'][$addonkey] = '1.0';
$REX['ADDON']['author'][$addonkey] = 'Nils Koppelmann';
?>
