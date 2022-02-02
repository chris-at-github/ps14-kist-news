CREATE TABLE tx_news_domain_model_news (
	tx_ps14_no_detail smallint(1) unsigned NOT NULL DEFAULT '0',
	tx_ps14_location text NOT NULL DEFAULT '',
	tx_ps14_event_startdate date DEFAULT NULL,
	tx_ps14_event_enddate date DEFAULT NULL,
	tx_ps14_event_starttime time DEFAULT NULL,
	tx_ps14_event_endtime time DEFAULT NULL,
	tx_ps14_layout varchar(255) NOT NULL DEFAULT ''
);
