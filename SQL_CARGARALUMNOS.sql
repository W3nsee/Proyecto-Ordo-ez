/*    id int PRIMARY KEY Auto_increment,
    contrasena varchar(16) NOT NULL,
    nombre varchar(24) NOT NULL,
    apellido_paterno varchar(24) NOT NULL,
    apellido_materno varchar(24) NOT NULL,
    fecha_nacimiento date NOT NULL,
    telefono int(14) NOT NULL,
    correo varchar(40) NOT NULL,
    sexo varchar(1) NOT NULL */

    USE DATABASE Escuela;

    USE Table Alumno;
    INSERT INTO Alumno (Contrasena,nombre,apellido_paterno,apellido_materno,fecha_nacimiento,telefono,correo,sexo) VALUES
    (alumno1,Jose Antonio,Casillas,Jimenez,31/12/2005,3121031779,jcasillas7@ucol.mx,M);
    INSERT INTO Alumno (Contrasena, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, telefono, correo, sexo) VALUES
        ('alumno1', 'Jose Antonio', 'Casillas', 'Jimenez', '2005-12-31', '3121031779', 'jcasillas7@ucol.mx', 'M'),
        ('alumno2', 'Maria', 'Gonzalez', 'Lopez', '2004-05-15', '3121234567', 'mgonzalez8@ucol.mx', 'F'),
        ('alumno3', 'Juan', 'Martinez', 'Garcia', '2003-09-20', '3129876543', 'jmartinez9@ucol.mx', 'M'),
        ('alumno4', 'Ana', 'Rodriguez', 'Sanchez', '2002-07-08', '3125554321', 'arodriguez10@ucol.mx', 'F'),
        ('alumno5', 'Carlos', 'Hernandez', 'Perez', '2001-03-25', '3129871234', 'chernandez11@ucol.mx', 'M'),
        ('alumno6', 'Luis', 'Lopez', 'Torres', '2000-11-12', '3125556789', 'llopez12@ucol.mx', 'M'),
        ('alumno7', 'Alejandra', 'Gomez', 'Diaz', '1999-08-30', '3127890123', 'agomez13@ucol.mx', 'F'),
        ('alumno8', 'Laura', 'Perez', 'Ramirez', '1998-04-17', '3125559999', 'lperez14@ucol.mx', 'F'),
        ('alumno9', 'Javier', 'Flores', 'Alvarez', '1997-01-03', '3121112222', 'jflores15@ucol.mx', 'M'),
        ('alumno10', 'Fernanda', 'Diaz', 'Castillo', '1996-10-20', '3123334444', 'fdiaz16@ucol.mx', 'F'),
        ('alumno11', 'Pedro', 'Sanchez', 'Ruiz', '1995-06-06', '3125557777', 'psanchez17@ucol.mx', 'M'),
        ('alumno12', 'Gabriela', 'Torres', 'Sosa', '1994-02-21', '3128889999', 'gtorres18@ucol.mx', 'F'),
        ('alumno13', 'Miguel', 'Ruiz', 'Hernandez', '1993-12-09', '3127778888', 'mruiz19@ucol.mx', 'M'),
        ('alumno14', 'Marisol', 'Alvarez', 'Gutierrez', '1992-09-25', '3124445555', 'malvarez20@ucol.mx', 'F'),
        ('alumno15', 'Ricardo', 'Luna', 'Navarro', '1991-05-12', '3129990000', 'rluna21@ucol.mx', 'M'),
        ('alumno16', 'Paulina', 'Gutierrez', 'Jimenez', '1990-01-28', '3126667777', 'pgutierrez22@ucol.mx', 'F'),
        ('alumno17', 'Francisco', 'Navarro', 'Lopez', '1989-11-14', '3122223333', 'fnavarro23@ucol.mx', 'M'),
        ('alumno18', 'Carmen', 'Jimenez', 'Santos', '1988-07-01', '3127776666', 'cjimenez24@ucol.mx', 'F'),
        ('alumno19', 'Roberto', 'Lopez', 'Gomez', '1987-03-18', '3123332222', 'rlopez25@ucol.mx', 'M'),
        ('alumno20', 'Sofia', 'Garcia', 'Martinez', '1986-10-04', '3128887777', 'sgarcia26@ucol.mx', 'F'),
        ('alumno21', 'Diego', 'Martinez', 'Hernandez', '1985-06-21', '3124443333', 'dmartinez27@ucol.mx', 'M'),
        ('alumno22', 'Isabel', 'Hernandez', 'Gonzalez', '1984-02-06', '3129998888', 'ihernandez28@ucol.mx', 'F'),
        ('alumno23', 'Manuel', 'Gonzalez', 'Perez', '1983-12-24', '3125554444', 'mgonzalez29@ucol.mx', 'M'),
        ('alumno24', 'Natalia', 'Perez', 'Torres', '1982-09-10', '3121110000', 'nperez30@ucol.mx', 'F'),
        ('alumno25', 'Hector', 'Torres', 'Lopez', '1981-05-27', '3126665555', 'htorres31@ucol.mx', 'M'),
        ('alumno26', 'Adriana', 'Lopez', 'Garcia', '1980-01-13', '3122221111', 'alopez32@ucol.mx', 'F'),
        ('alumno27', 'Oscar', 'Garcia', 'Sanchez', '1979-10-30', '3127774444', 'ogarcia33@ucol.mx', 'M'),
        ('alumno28', 'Valeria', 'Sanchez', 'Martinez', '1978-06-16', '3123339999', 'vsanchez34@ucol.mx', 'F'),
        ('alumno29', 'Emilio', 'Martinez', 'Gomez', '1977-02-02', '3128882222', 'emartinez35@ucol.mx', 'M'),
        ('alumno30', 'Daniela', 'Gomez', 'Hernandez', '1976-11-19', '3124447777', 'dgomez36@ucol.mx', 'F'),
        ('alumno31', 'Raul', 'Hernandez', 'Lopez', '1975-08-05', '3129993333', 'rhernandez37@ucol.mx', 'M'),
        ('alumno32', 'Patricia', 'Lopez', 'Perez', '1974-04-22', '3125558888', 'plopez38@ucol.mx', 'F'),
        ('alumno33', 'Luisa', 'Perez', 'Gonzalez', '1973-12-09', '3121114444', 'lperez39@ucol.mx', 'F'),
        ('alumno34', 'Alejandro', 'Gonzalez', 'Rodriguez', '1972-09-25', '3126669999', 'agonzalez40@ucol.mx', 'M'),
        ('alumno35', 'Camila', 'Rodriguez', 'Torres', '1971-05-12', '3122225555', 'crodriguez41@ucol.mx', 'F'),
        ('alumno36', 'Jorge', 'Torres', 'Garcia', '1970-01-28', '3127770000', 'jtorres42@ucol.mx', 'M'),
        ('alumno37', 'Alicia', 'Garcia', 'Hernandez', '1969-10-14', '3123336666', 'agarcia43@ucol.mx', 'F'),
        ('alumno38', 'Ramon', 'Hernandez', 'Lopez', '1968-06-30', '3128881111', 'rhernandez44@ucol.mx', 'M'),
        ('alumno39', 'Catalina', 'Lopez', 'Perez', '1967-02-15', '3124448888', 'clopez45@ucol.mx', 'F'),
        ('alumno40', 'Pablo', 'Perez', 'Gonzalez', '1966-11-02', '3129994444', 'pperez46@ucol.mx', 'M'),
        ('alumno41', 'Elena', 'Gonzalez', 'Rodriguez', '1965-07-19', '3125551111', 'egonzalez47@ucol.mx', 'F'),
        ('alumno42', 'Andres', 'Rodriguez', 'Torres', '1964-04-05', '3121116666', 'arodriguez48@ucol.mx', 'M'),
        ('alumno43', 'Beatriz', 'Torres', 'Garcia', '1963-12-22', '3126662222', 'btorres49@ucol.mx', 'F'),
        ('alumno44', 'Santiago', 'Garcia', 'Hernandez', '1962-09-08', '3122227777', 'sgarcia50@ucol.mx', 'M'),
        ('alumno45', 'Lucia', 'Hernandez', 'Lopez', '1961-05-25', '3127773333', 'lhernandez51@ucol.mx', 'F'),
        ('alumno46', 'Eduardo', 'Lopez', 'Perez', '1960-02-10', '3123338888', 'elopez52@ucol.mx', 'M'),
        ('alumno47', 'Ximena', 'Perez', 'Gonzalez', '1959-10-27', '3128885555', 'xperez53@ucol.mx', 'F'),
        ('alumno48', 'Guillermo', 'Gonzalez', 'Rodriguez', '1958-06-13', '3124442222', 'ggonzalez54@ucol.mx', 'M'),
        ('alumno49', 'Ines', 'Rodriguez', 'Torres', '1957-02-28', '3129997777', 'irodriguez55@ucol.mx', 'F'),
        ('alumno50', 'Omar', 'Torres', 'Garcia', '1956-11-15', '3125554444', 'otorres56@ucol.mx', 'M');