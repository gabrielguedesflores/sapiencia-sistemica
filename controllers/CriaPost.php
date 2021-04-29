<?php
session_start();

if(isset($_POST["blog_name"])  &&  !empty($_POST["blog_name"]) &&
   isset($_POST["blog_desc"]) && !empty($_POST["blog_desc"]) && 
   isset($_POST["blog_category_id"]) && !empty($_POST["blog_category_id"])){

    include "Database.php";
    $instanciaDb = new Database();

    //$_POST["blog_name"];
    //$_POST["blog_desc"];
    //$_POST["blog_category_id"];

    $blog_name = addslashes($_POST["blog_name"]);
    $blog_desc = addslashes($_POST["blog_desc"]);
    $blog_category_id = addslashes($_POST["blog_category_id"]);
    
    $cadastra = $instanciaDb->CriaPost($blog_name, $blog_desc, $blog_category_id);
    $_SESSION["cria_post"] = "Post criado no blog com sucesso!";
    header("Location: ../dashboard/blog.php");

}else{
    echo "Não deu certo";
}
