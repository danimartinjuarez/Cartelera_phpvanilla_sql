<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>prueba de bbdd</title>
</head>
<body background="https://thumbs.dreamstime.com/z/fondo-del-cine-49407496.jpg" color="#FFFFFF">
    <h1><center>Mis ultimas peliculas vistas</center></h1>
    <section class="row">
<?php

include "./database/openDataBase.php";
$sql = "SELECT * FROM movieswhoiwatched ORDER BY movieswhoiwatched.id DESC";
$query = $conection->prepare($sql);
$query -> execute();
$movies = $query->fetchAll(PDO::FETCH_OBJ);
if ($query-> rowCount()>0){
    foreach( $movies as $movie ){
        echo <<<TAG
            <article class="col-sm d-flex justify-content-around">
                <div class="card" style="width: 18rem;">
                    <img src="{$movie->img}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$movie->title}</h5>
                        <h5 class="card-title">{$movie ->director }</h5>
                        <p class="card-text">{$movie -> resume }</p>
                    </div>
                </div>
            </article>
        TAG;
    }
}

include "./database/closeDataBase.php";