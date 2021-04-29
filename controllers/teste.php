<?php
/*
$dbname = 'ss';
$host = 'localhost';
$port = '5432';
$user = 'postgres';
$pass = '090397'; 
    
$dsn = "pgsql:dbname={$dbname};host={$host};port={$port}";
        
if ($dsn) {
    echo "Conectou";
}else{
    echo "Não conectou";
}
*/
print "<h2>CONECTAR AO BANCO NO POSTGRESQL</h2>";
$bdcon = pg_connect("dbname=ss");
//conecta a um banco de dados chamado "cliente"

$con_string = "host=localhost port=5432 dbname=ss user=postgres password=090397";
if(!$dbcon = pg_connect($con_string)) die ("Erro ao conectar ao banco<br>".pg_last_error($dbcon));
//coneta a um banco de dados chamado "cliente" na máquina "localhost" com um usuário e senha
