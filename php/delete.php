<?php
    include 'conexion.php';
    $conexion = conexion();
    $id = $conexion->real_escape_string(htmlentities($_POST['id']));

    $sql = "DELETE from t_persona where id=?";
    $query = $conexion->prepare($sql);
    $query->bind_param("i",$id);
    echo $query->execute();
    $query->close();
    #header('Content-type: application/json');
    #$response = array();

    /*if($_POST['delete']){

        $uid = intval($_POST['delete']);
        $query = "DELETE FROM t_persona WHERE id=:uid";
        $stmt = $conexion->prepare($query);
        $stmt->execute(array(':pid'=>$pid));
        if($stmt){
            $response['status'] = 'success';
            $response['message']='User Deleted Successfuly ...';
        }else{
            $response['status'] = 'error';
            $response['message']='Unable to delete User ...';
        }
        echo json_encode($response);

    }
    */
?>