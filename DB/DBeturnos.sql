DROP DATABASE IF EXISTS DBeturnos;

CREATE DATABASE DBeturnos;

USE DBeturnos;

	
	CREATE TABLE centers(
		idce INTEGER (2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		cname VARCHAR (30) UNIQUE NOT NULL,
		direction VARCHAR (30),
		telphone VARCHAR (15),
		type CHAR (3) /*'' CIC CAP*/
	);

	INSERT INTO centers (idce, cname, direction, telphone, type) VALUES
		(1, 'home', '', '', ''),
		(2, 'San Cayetano', 'Zarate 3245', '03489 431084', 'cic'),
		(3, '9 de Julio', 'Paso 1446','03489 437550', 'cap'),
		(4, 'Ariel del Plata', 'Aguiar 3245', '03489 440050', 'cap'),
		(5, 'Acacias', 'Echeverria 952', '03489 437555', 'cap'),
		(6, 'Villa Nueva', 'San Lorenzo 1352', '03489 437549', 'cic'),
		(7, 'San Felipe', 'Dorrego 1322', '03489 437551', 'cap'),
		(8, 'Siderca', 'Lavezzari 11', '03489 448720', 'cap'),
		(9, 'San Jacinto', 'Fernandez 3013', '03489 447503', 'cap'),
		(10, 'Lubo', 'Modarelli 684', '03489 441393', 'cic'),
		(11, 'Las praderas', 'Verdier 508', '03489 441451', 'cap'),
		(12, 'La Josefa', 'Martino 501', '03489 436754', 'cic'),
		(13, 'Los Pioneros', 'Maffeis 566', '03489 15660347', 'cap'),
		(14, 'Rio Lujan', 'Quinquinela Martin 114', '03489 15668317', 'cap'),
		(15, 'Otamendi', 'Cordero 154', '03489 447489', 'cap'),
		(16, 'Las Campanas', 'De Marco 101', '03489 444367', 'cap');


	CREATE TABLE specs(
		idspec INTEGER (2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		spec VARCHAR (25) NOT NULL,
		sptime CHAR (2)
	);

	INSERT INTO specs (idspec, spec, sptime) VALUES
		(1, 'Clínica Médica', 20),    /* time in minutes*/
		(2, 'Pediatría', 30),
		(3, 'Odontología', 20),
		(4, 'Psicología', 30),
		(5, 'Ginecología', 30),
		(6, 'Cardiología', 15),
		(7, 'Fonoaudiología', 20),
		(8, 'Nutrición', 20),
		(9, 'Infectología', 15),
		(10, 'Oftalmología', 20),
		(11, 'Psiquiatría de Adultos', 30),
		(12, 'Psiquiatría de Niños', 30);


	CREATE TABLE users(
		idus INTEGER (3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		lname VARCHAR (30) NOT NULL,
		name VARCHAR (30) NOT NULL,
		mail VARCHAR (30) UNIQUE NOT NULL,
		pass CHAR (32) NOT NULL,
		roll CHAR (4) NOT NULL /*dba doc aux*/
		

		/*photo VARCHAR (100)*/
	);

	INSERT INTO users (idus, lname, name, mail, pass, roll) VALUES
		(1, 'Pocosgnich', 'Marcos', 'mpocosgnich@gmail.com', MD5('pocos2020'), 'dba'),
		(2, 'López', 'Catia', 'lopezc@hotmail.com', MD5('ceci29'), 'prof'),
		(3, 'Reboir', 'Irina', 'reboiri@gmail.com', MD5('irina82'), 'prof'),
		(4, 'Volpi Grassi', 'Lorena', 'lorevg81@gmail.com', MD5('luismi315'), 'prof'),
		(5, 'García', 'Misael', 'gmisael91@gmail.com', MD5('misa12345'), 'aux'),
		(6, 'Ayos', 'Mónica',  'mayos63@hotmail.com', MD5('moni28039'), 'prof'),
		(7, 'Robles', 'Paula', 'paulita1983@yahoo.com.ar', MD5('fonoes15'), 'prof'),
		(8, 'Enjuto', 'Ariel', 'enjuto@hotmail.com', MD5('ajuntox'), 'prof'),
		(9, 'Lopez', 'Betiana', 'blopez@hotmail.com', MD5('betilop01'), 'aux'),
		(10, 'Benitez', 'Cecilia', 'lachechu@mimail.com', MD5('acciardce'), 'prof'),
		(11, 'Toretto', 'Carla', 'carlyto@yahoo.com.ar', MD5('123456'), 'prof'),
		(12, 'Barlongo', 'Analía', 'barcelona320@gmail.com', MD5('leomateoli'), 'prof'),
		(13, 'Simbionti', 'Federico', 'micorreo@micorreo.com', MD5('eldibujante'), 'prof'),
		(14, 'Katz', 'Patricia', 'kantzpato@yahoo.com.ar', MD5('joungcarl'), 'prof'),
		(15, 'Branca', 'Avril', 'brapril@gmail.com', MD5('capril4'), 'aux'),
		(16, 'Marquez', 'Julio', 'eljoyta69@hotmail.com', MD5('eldiegote'), 'prof');


	CREATE TABLE doctors(
		idoc INTEGER (3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		idus INTEGER NOT NULL,
		idspec INTEGER (2) NOT NULL,
		FOREIGN KEY (idus) REFERENCES users(idus)
			ON DELETE CASCADE ON UPDATE CASCADE,
		FOREIGN KEY (idspec) REFERENCES specs(idspec)
			ON DELETE CASCADE ON UPDATE CASCADE
	);

	INSERT INTO doctors	(idoc, idus, idspec) VALUES
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
		idoc INTEGER NOT NULL,
		day VARCHAR (10) NOT NULL,
		idce INTEGER (2) NOT NULL,
		hour_in CHAR (2) NOT NULL,
		hour_out CHAR (2) NOT NULL,
		state CHAR (4) NOT NULL,
		FOREIGN KEY (idoc) REFERENCES doctors(idoc)
			ON DELETE CASCADE ON UPDATE CASCADE,
		FOREIGN KEY (idce) REFERENCES centers(idce)
			ON DELETE CASCADE ON UPDATE CASCADE
		
	);

	INSERT INTO journals (idjou, idoc, day, idce, hour_in, hour_out, state) VALUES
		(1, 1, 'Lunes', 2,'08', '16', 'up'),
		(2, 1, 'Miércoles', 6, '10', '17', 'up'),
		(3, 1, 'Jueves', 10, '12', '18', 'up'),
		(4, 1, 'Viernes', 5, '10', '15', 'up'),
		(5, 2, 'Martes', 2, '12', '16', 'up'),
		(6, 2, 'Miércoles', 12, '10', '15', 'up'),
		(7, 2, 'Jueves', 3, '12', '16', 'up'),
		(8, 3, 'Lunes', 2, '12', '17', 'up'),
		(9, 3, 'Martes', 2, '13', '17', 'up'),
		(10, 3, 'Miércoles', 7, '12', '16', 'up'),
		(11, 3, 'Viernes', 10, '13', '17', 'up'),
		(12, 4, 'Lunes', 10, '09', '12', 'up'),
		(13, 4, 'Jueves', 6, '08', '12', 'up'),
		(14, 5, 'Miércoles', 12, '08', '11', 'up'),
		(15, 6, 'Lunes', 14, '10', '16', 'up'),
		(16, 6, 'Martes', 2, '08', '14', 'up'),
		(17, 6, 'Miércoles', 8, '12', '16', 'up'),
		(18, 6, 'Jueves', 6, '08', '16', 'up'),
		(19, 6, 'Viernes', 9, '10', '14', 'up'),
		(20, 7, 'Lunes', 15, '08', '12', 'up'),
		(21, 7, 'Miércoles', 16, '10', '16', 'up'),
		(22, 7, 'Jueves', 11, '08', '15', 'up'),
		(23, 7, 'viernes', 6, '08', '15', 'up'),
		(24, 8, 'Martes', 13, '10', '12', 'up'),
		(25, 8, 'Miércoles', 9, '08', '11', 'up'),
		(26, 8, 'Jueves', 2, '08', '12', 'up'),
		(27, 8, 'Viernes', 2, '08', '12', 'up'),
		(28, 9, 'Lunes', 3, '08', '14', 'up'),
		(29, 9, 'Martes', 5, '10', '16', 'up'),
		(30, 9, 'Miércoles', 8, '08', '15', 'up'),
		(31, 9, 'Jueves', 9, '10', '16', 'up'),
		(32, 9, 'Viernes', 11, '12', '16', 'up'),
		(33, 10, 'Miércoles', 6, '15', '18', 'up'),
		(34, 11, 'Lunes', 15, '08', '12', 'up'),
		(35, 11, 'Martes', 12, '08', '18', 'up'),
		(36, 11, 'Miércoles', 8, '08', '12', 'up'),
		(37, 11, 'Jueves', 4, '08', '15', 'up'),
		(38, 11, 'Viernes', 3, '10', '16', 'up'),
		(39, 12, 'Lunes', 6, '08', '17', 'up'),
		(40, 12, 'Martes', 10, '10', '16', 'up'),
		(41, 12, 'Miércoles', 2, '08', '12', 'up'),
		(42, 12, 'Jueves', 8, '12', '16', 'up'),
		(43, 12, 'Viernes', 3, '10', '16', 'up');


	CREATE TABLE patients(
		idpa INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		dni VARCHAR (8) NOT NULL UNIQUE,
		lname VARCHAR (50) NOT NULL,
		name VARCHAR (50) NOT NULL,
		age INTEGER (2) NOT NULL,
		sex VARCHAR (1) NOT NULL,
		blood VARCHAR (4),
		mail VARCHAR (50) NOT NULL UNIQUE,
		direction VARCHAR (50),
		city VARCHAR (50) NOT NULL,
		telphone VARCHAR (15)
		
	);

	INSERT INTO patients (idpa, dni, lname, name, age, sex, blood, mail, direction, city, telphone)
		VALUES
		(1, '28164718', 'Paciente', 'CERO', 39, 'M', 'A+', 'elvago@hotmail.com', 'Viale N° 51', 'Valle de Catamarca', '03489 15150262')
		(2, '29143343', 'Tepacien', 'UNO', 38, 'F', '0+', 'loreley@gmail.com', 'J. C. Dellepiane 599', 'Campana', ''),
		(3, '94524177', 'El paciente', 'Yopo', 55, 'M', 'B+', 'correio@gmail.com', 'Juan marini 417', 'Zarate', ''),
		(4, '47155495', 'Calabacin', 'Brian', 13, 'M', 'AB+', 'nocorreo@yahoo.com', 'Los Nogales 1055', 'Lujan', ''),
		(5, '12441573', 'Cruz', 'Juan', 55, 'M', 'A+', 'jcruz@hotmail.com', '', 'Lima', ''),
		(6, '95442153', 'Gonzales', 'Bonifacio', 61, 'M', '0-', 'elboni58@yahoo.com.ar', '', 'Asuncion', '2231144575'),
		(7, '39155423', 'Britos', 'Braian', 19, 'M', '0+', 'elbrayan2000@gmail.com', '', 'Escobar', '');


	CREATE TABLE shifts(
		idsf INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		registry DATETIME,
		idpa INTEGER NOT NULL,
		idoc INTEGER NOT NULL,
		idce INTEGER (2) NOT NULL,
		sdate DATE,
		hour CHAR (5),
		state CHAR (4) NOT NULL,
		FOREIGN KEY (idpa) REFERENCES patients(idpa)
			ON DELETE RESTRICT ON UPDATE CASCADE,
		FOREIGN KEY (idce) REFERENCES centers(idce)
			ON DELETE RESTRICT ON UPDATE CASCADE
		
	);


	CREATE TABLE medrecord(
		idmr INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		mdate DATE NOT NULL,
		idpa INTEGER NOT NULL,
		idoc INTEGER NOT NULL,
		query TEXT NOT NULL,
		background TEXT,
		diagnosis TEXT,
		treatment TEXT,
		FOREIGN KEY (idpa) REFERENCES patients(idpa)
			ON DELETE RESTRICT ON UPDATE CASCADE,
		FOREIGN KEY (idoc) REFERENCES doctors(idoc)
			ON DELETE RESTRICT ON UPDATE CASCADE
	);

	INSERT INTO medrecord (idmr, mdate, idpa, idoc, query, background, diagnosis, treatment)
		 VALUES
		(1, '2020-04-12', 1, 3, 'problemas de sueño', 'crisis de ansiedad', 'Ansiedad generalizada', 'Psicoterapia');