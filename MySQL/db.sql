CREATE TABLE profesor_cuentas (
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(40) NOT NULL,
	email VARCHAR(30) UNIQUE,
	fecha DATE DEFAULT '1999-10-05' 
) ENGINE = INNODB; 

CREATE TABLE profesor_movimientos (
    idmov INT PRIMARY KEY AUTO_INCREMENT,
    idcuenta INT,
    fechamov DATETIME,
    tipo CHAR DEFAULT 'D',
    cantidad FLOAT DEFAULT 0,
FOREIGN KEY(idcuenta) REFERENCES cuentas(id)
)


-- DESCRIBE profesor_cuentas;

-- INSERT INTO profesor_cuentas (nombre, email) VALUES ('Juan Perez', 'juan@gmail.com');

-- SELECT * from profesor_cuentas

