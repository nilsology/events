DROP TABLE IF EXISTS "%TABLE_PREFIX%events_venue";
DROP TABLE IF EXISTS "%TABLE_PREFIX%events_org";
DROP TABLE IF EXISTS "%TABLE_PREFIX%events_event";

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%events_venue` (
	"vid" int(11) NOT NULL,
	"name" VARCHAR(255) NOT NULL,
	"street" VARCHAR(255) NULL,
	"city" VARCHAR(255) NULL ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%events_org` (
	"oid" int(11) NOT NULL auto_increment,
	"name" VARCHAR(255) NOT NULL,
	"url" VARCHAR(2083) NULL,
	"tel" VARCHAR(255) NULL,
	"email" VARCHAR(255) NULL,
	"street" VARCHAR(255) NULL,
	"city" VARCHAR(255) NULL ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%events_event` (
	"eid" int(11) NOT NULL auto_increment,
	"date_start" DATETIME NOT NULL, 
	"date_end" DATETIME NULL,
	"vid" int(11) NOT NULL, /* Veranstaltungsort - venueID */
	"name" VARCHAR(255) NOT NULL,
	"description" TEXT NOT NULL,
	"url" VARCHAR(2083) NULL, /* URL zum Event */
	"oid" int(11) NOT NULL, /* Veranstalter - organizerID */
	"age" varchar(10) NULL ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
