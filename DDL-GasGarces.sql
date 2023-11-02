CREATE DATABASE gasgarces;


CREATE TABLE Estatus(Id_Estatus INT(1) PRIMARY KEY AUTO_INCREMENT,
		Tipo VARCHAR(20) NOT NULL);

CREATE TABLE Pipa(Matricula VARCHAR(20) PRIMARY KEY,
		Id_Estatus INT(1),
		CapacidadMax INT(5) NOT NULL,
		CapacidadMin INT(3) NOT NULL,
		GasDisponible INT(5) NOT NULL,
		FOREIGN KEY (Id_Estatus) REFERENCES Estatus(Id_Estatus)
		);
		
CREATE TABLE Municipio(Id_Municipio INT(5) PRIMARY KEY AUTO_INCREMENT,
		Nombre VARCHAR(30) NOT NULL);
		
CREATE TABLE CodigoPost(Id_Codigo INT(5) PRIMARY KEY AUTO_INCREMENT, 
		Codigo INT(5), 
		Id_Municipio INT(5), FOREIGN KEY (ID_Municipio) REFERENCES Municipio(Id_Municipio));

CREATE TABLE Colonia(Id_Colonia INT(5) PRIMARY KEY AUTO_INCREMENT,
		Nombre VARCHAR(50),
		ID_Codigo INT(5), FOREIGN KEY (Id_Codigo) REFERENCES CodigoPost(Id_Codigo));
		
CREATE TABLE Direccion(Id_Direccion INT(5) PRIMARY KEY AUTO_INCREMENT,
		Nombre VARCHAR(20) NOT NULL,
		Calle VARCHAR(50) NOT NULL,
		Colonia INT(5), FOREIGN KEY (Colonia) REFERENCES Colonia(Id_Colonia),
		Referencia VARCHAR(30) NOT NULL,
		Latitud VARCHAR(30),
		Longitud VARCHAR(30));
		
CREATE TABLE DatosPersonales(Id_Datos INT(5) PRIMARY KEY AUTO_INCREMENT,
		Nombre VARCHAR(20) NOT NULL,
		ApellidoP VARCHAR(20) NOT NULL,
		Usuario VARCHAR(20) NOT NULL,
		Contrasenia VARCHAR(20) NOT NULL,
		Telefono VARCHAR(10) NOT NULL,
		Edad INT(2) NOT NULL,
		Curp VARCHAR(18) NOT NULL);
		
CREATE TABLE Usuario(Id_Usuario INT(5) PRIMARY KEY AUTO_INCREMENT,
		Id_Datos INT(5), FOREIGN KEY (ID_Datos) REFERENCES DatosPersonales(Id_Datos));
		
		
CREATE TABLE Usuario_Direccion(Id_Usuario INT(5), FOREIGN KEY (ID_Usuario) REFERENCES Usuario(Id_Usuario),
			Id_Direccion INT(5), FOREIGN KEY (ID_Direccion) REFERENCES Direccion(Id_Direccion),
			PRIMARY KEY(Id_Usuario, Id_Direccion));
			
			
CREATE TABLE Empleado(Id_Empleado INT(5) PRIMARY KEY AUTO_INCREMENT,
			Id_Estatus INT(5), FOREIGN KEY (ID_Estatus) REFERENCES Estatus(Id_Estatus),
			Id_Datos INT(5), FOREIGN KEY (Id_Datos) REFERENCES DatosPersonales(Id_Datos),
			Id_Direccion INT(5), FOREIGN KEY (ID_Direccion) REFERENCES Direccion(Id_Direccion),
			Id_Pipa VARCHAR(20), FOREIGN KEY (Id_Pipa) REFERENCES Pipa(Matricula),
			RFC VARCHAR(18) NOT NULL,
			HorarioInicio TIME NOT NULL,
			HorarioFin TIME NOT NULL);
			
CREATE TABLE Administrador(Id_Empleado INT(5) PRIMARY KEY AUTO_INCREMENT, FOREIGN KEY (Id_Empleado) REFERENCES Empleado(Id_Empleado)
			);
			

CREATE TABLE Pedido(Id_Pedido INT(5) PRIMARY KEY AUTO_INCREMENT,
			Id_Usuario INT(5),
			Id_Direccion INT(5), FOREIGN KEY (Id_Usuario,Id_Direccion) REFERENCES Usuario_Direccion(Id_Usuario,Id_Direccion),
			Id_Empleado INT(5), FOREIGN KEY (Id_Empleado) REFERENCES Empleado(Id_Empleado),
			Id_Estatus INT(1), FOREIGN KEY (ID_Estatus) REFERENCES Estatus(Id_Estatus),
			HorarioInicio TIME NOT NULL,
			HorarioFin TIME NOT NULL,
			FechaP DATE NOT NULL,
			CantidadL INT(10)
			);
			
CREATE TABLE Historial(Id_Pedido INT(5) PRIMARY KEY AUTO_INCREMENT, FOREIGN KEY (Id_Pedido) REFERENCES Pedido(Id_Pedido),
			FechaE DATE NOT NULL,
			CantidadPesos INT(10)
			);
			
			
CREATE TABLE Incidencia(Id_Incidencia INT(5) PRIMARY KEY AUTO_INCREMENT,
			Id_TipoInc INT (1), FOREIGN KEY (Id_TipoInc) REFERENCES Estatus(Id_Estatus),
			Id_Empleado INT (5), FOREIGN KEY (Id_Empleado) REFERENCES Empleado(Id_Empleado),
			Motivo Varchar(100)
			);