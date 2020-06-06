<?php
if (isset($_POST['Llave']) && $_POST['Llave']!="") {
  $_POST['Llave']."<br>";
  if (isset($_COOKIE['Mensaje'])) {
    $Mensaje=$_COOKIE['Mensaje'];
    $Descifrado = explode("/",$Mensaje);
    $Llave_2=$_POST['Llave']/count($Descifrado);
    $Llave_2."<br>";
    $LLave_1=$Descifrado[count($Descifrado)-1]-$Llave_2*2;
    if ($Descifrado[count($Descifrado)-2]==$LLave_1) {
      echo "<h1>Su mensaje original era:</h1>";
      for ($i=0; $i <count($Descifrado)-1; $i++) {
        $Descifrado[$i]+=$Llave_2;
        echo chr($Descifrado[$i]);
      }
    }else {
      echo "Esa no es la llave de este cifrado";
    }
  }else {
    echo "Expiro su mensaje vuelva a escribirlo";
  }
}else{
  header("Location: Cifrado.php");
}
?>
