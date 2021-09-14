<?php



try {
  $Baglanti= new PDO("mysql:host=localhost; dbname=ozkan", 'root', '');
  #echo "bağlantı başarılı";
}catch(Exception $e) {
  echo $e->getMessage();
}


?>
