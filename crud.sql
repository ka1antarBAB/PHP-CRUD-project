create table `users`(
    `id` INT(11) NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `phone_number` VARCHAR(20) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `address` TEXT,
    `created_at` timestamp not null default CURRENT_TIMESTAMP
) ENGINE=innoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

ALTER TABLE `users`
ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
COMMIT;