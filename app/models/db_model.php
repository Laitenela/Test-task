<?php

class Db_model
{
  protected $news;
  function __construct()
  {
    [
      'host'     => $host,
      'user'     => $user,
      'pass'     => $pass,
      'database' => $db
    ]            = parse_ini_file(dirname(__DIR__, 1).'\config\db_access.ini');
    
    $this->news  = mysqli_connect($host, $user, $pass, $db);
    mysqli_set_charset($this->news, 'utf8mb4');
  }
}
