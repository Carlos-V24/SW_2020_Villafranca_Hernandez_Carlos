<?php
if (isset($_POST['Texto']) && $_POST['Texto']!="") {
  $Texto=$_POST['Texto'];
  //Convierte el texto en mayusculas
  $Texto =strtoupper($Texto);
  $Español=["A","B","C", "D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R",
            "S","T","U","V","W","X","Y","Z"];
  ////Creacion del despalzamientos cifrado
  $Desplazamiento=6;
  for ($i=0; $i <(count($Español)) ; $i++) {
    //Calcula las posiciones desplazando las letras
    $Posicion= (count($Español)-1)-($Desplazamiento)+$i;
    if($Posicion>=(count($Español))){
      $Posicion=$i-$Desplazamiento-1;
    }
    ///Crea un arreglo con las letrras desplazadas lo acordado
    $Cifrado[]=$Español[$Posicion];
  }
  foreach ($Español as $Npos => $Letra) {
    //Sustituye la letra en donde esta por su posicion
    $Texto= str_ireplace($Letra,$Npos."/",$Texto);
  }
  /*Sustituye la psocion de la letra original por
    la letra qletra desplazada ya las posiciones acordadas*/
  for ($n=(count($Cifrado)-1); $n>=0; $n--) {
    $Texto= str_ireplace($n."/",$Cifrado[$n],$Texto);
  }
  echo "Su texto cifrado es:".$Texto;
  /*
  //Traduce de vuelta el texto
  foreach ($Cifrado as $Npos => $Letra) {
    //Sustituye la letra en donde esta por su posicion
    $Texto= str_ireplace($Letra,$Npos."/",$Texto);
  }
  for ($n=(count($Español)-1); $n>=0; $n--) {
    $Texto= str_ireplace($n."/",$Español[$n],$Texto);
  }
  echo $Texto;
  */
}else {
  echo "Existe un error con su texto";
}

?>
