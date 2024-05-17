DROP DATABASE IF EXISTS escuela;

CREATE DATABASE escuela;

USE escuela;

CREATE TABLE Profesor (
  Id_Profesor INT AUTO_INCREMENT PRIMARY KEY,
  Matricula_Profesor VARCHAR(255) NOT NULL UNIQUE,
  Contraseña VARCHAR(255) NOT NULL,
  Nombre VARCHAR(255) NOT NULL,
  Apellido_Paterno VARCHAR(255) NOT NULL,
  Apellido_Materno VARCHAR(255) NOT NULL,
  Fecha_Nacimiento DATE NOT NULL,
  Telefono VARCHAR(255) NOT NULL,
  Correo VARCHAR(255) NOT NULL
);

INSERT INTO Profesor (Matricula_Profesor, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('123456789', '123456789', 'Jorge', 'Guzman', 'Martinez', '2000-01-01', '123456789', 'gqOQh@example.com');

INSERT INTO Profesor (Matricula_Profesor, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('987654321', '987654321', 'Juan', 'Martinez', 'Herrera', '2000-01-01', '123456789', 'gqOQh@example.com');


INSERT INTO Profesor (Matricula_Profesor, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('555555555', '555555555', 'Pedro', 'Pérez', 'Sánchez', '1990-01-01', '555555555', 'perez@example.com');

INSERT INTO Profesor (Matricula_Profesor, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('666666666', '666666666', 'Maria', 'Jiménez', 'Rodríguez', '1990-01-01', '666666666', 'maria@example.com');

INSERT INTO Profesor (Matricula_Profesor, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('444444444', '444444444', 'Luis', 'López', 'Martínez', '1980-01-01', '444444444', 'luis@example.com');

INSERT INTO Profesor (Matricula_Profesor, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('333333333', '333333333', 'Carlos', 'Rodríguez', 'Torres', '1985-01-01', '333333333', 'carlos@example.com');

INSERT INTO Profesor (Matricula_Profesor, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('222222222', '222222222', 'Ana', 'Sánchez', 'García', '1995-01-01', '222222222', 'ana@example.com');




CREATE TABLE Administrador (
  Id_Administrador INT AUTO_INCREMENT PRIMARY KEY,
  Matricula_Admin VARCHAR(255) NOT NULL UNIQUE,
  Contraseña VARCHAR(255) NOT NULL,
  Nombre VARCHAR(255) NOT NULL,
  Apellido_Paterno VARCHAR(255) NOT NULL,
  Apellido_Materno VARCHAR(255) NOT NULL,
  Fecha_Nacimiento DATE NOT NULL,
  Telefono VARCHAR(255) NOT NULL,
  Correo VARCHAR(255) NOT NULL
);

CREATE TABLE Alumno (
  Id_Alumno INT AUTO_INCREMENT PRIMARY KEY,
  Matricula_Alumno VARCHAR(255) NOT NULL UNIQUE,
  Contraseña VARCHAR(255) NOT NULL,
  Nombre VARCHAR(255) NOT NULL,
  Apellido_Paterno VARCHAR(255) NOT NULL,
  Apellido_Materno VARCHAR(255) NOT NULL,
  Fecha_Nacimiento DATE NOT NULL,
  Telefono VARCHAR(255) NOT NULL,
  Correo VARCHAR(255) NOT NULL
);

INSERT INTO Alumno (Matricula_Alumno, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('999999999', '999999999', 'Javier', 'Gonzalez', 'Torres', '2000-01-01', '123456789', 'gqOQh@example.com');

INSERT INTO Alumno (Matricula_Alumno, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('111111111', '111111111', 'Pedro', 'Perez', 'Herrera', '2000-01-01', '123456789', 'gqOQh@example.com');

INSERT INTO Alumno (Matricula_Alumno, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('222222222', '222222222', 'Maria', 'Jimenez', 'Rodriguez', '2000-01-01', '123456789', 'gqOQh@example.com');

INSERT INTO Alumno (Matricula_Alumno, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('333333333', '333333333', 'Luis', 'Lopez', 'Martinez', '2000-01-01', '123456789', 'gqOQh@example.com');

INSERT INTO Alumno (Matricula_Alumno, Contraseña, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Telefono, Correo) VALUES
('444444444', '444444444', 'Carlos', 'Rodriguez', 'Torres', '2000-01-01', '123456789', 'gqOQh@example.com');




CREATE TABLE Asignatura (
  Id_Asignatura INT AUTO_INCREMENT PRIMARY KEY,
  Nombre VARCHAR(255) NOT NULL
);

CREATE TABLE Salon (
  Id_Salon INT AUTO_INCREMENT PRIMARY KEY,
  Nombre VARCHAR(255) NOT NULL
);

CREATE TABLE Horario (
  Id_Horario INT AUTO_INCREMENT PRIMARY KEY,
  Matricula_Alumno VARCHAR(255) NOT NULL,
  Matricula_Maestro VARCHAR(255) NOT NULL,
  Matricula_Asignatura INT NOT NULL,
  Id_Salon INT NOT NULL,
  Dia VARCHAR(255) NOT NULL,
  Hora_Inicio TIME NOT NULL,
  Hora_Fin TIME NOT NULL,
  FOREIGN KEY (Matricula_Alumno) REFERENCES Alumno(Matricula_Alumno),
  FOREIGN KEY (Matricula_Maestro) REFERENCES Profesor(Matricula_Profesor),
  FOREIGN KEY (Matricula_Asignatura) REFERENCES Asignatura(Id_Asignatura),
  FOREIGN KEY (Id_Salon) REFERENCES Salon(Id_Salon)
);

CREATE TABLE Calificaciones (
  Id_Calificacion INT AUTO_INCREMENT PRIMARY KEY,
  Matricula_Alumno VARCHAR(255) NOT NULL,
  Matricula_Asignatura INT NOT NULL,
  Parcial_1 DECIMAL(10,2) NOT NULL,
  Parcial_2 DECIMAL(10,2) NOT NULL,
  Parcial_3 DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (Matricula_Alumno) REFERENCES Alumno(Matricula_Alumno),
  FOREIGN KEY (Matricula_Asignatura) REFERENCES Asignatura(Id_Asignatura)
);

CREATE TABLE Justificante (
  Id_Justificante INT AUTO_INCREMENT PRIMARY KEY,
  Matricula_Alumno VARCHAR(255) NOT NULL,
  Matricula_Asignatura INT NOT NULL,
  Fecha DATE NOT NULL,
  Motivo VARCHAR(255) NOT NULL,
  FOREIGN KEY (Matricula_Alumno) REFERENCES Alumno(Matricula_Alumno),
  FOREIGN KEY (Matricula_Asignatura) REFERENCES Asignatura(Id_Asignatura)
);

CREATE TABLE Alumno_Padre (
  Id_Alumno_Padre INT AUTO_INCREMENT PRIMARY KEY,
  Matricula_Alumno VARCHAR(255) NOT NULL,
  Matricula_Padre VARCHAR(255) NOT NULL,
  FOREIGN KEY (Matricula_Alumno) REFERENCES Alumno(Matricula_Alumno)
);
