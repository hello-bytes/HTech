DROP TABLE IF EXISTS  `article`;
CREATE TABLE `article` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT '',
  `summary` text NOT NULL  DEFAULT '',
  `content` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT 0
);

DROP TABLE IF EXISTS  `article_status`;
CREATE TABLE `article_status` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `art_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `view_number` int(11) NOT NULL DEFAULT '0'
);

DROP TABLE IF EXISTS  `categories`;
CREATE TABLE `categories` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `created_at` timestamp NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT 0
);

DROP TABLE IF EXISTS  `category`;
CREATE TABLE `category` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `cate_name` varchar(255) NOT NULL,
  `as_name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `seo_title` varchar(255) NOT NULL,
  `seo_key` varchar(255) NOT NULL,
  `seo_desc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT 0
);

DROP TABLE IF EXISTS  `links`;
CREATE TABLE `links` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `sequence` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT 0
);


DROP TABLE IF EXISTS  `navigation`;
CREATE TABLE `navigation` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `sequence` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT 0
);

DROP TABLE IF EXISTS  `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255)  NOT NULL,
  `token` varchar(255)  NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT 0
);

DROP TABLE IF EXISTS  `systems`;
CREATE TABLE `systems` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `cate` int(11) NOT NULL DEFAULT '0',
  `system_name` varchar(255)  NOT NULL,
  `system_value` varchar(255)  NOT NULL
);

DROP TABLE IF EXISTS  `tags`;
CREATE TABLE `tags` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `name` varchar(255)  NOT NULL,
  `number` int(11) NOT NULL DEFAULT '0'
);

DROP TABLE IF EXISTS  `users`;
CREATE TABLE `users` (
  `id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `name` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `password` varchar(60)  NOT NULL,
  `remember_token` varchar(100)  DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT 0,
  `photo` varchar(255)  DEFAULT '',
  `desc` text
);
