CREATE TABLE categorias (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE humores (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE sonhos (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    data_sonho DATE NOT NULL,
    intensidade INT,
    descricao TEXT,
    interpretacao TEXT,
    categoria_id INT,
    humor_id INT,

    PRIMARY KEY (id),

    FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    FOREIGN KEY (humor_id) REFERENCES humores(id)
);


INSERT INTO categorias (nome) VALUES 
('Aventura'), 
('Pesadelo'), 
('Fantasia'), 
('Cotidiano'), 
('Surreal'), 
('Sonho Lúcido');

INSERT INTO humores (nome) VALUES 
('Feliz'), 
('Tranquilo'), 
('Confuso'), 
('Ansioso'), 
('Assustado'), 
('Melancólico'), 
('Eufórico');