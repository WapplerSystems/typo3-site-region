
CREATE TABLE tx_siteregion_domain_model_region (
	title varchar(255) DEFAULT '' NOT NULL,

	KEY parent (pid,sorting),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l18n_parent,sys_language_uid)
);

