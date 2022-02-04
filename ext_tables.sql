CREATE TABLE tx_siteregion_domain_model_region
(
	title     varchar(255) DEFAULT ''  NOT NULL,
	shortname varchar(255) DEFAULT ''  NOT NULL,

	sorting   int(11)      DEFAULT '0' NOT NULL,

	KEY parent (pid, sorting),
	KEY t3ver_oid (t3ver_oid, t3ver_wsid),
	KEY language (l10n_parent, sys_language_uid)
);

