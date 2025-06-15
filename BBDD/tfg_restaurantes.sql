-- Crear base de datos
CREATE DATABASE IF NOT EXISTS tfg_restaurantes CHARACTER SET utf8mb4;
USE tfg_restaurantes;

-- Tabla de usuarios
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  email VARCHAR(100) UNIQUE,
  contraseña VARCHAR(100),
  preferencias TEXT
);

-- Tabla de restaurantes con campo 'iframe'
CREATE TABLE restaurantes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  tipo VARCHAR(50),
  descripcion TEXT,
  carta TEXT,
  imagen VARCHAR(255),
  iframe TEXT
);

-- Tabla de reservas
CREATE TABLE reservas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  id_restaurante INT,
  fecha DATETIME,
  estado VARCHAR(20),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
  FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
);

-- Insertar datos en restaurantes con iframes de Google Maps
INSERT INTO restaurantes (nombre, tipo, descripcion, carta, imagen, iframe) VALUES
('Green Bites', 'Vegetariano', 'Comida sana', 'Ensaladas, tofu, zumos', 'https://source.unsplash.com/400x300/?vegetarian',
'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48648.47818824085!2d-3.880131551367191!3d40.35277359999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4189b1b2e239c1%3A0x8c4aa1049ad05675!2sCervecer%C3%ADas%20La%20Sure%C3%B1a%20y%20100%20Montaditos!5e0!3m2!1sen!2ses!4v1749201094857!5m2!1sen!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'),

('BBQ House', 'Costillas', 'Parrilla americana', 'Costillas, hamburguesas', 'https://source.unsplash.com/400x300/?bbq',
'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48585.118410128955!2d-3.77638075136717!3d40.44052170000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4228f6f8620eaf%3A0x56fefe89160e390d!2sJimbo%20Smokehouse!5e0!3m2!1sen!2ses!4v1749200941982!5m2!1sen!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'),

('La Trattoria', 'Italiano', 'Pasta y más', 'Pasta, pizza, lasañas', 'https://source.unsplash.com/400x300/?italian-food',
'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48585.12898018404!2d-3.7763808071164666!3d40.44050707449579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422902a37995f9%3A0xb77637733f088741!2sL&#39;Antica%20Trattoria!5e0!3m2!1sen!2ses!4v1749201003509!5m2!1sen!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'),

('Masala India', 'Indio', 'Cocina especiada', 'Curry, naan, samosas', 'https://source.unsplash.com/400x300/?indian-food',
'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48585.1395502351!2d-3.776380862865764!3d40.440492448992764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422f4c3bf631c5%3A0x59458dd68557d281!2sDesi%20Gourmet!5e0!3m2!1sen!2ses!4v1749201036413!5m2!1sen!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>');
