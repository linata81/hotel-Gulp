<?php

  function getLatestComments(){
    require_once("bd.php");
    $link = db_connect();
    $query = "SELECT * FROM comments ORDER BY id DESC";

    $result = mysqli_query($link, $query);
    if (!$result) {
      die(mysqli_error($link));
    }

    $n = mysqli_num_rows($result);
    $comments = array();
    for($i=0; $i<$n; $i++){
      $row = mysqli_fetch_assoc($result);
      $comments[] = $row;
    }
    echo json_encode($comments);
  }
  if($_GET['action'] == 'getNew'){
    getLatestComments();
  }
  
?>