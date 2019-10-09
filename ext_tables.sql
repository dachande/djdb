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
  -- download int(11) unsigned DEFAULT '0' NOT NULL,
  -- recording int(11) unsigned DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_djdb_domain_model_recording'
#
CREATE TABLE tx_djdb_domain_model_recording (
  name tinytext,
  -- download int(11) unsigned DEFAULT '0' NOT NULL
  -- track int(11) unsigned DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_djdb_domain_model_track'
#
CREATE TABLE tx_djdb_domain_model_track (
  track_title tinytext,
  track_artist tinytext,
  release_title tinytext,
  release_artist tinytext,
  genres int(11) unsigned DEFAULT '0' NOT NULL,
  cover int(11) unsigned DEFAULT '0' NOT NULL,
  release_date int(11) unsigned DEFAULT '0' NOT NULL,
  description text,
  discogs_id tinytext,
  -- download int(11) unsigned DEFAULT '0' NOT NULL,
  set_position tinytext
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
  target text
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
# Table structure for table 'tx_djdb_domain_model_set_recording_mm'
#
-- CREATE TABLE tx_djdb_domain_model_set_recording_mm (
--   uid_local int(11) unsigned DEFAULT '0' NOT NULL,
--   uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,

--   sorting int(11) unsigned DEFAULT '0' NOT NULL,
--   sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

--   KEY uid_local (uid_local),
--   KEY uid_foreign (uid_foreign)
-- );

#
# Table structure for table 'tx_djdb_domain_model_set_download_mm'
#
-- CREATE TABLE tx_djdb_domain_model_set_download_mm (
--   uid_local int(11) unsigned DEFAULT '0' NOT NULL,
--   uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,

--   sorting int(11) unsigned DEFAULT '0' NOT NULL,
--   sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

--   KEY uid_local (uid_local),
--   KEY uid_foreign (uid_foreign)
-- );

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

#
# Table structure for table 'tx_djdb_domain_model_recording_track_mm'
#
-- CREATE TABLE tx_djdb_domain_model_recording_track_mm (
--   uid_local int(11) unsigned DEFAULT '0' NOT NULL,
--   uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,

--   sorting int(11) unsigned DEFAULT '0' NOT NULL,
--   sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

--   KEY uid_local (uid_local),
--   KEY uid_foreign (uid_foreign)
-- );
