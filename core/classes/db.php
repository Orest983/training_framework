<?php

class Db implements interfaceDb
{
  private $link;

  public function __construct(array $dbConnect)
  {
    $this->link = $this->connect($dbConnect);
//     if (!mysqli_set_charset($this->link, "utf8")) {
//     printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($this->link));
//     exit();
// } else {
//     printf("Текущий набор символов: %s\n", mysqli_character_set_name($this->link));
// }
  }

  public function connect(array $dbConnect)
  {
     return mysqli_connect(
      $dbConnect['host'],
      $dbConnect['user'],
      $dbConnect['pass'],
      $dbConnect['name']
    );
  }

  public function query($sql, array $params = null)
  {
    foreach ($params as $key => $value) {
       $value = mysqli_real_escape_string($this->link, $value);
       $params[$key] = $value;
      // $sql = str_replace("#".$key."#", '\''.$value.'\'', $sql);
    }
    $sql = preg_replace('|#([\w\d]+)#|e', '$params["$1"]', $sql);
    echo $sql;
  }

  public function fetchAll($result)
  {

  }

  public function fetchOne($result, $key = 0)
  {

  }


}
