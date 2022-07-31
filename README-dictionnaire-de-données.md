# Data dictionary

### Table establishment

| Champ          | Type           | Spécifités              | Description                      |
| -------------- | -------------- | ----------------------- | -------------------------------- |
| `id`           | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Establishment id                 |
| `district_id`  | `INT(11)`      | `NOT NULL`              | Establishment id                 |
| `name`         | `VARCHAR(100)` | `NOT NULL`              | Establishment name               |
| `type`         | `ENUM`         | `NOT NULL`              | Establishment type               |
| `description`  | `TINYTEXT`     | `NOT NULL`              | Establishment description        |
| `address`      | `VARCHAR(200)` | `NOT NULL`              | Establishment address            |
| `price`        | `INT(4)`       | `NULL`                  | Establishment price              |
| `useful_info`  | `LONGTEXT`     | `NULL`                  | Establishment useful information |
| `website`      | `VARCHAR(255)` | `NULL`                  | Establishment website            |
| `phone`        | `INT(11)`      | `NULL`                  | Establishment phone              |
| `rating`       | `DECIMAL(2,1)` | `NULL`                  | Establishment rating             |
| `slug`         | `VARCHAR(255)` | `NULL`                  | Establishment slug               |
| `picture`      | `VARCHAR(250)` | `NULL`                  | Establishment picture            |
| `status`       | `INT(11)`      | `NOT NULL`              | Establishment status             |
| `opening_time` | `VARCHAR(200)` | `NULL`                  | Establishment opening time       |
| `updated_at`   | `DATETIME`     | `ON UPDATE, NULL`       | Establishment update             |



### Table District

| Champ   | Type           | Spécifités              | Description         |
| ------- | -------------- | ----------------------- | ------------------- |
| `id`    | `INT(11)`      | `PRIMARY KEY, NOT NULL` | District Id         |
| `name`  | `VARCHAR(100)` | `NOT NULL`              | District name       |
| `kanji` | `VARCHAR(50)`  | `NULL`                  | District kanji name |
| `slug`  | `VARCHAR(100)` | `NULL`                  | District slug       |



### Table Tag

| Champ  | Type           | Spécifités              | Description |
| ------ | -------------- | ----------------------- | ----------- |
| `id`   | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Tag Id      |
| `name` | `VARCHAR(100)` | `NOT NULL`              | Tag name    |
| `slug` | `VARCHAR(255)` | `NULL`                  | Tag slug    |



### Table Comment

| Champ              | Type           | Spécifités              | Description              |
| ------------------ | -------------- | ----------------------- | ------------------------ |
| `id`               | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Comment Id               |
| `establishment_id` | `INT(11)`      | `NOT NULL`              | Comment establishment Id |
| `user_id`          | `INT(11)`      | `NOT NULL`              | Comment username Id      |
| `published_at`     | `DATETIME`     | `NOT NULL`              | Comment published time   |
| `content`          | `TINYTEXT`     | `NOT NULL`              | Comment content          |
| `rating`           | `DECIMAL(2,1)` | `NULL`                  | Comment rating           |
| `picture`          | `VARCHAR(255)` | `NULL`                  | Comment picture          |



### Table User

| Champ         | Type           | Spécifités                 | Description      |
| ------------- | -------------- | -------------------------- | ---------------- |
| `id`          | `INT(11)`      | `PRIMARY KEY, NOT NULL`    | User Id          |
| `email`       | `VARCHAR(180)` | `NOT NULL`                 | User email       |
| `password`    | `VARCHAR(255)` | `NOT NULL`                 | User passeword   |
| `pseudo`      | `VARCHAR(100)` | `NOT NULL`                 | User pseudo      |
| `lastname`    | `VARCHAR(100)` | `NULL`                     | User lastname    |
| `firstname`   | `VARCHAR(100)` | `NULL`                     | User firstname   |
| `age`         | `DATE`         | `NULL`                     | User age         |
| `nationality` | `VARCHAR(100)` | `NULL`                     | User nationality |
| `picture`     | `VARCHAR(255)` | `NULL`                     | User picture     |
| `role`        | `LONGTEXT`     | `NOT NULL, (DC2Type:json)` | User role        |



### Table tag_establishment

| Champ              | Type      | Spécifités              | Description      |
| ------------------ | --------- | ----------------------- | ---------------- |
| `tag_id`           | `INT(11)` | `PRIMARY KEY, NOT NULL` | Tag Id           |
| `establishment_id` | `INT(11)` | `PRIMARY KEY ,NOT NULL` | Establishment Id |



### Table establishment_user

| Champ              | Type      | Spécifités              | Description      |
| ------------------ | --------- | ----------------------- | ---------------- |
| `establishment_id` | `INT(11)` | `PRIMARY KEY ,NOT NULL` | Establishment Id |
| `user_id`          | `INT(11)` | `PRIMARY KEY, NOT NULL` | User Id          |




### Table picture

| Champ                | Type           | Spécifités              | Description      |
| -------------------- | -------------- | ----------------------- | ---------------- |
| `id`                 | `INT(11)`      | `PRIMARY KEY ,NOT NULL` | Picture Id       |
| `establishment_id`   | `INT(11)`      | `NULL`                  | Establishment Id |
| `establishment_name` | `VARCHAR(255)` | `NULL`                  | Establishment Id |
| `url`                | `VARCHAR(255)` | `NULL`                  | Picture url      |
