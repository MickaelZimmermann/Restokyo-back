-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `establishment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `published_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526C8565851` (`establishment_id`),
  KEY `IDX_9474526CA76ED395` (`user_id`),
  CONSTRAINT `FK_9474526C8565851` FOREIGN KEY (`establishment_id`) REFERENCES `establishment` (`id`),
  CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `district`;
CREATE TABLE `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kanji` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `district` (`id`, `name`, `kanji`, `slug`) VALUES
(1,	'Shinjuku',	'新宿',	'Shinjuku'),
(2,	'Ikebukuro',	'池袋 ',	'Ikebukuro'),
(3,	'Takadanobaba',	'高田馬',	'Takadanobaba'),
(4,	'Asakusa',	'浅草',	'Asakusa'),
(5,	'Iidabashi',	'飯田橋',	'Iidabashi'),
(6,	'Akihabara',	'秋葉原',	'Akihabara'),
(7,	'Ueno',	'上野',	'Ueno'),
(8,	'Ginza',	'銀座',	'Ginza'),
(9,	'Nakano',	'中野',	'Nakano'),
(10,	'Shin-Okubo',	'新大久保',	'Shin-Okubo'),
(11,	'Shibuya',	'渋谷',	'Shibuya'),
(12,	'Harajuku',	'原宿',	'Harajuku');

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220622065536',	'2022-06-22 08:55:53',	193);

DROP TABLE IF EXISTS `establishment`;
CREATE TABLE `establishment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `useful_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(14) DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `opening_time` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DBEFB1EEB08FA272` (`district_id`),
  CONSTRAINT `FK_DBEFB1EEB08FA272` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `establishment` (`id`, `district_id`, `name`, `type`, `description`, `address`, `price`, `useful_info`, `website`, `phone`, `rating`, `slug`, `picture`, `status`, `opening_time`, `updated_at`) VALUES
(1,	6,	'Monhan Sakaba',	'Izakaya',	'Bienvenue dans le restaurant officiel de Monster Hunter !',	'〒101-0021 東京都千代田区外神田１丁目１−10 パセラリゾーツＡＫＩＢＡマルチエンターテインメント３Ｆ',	3,	NULL,	'https://www.paselaresorts.com/collaboration/mhsb/?mb-listing',	81120196759,	5.0,	'monhan-sakaba',	'https://www.paselaresorts.com/images/collaboration/mhsb/space/space_img02.png',	1,	'Tous les jours de 12h00-22h00, et les samedis et dimanches de 12h00-23h00.',	NULL),
(2,	6,	'Fukuju',	'Izakaya',	'Izakaya spécialisé dans le Yakiniku, se situe à 1min à pied de la gare de Akihabara.',	'〒101-0021 東京都千代田区外神田１丁目１８−18, Bito Akiba Plaza, 8F',	3,	NULL,	'https://fukuju-akihabara.com/',	815052660382,	3.2,	'fukuju',	'https://media-cdn.tripadvisor.com/media/photo-s/08/10/c5/98/yakiniku-grilled-meat.jpg',	1,	'Tous les jours : 11h30-15h00 et 17h00-23h00 la semaine, 11h30-23h00 le weekend et jours fériés.',	NULL),
(3,	6,	'Akihabara Niku Sushi',	'Izakaya',	'Izakaya spécialisé en sushi à base de viande, se situe à 3min à pied de la gare de Akihabara.',	'〒101-0022 Tokyo, Chiyoda City, Kanda Neribeicho, 3−12 富士ソフト秋葉原ビル 1階',	2,	NULL,	'https://akihabara-nikuzushi.owst.jp/foods',	815054506218,	3.0,	'akihabara-niku-sushi',	'https://static.gltjp.com/glt/prd/data/directory/12000/11217/20200923_202208_c990d5b4_w1920.jpg',	1,	'Tous les jours de 12h00-22h00, sauf samedi dimanche de 12h00-22h30.',	NULL),
(4,	4,	'Tsujirô',	'Restaurant',	'Restaurant spécialisé en Okonomiyaki, se situe à 3min à pied de la gare de métro Asakusa.',	'〒111-0032 東京都台東区浅草１丁目２０−8 武山ビル',	2,	NULL,	'https://tsurujirou.com/',	81357555888,	2.5,	'tsujiro',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/83274/83274530.jpg?token=36b21ea&api=v2',	1,	'Tous les jours de 11h30 - 21h00.',	NULL),
(5,	4,	'Asakusa Gyukatsu',	'Restaurant',	'Restaurant de tonkatsu, tenpura et karaage,  se situe à 1min à pied de la gare de métro Asakusa.',	'〒111-0034 東京都台東区雷門２丁目１７−10 上村ビル B1F',	1,	NULL,	NULL,	81338421800,	4.0,	'asakusa-gyukatsu',	'https://tblg.k-img.com/restaurant/images/Rvw/142721/142721705.jpg',	2,	'Tous les jours de 11h00 - 23h00.',	NULL),
(6,	7,	'Hakata Dōjō',	'Izakaya',	'Izakaya spécialisé dans le yakitori, se situe à 7min à pied de la gare d\'Ueno.',	'〒110-0005 東京都台東区上野２丁目１−9 GAOH黒門ビル 3F',	3,	NULL,	NULL,	81358178948,	2.0,	'hakata-dojo',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/106315/106315833.jpg?token=4bf94c0&api=v2',	1,	'Tous les jours, de 12h00-1600 et 17h00-23h30 la semaine, de 12h00-23h30 le weekend et jours fériés. ',	NULL),
(7,	7,	'Kanoya',	'Izakaya',	'Restaurant spécialisé en yakitori et sashimi, se situe à 2min à pied de la gare d\'Ueno.',	'6 Chome-9-14 Ueno, Taito City, Tokyo 110-0005',	2,	NULL,	'https://www.k-trust-kanoya.com/',	81358127710,	1.5,	'kanoya',	'https://tabelog.com/imgview/original?id=r98161139282518',	1,	'Tous les jours, de 11h00-23h00.',	NULL),
(8,	2,	'Torikizoku - Ikebukuro',	'Izakaya',	'Chaine d\'izakaya spécialisé dans le yakitori, à 2min à pied de la gare d\'Ikebukuro.',	'〒171-0022 東京都豊島区南池袋１丁目２６−2 １階 近代ｸﾞﾙｰﾌﾟBLD.3 4階 Modern Group BLD.3',	2,	NULL,	'https://www.torikizoku.co.jp/menu/',	81359449844,	4.6,	'torikizoku-ikebukuro',	'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMbT61MIqwvCO0Vjk9NRVItGBbzJpfk-lMlxrNLfUlbDP5SyGjNdEScA68uCLTHMkHfvw&usqp=CAU',	1,	'Tous les jours, 15h00-00h00 la semaine, 13h00-00h00 le weekend.',	NULL),
(9,	2,	'Gatten Sushi',	'Restaurant',	'Restaurant spécialisé en sushi, se situe à 4min à pied de la gare d\'Ikebukuro.',	'〒170-0013 東京都豊島区東池袋１丁目１４−1 池袋スクエア 地下 ２階',	2,	NULL,	'https://www.rdcgroup.co.jp/assets/images/gattenbrand/common/header/logo_gatten.png',	81369073358,	4.2,	'gatten-sushi',	'https://rimage.gnst.jp/rest/img/peda5srj0000/s_0osr.jpg?dt=1617079471',	1,	'Tous les jours, 11h00-21h00 du dimanche au jeudi, 11h00-21h30 le vendredi et samedi.',	NULL),
(10,	2,	'Mutekiya',	'Restaurant',	'Restaurant de ramen, déjà élu meilleur ramen de Tokyo, se situe à 1min à pied de la gare.',	'Japon, 〒171-0022 Tokyo, Toshima City, Minamiikebukuro, 1 Chome−17−1 崎本ビル1F',	2,	NULL,	'https://www.mutekiya.com/world/english.html',	81339827656,	4.6,	'mutekiya',	'https://media-cdn.sygictraveldata.com/media/800x600/612664395a40232133447d33247d383231393630373437',	1,	'Tous les jours de 10h30-04h00.',	NULL),
(11,	2,	'Brasserie le lion',	'Restaurant',	'Restaurant Français, se situe au 8ème étage dans le centre commercial au dessus de la gare d\'Ikebukuro.',	'〒171-8569 Tokyo, Toshima City, Minamiikebukuro, 1 Chome−28−1 西武池袋本店 8F',	4,	NULL,	'https://lelion.owst.jp/en/',	81359495678,	3.2,	'brasserie-le-lion',	NULL,	0,	'Tous les jours, 11h00-23h00 la semaine, 10h30-23h00 le weekend.',	NULL),
(12,	3,	'Aikawa',	'Restaurant',	'Restaurant traditionnel de fruit de mer, spécialisé dans l\'anguille. Se situe à 7min de la gare de Takadanobaba.',	'1 Chome-17-22 Takadanobaba, Shinjuku City, Tokyo 169-0075',	4,	NULL,	'https://www.unagi-aikawa.jp/menu',	81332003717,	4.1,	'aikawa',	'https://media.timeout.com/images/102543973/image.jpg',	1,	'Du jeudi au mardi, de 11h00-14h30 et 17h00-20h30.',	NULL),
(13,	3,	'Torikizoku - Takadanobaba',	'Izakaya',	'Chaine d\'izakaya spécialisé dans le yakitori, à 2min à pied de la gare de Takadanobaba.',	'〒169-0075 Tokyo, Shinjuku City, Takadanobaba, 1 Chome−27−2 イチカワビル ２階',	2,	NULL,	'https://www.torikizoku.co.jp/menu/',	81364576520,	4.0,	'torikizoku-takadanobaba',	'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMbT61MIqwvCO0Vjk9NRVItGBbzJpfk-lMlxrNLfUlbDP5SyGjNdEScA68uCLTHMkHfvw&usqp=CAU',	2,	'Tous les jours, de 17h00-01h00 la semaine, de 16h00-01h00 le weekend et jours fériés.',	NULL),
(14,	10,	'Heiroku Sushi',	'Restaurant',	'Restaurant spécialisé dans le sushi, se situe à 3min à pied de la gare de Shin-Ôkubo.',	'Sushi, à 3min de la gare de Shin-Ôkubo, à 1min de la gare de Ôkubo.',	2,	NULL,	'https://www.heiroku.jp/menu/',	81333674252,	2.2,	'heiroku-sushi',	'https://cdn.cheapoguides.com/wp-content/uploads/sites/2/2020/10/heiroku-sushi-omotesando_gdl-1024x600.jpg',	1,	'Tous les jours, de 11h00-21h00.',	NULL),
(15,	10,	'Torikizoku - Shin-Ôkubo',	'Izakaya',	'Chaine d\'izakaya spécialisé dans le yakitori, à 2min à pied de la gare de Shin-Ôkubo.',	'〒169-0073 Tokyo, Shinjuku City, Hyakunincho, 2 Chome−1−4 盛好堂ビル 地下１階',	2,	NULL,	'https://www.torikizoku.co.jp/menu/',	81362738966,	3.8,	'torikizoku-shin-okubo',	'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMbT61MIqwvCO0Vjk9NRVItGBbzJpfk-lMlxrNLfUlbDP5SyGjNdEScA68uCLTHMkHfvw&usqp=CAU',	1,	'Tous les jours, de 16h00-23h00 la semaine, de 16h00-02h00 le week-end et jours fériés.',	NULL),
(16,	1,	'Itamae Sushi',	'Izakaya',	'Izakaya spécialisé dans le sushi, se situe à 6min à pied de la gare de Shinjuku, et à 12min à pied de la gare de Shin-Ôkubo.',	'〒160-0021 Tokyo, Shinjuku City, Kabukicho, 1 Chome−19−1, Shinjuku Toho Building, 1F',	3,	NULL,	'https://itamae.co.jp/shop/shinjuku_toho.html',	81362739985,	3.5,	'itamae-sushi',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/131247/131247171.jpg?token=c537d20&api=v2',	1,	'Tous les jours, de 9h00-21h00.',	NULL),
(17,	1,	'Tempura Shinjuku Tsunahachi Souhonten',	'Restaurant',	'Restaurant spécialisé dans le tempura, se situe à 3min de la gare de Shinjuku.',	'3 Chome-31-8 Shinjuku, Shinjuku City, Tokyo 160-0022',	2,	NULL,	'https://www.tunahachi.co.jp/en/menu/index.html',	81333521012,	3.0,	'tempura-shinjuku-tsunahachi-souhonten',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/30889/30889498.jpg?token=9c65bba&api=v2',	1,	'Lundi au jeudi, de 11h30-21h00, vendredi de 11h30-22h00, samedi de 11h00-22h00, dimanche de 11h00-21h00.',	NULL),
(18,	1,	'Dandan\'ya Shinjuku Kushi-tempura',	'Restaurant',	'Restaurant de tempura, se situe à 3min à pied de la gare de Shinjuku.',	'1 Chome-14-2 Nishishinjuku, Shinjuku City, Tokyo 160-0023',	3,	NULL,	'https://www.itteki.com/dandanya.html',	81364238889,	3.4,	'dandanya-shinjuku-kushi-tempura',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/143180/143180251.jpg?token=09b6ea9&api=v2',	2,	'Du lundi au samedi, de 11h30-14h30 et 17h00-22h00.',	NULL),
(19,	1,	'SUSHI MAMIRE',	'Restaurant',	'Restaurant de sushi, se situe à 1min de la gare de Shinjuku.',	'1 Chome-2-3 Kabukicho, Shinjuku City, Tokyo 160-0021',	2,	NULL,	NULL,	81351557065,	2.0,	'sushi-mamire',	'https://tblg.k-img.com/restaurant/images/Rvw/154121/640x640_rect_154121759.jpg',	1,	'Tous les jours de 11h00-22h30.',	NULL),
(20,	1,	'Spice Hut',	'Restaurant',	'Restaurant de curry, se situe à 8min à pied de la gare de Shinjuku, à 2min à pied du métro Shinjuku-sanchome.',	'2 Chome-6-8 Shinjuku, Shinjuku City, Tokyo 160-0022',	2,	NULL,	NULL,	81353796066,	1.0,	'spice-hut',	'https://tabelog.com/imgview/original?id=r67084166311495',	0,	'Du lundi au samedi de 11h30-14h30.',	NULL),
(21,	1,	'Chatty Chatty',	'Restaurant',	'Restaurant de burger, à 15min à pied de la gare de Shinjuku, à 2 min à pied de la gare de Shinjuku-gyoemmae.',	'1 Chome-12-1 Shinjuku, Shinjuku City, Tokyo 160-0022',	2,	NULL,	'https://chattyburger.com/chatty.html',	81364577262,	4.5,	'chatty-chatty',	'https://i.pinimg.com/736x/fd/35/05/fd35054a0b4274e342856c88b1751acc.jpg',	1,	'Tous les jours de 11h00-22h00.',	NULL),
(22,	12,	'Taproom',	'Izakaya',	'Izakaya/bar à yakitori, se situe à 3min à pied de la station de métro Harajuku.',	'〒150-0001 Tokyo, Shibuya City, Jingumae, 1 Chome−20−13 ノーサレンダー 2F',	NULL,	NULL,	'https://bairdbeer.com/beer/',	81364380450,	3.0,	'taproom',	'https://media.cntraveler.com/photos/5a92b056d41cc84048ce6aca/16:9/w_2560%2Cc_limit/Harajuku-Taproom__2018_harajukutaproom1.jpg',	2,	'Tous les jours, de 17h00-00h00 la semaine et de 12h00-00h00 le week-end.',	NULL),
(23,	12,	'Sakura-tei',	'Izakaya',	'Izakaya spécialisé dans l\'okonomiyaki, se situe à 7min à pied de la gare de Harajuku et à 6min à pied de la station de métro Meiji-jingumae \'Harajuku\' (menu anglais & français sur leur site web).',	'3 Chome-20-1 Jingumae, Shibuya City, Tokyo 150-0001',	2,	NULL,	'https://www.sakuratei.co.jp/fr/menu.html',	81334790039,	4.0,	'sakura-tei',	'https://media.timeout.com/images/105297136/750/422/image.jpg',	1,	'Tous les jours de 11h00-23h00.',	NULL),
(24,	12,	'The Great Burger',	'Restaurant',	'Restaurant de Burger, se situe à 9min à pied de la gare de Harajuku, et à 5min à pied du métro Meiji-jingumae \'Harajuku\'.',	'6 Chome-12-5 Jingumae, Shibuya City, Tokyo 150-0001',	2,	NULL,	'http://www.the-great-burger.com/',	81334061215,	3.5,	'the-great-burger',	'https://media-cdn.tripadvisor.com/media/photo-s/18/2e/a6/2b/dsc-0751-largejpg.jpg',	1,	'Tous les jours de 11h30-22h00.',	NULL),
(25,	11,	'Nikuya no Daidokoro',	'Izakaya',	'Izakaya spécialisé dans le yakiniku, se situe à 2min à pied de la gare de Shibuya.',	'〒150-0043 Tokyo, Shibuya City, Dogenzaka, 2 Chome−25−17 カスミビル',	3,	NULL,	'https://nikuyanodaidokoro-dougenzaka.com/?utm_source=google&utm_medium=gmb&utm_campaign=dougenzaka',	815031382095,	3.0,	'Nikuya-no-Daidokoro',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/125053/125053936.jpg?token=2230d85&api=v2',	1,	'Tous les jours de 12h00-23h00.',	NULL),
(26,	11,	'bar à vin CROISÉE',	'Restaurant',	'Restaurant français, à 2min à pied de la gare de Shibuya.',	'3 Chome-21-3 Shibuya, Shibuya City, Tokyo 150-0002',	4,	NULL,	'https://croisee-shibuya.com/menu/',	81364341300,	3.8,	'bar-a-vin-croisee',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/126543/126543137.jpg?token=0a6b1f2&api=v2',	1,	'Tous les jours de 11h00-21h00.',	NULL),
(27,	11,	'Ushi Kokoro',	'Izakaya',	'Izakaya spécialisé en yakiniku, à 2min à pied de la gare de Shibuya.',	'〒150-0043 Tokyo, Shibuya City, Dogenzaka, 2 Chome−29−18 清水ビル ３F',	3,	NULL,	NULL,	815053033201,	2.0,	'ushi-kokoro',	'https://bimi.jorudan.co.jp/topicsimage/2020/05/225-main.jpg',	1,	'Tous les jours de 11h30-23h00.',	NULL),
(28,	9,	'Rien Yakiniku Nagano',	'Restaurant',	'Restaurant spécialisé en yakiniku, à 2min à pied de la gare de Nakano.',	'〒164-0001 Tokyo, Nakano City, Nakano, 5 Chome−60−2 ライオンズプラザ中野 １Ｆ',	4,	NULL,	'https://yakiniku-lee-en.business.site/?m=true',	81333884872,	3.6,	'rien-yakiniku-nagano',	'https://tabelog.com/imgview/original?id=r9146283221571',	1,	'Tous les jours de 11h30-22h00.',	NULL),
(29,	9,	'Mensho Yousuke',	'Restaurant',	'Restaurant de ramen, se situe à 3min à pied de la gare de Nakano.',	'5 Chome-57-2 Nakano, Nakano City, Tokyo 164-0001',	1,	NULL,	NULL,	81353189125,	4.0,	'mensho-yousuke',	'https://media-cdn.tripadvisor.com/media/photo-s/11/2b/81/cb/17.jpg',	1,	'Du jeudi au mardi de 11h30-16h00 et 18h00-01h00 et mercredi de 11h30-16h00.',	NULL),
(30,	8,	'Nichigekka',	'Restaurant',	'Restaurant traditionnel, se situe à 4min à pied de la station de métro Ginza et à 10min à pied de la station Yûrakuchô.',	'〒104-0061 Tokyo, Chuo City, Ginza, 3 Chome−3−1 Zoe銀座 6F',	4,	NULL,	'https://xn--wgv4yp2t.com/%e3%82%b0%e3%83%a9%e3%83%b3%e3%83%89%e3%83%a1%e3%83%8b%e3%83%a5%e3%83%bc/',	81335387788,	4.5,	'nichigekka',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/82871/82871570.jpg?token=0da04ad&api=v2',	1,	'Tous les jours, de 11h30-15h00 et 17h00-22h00.',	NULL),
(31,	8,	'Sushi Oumi Ginza-ten',	'Restaurant',	'Restaurant de sushi, se situe à 2min de la station de métro Ginza.',	'〒104-0061 Tokyo, Chuo City, Ginza, 5 Chome−4−15 エフローレビル 5 4F',	4,	NULL,	NULL,	81359628917,	2.8,	'sushi-oumi-ginza-ten',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/140718/140718510.jpg?token=a37d2fc&api=v2',	1,	'Tous les jours de 12h00-14h00 et 17h00-23h00.',	NULL),
(32,	5,	'Yakitori Brochette',	'Restaurant',	'Restaurant spécialisé dans le yakitori, à 3min à pied de la gare de Iidabashi (menu en français).',	'2 Chome-2-10 Fujimi, Chiyoda City, Tokyo 102-0071',	3,	NULL,	NULL,	817055955182,	4.8,	'yakitori-brochette',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/36337/36337915.jpg?token=2dc5322&api=v2',	1,	'Tous les jours de 18h00-23h00.',	NULL),
(33,	5,	'Kurumi',	'Restaurant',	'Restaurant d\'okonomiyaki, se situe à 5min à pied de la gare d\'Iidabashi et à  5min de la station de métro Kagurazaka.',	'〒162-0825 Tokyo, Shinjuku City, Kagurazaka, 5 Chome−３０ イセヤビル １F',	1,	NULL,	NULL,	5055951176,	3.6,	'kurumi',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/81715/81715269.jpg?token=47a511a&api=v2',	1,	'Du mercredi au lundi, de 11h30-14h00 et 17h30-22h00.',	NULL),
(34,	11,	'Gyukatsu-motomura Shibuya',	'Restaurant',	'Chaine de restaurant spécialisé dans le tonkatsu, se situe à 1min à pied de la gare de Shibuya.',	'Japon, 〒150-0002 Tokyo, Shibuya City, Shibuya, 2 Chome−19−17 地下一階 グローリア渋谷ビル',	2,	NULL,	'https://www.gyukatsu-motomura.com/en/menu',	81334063530,	1.0,	'gyukatsu-motomura-shibuya',	'https://bimi.jorudan.co.jp/topicsimage/2020/05/225-main.jpg',	1,	'Tous les jours de 11h00-23h00.',	NULL),
(35,	12,	'Kyushu Jangara Ramen',	'Restaurant',	'Restaurant de ramen, se situe à 1min à pied de la gare de Harajuku et à 1min à pied de la station de métro Meiji-jingumae \'Harajuku\'.',	'Japon, 〒150-0001 Tokyo, Shibuya City, Jingumae, 1 Chome−13−21 １Ｆ',	1,	NULL,	'https://kyushujangara.co.jp/shops/akihabara/',	81334045405,	3.4,	'kyushu-jangara-ramen',	'https://kyushujangara.co.jp/cms/wp-content/uploads/2022/04/shop_01_2022.jpg',	1,	'Tous les jours de 10h00-22h00',	NULL),
(36,	1,	'Tokyo Mentsu-dan',	'Restaurant',	'Restaurant de ramen / udon, se situe à 5min de la gare de Shinjuku.',	'Japon, 〒160-0023 Tokyo, Shinjuku City, Nishishinjuku, 7 Chome−9−15 ダイカンプラザビジネス清田ビル １階',	2,	NULL,	'https://tokyo-mentsudan.com/?page_id=153',	81353891077,	2.8,	'tokyo-mentsu-dan',	'https://www.ise-udon.net/wp-content/themes/iseudon/images/page/cook/img-main.jpg',	1,	'Tous les jours de 11h00-22h00.',	NULL),
(37,	7,	'Ichiran - Ueno',	'Restaurant',	'Restaurant spécialisé dans le ramen, se situe à 2min de la gare d\'Ueno',	'Japon, 〒110-0005 Tokyo, Taito City, Ueno, 7 Chome−1−1 アトレ上野',	2,	NULL,	'https://en.ichiran.com/ramen/',	81358265861,	4.1,	'ichiran-ueno',	'https://static.wixstatic.com/media/1815be_f3916852e3f14b05834922330c55702d~mv2.jpg/v1/fill/w_1000,h_666,al_c,q_90,usm_0.66_1.00_0.01/1815be_f3916852e3f14b05834922330c55702d~mv2.jpg',	1,	'Tous les jours de 10h00-06h00',	NULL),
(38,	12,	'Curry up',	'Restaurant',	'Restaurant spécialisé dans le curry, se situe à 8min à pied de la gare de Harajuku.',	'2 Chome-35-9-105 Jingumae, Shibuya City, Tokyo 150-0001, Japon',	1,	NULL,	NULL,	81357755446,	4.0,	'curry-up',	'https://media-cdn.tripadvisor.com/media/photo-s/02/68/99/5a/filename-img-8356-jpg.jpg',	1,	'Tous les jours de 11h30-22h00.',	NULL),
(39,	11,	'Uobei Shibuya Dougenzaka',	'Restaurant',	'Restaurant de sushi sur tapis roulant, se situe à 2min à pied de la gare de Shibuya.',	'〒150-0043 Tokyo, Shibuya City, Dogenzaka, 2 Chome−29−11 第六セントラルビル 1F',	2,	NULL,	'https://www.genkisushi.co.jp/uobei/menu/index.php',	81334620241,	2.5,	'uobei-shibuya-dougenzaka',	'https://obs.line-scdn.net/0htM7GwrGjK2IKPgJx8slUNSRsKw15UjQqbgQ0UnsgdlMnBm02NV8KBy09d1cuEj5qahknUG18IQc4VS1iNlBnVCg7MFN1XWw0ZFBl/f750_528_60_sharpen',	1,	'Tous les jours de 10h40-22h00.',	NULL),
(40,	12,	'Path',	'Restaurant',	'Restaurant français, se situe à 17min de la gare de Harajuku et à 2min de la station de métro Yoyogi-kôen. ',	'1-chōme-7 Tomigaya, Shibuya City, Tokyo 151-0063, Japon',	3,	NULL,	NULL,	81364070011,	4.2,	'path',	'https://i1.wp.com/le-petit-francais.com/wp-content/uploads/2020/01/Tokyo-food-guide-36-Path.jpg?w=740&ssl=1',	1,	'Du mardi au dimanche, de 08h00-15h00 et 18h00-00h00.',	NULL);

DROP TABLE IF EXISTS `establishment_user`;
CREATE TABLE `establishment_user` (
  `establishment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`establishment_id`,`user_id`),
  KEY `IDX_22EE7D5A8565851` (`establishment_id`),
  KEY `IDX_22EE7D5AA76ED395` (`user_id`),
  CONSTRAINT `FK_22EE7D5A8565851` FOREIGN KEY (`establishment_id`) REFERENCES `establishment` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_22EE7D5AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `establishment_id` int(11) DEFAULT NULL,
  `establishment_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_16DB4F898565851` (`establishment_id`),
  CONSTRAINT `FK_16DB4F898565851` FOREIGN KEY (`establishment_id`) REFERENCES `establishment` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `picture` (`id`, `establishment_id`, `establishment_name`, `url`) VALUES
(1,	1,	'Monhan Sakaba',	'https://prtimes.jp/i/13450/1998/resize/d13450-1998-973112-0.jpg'),
(2,	8,	'Torikizoku',	'https://www.torikizoku.co.jp/images/menu/yakitori/kizokuyaki_momo_tare_2202.jpg'),
(3,	8,	'Torikizoku',	'https://www.torikizoku.co.jp/images/menu/yakitori/kizokuyaki_momo_shio_2202.jpg'),
(4,	8,	'Torikizoku',	'https://www.torikizoku.co.jp/images/menu/yakitori/kizokuyaki_momo_spice_2202.jpg'),
(5,	13,	'Torikizoku',	'https://www.torikizoku.co.jp/images/menu/yakitori/kizokuyaki_mune_tare_2202.jpg'),
(6,	13,	'Torikizoku',	'https://www.torikizoku.co.jp/images/menu/yakitori/kizokuyaki_mune_shio_2202.jpg'),
(7,	13,	'Torikizoku',	'https://www.torikizoku.co.jp/images/menu/yakitori/kizokuyaki_mune_spice_2202.jpg'),
(8,	15,	'Torikizoku',	'https://www.torikizoku.co.jp/images/menu/yakitori/shio_chikarakobu_2202.jpg'),
(9,	15,	'Torikizoku',	'https://www.torikizoku.co.jp/images/menu/yakitori/shio_sankaku_2202.jpg'),
(10,	15,	'Torikizoku',	'https://www.torikizoku.co.jp/images/menu/yakitori/shio_tebasaki_2202.jpg'),
(11,	10,	'Mutekiya Ramen',	'https://gyl-magazine.jp/wp-content/uploads/2019/02/mutekiya.jpg'),
(12,	10,	'Mutekiya ramen',	'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/%E7%84%A1%E6%95%B5%E5%AE%B6%E6%8B%89%E9%BA%B5_%2815583533523%29.jpg/640px-%E7%84%A1%E6%95%B5%E5%AE%B6%E6%8B%89%E9%BA%B5_%2815583533523%29.jpg'),
(13,	10,	'Mutekiya ramen mini',	'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNSi6woXwdTn51SQWyTfSHexGtIVJ3mpRvpA&usqp=CAU'),
(14,	4,	'Tsujirô okonomiyaki ',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/83274/83274523.jpg?token=c514f33&api=v2'),
(15,	4,	'Tsujirô Okonomiyaki',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/83274/83274518.jpg?token=cdcac52&api=v2'),
(16,	5,	'Gyukatsu tonkatsu',	'https://tblg.k-img.com/restaurant/images/Rvw/160320/640x640_rect_160320651.jpg'),
(17,	5,	'Gyukatsu karaage',	'https://tblg.k-img.com/restaurant/images/Rvw/145799/640x640_rect_145799501.jpg'),
(18,	2,	'Fukuju niku',	'https://tblg.k-img.com/restaurant/images/Rvw/102087/640x640_rect_102087508.jpg'),
(19,	2,	'Fukuju yakiniku',	'https://tblg.k-img.com/restaurant/images/Rvw/50686/640x640_rect_50686906.jpg'),
(20,	6,	'Hakata yakitori',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/94437/94437596.jpg?token=11b2e5f&api=v2'),
(21,	6,	'Hakata menu',	'https://tblg.k-img.com/resize/660x370c/restaurant/images/Rvw/173168/ce5d2f359ec83b6a03072f2e34db4759.jpg?token=0425799&api=v2'),
(22,	9,	'Gatten sushi',	'https://media-cdn.tripadvisor.com/media/photo-s/16/56/b9/83/photo0jpg.jpg'),
(23,	9,	'Gatten Sushi',	'https://lh5.googleusercontent.com/p/AF1QipPjCCNkpdk71NuCc2zoZrRzMwyb5Cbal478tqHC=w426-h240-k-no'),
(24,	12,	'Aikawa anguille',	'https://media-cdn.tripadvisor.com/media/photo-s/12/78/39/71/20180322-110546-largejpg.jpg'),
(25,	12,	'Aikawa menu ',	'https://lh5.googleusercontent.com/p/AF1QipNpZJm-gVMqzJsDnm_3jKf9tz7Y60GAzzltCtE2=w408-h272-k-no'),
(26,	17,	'Tsunahachi Sohonten tempura',	'https://www.shinjuku-guide.com/wp-content/uploads/2018/02/63-2.jpg'),
(27,	17,	'Tsunahachi Souhonten menu',	'https://www.halalmedia.jp/wp-content/uploads/2017/03/image-5.jpg'),
(28,	18,	'Dandan\'ya Shinjuku Kushi-tempura menu',	'https://ximg.retty.me/resize/s880x880/-/retty/img_repo/l/01/29301375.jpg'),
(29,	18,	'Dandan\'ya Shinjuku Kushi-tempura',	'https://image.space.rakuten.co.jp/d/strg/ctrl/9/16e5554cea352fdc164d60802f960f0335805eaa.18.2.9.2.jpeg'),
(30,	19,	'Sushi mamire menu jp',	'https://pic1.homemate-research.com/pubuser1/pubuser_facility_img/1/4/0/14091107041/0000034149/14091107041_0000034149_7.jpg'),
(31,	19,	'sushi mamire menu',	'https://media-cdn.tripadvisor.com/media/photo-s/16/24/2d/47/sushi-platter.jpg'),
(32,	20,	'spicy hot curry',	'https://cdn-ak.f.st-hatena.com/images/fotolife/m/mizuho000/20170808/20170808214809.jpg'),
(33,	20,	'spicy hot curry karakuchi',	'https://urbanlife.tokyo/wp-content/uploads/2019/08/190826_curry_01.jpg'),
(34,	24,	'the great burger & drink',	'https://media.timeout.com/images/104034959/image.jpg'),
(35,	24,	'the great burger',	'https://live.staticflickr.com/7607/16698106868_d8c28a0644_b.jpg'),
(36,	24,	'the great burger restaurant',	'https://japangourmetpass.s3.us-east-2.amazonaws.com/images-restaurants/January2021/January2/c1.the-great-burger-hamburger-restaurant-tokyo-shibuya-meiji-jingumae-exterior-nice-good-entrance-medium.jpg'),
(37,	25,	'nikuya no daidokoru hormone',	'https://cdn.macaro-ni.jp/assets/img/shutterstock/shutterstock_314638874.jpg'),
(38,	25,	'nikuya no daidokoro reba',	'https://cdn-ak.f.st-hatena.com/images/fotolife/l/linakawase/20180926/20180926135904.jpg'),
(39,	39,	'Uobei Shibuya Dougenzaka menu',	'https://www.genkisushi.co.jp/common/sysfile/menus/700x700/ID00002480img1.jpg'),
(40,	39,	'Uobei Shibuya Dougenzaka maki',	'https://www.genkisushi.co.jp/common/sysfile/menus/700x700/ID00002123img1.jpg'),
(41,	39,	'Uobei Shibuya Dougenzaka sashimi',	'https://www.genkisushi.co.jp/common/sysfile/menus/700x700/ID00002481img1.jpg');

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tag` (`id`, `name`, `slug`) VALUES
(1,	'Ramen',	'ramen'),
(2,	'Sushi',	'sushi'),
(3,	'Curry',	'curry'),
(4,	'Tonkatsu',	'tonkatsu'),
(5,	'Tenpura',	'tenpura'),
(6,	'Okonomiyaki',	'okonomiyaki'),
(7,	'Yakiniku',	'yakiniku'),
(8,	'Yakitori',	'yakitori'),
(9,	'Karaage',	'karaage'),
(10,	'Français',	'francais'),
(11,	'Traditionnelle',	'traditionnelle'),
(12,	'Sashimi',	'sashimi'),
(13,	'Burger',	'burger'),
(14,	'Gyoza',	'gyoza');

DROP TABLE IF EXISTS `tag_establishment`;
CREATE TABLE `tag_establishment` (
  `tag_id` int(11) NOT NULL,
  `establishment_id` int(11) NOT NULL,
  PRIMARY KEY (`tag_id`,`establishment_id`),
  KEY `IDX_3541C6E9BAD26311` (`tag_id`),
  KEY `IDX_3541C6E98565851` (`establishment_id`),
  CONSTRAINT `FK_3541C6E98565851` FOREIGN KEY (`establishment_id`) REFERENCES `establishment` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_3541C6E9BAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tag_establishment` (`tag_id`, `establishment_id`) VALUES
(1,	10),
(1,	29),
(1,	35),
(1,	36),
(1,	37),
(2,	3),
(2,	9),
(2,	14),
(2,	16),
(2,	19),
(2,	31),
(2,	39),
(3,	1),
(3,	20),
(3,	36),
(3,	38),
(4,	5),
(4,	34),
(5,	5),
(5,	17),
(5,	18),
(6,	4),
(6,	23),
(7,	2),
(7,	25),
(7,	27),
(7,	28),
(8,	6),
(8,	7),
(8,	8),
(8,	13),
(8,	15),
(8,	22),
(8,	32),
(8,	33),
(9,	1),
(9,	5),
(9,	36),
(10,	11),
(10,	26),
(10,	40),
(11,	12),
(11,	30),
(12,	7),
(12,	39),
(13,	21),
(13,	24),
(14,	10);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D64986CC499D` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `email`, `password`, `pseudo`, `lastname`, `firstname`, `age`, `nationality`, `picture`, `roles`) VALUES
(1,	'kurosaki@admin.com',	'$2y$13$k.VR08yUFrLSDQ1FI5jCcet6alcnXTA74cmKaQt6im.bnkOZr4j2K',	'Fraise',	'Kurosaki',	'Ichigo',	27,	'Japonais',	'https://static.wikia.nocookie.net/bleach/images/a/a2/Ichigo_Kurosaki.png/revision/latest?cb=20120719180056&path-prefix=fr',	'[\"ROLE_ADMIN\"]'),
(2,	'uzumaki@user.com',	'$2y$13$6i3S3bre3oIbVcQbXElJD.59eXfLCl7PKJ/QqFOm6IM/C5JqeRMi6',	'Hokage',	'Uzumaki',	'Naruto',	26,	'Konoha',	'https://static.wikia.nocookie.net/naruto/images/d/dd/Naruto_Uzumaki%21%21.png/revision/latest/top-crop/width/360/height/360?cb=20210110160123&path-prefix=fr',	'[\"ROLE_USER\"]'),
(3,	'admin@admin.com',	'$2y$13$fAeqAybhIISPgYeE/Q86GufL7oyY0R73uEommn9sCObl.RjfaSxRS',	'Admin',	'Admin',	'istrateur',	NULL,	'Français',	NULL,	'[\"ROLE_ADMIN\"]'),
(4,	'user@user.com',	'$2y$13$zVaObG1TqTWOsXPyHK6xIOH/TjsNKJjRkG6FbOvyQHs1uaJ7RnQdG',	'User',	'User',	'name',	NULL,	'Islandais',	NULL,	'[\"ROLE_USER\"]');

-- 2022-06-24 15:02:58