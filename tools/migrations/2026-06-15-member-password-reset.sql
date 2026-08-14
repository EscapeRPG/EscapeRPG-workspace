ALTER TABLE `membres`
    ADD COLUMN `password_reset_token_hash` CHAR(64) NULL DEFAULT NULL AFTER `activation_expires_at`,
    ADD COLUMN `password_reset_expires_at` DATETIME NULL DEFAULT NULL AFTER `password_reset_token_hash`,
    ADD UNIQUE INDEX `membres_password_reset_token_hash_unique` (`password_reset_token_hash`);
