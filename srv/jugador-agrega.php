<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JUGADOR.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");
 $equipo = recuperaTexto("equipo");
 $posicion = recuperaTexto("posicion");

 $nombre = validaNombre($nombre);
 $equipo = validaNombre($equipo);
 $posicion = validaNombre($posicion);

 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: JUGADOR, values: [JUG_NOMBRE => $nombre, JUG_EQUIPO => $equipo, JUG_POSICION => $posicion]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/jugador.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "equipo" => ["value" => $equipo],
  "posicion" => ["value" => $posicion],
 ]);
});
