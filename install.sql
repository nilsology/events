DROP TABLE IF EXISTS `%TABLE_PREFIX%1337_venues`;
DROP TABLE IF EXISTS `%TABLE_PREFIX%1337_orgs`;
DROP TABLE IF EXISTS `%TABLE_PREFIX%1337_events`;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%1337_venue` (
	`vid` int(11) NOT NULL auto_increment,
	`name` VARCHAR(255) NOT NULL,
	`street` VARCHAR(255) NULL,
	`city` VARCHAR(255) NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%1337_orgs` (
	`oid` int(11) NOT NULL auto_increment,
	`name` VARCHAR(255) NOT NULL,
	`url` VARCHAR(2083) NULL,
	`tel` VARCHAR(255) NULL,
	`email` VARCHAR(255) NULL,
	`street` VARCHAR(255) NULL,
	`city` VARCHAR(255) NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%1337_events` (
	`eid` int(11) NOT NULL auto_increment,
	`date` DATE NOT NULL, 
	`time` TIME NULL,
	`vid` int(11) NOT NULL, /* Veranstaltungsort - venueID */
	`name` VARCHAR(255) NOT NULL,
	`description` TEXT NOT NULL,
	`url` VARCHAR(2083) NULL, /* URL zum Event */
	`oid` int(11) NOT NULL, /* Veranstalter - organizerID */
	`age` int(2) NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM CHARSET=utf8;
