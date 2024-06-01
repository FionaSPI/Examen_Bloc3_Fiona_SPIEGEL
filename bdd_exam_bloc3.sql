-- Création de la table "users" pour stocker les informations des utilisateurs
CREATE TABLE users (
  id_user_key_one varchar(36) NOT NULL DEFAULT (UUID()) PRIMARY KEY,
  name varchar(100) NOT NULL,
  surname varchar(100) NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  password varchar(255) NOT NULL
);

CREATE TABLE tickets (
  id_tickets_key_two varchar(36) NOT NULL DEFAULT (UUID()) PRIMARY KEY,
  key_one VARCHAR(36) NOT NULL,
  FOREIGN KEY (key_one) REFERENCES users (id_user_key_one)
);
