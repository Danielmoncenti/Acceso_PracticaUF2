DROP TABLE IF EXISTS users_products;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS engines_versions;
DROP TABLE IF EXISTS developers_groups;
DROP TABLE IF EXISTS engines;
DROP TABLE IF EXISTS groups;
DROP TABLE IF EXISTS developers;



   CREATE TABLE users (
     id_user INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
     user VARCHAR(16) NOT NULL,
     name VARCHAR(24) NOT NULL,
     surname VARCHAR(28) NOT NULL,
     password CHAR(32) NOT NULL,
     email VARCHAR(32),
    birthdate DATE NOT NULL,
    registered DATETIME NOT NULL DEFAULT now(),
    admin BOOLEAN NOT NULL DEFAULT false
    );

		CREATE TABLE groups (
		id_group INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	  `group` VARCHAR(32),
		course INT,
		jam_year YEAR,
		mark FLOAT
		);

		CREATE TABLE developers (
		
		id_developer INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR(32),
		surname VARCHAR (48),
		email VARCHAR(32),
		website VARCHAR(255),
		birthdate DATE
		);

		CREATE TABLE developers_groups(
		id_developer_group INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
		id_developer INT UNSIGNED NOT NULL,
		id_group INT UNSIGNED NOT NULL,
		FOREIGN KEY (id_developer) REFERENCES developers(id_developer),
		FOREIGN KEY (id_group) REFERENCES groups (id_group));
		
		CREATE TABLE engines(
		id_engine INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
		engine VARCHAR(32)
		);

		CREATE TABLE engines_versions(

		id_engine_version INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
		version VARCHAR(24),
		id_engine INT UNSIGNED NOT NULL,
		FOREIGN KEY (id_engine) REFERENCES engines(id_engine)
		);

		CREATE TABLE products(
		id_product INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
		product VARCHAR(128),
		description TEXT ,
		price DECIMAL (6,2),
		reference VARCHAR (8),
		discount INT,
		units_sold INT UNSIGNED,
		website VARCHAR(255),
		`size` INT,
		duration INT,
		release_date DATE,
		id_group INT UNSIGNED NOT NULL,
		id_engine_version INT UNSIGNED NOT NULL,
		FOREIGN KEY (id_group) REFERENCES groups (id_group),
		FOREIGN KEY (id_engine_version) REFERENCES engines_versions(id_engine_version)
		);

		CREATE TABLE users_products (
		id_user_product INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
		id_user INT UNSIGNED NOT NULL,
		id_product INT UNSIGNED NOT NULL,
		FOREIGN KEY (id_user) REFERENCES users(id_user),
		FOREIGN KEY (id_product) REFERENCES products(id_product)
		);

 
  INSERT INTO users (user, name, surname, password, email, birthdate, admin) VALUES ("root", "Daniel", "Moncayo", md5("enti"),"root@root.com", "0000-00-00", true);
 INSERT INTO users (user, name, surname, password, email, birthdate, admin) VALUES ("user", "Daniel", "Moncayo", md5("enti"),"user@user.com", "0000-00-00", false);



INSERT INTO engines (engine) VALUES ("Unreal"), ("Unity");
INSERT INTO engines_versions (version, id_engine) VALUES ('4',1),('2019.5',2);
INSERT INTO groups (`group`, course, jam_year, mark) VALUES ('PillowWarriors', 2, 2021, 8);
INSERT INTO developers (name, surname, email, website, birthdate) VALUES ('Daniel', 'Moncayo', 'daniel.moncayo@enti.cat', 'www.DanMonPe.com','1997-09-08' );
INSERT INTO developers_groups (id_developer, id_group) VALUES (1, 1);
INSERT INTO products (product, description, price, reference, discount, units_sold, website, `size`, duration, release_date, id_group, id_engine_version) VALUES ("Pillows", "Lanza Personas contra almohadas", 2.99, "X89Y23SS", 0, 20000, "www.PillowTheGame.com", 20, 5, '2021-10-27', 1,1);
