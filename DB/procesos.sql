
/*Crear centro*/
	INSERT INTO centers (idce, cname, idt, dir, tel) VALUES
		(0, 'Prueba1', 3, '', ''),
		(0, 'Prueba2', 3, '', '');

/*Actualizar centro*/
	UPDATE centers SET idt = 2, dir = 'Viale 77'
		WHERE idce = 17;

/*Eliminar centro*/
	DELETE FROM centers WHERE idce = 18;

/*Buscar centros*/
	SELECT ce.idce AS '', ce.cname AS Nombre, ty.type As Tipo, ce.dir AS Dirección, ce.tel As Teléfono
		FROM centers AS ce
		INNER JOIN ctype AS ty ON ce.idt = ty.idt ORDER BY idce;


		SET @count = 0;													/* SIRVE PARA ACTUALIZAR EL ID */
		UPDATE users SET users.idus = @count:= @count + 1;		/* AUTOGENERADO EN LAS TABLAS */
		ALTER TABLE users AUTO_INCREMENT = 1;

	/*https://www.youtube.com/watch?v=txqZrMVe4_M&list=PLvq-jIkSeTUZEHvKw7Gx3g5CjlcvA3jr1&index=27
	replace*/


/*---------------------------------------------------------------------------------------------*/

/*Crear usuarios*/
	INSERT INTO users (idus, lname, name, mail, user, pass, idrl) VALUES
		(0, 'Miapellido3', 'Minombre3', 'estamal2@elmail.com', 'usuario3', MD5('@usuario3'), 2),
		(0, 'Miapellido4', 'Minombre4', 'mailito@larara.com', 'usuario4', MD5('@usuario4'), 2);

/*Actualizar usuarios*/
	UPDATE users SET lname = 'Locatelli', name = 'Ricarda', pass = MD5('clavesita')
		WHERE idus = 5;

/*Elimiar usuario*/
	DELETE FROM users WHERE idus = 6;

/*Buscar usuarios*/
	SELECT us.lname AS Apellido, us.name AS Nombre, us.mail AS Correo, us.user As Usuario, us.pass As Password, ro.type AS Roll
		FROM users AS us 
		INNER JOIN rollus AS ro ON us.idrl = ro.idrl;
		
	

	SELECT us.lname AS Apellido, us.name AS Nombre, us.mail AS Correo, us.user As Usuario, 
		us.pass As Password, ro.type AS Roll
		FROM users AS us 
		INNER JOIN rollus AS ro ON us.idrl = ro.idrl WHERE us.lname = 'Katz' OR us.mail = 'lorevg81@gmail.com' OR ro.type = 'Profesional';


		SET @count = 0;													/* SIRVE PARA ACTUALIZAR EL ID */
		UPDATE users SET users.idus = @count:= @count + 1;		/* AUTOGENERADO EN LAS TABLAS */
		ALTER TABLE users AUTO_INCREMENT = 1;




	SELECT us.lname AS Apellido, us.name AS Nombre, us.mail AS Correo, us.user As Usuario, 
		us.pass As Password, ro.type AS Roll
		FROM users AS us 
		INNER JOIN rollus AS ro ON us.idrl = ro.idrl WHERE us.lname = 'Pocosgnich'; 
	
	SELECT us.lname AS Apellido, us.name AS Nombre, us.mail AS Correo, us.user As Usuario, 
		us.pass As Password, ro.type AS Roll
		FROM users AS us 
		INNER JOIN rollus AS ro ON us.idrl = ro.idrl WHERE us.user = 'usuario3' AND us.pass = '@usuario3';



	SELECT us.lname AS Apellido, us.name AS Nombre, us.mail AS Correo
		FROM users AS us WHERE us.roll = 'doc';  
	
/*----------------------------------------------------------------------------------------------*/

/*Crear especialidades*/
	INSERT INTO spec (iespec, espec) VALUES
			(0, 'Traumato'),
			(0, 'Kinesio');

/*Actualizar especialidades*/
	UPDATE spec SET spec = 'Traumatología' WHERE idspec = 13;

/*Eliminar especialidades*/
	DELETE FROM spec WHERE idspec = 14;

/*Buscar especialidades*/
	SELECT idspec AS '', spec AS Denominación FROM spec;
	SELECT idspec AS '', spec AS Denominación FROM spec WHERE spec = 'Odontología';

/*-----------------------------------------------------------------------------------------------*/

/*Crear médicos*/
	INSERT INTO doctors (idoc, idus, idspec) VALUES	(0, 17, 1);
		(0, 18, 1);

/*Actualizar médicos*/
	UPDATE doctors SET idspec = 1 WHERE lname = 'Canosa';

/*Eliminar médicos*/
	DELETE FROM doctors WHERE lname = 'Romulo' AND name = 'Cristina';

/*Buscar médicos*/
	SELECT COUNT(*) FROM 
	
	

	SELECT do.idoc AS '', us.lname AS Apellido, us.name AS Nombre,  sp.spec AS Especialidad
		FROM doctors AS do 
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN specs AS sp ON do.idspec = sp.idspec;

	SELECT do.idoc AS '', us.lname AS Apellido, us.name AS Nombre,  sp.spec AS Especialidad
		FROM doctors AS do 
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN spec AS sp ON do.idspec = sp.idspec WHERE us.lname = 'Benitez';
		
	SELECT do.idoc AS '', us.lname AS Apellido, us.name AS Nombre,  sp.spec AS Especialidad
		FROM doctors AS do 
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN spec AS sp ON do.idspec = sp.idspec WHERE sp.spec = 'Clínica Médica';
			
/*------------------------------------------------------------------------------------------------*/

/*Crear disponibilidad*/
	INSERT INTO dispo (idis, dispo) VALUES (0, 'No Esta');
			
/*Actualizar disponibilidad*/
	UPDATE dispo SET dispo = 'Tevoyaeliminar' WHERE idis = 4;

/*Eliminar disponibilidad*/
	DELETE FROM dispo WHERE idis = 4;

/*Buscar especialidades*/
	SELECT idis AS '', dispo AS Disponibilidad FROM dispo;
	
/*--------------------------------------------------------------------------------------------------*/

/*  Crear MEDICOS DIAS CENTROS  */
	INSERT INTO doccen (iddc , idoc , day, idce, hin, hout, sts) VALUES
		(0, 13, 'Lunes', 6, '08', '15', 'up'),
		(0, 13, 'Martes', 7, '10', '15', 'up'),
		(0, 13, 'Miércoles', 9, '08', '14', 'up'),
		(0, 13, 'Jueves', 12, '08', '16', 'up'),
		(0, 13, 'Viernes', 12, '08', '16', 'up'),
		(0, 13, 'PRUEBA', 12, '08', '16', 'up'),
		(0, 13, 'PRUEBA2', 12, '08', '16', 'up');

/*Actualizar MEDICOS DIAS CENTROS*/
	UPDATE doccen SET idce = 14 WHERE idhc = 48;

/*Elimiar MEDICOS DIAS CENTROS*/
	DELETE FROM doccen WHERE iddc = 53;

	DELETE FROM doccen WHERE iddc IN (50, 51);


/*Buscar MEDICOS DIAS CENTROS */ CONCAT(us.lname, ', ', us.name)
	
	SELECT * FROM doccen;

	SELECT dc.iddc, us.lname, us.name, sp.spec, dc.day, ce.cname, dc.hin, dc.hout, dc.sts
		FROM doccens AS dc
		INNER JOIN doctors AS do ON dc.idoc = do.idoc
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN specs AS sp ON do.idspec = sp.idspec
		INNER JOIN centers AS ce ON dc.idce = ce.idce;


	SELECT dc.iddc As '', us.lname AS Apellido, us.name AS Nombre, sp.spec AS Especialidad, dc.day as Día,
		ce.name AS Centro, dc.hin AS Entrada, dc.hout AS Salida, dc.sts AS Estado
		FROM doccen AS dc
		INNER JOIN doctors AS do ON dc.idoc = do.idoc
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN specs AS sp ON do.idspec = sp.idspec
		INNER JOIN centers AS ce ON dc.idce = ce.idce;


	SELECT dc.iddc As '', us.lname AS Apellido, us.name AS Nombre, sp.spec AS Especialidad, dc.day as Día,
		ce.name AS Centro, dc.hin AS Entrada, dc.hout AS Salida, dc.sts AS Estado
		FROM doccen AS dc
		INNER JOIN doctors AS do ON dc.idoc = do.idoc
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN specs AS sp ON do.idspec = sp.idspec
		INNER JOIN centers AS ce ON dc.idce = ce.idce WHERE sp.spec = 'Clinica Medica';

	SELECT dc.iddc As '', us.lname AS Apellido, us.name AS Nombre, sp.spec AS Especialidad, dc.day as Día,
		ce.name AS Centro, dc.hin AS Entrada, dc.hout AS Salida, dc.sts AS Estado
		FROM doccen AS dc
		INNER JOIN doctors AS do ON dc.idoc = do.idoc
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN specs AS sp ON do.idspec = sp.idspec
		INNER JOIN centers AS ce ON dc.idce = ce.idce WHERE ce.name = 'San Cayetano' ORDER BY dc.day;
		
	SELECT dc.iddc As '', us.lname AS Apellido, us.name AS Nombre, sp.spec AS Especialidad, dc.day as Día,
		ce.name AS Centro, dc.hin AS Entrada, dc.hout AS Salida, dc.sts AS Estado
		FROM doccen AS dc
		INNER JOIN doctors AS do ON dc.idoc = do.idoc
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN specs AS sp ON do.idspec = sp.idspec
		INNER JOIN centers AS ce ON dc.idce = ce.idce WHERE dc.sts = 'up';


	SELECT dc.day as Día, us.lname AS Apellido, us.name AS Nombre, sp.spec AS Especialidad,ce.name AS Centro,
		dc.hin AS Entrada, dc.hout AS Salida, dc.sts AS Estado
		FROM doccen AS dc
		INNER JOIN doctors AS do ON dc.idoc = do.idoc
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN specs AS sp ON do.idspec = sp.idspec
		INNER JOIN centers AS ce ON dc.idce = ce.idce WHERE dc.day = 'Lunes' ORDER BY sp.spec;


	SELECT js.idjou, us.lname, us.name, sp.spec, js.day, ce.cname, js.hour_in, js.hour_out, js.state
		FROM journals AS js
		INNER JOIN doctors AS do ON js.idoc = do.idoc
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN specs AS sp ON do.idspec = sp.idspec
		INNER JOIN centers AS ce ON js.idce = ce.idce;


		/* SE PUEDE AGREGAR CUALQUIER OTRA CONSULTA*/

/*---------------------------------------------------------------------------------------------------------*/

/*Crear pacientes*/

	INSERT INTO patients (idpa, dni, lname, name, age, mail, direction, city, telphone, sex, blood) VALUES	
		(0, '12441573', 'Cruz', 'Juan', 55, 'jcruz@hotmail.com', '', '', '', 'M', 'A+'),
		(0, '95442153', 'Gonzales', 'Bonifacio', 61, 'elboni58@yahoo.com.ar', '', 'Asuncion', '2231144575', 'M', '0--'),
		(0, '39155423', 'Britos', 'Braian', 19, 'elbrayan2000@gmail.com', '', '', '', 'M', '0+');

/*Actualizar pacientes */
	UPDATE patients SET sex = 'F' WHERE dni = '39155423';

/*Elimiar pacientes*/
	DELETE FROM patients WHERE idpa = 4; /*uno o mas registros*/
	
		SET @count = 0;													/* SIRVE PARA ACTUALIZAR EL ID */
		UPDATE patients SET patients.idpa = @count:= @count + 1;		/* AUTOGENERADO EN LAS TABLAS */
		ALTER TABLE patients  AUTO_INCREMENT = 1;						

/*Buscar pacientes*/

	SELECT COUNT(*) patients;

	SELECT idpa AS '', dni AS DNI, lname AS Apellido, name AS Nombre, mail AS Correo, tel AS Teléfono,
		sex AS Sexo FROM patients; 

	SELECT idpa AS '', dni AS DNI, lname AS Apellido, name AS Nombre, mail AS Correo, tel AS Teléfono,
		sex AS Sexo FROM patients WHERE dni = '28164718';
	
	SELECT idpa AS '', dni AS DNI, lname AS Apellido, name AS Nombre, mail AS Correo, tel AS Teléfono,
		sex AS Sexo FROM patients WHERE lname = 'Cruz';

	SELECT idpa AS '', dni AS DNI, lname AS Apellido, name AS Nombre, mail AS Correo, tel AS Teléfono,
		sex AS Sexo FROM patients WHERE mail = 'elbrayan2000@gmail.com';

/*---------------------------------------------------------------------------------------------------------*/

/*Crear turnos*/

	INSERT INTO shifts (ids, reg, idpa, idoc, idce, fech, hs, sts) VALUES
		(0, now(), 2, 7, 5, '2020-04-12', '10:20', 'ok'),
		(0, now(), 4, 4, 2, '2020-04-17', '15:40', 'ok'),
		(0, now(), 1, 1, 6, '2020-04-20', '16:00', 'ok'),
		(0, now(), 5, 6, 3, '2020-05-02', '08:00', 'ok');
			
/*Actualizar turnos*/  /*VER por ahi solo se eliminan*/
	
/*Eliminar Turnos*/
	DELETE FROM shifts WHERE idpa = 4;

	SET @count = 0;
		UPDATE shifts SET shifts.ids = @count:= @count + 1;		
		ALTER TABLE shifts AUTO_INCREMENT = 1;

/*Busqueda de Turnos VERRRRRR */

	SELECT sh.ids AS '', sh.reg AS Registro, CONCAT(pa.lname, ', ', pa.name) AS Paciente, sp.spec AS Especialidad,
		CONCAT(do.lname, ', ', do.name) AS Médicos, ce.name AS Centro, sh.fech AS Fecha, sh.hs AS Hora
		FROM shifts AS sh
		INNER JOIN patients AS pa ON sh.idpa = pa.idpa
		INNER JOIN spec AS sp ON sh.idspec = sp.idspec
		INNER JOIN doctors AS do ON sh.idoc = do.idoc
		INNER JOIN centers AS ce ON sh.idce = ce.idce;

	SELECT sh.ids AS '', sh.reg AS Registro, CONCAT(pa.lname, ', ', pa.name) AS Paciente, sp.spec AS Especialidad,
		CONCAT(do.lname, ', ', do.name) AS Médicos, ce.name AS Centro, sh.fech AS Fecha, sh.hs AS Hora
		FROM shifts AS sh
		INNER JOIN patients AS pa ON sh.idpa = pa.idpa
		INNER JOIN spec AS sp ON sh.idspec = sp.idspec
		INNER JOIN doctors AS do ON sh.idoc = do.idoc
		INNER JOIN centers AS ce ON sh.idce = ce.idce WHERE ce.name = 'San Cayetano';
	
	SELECT sh.ids AS '', sh.reg AS Registro, CONCAT(pa.lname, ', ', pa.name) AS Paciente, sp.spec AS Especialidad,
		CONCAT(do.lname, ', ', do.name) AS Médicos, ce.name AS Centro, sh.fech AS Fecha, sh.hs AS Hora
		FROM shifts AS sh
		INNER JOIN patients AS pa ON sh.idpa = pa.idpa
		INNER JOIN spec AS sp ON sh.idspec = sp.idspec
		INNER JOIN doctors AS do ON sh.idoc = do.idoc
		INNER JOIN centers AS ce ON sh.idce = ce.idce WHERE sp.spec = 'Clinica Medica';

	SELECT sh.ids AS '', sh.reg AS Registro, CONCAT(pa.lname, ', ', pa.name) AS Paciente, sp.spec AS Especialidad,
		CONCAT(do.lname, ', ', do.name) AS Médicos, ce.name AS Centro, sh.fech AS Fecha, sh.hs AS Hora
		FROM shifts AS sh
		INNER JOIN patients AS pa ON sh.idpa = pa.idpa
		INNER JOIN spec AS sp ON sh.idspec = sp.idspec
		INNER JOIN doctors AS do ON sh.idoc = do.idoc
		INNER JOIN centers AS ce ON sh.idce = ce.idce WHERE sh.fech = '2020-04-12';




/* Crear Estados de turnos*/
	INSERT INTO status (idst, status) VALUES 
		(0, 'En Proceso'),
		(0, 'Prueba');


/* Crear Historia Clinica */ 

	INSERT INTO medicalr (idmr, fech, idpa, idoc, age, cons, back, diag, trea) VALUES
		(0, '2020-04-17', 2, 4, '45', 'RH0+', 'Ninguno', 'Molestias en el oido medio', ' ', ' Se envia a relizar una radiografia orbital', ' '), 
		(0, '2020-04-17', 4, 3, '59', '+', 'Primer visita', 'primer visita', ' ', 'Sesiones cada 15 dias', ' ');

/*Actualizacion de Historia Clinica*/
	UPDATE  medicalr SET blood = 'A+', back = 'Hipocondriaco', diag = 'Tome 1 ibuprofeno por noche'  WHERE idmr = 2;

	UPDATE medicalr AS mr JOIN patients AS pa ON mr.idpa = pa.idpa SET back = 'Depresión' 
		WHERE pa.dni = '29143343';

	UPDATE medicalr AS mr JOIN patients AS pa ON mr.idpa = pa.idpa SET age = '28' 
		WHERE pa.lname = 'Tepacien';

/*Buscar Historia Clinica*/

	SELECT CONCAT(pa.lname, ', ', pa.name) AS Pacitente, mr.Fech AS Fecha, mr.age AS Edad, mr.blood AS Grupo, 
		mr.back AS Antecedentes, mr.cons AS Consulta, mr.diag AS Diagnostico, mr.obse AS Observación, mr.trea AS Tramiento,
		CONCAT(us.lname, ', ', us.name) AS Médicos, sp.spec AS Especialidad
		FROM medicalr AS mr
		INNER JOIN patients AS pa ON mr.idpa = pa.idpa
		INNER JOIN doctors AS do ON mr.idoc = do.idoc
		INNER JOIN users AS us ON do.idus = us.idus
		INNER JOIN spec AS sp ON do.idspec = sp.idspec;
		
	SELECT mr.idmr AS '', mr.Fech AS Fecha, CONCAT(pa.lname, ', ', pa.name) AS Pacitente, CONCAT(do.lname, ', ', do.name)	AS Médicos,
		sp.spec AS Especialidad, mr.age AS Edad, mr.blood AS Grupo, mr.back AS Antecedentes, mr.cons AS Consulta, 
		mr.diag AS Diagnostico, mr.obse AS Observación, mr.trea AS Tramiento
		FROM medicalr AS mr
		INNER JOIN patients AS pa ON mr.idpa = pa.idpa
		INNER JOIN spec AS sp ON mr.idspec = sp.idspec
		INNER JOIN doctors AS do ON mr.idoc = do.idoc
		WHERE CONCAT(pa.lname, ', ', pa.name) = 'Gonzales, Bonifacio';

	SELECT mr.idmr AS '', mr.Fech AS Fecha, CONCAT(pa.lname, ', ', pa.name) AS Pacitente, CONCAT(do.lname, ', ', do.name)	AS Médicos,
		sp.spec AS Especialidad, mr.age AS Edad, mr.blood AS Grupo, mr.back AS Antecedentes, mr.cons AS Consulta, 
		mr.diag AS Diagnostico, mr.obse AS Observación, mr.trea AS Tramiento
		FROM medicalr AS mr
		INNER JOIN patients AS pa ON mr.idpa = pa.idpa
		INNER JOIN spec AS sp ON mr.idspec = sp.idspec
		INNER JOIN doctors AS do ON mr.idoc = do.idoc
		WHERE CONCAT(do.lname, ', ', do.name) = 'Robles, Paula';

	SELECT mr.idmr AS '', mr.Fech AS Fecha, CONCAT(pa.lname, ', ', pa.name) AS Pacitente, CONCAT(do.lname, ', ', do.name)	AS Médicos,
		sp.spec AS Especialidad, mr.age AS Edad, mr.blood AS Grupo, mr.back AS Antecedentes, mr.cons AS Consulta, 
		mr.diag AS Diagnostico, mr.obse AS Observación, mr.trea AS Tramiento
		FROM medicalr AS mr
		INNER JOIN patients AS pa ON mr.idpa = pa.idpa
		INNER JOIN spec AS sp ON mr.idspec = sp.idspec
		INNER JOIN doctors AS do ON mr.idoc = do.idoc
		WHERE mr.fech = '2020-04-12';