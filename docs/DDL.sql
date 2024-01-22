CREATE TABLE coord(
   id_coord INT AUTO_INCREMENT,
   x_coord INT,
   y_coord INT,
   PRIMARY KEY(id_coord)
);

CREATE TABLE map(
   id_map INT AUTO_INCREMENT,
   heigth_map INT,
   width_map INT,
   name_map VARCHAR(255) ,
   desc_map TEXT,
   PRIMARY KEY(id_map)
);

CREATE TABLE skill(
   id_skill INT AUTO_INCREMENT,
   name_skill VARCHAR(255) ,
   desc_skill TEXT,
   cost_skill INT NOT NULL,
   range_skill INT NOT NULL,
   PRIMARY KEY(id_skill)
);

CREATE TABLE entity(
   id_entity INT AUTO_INCREMENT,
   health_entity INT NOT NULL,
   skill_entity INT NOT NULL,
   atk_physic_entity INT NOT NULL,
   atk_magic_entity INT NOT NULL,
   def_physic_entity INT NOT NULL,
   def_magic_entity INT NOT NULL,
   id_skill INT NOT NULL,
   id_coord INT NOT NULL,
   PRIMARY KEY(id_entity),
   FOREIGN KEY(id_skill) REFERENCES skill(id_skill),
   FOREIGN KEY(id_coord) REFERENCES coord(id_coord)
);

CREATE TABLE player(
   id_entity INT,
   login_player VARCHAR(50)  NOT NULL,
   password_player CHAR(128) ,
   archetype_player TINYINT NOT NULL,
   orientation_player VARCHAR(1)  NOT NULL,
   PRIMARY KEY(id_entity),
   FOREIGN KEY(id_entity) REFERENCES entity(id_entity)
);

CREATE TABLE tile(
   id_tile INT AUTO_INCREMENT,
   type_tile INT NOT NULL,
   id_skill INT,
   id_coord INT NOT NULL,
   id_map INT NOT NULL,
   PRIMARY KEY(id_tile),
   FOREIGN KEY(id_skill) REFERENCES skill(id_skill),
   FOREIGN KEY(id_coord) REFERENCES coord(id_coord),
   FOREIGN KEY(id_map) REFERENCES map(id_map)
);

CREATE TABLE item(
   id_item INT AUTO_INCREMENT,
   name_item VARCHAR(255)  NOT NULL,
   desc_item TEXT NOT NULL,
   id_skill INT NOT NULL,
   PRIMARY KEY(id_item),
   FOREIGN KEY(id_skill) REFERENCES skill(id_skill)
);

CREATE TABLE mob(
   id_entity INT,
   orientation_mob CHAR(1)  NOT NULL,
   PRIMARY KEY(id_entity),
   FOREIGN KEY(id_entity) REFERENCES entity(id_entity)
);

CREATE TABLE inventory(
   id_entity INT,
   id_item INT,
   slot_inventory INT NOT NULL,
   count_item INT NOT NULL,
   PRIMARY KEY(id_entity, id_item),
   FOREIGN KEY(id_entity) REFERENCES entity(id_entity),
   FOREIGN KEY(id_item) REFERENCES item(id_item)
);