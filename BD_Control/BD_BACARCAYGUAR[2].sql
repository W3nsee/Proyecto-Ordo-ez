DROP DATABASE IF EXISTS escuela;
CREATE DATABASE Escuela;

USE Escuela;

CREATE TABLE administrador ( --TERMINADO--
    id int PRIMARY KEY Auto_increment,
    contrasena varchar 16 NOT NULL,
    nombre varchar 24 NOT NULL,
    apellido_paterno varchar 24 NOT NULL,
    apellido_materno varchar 24 NOT NULL,
    fecha_nacimiento date NOT NULL,
    telefono int 14 NOT NULL,
    correo varchar 40 NOT NULL
);
CREATE TABLE calificaciones ( --TERMINADO--
    parcial_1 float 3 NOT NULL,
    parcial_2 float 3 NOT NULL,
    parcial_3 float 3 NOT NULL,
    FOREIGN KEY matricula_alumno REFERENCES alumno(id),
    FOREIGN KEY matricula_asignatura REFERENCES asignatura (id)

);
CREATE TABLE alumno ( --TERMINADO--
    id int PRIMARY KEY Auto_increment,
    contrasena varchar 16 NOT NULL,
    nombre varchar 24 NOT NULL,
    apellido_paterno varchar 24 NOT NULL,
    apellido_materno varchar 24 NOT NULL,
    fecha_nacimiento date NOT NULL,
    telefono int 14 NOT NULL,
    correo varchar 40 NOT NULL,
    FOREIGN KEY matricula_salon REFERENCES salon (id),
    FOREIGN KEY faltas REFERENCES faltas (faltas)

);
CREATE TABLE salon ( --TERMINADO--
    id int PRIMARY KEY Auto_increment,
    grado varchar 1 NOT NULL,
    grupo varchar 1 NOT NULL,
    FOREIGN KEY matricula_alumno REFERENCES  alumno (id)
);
CREATE TABLE profesor ( --TERMINADO--
    id int PRIMARY KEY Auto_increment,
    contrasena varchar 16 NOT NULL,
    nombre varchar 24 NOT NULL,
    apellido_paterno varchar 24 NOT NULL,
    apellido_materno varchar 24 NOT NULL,
    fecha_nacimiento date NOT NULL,
    telefono int 14 NOT NULL,
    correo varchar 40 NOT NULL,
    FOREIGN KEY matricula_asignatura REFERENCES asignatura (id)
);
CREATE TABLE justificante (
    id int PRIMARY KEY Auto_increment,
    FOREIGN KEY matricula_alumno REFERENCES alumno (id),
    motivo varchar 40 NOT NULL,
    prueba -- Terminar--
    estado varchar 15 NOT NULL,
    FOREIGN KEY matricula_admin REFERENCES administrador (id)
);
CREATE TABLE asignatura ( --TERMINADO--
    id int PRIMARY KEY Auto_increment,
    nombre varchar 40 NOT NULL,
    horas numeric 2 NOT NULL,
    maestro varchar 40 NOT NULL,
    grado varchar 1 NOT NULL,
    FOREIGN KEY matricula_profesor REFERENCES profesor (id),
    FOREIGN KEY matricula_horario REFERENCES horario (id),
    FOREIGN KEY matricula_alumno REFERENCES alumno (id),
);
CREATE TABLE faltas ( --TERMINADO--
    faltas varchar 10 PRIMARY KEY NOT NULL,
    fecha_falta date NOT NULL,
    FOREIGN KEY matricula_alumno REFERENCES alumno (id),
    FOREIGN KEY matricula_asignatura REFERENCES asignatura (id),
    FOREIGN KEY matricula_justificante REFERENCES justificante (id)
);
CREATE TABLE horario (
    id int PRIMARY KEY Auto_increment,
    horas --Terminar--
    FOREIGN KEY matricula_asignatura REFERENCES asignatura (id),
    FOREIGN KEY matricula_salon REFERENCES salon (id)
);

CREATE DATABASE Escuela;

USE Escuela;

CREATE TABLE administrador ( 
    id int PRIMARY KEY Auto_increment,
    contrasena varchar (16) NOT NULL,
    nombre varchar (24) NOT NULL,
    apellido_paterno varchar (24) NOT NULL,
    apellido_materno varchar (24) NOT NULL,
    fecha_nacimiento date NOT NULL,
    telefono int (14) NOT NULL,
    correo varchar (40) NOT NULL
);
CREATE TABLE calificaciones (
    parcial_1 float (3) NOT NULL,
    parcial_2 float (3) NOT NULL,
    parcial_3 float (3) NOT NULL,
    matricula_alumno int,
   matricula_asignatura int

);
CREATE TABLE alumno ( 
    id int PRIMARY KEY Auto_increment,
    contrasena varchar (16) NOT NULL,
    nombre varchar (24) NOT NULL,
    apellido_paterno varchar (24) NOT NULL,
    apellido_materno varchar (24) NOT NULL,
    fecha_nacimiento date NOT NULL,
    telefono int (14) NOT NULL,
    correo varchar (40) NOT NULL,
                     matricula_salon int,

                     faltas int
  

);
CREATE TABLE salon ( 
    id int PRIMARY KEY Auto_increment,
    grado varchar (1) NOT NULL,
    grupo varchar (1) NOT NULL,
                    matricula_alumno int
);
CREATE TABLE profesor ( 
    id int PRIMARY KEY Auto_increment,
    contrasena varchar (16) NOT NULL,
    nombre varchar (24) NOT NULL,
    apellido_paterno varchar (24) NOT NULL,
    apellido_materno varchar (24) NOT NULL,
    fecha_nacimiento date NOT NULL,
    telefono int (14) NOT NULL,
    correo varchar (40) NOT NULL,
                       matricula_asignatura int
);
CREATE TABLE justificante (
    id int PRIMARY KEY Auto_increment,
    matricula_alumno int,
    motivo varchar (40) NOT NULL,
    estado varchar (15) NOT NULL,
    matricula_admin int
   
);
CREATE TABLE asignatura (
    id int PRIMARY KEY Auto_increment,
    nombre varchar (40) NOT NULL,
    horas numeric (2) NOT NULL,
    maestro varchar (40) NOT NULL,
    grado varchar (1) NOT NULL,
    matricula_profesor int,
                         matricula_horario int,
                         matricula_alumno int
    
);
CREATE TABLE faltas (
    faltas varchar (10) PRIMARY KEY NOT NULL,
    fecha_falta date NOT NULL,
    matricula_alumno int,
    matricula_asignatura int,
    matricula_justificante int
);
CREATE TABLE horario (
    id int PRIMARY KEY Auto_increment,
   matricula_asignatura int,
    matricula_salon int
    
);