<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JUGADOR.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: JUGADOR,  orderBy: JUG_NOMBRE);

 $render = "";
 foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[JUG_ID]);
  $id = htmlentities($encodeId);
  $nombre = htmlentities($modelo[JUG_NOMBRE]);
  $equipo = htmlentities($modelo[JUG_EQUIPO]);
  $posicion = htmlentities($modelo[JUG_POSICION]);
  $render .=
    "<li class='md-two-line icon'>
      <span class='material-symbols-outlined'>person</span>
      <a href='navTabFixed.html?id=$id'><span class='headline'>{$nombre}</span></a>
      <span class='supporting'>{$equipo} - {$posicion}</span>
    </li>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
