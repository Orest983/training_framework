<?php
interface interfaceDb
{
  public function connect(array $dbConnect);
  public function query($sql, array $params = null);
  public function fetchAll($result);
  public function fetchOne($result, $key = 0);
}
