# App road

## Back

| URL               | Méthode HTTP | Contrôleur                     | Méthode | Titre HTML                        | Commentaire    |
| ----------------- | ------------ | ------------------------------ | ------- | --------------------------------- | -------------- |
| `/`               | `GET`        | `Back/MainController`          | `home`  | Bienvenue dans l'arrière boutique | Back home page |
| `/etablissements` | `GET`        | `Back/EstablishmentController` | `index` | Liste des établissements          | Establishments |

| `/etablissements/{type}`                  | `GET`        | `Back/EstablishmentController` | `listByType`           | Liste des établissements            | Establishments list by type          |
| `/etablissements/{id}`           | `GET`        | `Back/EstablishmentController` | `show`                 | {Nom de l'établissement}            | Establishment’s page                 |
| `/etablissements/ajouter`          | `POST`       | `Back/EstablishmentController` | `new`                  | Ajout d'un établissement            | Page to add an establishment by type |
| `/etablissements/editer`    | `POST`       | `Back/EstablishmentController` | `edit`                 | Édition de {Nom de l'établissement} | Edit establishment by type           |
| `/etablissements/{id}` | `POST`       | `Back/EstablishmentController` | `delete`               | -                                   | Delete establishment                 |
| `/etablissements/nouveau/liste`           | `GET`        | `Back/EstablishmentController` | `newEstablishmentList` | Liste des établissements proposés   | list of  proposed establishments     |
| `/etablissements/nouveau/liste/{id}`      | `GET`        | `Back/EstablishmentController` | `handleProposition`    | Établissement proposé numéro {id}   | Establishment recovery               |
| `/specialites`                      | `GET`        | `Back/TagController` | `inde'x`                 | Liste des spécialités               | Speciality list                      |
| `/specialites/{id}`                     | `GET`        | `Back/EstablishmentController` | `show`                 | {Nom de la spécialité}              | Speciality's page                    |
| `/specialites/ajouter`                    | `POST`       | `Back/EstablishmentController` | `new`                  | Ajout d'une spécialité              | Page to ass a speciality             |
| `/specialites/{id}/editer`              | `POST`       | `Back/EstablishmentController` | `edit`                 | Édition d'une spécialité            | Edit speciality                      |
| `/specialites/{id}`           | `POST`       | `Back/EstablishmentController` | `delete`               | -                                   | Delete speciality                    |
| `/quartiers`                        | `GET`        | `Back/DistrictController`      | `list`                 | Liste des quartiers                 | District list                        |
| `/quartiers/{id}`                       | `GET`        | `Back/DistrictController`      | `Show`                 | {Nom du quartier}                   | District's page                      |
| `/quartiers/ajouter`                      | `POST`       | `Back/DistrictController`      | `new`                  | Ajout d'un quartier                 | Page to add an district              |
| `/quartiers/{id}/editer`                | `POST`       | `Back/DistrictController`      | `edit`                 | Édition de {Nom du quartier}        | Edit district                        |
| `/quartiers/{id}`             | `POST`       | `Back/DistrictController`      | `delete`               | -                                   | Delete district                      |
| `/profils`                          | `GET`        | `Back/UserController`          | `list`                 | Liste des utilisateurs              | List of users                        |
| `/profils/{id}`                         | `GET`        | `Back/UserController`          | `show`                 | {Nom de l'utilisateur}              | User's page                          |
| `/profils/ajouter`                        | `POST`       | `Back/UserController`          | `new`                  | Ajout d'un utilisateur              | Add a user                           |
| `/profils/{id}/editer`                  | `POST`       | `Back/UserController`          | `edit`                 | Édition de {Nom de l'utilisateur}   | Edit user                            |
| `/profils/{id}`                  | `POST`       | `Back/UserController`          | `delete`               | -                                   | Delete user                          |



## API

| URL                              | Méthode HTTP | Contrôleur                    | Méthode                       | Titre HTML | Commentaire                        |
| -------------------------------- | ------------ | ----------------------------- | ----------------------------- | ---------- | ---------------------------------- |
| `/api/v1/etablissements`         | `GET`        | `Api/EstablishmentController` | `establishmentsGetList`       | -          | Establishments list                |
| `/api/v1/etablissements/{type}`  | `GET`        | `Api/EstablishmentController` | `establishmentsGetListByType` | -          | Establishments list by type        |
| `/api/v1/etablissements/{id}`    | `GET`        | `Api/EstablishmentController` | `establishmentsGetItem`       | -          | Recovery of an establishment by id |
| `/api/v1/etablissements/ajouter` | `GET`        | `Api/EstablishmentController` | `establishmentsPostItem`      | -          | To go to the proposition form      |
| `/api/v1/etablissements/ajouter` | `POST`       | `Api/EstablishmentController` | `establishmentsPostItem`      | -          | To propose an establishement       |
| `/api/v1/tags`                   | `GET`        | `Api/TagController`           | `tagGetList`                  | -          | Tags list                          |
| `/api/v1/tags/{id}`              | `GET`        | `Api/TagController`           | `establishmentsByTag`         | -          | List of establishments by tag      |
| `/api/v1/districts`              | `GET`        | `Api/DistrictController`      | `districtGetList`             | -          | Districts list                     |
| `/api/v1/districts/{id}`         | `GET`        | `Api/DistrictController`      | `establishmentsByDistrict`    | -          | List of establishments by district |
| `/api/v1/profils/ajouter`        | `POST`       | `Api/UserController`          | `userPostlist`                | -          | Create a new user                  |
| `/api/v1/profils/{id}`           | `GET`        | `Api/UserController`          | `userGetItem`                 | -          | Recovery of a user by id           |
| `/api/v1/profils/{id}`           | `PUT`        | `Api/UserController`          | `userPutItem`                 | -          | Edit a user by id                  |
| `/api/v1/profils/{id}`           | `DELETE`     | `Api/UserController`          | `userDeleteItem`              | -          | Delete an user by id               |
| `/api/v1/connexion`              | `POST`       | `Api/SecurityController`      | `login`                       | -          | Connection of an user              |
