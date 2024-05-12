CREATE DATABASE Registro;

USE Registro;

CREATE TABLE alumno
(
    id int PRIMARY KEY Auto_increment,
    contrasena varchar(16) NOT NULL,
    nombre varchar(24) NOT NULL,
    apellido_paterno varchar(24) NOT NULL,
    apellido_materno varchar(24) NOT NULL,
    fecha_nacimiento date NOT NULL,
    telefono int(14) NOT NULL,
    correo varchar(40) NOT NULL,
    sexo varchar(1) NOT NULL
);

INSERT INTO maestro VALUES ('','12345','Jorge','Guzman','Guzman','1994-10-01','1234567890','y5Yn9@example.com','M');
INSERT INTO maestro VALUES ('','12345','Juan','Díaz','Díaz','1970-01-01','55555555','jj123@example.com','M');
INSERT INTO maestro VALUES ('','12345','María','López','López','1980-05-05','55555556','ml456@example.com','F');
INSERT INTO maestro VALUES ('','12345','Carlos','Rodríguez','Rodríguez','1965-12-25','55555557','cr789@example.com','M');
INSERT INTO maestro VALUES ('','12345','Ana','García','García','1991-03-12','55555558','ag321@example.com','F');
INSERT INTO maestro VALUES ('','12345','Pedro','Sánchez','Sánchez','1975-07-07','55555559','pss90@example.com','M');
INSERT INTO maestro VALUES ('','12345','Luisa','Martínez','Martínez','1987-11-01','55555560','lum89@example.com','F');
INSERT INTO maestro VALUES ('','12345','José','González','González','1978-02-15','55555561','jg678@example.com','M');
INSERT INTO maestro VALUES ('','12345','Ana','González','González','1992-09-10','55555562','ang98@example.com','F');
INSERT INTO maestro VALUES ('','12345','Juan','Hernández','Hernández','1972-04-04','55555563','jh567@example.com','M');
INSERT INTO maestro VALUES ('','12345','María','García','García','1984-02-20','55555564','mg345@example.com','F');
INSERT INTO maestro VALUES ('','12345','José','Rodríguez','Rodríguez','1971-08-30','55555565','jr678@example.com','M');
INSERT INTO maestro VALUES ('','12345','Ana','Martínez','Martínez','1993-06-25','55555566','am567@example.com','F');
INSERT INTO maestro VALUES ('','12345','María','Hernández','Hernández','1981-01-15','55555567','mh456@example.com','F');
INSERT INTO maestro VALUES ('','12345','José','García','García','1979-09-12','55555568','jg987@example.com','M');
INSERT INTO maestro VALUES ('','12345','Ana','Sánchez','Sánchez','1994-07-10','55555569','as890@example.com','F');
INSERT INTO maestro VALUES ('','12345','Juan','González','González','1974-03-20','55555570','jg345@example.com','M');

INSERT INTO alumno VALUES ('','12345','Jorge','Guzman','Guzman','1994-10-01','1234567890','y5Yn9@example.com','M');
INSERT INTO alumno VALUES ('','12345','Aurora','Pérez','Pérez','1995-02-13','0987654321','ap132@example.com','F');
INSERT INTO alumno VALUES ('','12345','Juan','Huerta','Huerta','1994-08-20','0987654323','jh208@example.com','M');
INSERT INTO alumno VALUES ('','12345','Ana','Gómez','Gómez','1996-04-16','0987654325','ag164@example.com','F');
INSERT INTO alumno VALUES ('','12345','Pedro','Flores','Flores','1997-01-05','0987654327','pf051@example.com','M');
INSERT INTO alumno VALUES ('','12345','María','Rodríguez','Rodríguez','1998-09-22','0987654329','mr229@example.com','F');
INSERT INTO alumno VALUES ('','12345','Lucas','Sánchez','Sánchez','1999-05-30','0987654331','ls305@example.com','M');
INSERT INTO alumno VALUES ('','12345','Adriana','Ruiz','Ruiz','2000-04-08','0987654333','ar084@example.com','F');
INSERT INTO alumno VALUES ('','12345','José','Gómez','Gómez','2001-09-14','0987654335','jg149@example.com','M');
INSERT INTO alumno VALUES ('','12345','Sandra','López','López','2002-01-10','0987654337','sl101@example.com','F');
INSERT INTO alumno VALUES ('','12345','Guillermo','Pérez','Pérez','2003-03-25','0987654339','gp253@example.com','M');

