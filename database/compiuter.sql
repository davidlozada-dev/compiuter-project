DROP DATABASE IF EXISTS compiuter;
CREATE DATABASE IF NOT EXISTS compiuter;

USE compiuter;

CREATE TABLE IF NOT EXISTS empleados(
cod_emp INT PRIMARY KEY AUTO_INCREMENT,
nom_emp VARCHAR(50) NOT NULL,
ape_emp VARCHAR(50) NOT NULL,
ced_emp VARCHAR(8) UNIQUE NOT NULL,
cor_emp VARCHAR(355) UNIQUE NOT NULL,
cla_emp VARCHAR(355) NULL,
dir_emp VARCHAR(50) NOT NULL,
tel_emp VARCHAR(14) NOT NULL,
car_emp VARCHAR(20) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO empleados (nom_emp, ape_emp, ced_emp, cor_emp, cla_emp, dir_emp, tel_emp, car_emp) VALUES ('Naomi', 'Guerrero', '29649292', 'guerreronaomi83@gmail.com', 'f48b363db986208aa09fc95bdeb565426368224d', 'La concordia', '04124202563', 'Administrador');

CREATE TABLE IF NOT EXISTS clientes(
cod_cli INT PRIMARY KEY AUTO_INCREMENT,
nom_cli VARCHAR(50) NOT NULL,
ape_cli VARCHAR(50) NOT NULL,
ced_cli VARCHAR(8) UNIQUE NOT NULL,
dir_cli VARCHAR(50) NOT NULL,
tel_cli VARCHAR(14) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- INSERT INTO clientes (nom_cli, ape_cli, ced_cli, dir_cli, tel_cli) VALUES ('Javier', 'Orejarena', '29580182', 'La concordia', '04147035000');
-- INSERT INTO clientes (nom_cli, ape_cli, ced_cli, dir_cli, tel_cli) VALUES ('Naomi', 'Guerrero', '12345678', 'La rotaria', '04147035458');


CREATE TABLE IF NOT EXISTS categorias(
cod_cat INT PRIMARY KEY AUTO_INCREMENT,
nom_cat VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO categorias (nom_cat) VALUES('PC');
INSERT INTO categorias (nom_cat) VALUES('Tablet');
INSERT INTO categorias (nom_cat) VALUES('Laptop');
INSERT INTO categorias (nom_cat) VALUES('Android');
INSERT INTO categorias (nom_cat) VALUES('IPhone');

CREATE TABLE IF NOT EXISTS equipos(
cod_equ INT PRIMARY KEY AUTO_INCREMENT,
ser_equ VARCHAR(20) NOT NULL,
des_equ VARCHAR(100) NOT NULL,
mar_equ VARCHAR(30) NOT NULL,
fky_categorias INT NOT NULL,
fky_clientes INT NOT NULL,
INDEX (fky_categorias),
INDEX (fky_clientes),
FOREIGN KEY (fky_categorias) REFERENCES categorias(cod_cat),
FOREIGN KEY (fky_clientes) REFERENCES clientes(cod_cli)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- INSERT INTO equipos (ser_equ, des_equ, mar_equ, fky_categorias, fky_clientes) VALUES ('ASASD', 'Nueva', 'Lenovo', '1', '1');
-- INSERT INTO equipos (ser_equ, des_equ, mar_equ, fky_categorias, fky_clientes) VALUES ('A123SASD', 'Nueva', 'Lenovo', '2', '1');

CREATE TABLE IF NOT EXISTS diagnosticos(
cod_dia INT PRIMARY KEY AUTO_INCREMENT,
fal_cli_dia VARCHAR(100) NOT NULL,
fal_ini_dia VARCHAR(100) NOT NULL,
sol_dia VARCHAR(100) NULL,
fky_equipos INT NOT NULL,
fky_clientes INT NOT NULL,
fky_empleados INT NOT NULL,
fec_ent_dia DATE NOT NULL,
fec_sal_dia DATE NOT NULL,
est_dia enum('A','R') NOT NULL,
INDEX (fky_equipos),
INDEX (fky_clientes),
INDEX (fky_empleados),
FOREIGN KEY (fky_equipos) REFERENCES equipos(cod_equ),
FOREIGN KEY (fky_clientes) REFERENCES clientes(cod_cli),
FOREIGN KEY (fky_empleados) REFERENCES empleados(cod_emp)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- INSERT INTO diagnosticos (fal_cli_dia, fal_ini_dia, fec_ent_dia, fec_sal_dia, fky_clientes, fky_equipos, est_dia, fky_empleados) VALUES ('No prende (Negra)', 'Ram', '2021-10-10', '2021-10-20', '1', '1', 'A', '1');

CREATE TABLE IF NOT EXISTS facturas(
cod_fac INT PRIMARY KEY AUTO_INCREMENT,
fec_fac DATE NOT NULL,
mon_fac FLOAT(20) NOT NULL,
div_fac VARCHAR(20) NOT NULL,
des_fac VARCHAR(50) NOT NULL,
fky_diagnosticos INT NOT NULL,
fky_empleados INT NOT NULL,
INDEX (fky_diagnosticos),
INDEX (fky_empleados),
FOREIGN KEY (fky_diagnosticos) REFERENCES diagnosticos(cod_dia),
FOREIGN KEY (fky_empleados) REFERENCES empleados(cod_emp)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;