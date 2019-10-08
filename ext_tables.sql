#
# Table structure for table 'tx_djdb_domain_model_set'
#
CREATE TABLE tx_djdb_domain_model_set (
  title tinytext,
  release tinytext,
  label tinytext,
  catno tinytext,
  -- genre int(11) unsigned DEFAULT '0' NOT NULL,
  cover int(11) unsigned DEFAULT '0' NOT NULL,
  release_date int(11) unsigned DEFAULT '0' NOT NULL,
  description text,
  -- download int(11) unsigned DEFAULT '0' NOT NULL,
  -- disc int(11) unsigned DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_djdb_domain_model_track'
#
CREATE TABLE tx_djdb_domain_model_track (
  track_title tinytext,
  track_artist tinytext,
  release_title tinytext,
  release_artist tinytext,
  cover int(11) unsigned DEFAULT '0' NOT NULL,
  release_date int(11) unsigned DEFAULT '0' NOT NULL,
  description text,
  link tinytext,
  -- download int(11) unsigned DEFAULT '0' NOT NULL,
  set_position tinytext
);
