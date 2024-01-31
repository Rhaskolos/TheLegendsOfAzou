

# pour le read de MapCRUD :

SELECT M.height_map, M.width_map, M.name_map, M.desc_map, T.id_tile, T.x_tile, T.y_tile, T.type_tile, E.id_entity, E.type_entity, E.x_entity, E.y_entity, E.health_entity, E.move_speed_entity, E.atk_speed_entity, E.atk_range_entity, E.atk_physic_entity, E.atk_magic_entity, E.def_physic_entity, E.def_magic_entity, E.orientation_entity
      FROM map AS M
      INNER JOIN tile as T ON T.id_map = M.id_map
      INNER JOIN entity as E ON T.id_map = E.id_map
      INNER JOIN mob as MO ON MO.id_entity = E.id_entity
      INNER JOIN personage as P ON P.id_entity = E.id_entity
      WHERE M.id_map = 1;


# Juste Tile : 

SELECT M.height_map, M.width_map, M.name_map, M.desc_map, T.id_tile, T.x_tile, T.y_tile, T.type_tile
      FROM map AS M
      INNER JOIN tile as T ON T.id_map = M.id_map
      WHERE M.id_map = 1;

# Juste Mob :

SELECT M.height_map, M.width_map, M.name_map, M.desc_map, E.id_entity, E.type_entity, E.x_entity, E.y_entity, E.health_entity, E.move_speed_entity, E.atk_speed_entity, E.atk_range_entity, E.atk_physic_entity, E.atk_magic_entity, E.def_physic_entity, E.def_magic_entity, E.orientation_entity,MO.move_pattern_mob
      FROM map AS M
      INNER JOIN entity as E ON E.id_map = M.id_map
      INNER JOIN mob as MO ON MO.id_entity = E.id_entity
      WHERE M.id_map = 1;


SELECT E.id_entity, E.type_entity, E.x_entity, E.y_entity, E.health_entity, E.move_speed_entity, E.atk_speed_entity, E.atk_range_entity, E.atk_physic_entity, E.atk_magic_entity, E.def_physic_entity, E.def_magic_entity, E.orientation_entity,MO.move_pattern_mob
FROM map AS M
INNER JOIN entity as E ON E.id_map = M.id_map
INNER JOIN mob as MO ON MO.id_entity = E.id_entity
WHERE M.id_map = 1;

# Juste Personage :

SELECT M.height_map, M.width_map, M.name_map, M.desc_map, E.id_entity, E.type_entity, E.x_entity, E.y_entity, E.health_entity, E.move_speed_entity, E.atk_speed_entity, E.atk_range_entity, E.atk_physic_entity, E.atk_magic_entity, E.def_physic_entity, E.def_magic_entity, E.orientation_entity, P.special_personage, P.level_personage, P.id_player
      FROM map AS M
      INNER JOIN entity as E ON E.id_map = M.id_map
      INNER JOIN personage as P ON P.id_entity = E.id_entity
      INNER JOIN player as PL ON PL.id_player = P.id_player
      WHERE M.id_map = 1 and PL.id_player = 1;