<?php

$base = dirname(__FILE__);

$page = rex_request("page", "string");
$subpage = rex_request("subpage", "string");
$func = rex_request("func", "string");

include_once $REX["INCLUDE_PATH"]."/layout/top.php";

$subpages = array(
  array("events", "Termine"),
  array("orgs", "Veranstalter"),
  array("venues", "Orte")  
);

rex_title("Events", $subpages);

switch($subpage) {
  case "orgs":
    require $base."/orgs.inc.php";
    break;
  case "venues":
    require $base."/venues.inc.php";
    break;
  default:
    require $base."/events.inc.php";
    break;
}

include_once $REX["INCLUDE_PATH"]."/layout/bottom.php";

?>
