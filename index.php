<?php
$config = array_merge(
  require_once './config_env.php',
  require_once './config.php'
);

echo "<pre>";
print_r($config);
echo "</pre>";


// @TODO: spl autoload
// @TODO: чем отличается array_merge от array_replace
// @TODO: экранировать кавычки ипараметризация


function __autoload($className)
{
  if (file_exists('./core/classes/'.$className.'.php')) {
    require_once './core/classes/'.$className.'.php';
    return true;
  }
  return false;
}

//require_once 'core/classes/interfaceDb.php';

//
// SELECT * FROM pages
// WHERE uri = 'about'
// AND published_at <= NOW()
// AND (published_until IS NULL OR published_until >= NOW())

$connect = new Db($config['db_connect']);

//$db->connect($config['db_connect']);

$connect->query(
  "SELECT * FROM table WHERE name = #name# AND field = #field#",
  [
    'name' => "Hello ' #field#",
    'field' => "world"
  ]
);
