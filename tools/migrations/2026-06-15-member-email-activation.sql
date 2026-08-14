ALTER TABLE `membres`
    ADD COLUMN `email_verified_at` DATETIME NULL DEFAULT NULL AFTER `date_inscription`,
    ADD COLUMN `activation_token_hash` CHAR(64) NULL DEFAULT NULL AFTER `email_verified_at`,
    ADD COLUMN `activation_expires_at` DATETIME NULL DEFAULT NULL AFTER `activation_token_hash`,
    ADD UNIQUE INDEX `membres_activation_token_hash_unique` (`activation_token_hash`);

UPDATE `membres`
SET `email_verified_at` = COALESCE(`date_inscription`, NOW())
WHERE `email_verified_at` IS NULL;
