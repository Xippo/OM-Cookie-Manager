#
# Table structure for table 'tx_omcookiemanager_domain_model_cookie'
#
CREATE TABLE tx_omcookiemanager_domain_model_cookie (
	cookiegroup int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	description text,
	lifetime varchar(255) DEFAULT '' NOT NULL,
	provider varchar(255) DEFAULT '' NOT NULL,
	cookie_group int(11) unsigned DEFAULT '0',
	cookie_html int(11) unsigned DEFAULT '0',

);

#
# Table structure for table 'tx_omcookiemanager_domain_model_cookiegroup'
#
CREATE TABLE tx_omcookiemanager_domain_model_cookiegroup (
	name varchar(255) DEFAULT '' NOT NULL,
	gtm_event_name varchar(255) DEFAULT '' NOT NULL,
	description text,
	essential smallint(5) unsigned DEFAULT '0' NOT NULL,
	cookies int(11) unsigned DEFAULT '0' NOT NULL,
    gtm_consent_grps varchar(1024) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_omcookiemanager_domain_model_cookiepanel'
#
CREATE TABLE tx_omcookiemanager_domain_model_cookiepanel (
	name varchar(255) DEFAULT '' NOT NULL,
	description text,
	link varchar(255) DEFAULT '' NOT NULL,
	groups varchar(1024) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_omcookiemanager_domain_model_cookiehtml'
#
CREATE TABLE tx_omcookiemanager_domain_model_cookiehtml (
    cookie int(11) unsigned DEFAULT '0' NOT NULL,
    html text,
    insert_place int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_omcookiemanager_domain_model_cookie'
#
CREATE TABLE tx_omcookiemanager_domain_model_cookie (

	cookiegroup int(11) unsigned DEFAULT '0' NOT NULL

);
