CREATE TABLE Condicion (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  R_laboratorio_id INTEGER NOT NULL,
  Condicion VARCHAR(50) NULL,
  Tipo VARCHAR(30) NULL,
  Fecha_inicio VARCHAR(30) NULL,
  Observaciones VARCHAR(100) NULL,
  PRIMARY KEY(id),
  INDEX Condicion_FKIndex2(R_laboratorio_id)
);

CREATE TABLE Controles (
  id INTEGER NOT NULL AUTO_INCREMENT,
  usuarios_id INTEGER NOT NULL,
  Nombre_profecional VARCHAR(50) NULL,
  Especialidad VARCHAR(50) NULL,
  Fecha DATE NULL,
  Observaciones VARCHAR(100) NULL,
  PRIMARY KEY(id),
  INDEX Controles_FKIndex1(usuarios_id)
);

CREATE TABLE Indicadores_Salud (
  id INTEGER NOT NULL AUTO_INCREMENT,
  usuarios_id INTEGER NOT NULL,
  Fecha INTEGER NULL,
  Frecuencia_cardiaca INTEGER NULL,
  Tencion_arterial INTEGER NULL,
  Saturacion_oxigeno INTEGER NULL,
  Vacunas VARCHAR(50) NULL,
  Entrenamiento INTEGER NULL,
  Distancia_recorridas INTEGER NULL,
  PRIMARY KEY(id),
  INDEX Indicadores_Salud_FKIndex1(usuarios_id)
);

CREATE TABLE R_laboratorio (
  id INTEGER NOT NULL AUTO_INCREMENT,
  usuarios_id INTEGER NOT NULL,
  Descriccion VARCHAR(500) NULL,
  Imagen VARCHAR(50) NULL,
  PRIMARY KEY(id),
  INDEX R_laboratorio_FKIndex1(usuarios_id)
);

CREATE TABLE usuarios (
  id INTEGER NOT NULL AUTO_INCREMENT,
  Nombre_completo VARCHAR(50) NULL,
  Edad INTEGER NULL,
  Correo_electronico VARCHAR(50) NULL,
  PRIMARY KEY(id)
);


