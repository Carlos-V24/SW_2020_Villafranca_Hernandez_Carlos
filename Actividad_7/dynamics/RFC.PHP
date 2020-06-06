<?php
if (isset($_POST['Nombre']) && isset($_POST['ApellidoP']) && isset($_POST['ApellidoM']) &&
    isset($_POST['RFC']) && isset($_POST['Colegio']) && isset($_POST['psw'])) {
  $RFCRequerimientos=0;
  $Errores=0;
  if (preg_match('/[A-Za-zÑñÁÉÍÓÚáéíóú]+( +[A-Za-zÑñÁÉÍÓÚáéíóú]+|) */', $_POST['Nombre'])) {
    $RFCRequerimientos++;
  }else {
    echo "Dato Invalido: Nombre<br>";
    $Errores++;
  }
  if (preg_match('/[A-Za-zÑñÁÉÍÓÚáéíóú]+ */', $_POST['ApellidoP'])) {
    $RFCRequerimientos++;
  }else {
    echo "Dato Invalido: Apellido Paterno<br>";
    $Errores++;
  }
  if (preg_match('/[A-Za-zÑñÁÉÍÓÚáéíóú]+ */', $_POST['ApellidoM'])) {
    $RFCRequerimientos++;
  }else {
    echo "Dato Invalido: Nombre<br>";
    $Errores++;
  }
  if (preg_match('/^(?=[\w!#$@%*^+-]*\d)(?=[\w!#$@%*^+-]*[A-Z])(?=[\w!#@$%*^+-]*[a-z])(?=[\w!#$%*^+@-]*[!#$%*@^+-])\S{8,100}$/', $_POST['RFC']) && $RFCRequerimientos==3) {
    $RFCComponentes[]= substr(strtoupper($_POST['ApellidoP']), 0, 2);
    $RFCComponentes[]= substr(strtoupper($_POST['ApellidoM']), 0, 1);
    $RFCComponentes[]= substr(strtoupper($_POST['Nombre']), 0, 1);
    $RFCComponentes = implode($RFCComponentes);
    if (!($RFCComponentes == substr($_POST['RFC'], 0, 4))) {
      echo "Dato Invalido: RFC<br>";
      $Errores++;
    }
  }else {
    echo "Dato Invalido: RFC<br>";
    $Errores++;
  }
  if ($_POST['Colegio']=='null'){
    echo "Dato Invalido: Colegio<br>";
    $Errores++;
  }

  if (!(preg_match('/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,100}$/', $_POST['psw']))) {
    echo "Dato Invalido: Contraseña<br>";
    echo "Su contraseña: ".$_POST['psw']." es insegura";
    $Errores++;
  }
  if ($Errores<=0) {
    echo "Datos Validados :)";
  }
}else {
  echo "Ocurrio un error, porfavor intentelo de nuevo";
}
?>
