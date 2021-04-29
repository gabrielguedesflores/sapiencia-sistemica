<?php
session_start();

if(isset($_POST["question_name"])  &&  !empty($_POST["question_name"]) &&
   isset($_POST["question_desc"]) && !empty($_POST["question_desc"]) && 
   isset($_POST["questions_category_id"]) && !empty($_POST["questions_category_id"])){

    include "Database.php";
    $instanciaDb = new Database();

    $question_name = addslashes($_POST["question_name"]);
    $question_desc = addslashes($_POST["question_desc"]);
    $questions_category_id = addslashes($_POST["questions_category_id"]);
    
    $cadastra = $instanciaDb->CriaDuvidas($question_name, $question_desc, $questions_category_id);

    $_SESSION["cria_duvida"] = "Dúvida cadastrada com sucesso! :)";

    header("Location: ../dashboard/duvidas.php");

}else{
    echo "Não deu certo";
}
