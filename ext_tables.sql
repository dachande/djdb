#
# Table structure for table 'tx_djdb_domain_model_set'
#
CREATE TABLE tx_djdb_domain_model_set (
  title tinytext,
  release tinytext,
  label tinytext,
  catno tinytext,
  genres int(11) unsigned DEFAULT '0' NOT NULL,
  cover int(11) unsigned DEFAULT '0' NOT NULL,
  release_date int(11) unsigned DEFAULT '0' NOT NULL,
  description text,
  recordings int(11) unsigned DEFAULT '0' NOT NULL,
  is_new int(1) unsigned DEFAULT '0' NOT NULL
  is_featured int(1) unsigned DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_djdb_domain_model_recording'
#
CREATE TABLE tx_djdb_domain_model_recording (
  name tinytext,
  downloads int(11) unsigned DEFAULT '0' NOT NULL,
  set int(11) unsigned DEFAULT '0' NOT NULL,
  tracks int(11) unsigned DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_djdb_domain_model_release'
#
CREATE TABLE tx_djdb_domain_model_release (
  title tinytext,
  artist tinytext,
  genres int(11) unsigned DEFAULT '0' NOT NULL,
  cover int(11) unsigned DEFAULT '0' NOT NULL,
  release_date int(11) unsigned DEFAULT '0' NOT NULL,
  description text,
  discogs_id tinytext,
  downloads int(11) unsigned DEFAULT '0' NOT NULL,
  tracks int(11) unsigned DEFAULT '0' NOT NULL
  is_new int(1) unsigned DEFAULT '0' NOT NULL
  is_featured int(1) unsigned DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_djdb_domain_model_track'
#
CREATE TABLE tx_djdb_domain_model_track (
  title tinytext,
  artist tinytext,
  genres int(11) unsigned DEFAULT '0' NOT NULL,
  release_date int(11) unsigned DEFAULT '0' NOT NULL,
  description text,
  downloads int(11) unsigned DEFAULT '0' NOT NULL,
  recording int(11) unsigned DEFAULT '0' NOT NULL,
  release int(11) unsigned DEFAULT '0' NOT NULL,
  is_new int(1) unsigned DEFAULT '0' NOT NULL
  is_featured int(1) unsigned DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_djdb_domain_model_genre'
#
CREATE TABLE tx_djdb_domain_model_genre (
  name tinytext
);

#
# Table structure for table 'tx_djdb_domain_model_download'
#
CREATE TABLE tx_djdb_domain_model_download (
  title tinytext,
  target text,
  recording int(11) unsigned DEFAULT '0' NOT NULL,
  release int(11) unsigned DEFAULT '0' NOT NULL
  track int(11) unsigned DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_djdb_domain_model_set_genre_mm'
#
CREATE TABLE tx_djdb_domain_model_set_genre_mm (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,

  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_djdb_domain_model_release_genre_mm'
#
CREATE TABLE tx_djdb_domain_model_release_genre_mm (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,

  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_djdb_domain_model_track_genre_mm'
#
CREATE TABLE tx_djdb_domain_model_track_genre_mm (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,

  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);
