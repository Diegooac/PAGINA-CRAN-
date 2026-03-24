<?php
class Bd
{
  private static ?PDO $pdo = null;

  static function pdo(): PDO
  {
    if (self::$pdo === null) {
      self::$pdo = new PDO(
        "sqlite:" . __DIR__ . "/srvbd.db",
        null,
        null,
        [
          PDO::ATTR_PERSISTENT => false,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
      );

      self::$pdo->exec(
        "CREATE TABLE IF NOT EXISTS CALIFICACION (
          CAL_ID INTEGER PRIMARY KEY AUTOINCREMENT,
          CAL_NOMBRE TEXT NOT NULL,
          CAL_APELLIDOP TEXT NOT NULL,
          CAL_APELLIDOM TEXT NOT NULL,
          CAL_MATERIA TEXT NOT NULL,
          CAL_CALIFICACION REAL NOT NULL,
          CONSTRAINT CAL_NOMBRE_NV CHECK(LENGTH(CAL_NOMBRE) > 0),
          CONSTRAINT CAL_APELLIDOP_NV CHECK(LENGTH(CAL_APELLIDOP) > 0),
          CONSTRAINT CAL_APELLIDOM_NV CHECK(LENGTH(CAL_APELLIDOM) > 0),
          CONSTRAINT CAL_MATERIA_NV CHECK(LENGTH(CAL_MATERIA) > 0)
        )"
      );
    }

    return self::$pdo;
  }
}