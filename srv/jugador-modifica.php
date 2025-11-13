<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JUGADOR.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $equipo = recuperaTexto("equipo");
 $posicion = recuperaTexto("posicion");

 $nombre = validaNombre($nombre);
 $equipo = validaNombre($equipo);
 $posicion = validaNombre($posicion);

 update(
  pdo: Bd::pdo(),
  table: JUGADOR,
  set: [JUG_NOMBRE => $nombre, JUG_EQUIPO => $equipo, JUG_POSICION => $posicion],
  where: [JUG_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "equipo" => ["value" => $equipo],
  "posicion" => ["value" => $posicion],
 ]);
});
