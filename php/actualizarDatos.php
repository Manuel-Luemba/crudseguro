<?php
    include "conexion.php";
    $conexion = conexion();
    $datos =array(
        $conexion->real_escape_string(htmlentities($_POST['nombreu'])),
        $conexion->real_escape_string(htmlentities($_POST['paternou'])),
        $conexion->real_escape_string(htmlentities($_POST['maternou'])),
        $conexion->real_escape_string(htmlentities($_POST['telefonou'])),
        $conexion->real_escape_string(htmlentities($_POST['idu']))
            );
    $sql="UPDATE t_persona set nombre=?,
                                  paterno= ?,
                                  materno= ?,
                                  telefono= ?
                   where id=?";
    $query= $conexion->prepare($sql);
    $query->bind_param('ssssi',$datos[0],
                               $datos[1],
                               $datos[2],
                               $datos[3],
                               $datos[4]);
    echo $query->execute();
    $query->close();
?>