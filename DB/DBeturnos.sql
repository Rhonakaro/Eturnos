DROP DATABASE IF EXISTS DBeturnos;

CREATE DATABASE DBeturnos;

USE DBeturnos;

	
	CREATE TABLE centers(
		idce INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		cname VARCHAR (40) UNIQUE NOT NULL,
		direction VARCHAR (40),
		telphone VARCHAR (20),
		type VARCHAR (3)
	);

	INSERT INTO centers (idce, cname, direction, telphone, type) VALUES
		(1, 'home', '', '', ''),
		(2, 'San Cayetano', 'Zarate 3245', '03489 431084', 'CIC'),
		(3, '9 de Julio', 'Paso 1446','03489 437550', 'CAP'),
		(4, 'Ariel del Plata', 'Aguiar 3245', '03489 440050', 'CAP'),
		(5, 'Acacias', 'Echeverria 952', '03489 437555', 'CAP'),
		(6, 'Villa Nueva', 'San Lorenzo 1352', '03489 437549', 'CIC'),
		(7, 'San Felipe', 'Dorrego 1322', '03489 437551', 'CAP'),
		(8, 'Siderca', 'Lavezzari 11', '03489 448720', 'CAP'),
		(9, 'San Jacinto', 'Fernandez 3013', '03489 447503', 'CAP'),
		(10, 'Lubo', 'Modarelli 684', '03489 441393', 'CIC'),
		(11, 'Las praderas', 'Verdier 508', '03489 441451', 'CAP'),
		(12, 'La Josefa', 'Martino 501', '03489 436754', 'CIC'),
		(13, 'Los Pioneros', 'Maffeis 566', '03489 15660347', 'CAP'),
		(14, 'Rio Lujan', 'Quinquinela Martin 114', '03489 15668317', 'CAP'),
		(15, 'Otamendi', 'Cordero 154', '03489 447489', 'CAP'),
		(16, 'Las Campanas', 'De Marco 101', '03489 444367', 'CAP');


	CREATE TABLE specs(
		idspec INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		spec VARCHAR (40) NOT NULL,
		sptime VARCHAR (7)
	);

	INSERT INTO specs (idspec, spec, sptime) VALUES
		(1, 'Clínica Médica', '30 min.'),    
		(2, 'Pediatría', '30 min.'),
		(3, 'Odontología', '30 min.'),
		(4, 'Psicología', '40 min.'),
		(5, 'Ginecología', '30 min.'),
		(6, 'Cardiología', '20 min.'),
		(7, 'Fonoaudiología', '30 min.'),
		(8, 'Nutrición', '20 min.'),
		(9, 'Infectología', '20 min.'),
		(10, 'Oftalmología', '20 min.'),
		(11, 'Psiquiatría de Adultos', '40 min.'),
		(12, 'Psiquiatría de Niños', '40 min.');


	CREATE TABLE users(
		idus INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		lname VARCHAR (40) NOT NULL,
		name VARCHAR (40) NOT NULL,
		mail VARCHAR (40) UNIQUE NOT NULL,
		pass CHAR (32) NOT NULL,
		roll VARCHAR (4) NOT NULL
		

		/*photo VARCHAR (100)*/
	);

	INSERT INTO users (idus, lname, name, mail, pass, roll) VALUES
		(1, 'Pocosgnich', 'Marcos', 'mpocosgnich@gmail.com', MD5('pocos2020'), 'dba'),
		(2, 'López', 'Catia', 'lopezc@hotmail.com', MD5('ceci29'), 'prof'),
		(3, 'Reboir', 'Irina', 'reboiri@gmail.com', MD5('irina82'), 'prof'),
		(4, 'Volpi Grassi', 'Lorena', 'lorevg81@gmail.com', MD5('luismi315'), 'prof'),
		(5, 'García', 'Misael', 'gmisael91@gmail.com', MD5('misa12345'), 'aux'),
		(6, 'Alcantara', 'Mónica',  'maalcan3@hotmail.com', MD5('moni28039'), 'prof'),
		(7, 'Robles', 'Paula', 'paulita1983@yahoo.com.ar', MD5('fonoes15'), 'prof'),
		(8, 'Enjuto', 'Ariel', 'enjuto@hotmail.com', MD5('ajuntox'), 'prof'),
		(9, 'Lopez', 'Betiana', 'blopez@hotmail.com', MD5('betilop01'), 'aux'),
		(10, 'Benitez', 'Cecilia', 'lachechu@mimail.com', MD5('acciardce'), 'prof'),
		(11, 'Toretto', 'Carla', 'carlyto@yahoo.com.ar', MD5('123456'), 'prof'),
		(12, 'Barlongo', 'Analía', 'barcelona320@gmail.com', MD5('leomateoli'), 'prof'),
		(13, 'Simbionti', 'Federico', 'micorreo@micorreo.com', MD5('eldibujante'), 'prof'),
		(14, 'Katz', 'Patricia', 'kantzpato@yahoo.com.ar', MD5('joungcarl'), 'prof'),
		(15, 'Brancos', 'Avril', 'brapril@gmail.com', MD5('capril4'), 'aux'),
		(16, 'Marquez', 'Julio', 'eljoyta69@hotmail.com', MD5('eldiegote'), 'prof');


	CREATE TABLE professionals(
		idpr INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		idus INTEGER NOT NULL,
		idspec INTEGER NOT NULL,
		FOREIGN KEY (idus) REFERENCES users(idus)
			ON DELETE CASCADE ON UPDATE CASCADE,
		FOREIGN KEY (idspec) REFERENCES specs(idspec)
			ON DELETE CASCADE ON UPDATE CASCADE
	);

	INSERT INTO professionals (idpr, idus, idspec) VALUES
		(1, 2, 1),
		(2, 3, 8),
		(3, 4, 4),
		(4, 6, 7),
		(5, 7, 6),
		(6, 8, 2),
		(7, 10, 3),
		(8, 11, 5),
		(9, 12, 3),
		(10, 13, 12),
		(11, 14, 1),
		(12, 16, 2);
		 

	CREATE TABLE journals(
		idjou INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		idpr INTEGER NOT NULL,
		day VARCHAR (10) NOT NULL,
		idce INTEGER NOT NULL,
		hour_in VARCHAR (6) NOT NULL,
		hour_out VARCHAR (6) NOT NULL,
		state VARCHAR (4) NOT NULL,
		FOREIGN KEY (idpr) REFERENCES professionals(idpr)
			ON DELETE CASCADE ON UPDATE CASCADE,
		FOREIGN KEY (idce) REFERENCES centers(idce)
			ON DELETE CASCADE ON UPDATE CASCADE
		
	);

	INSERT INTO journals (idjou, idpr, day, idce, hour_in, hour_out, state) VALUES
		(1, 1, 'Lunes', 2,'08 am.', '16 pm.', 'Up'),
		(2, 1, 'Miércoles', 6, '10 am.', '17 pm.', 'Up'),
		(3, 1, 'Jueves', 10, '12 m.', '17 pm.', 'Up'),
		(4, 1, 'Viernes', 5, '10 am.', '15 pm.', 'Up'),
		(5, 2, 'Martes', 2, '12 m.', '16 pm.', 'Up'),
		(6, 2, 'Miércoles', 12, '10 am.', '15 pm.', 'Up'),
		(7, 2, 'Jueves', 3, '12 m.', '16 pm.', 'Up'),
		(8, 3, 'Lunes', 2, '12 m.', '16 pm.', 'Up'),
		(9, 3, 'Martes', 2, '13 pm.', '17 pm.', 'Up'),
		(10, 3, 'Miércoles', 7, '12 m.', '16 pm.', 'Up'),
		(11, 3, 'Viernes', 10, '13 pm.', '16 pm.', 'Up'),
		(12, 4, 'Lunes', 10, '09 am.', '12 m.', 'Up'),
		(13, 4, 'Jueves', 6, '08 am.', '12 m.', 'Up'),
		(14, 5, 'Miércoles', 12, '08 am.', '11 am.', 'Up'),
		(15, 6, 'Lunes', 14, '10 am.', '16 pm.', 'Up'),
		(16, 6, 'Martes', 2, '08 am.', '14 pm.', 'Up'),
		(17, 6, 'Miércoles', 8, '12 m.', '16 pm.', 'Up'),
		(18, 6, 'Jueves', 6, '08 am.', '16 pm.', 'Up'),
		(19, 6, 'Viernes', 9, '10 am.', '14 pm.', 'Up'),
		(20, 7, 'Lunes', 15, '08 am.', '12 m.', 'Up'),
		(21, 7, 'Miércoles', 16, '10 am.', '16 pm.', 'Up'),
		(22, 7, 'Jueves', 11, '08 am.', '15 pm.', 'Up'),
		(23, 7, 'viernes', 6, '08 am.', '15 pm.', 'Up'),
		(24, 8, 'Martes', 13, '10 am.', '12 pm.', 'Up'),
		(25, 8, 'Miércoles', 9, '08 am.', '11 am.', 'Up'),
		(26, 8, 'Jueves', 2, '08 am.', '12 m.', 'Up'),
		(27, 8, 'Viernes', 2, '08 am.', '12 m.', 'Up'),
		(28, 9, 'Lunes', 3, '08 am.', '14 pm.', 'Up'),
		(29, 9, 'Martes', 5, '10 am.', '16 pm.', 'Up'),
		(30, 9, 'Miércoles', 8, '08 am.', '15 pm.', 'Up'),
		(31, 9, 'Jueves', 9, '10 am.', '16 pm.', 'Up'),
		(32, 9, 'Viernes', 11, '12 m.', '16', 'Up'),
		(33, 10, 'Miércoles', 3, '15 pm.', '17 pm.', 'Up'),
		(34, 11, 'Lunes', 15, '08 am.', '12 pm.', 'Up'),
		(35, 11, 'Martes', 12, '08 am.', '17 pm.', 'Up'),
		(36, 11, 'Miércoles', 8, '08 am.', '12 m.', 'Up'),
		(37, 11, 'Jueves', 4, '08 am.', '15 pm.', 'Up'),
		(38, 11, 'Viernes', 3, '10 am.', '16 pm.', 'Up'),
		(39, 12, 'Lunes', 6, '08 am.', '17 pm.', 'Up'),
		(40, 12, 'Martes', 10, '10 am.', '16 pm.', 'Up'),
		(41, 12, 'Miércoles', 2, '08 am.', '12 m.', 'Up'),
		(42, 12, 'Jueves', 8, '12 m.', '16 pm.', 'Up'),
		(43, 12, 'Viernes', 3, '10 am.', '16 pm.', 'Up');


	CREATE TABLE patients(
		idpa INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		dni VARCHAR (8) NOT NULL UNIQUE,
		lnamepa VARCHAR (50) NOT NULL,
		namepa VARCHAR (50) NOT NULL,
		age INTEGER (2) NOT NULL,
		sex VARCHAR (2) NOT NULL,
		blood VARCHAR (4),
		mail VARCHAR (50),
		direction VARCHAR (50),
		district VARCHAR (50) NOT NULL,
		city VARCHAR (50) NOT NULL,
		telphone VARCHAR (15)
		
	);

	INSERT INTO patients (idpa, dni, lnamepa, namepa, age, sex, blood, mail, direction, district, city, telphone)
		VALUES
		(1, '28164718', 'Paciente', 'Prueba1', 39, 'M', 'A+', 'elvago@hotmail.com', 'Viale N° 51', 'Otamendi', 'Valle de Catamarca', '03489 15150262'),
		(2, '29143343', 'Tepacien', 'Prueba2', 38, 'F', '0+', 'loreley@gmail.com', 'J. C. Dellepiane 599', 'Acacias', 'Campana', ''),
		(3, '94524177', 'Elpaciente', 'Ella', 55, 'F', 'B+', 'correio@gmail.com', 'Juan marini 417', 'Las Campanas', 'Zarate', ''),
		(4, '47155495', 'Calabacin', 'Cuatro', 13, 'M', 'AB+', 'nocorreo@yahoo.com', 'Los Nogales 1055', 'Río Lujan', 'Lujan', ''),
		(5, '12441573', 'Cruz', 'Joan', 55, 'M', 'A+', 'jcruz@hotmail.com', '', 'LA Josefa', 'Lima', ''),
		(6, '95442153', 'Gonzales', 'Bonifacio', 61, 'M', '0-', 'elboni58@yahoo.com.ar', '', 'San Cayetano', 'Asuncion', '2231144575'),
		(7, '39155423', 'Britos', 'Camila', 19, 'F', '0+', 'elbrayan2000@gmail.com', '', 'Siderca', 'Escobar', '');


	CREATE TABLE shifts(
		idsf INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		registry DATETIME,
		idpa INTEGER NOT NULL,
		idpr INTEGER NOT NULL,
		idce INTEGER (2) NOT NULL,
		sdate DATE,
		hour VARCHAR (10),
		state VARCHAR (4) NOT NULL
				
	);


	CREATE TABLE medrecord(
		idmr INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		mdate DATE NOT NULL,
		idpa INTEGER NOT NULL,
		idpr INTEGER NOT NULL,
		query TEXT NOT NULL,
		background TEXT,
		diagnosis TEXT,
		treatment TEXT,
		FOREIGN KEY (idpa) REFERENCES patients(idpa)
			ON DELETE RESTRICT ON UPDATE CASCADE,
		FOREIGN KEY (idpr) REFERENCES professionals(idpr)
			ON DELETE RESTRICT ON UPDATE CASCADE
	);

	INSERT INTO medrecord (idmr, mdate, idpa, idpr, query, background, diagnosis, treatment)
		 VALUES
		(1, '2020-04-12', 1, 3, 'problemas de sueño', 'crisis de ansiedad', 'Ansiedad generalizada', 'Psicoterapia');