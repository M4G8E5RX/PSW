CREATE DATABASE nomina;

use nomina;

CREATE TABLE empleados(
  numEmpleado INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(40),
  edad INT,
  sueldo DECIMAL
);
