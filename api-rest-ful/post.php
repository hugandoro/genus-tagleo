<?php
include "config.php";
include "utils.php";
$dbConn =  connect($db);

//LISTAR UN REGISTRO O TODOS
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        //Mostrar un registro
        $sql = $dbConn->prepare("SELECT * FROM landingpage where landingpage_id=:id");
        $sql->bindValue(':id', $_GET['id']);
        $sql->execute();

        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetch(PDO::FETCH_ASSOC),  JSON_UNESCAPED_UNICODE);
        exit();
    }

    else {
        //Mostrar todos
        $sql = $dbConn->prepare("SELECT * FROM landingpage");
        $sql->execute();

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");

        echo json_encode($sql->fetchAll(), JSON_UNESCAPED_UNICODE);
        exit();
    }
}

//CREAR UN NUEVO REGISTRO
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    $sql = "INSERT INTO landingpage
          (title, status, content, user_id)
          VALUES
          (:title, :status, :content, :user_id)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
   }
}
*/

//BORRAR UN REGISTRO
/*
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
  $id = $_GET['id'];
  $statement = $dbConn->prepare("DELETE FROM landingpage where id=:id");
  $statement->bindValue(':id', $id);
  $statement->execute();
  header("HTTP/1.1 200 OK");
  exit();
}
*/

//ACTUALIZAR UN REGISTRO
/*
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $postId = $input['id'];
    $fields = getParams($input);
    $sql = "
          UPDATE landingpage
          SET $fields
          WHERE id='$postId'
           ";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}
*/

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
?>