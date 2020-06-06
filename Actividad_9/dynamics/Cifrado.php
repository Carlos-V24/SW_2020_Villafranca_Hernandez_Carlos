<?php
if (isset($_POST['Texto']) && $_POST['Texto']!="") {
  $Texto=$_POST['Texto'];
  $Cifrado;
  $Key=rand(3,11);
  //Guarda el cntenido en valores de 0 a 255 y les resta/suma un valor aleatorio
  for ($i=0; $i <strlen($Texto) ; $i++) {
    $Cifrado[]=ord(substr($Texto, $i, 1))-$Key;
  }
  //Primera llave que se le devuelve se guarda al final del texto
  $Key_1=2*$Key+$Cifrado[count($Cifrado)-1];
  $Cifrado[]=$Key_1;
  //Segunda llave que se le devuelve a la persona
  $Key_2=$Key*count($Cifrado);
  $Cifrado = implode("/", $Cifrado);
  if (isset($_COOKIE['Mensaje']) && $_COOKIE['Mensaje']!=$Cifrado) {
    setcookie("Mensaje",$Cifrado,time()-60);
  }
    setcookie("Mensaje",$Cifrado,time()+60);
  echo "<form action='Descifrar.php' method='POST'>";
  echo "<fieldset style='width:500px;'>";
  echo "  <legend><h1>Su texto cifrado</h1></legend>";
  echo "  <h2>Su llave es: <input type='number' name='Llave' value='".$Key_2."'></h2>";
  echo "  <h2>Su texto cifrado es:</h2>";
  echo "  <p>";
  for ($i=0; $i <strlen($Cifrado) ; $i++) {
    echo substr ($Cifrado, $i, 1);
    if ($i%50==0 && $i!=0) {
      echo "<br>";
    }
  }
  echo "  </p>";
  echo "  <input type='submit' name='Descifrar' value='Descifrar'>";
  echo "</fieldset>";
}else{
  header("Location: ../template/Act_9.html");
}
?>
