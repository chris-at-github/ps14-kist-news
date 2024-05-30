CREATE TABLE tx_news_domain_model_news (
	tx_kist_news_no_detail smallint(1) unsigned NOT NULL DEFAULT '0',
	tx_kist_news_location text NOT NULL DEFAULT '',
	tx_kist_news_event_startdate date DEFAULT NULL,
	tx_kist_news_event_enddate date DEFAULT NULL,
	tx_kist_news_event_starttime time DEFAULT NULL,
	tx_kist_news_event_endtime time DEFAULT NULL,
	tx_kist_news_layout varchar(255) NOT NULL DEFAULT ''
);
