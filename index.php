<?php
include 'config.php';

// Conexão ao banco de dados usando mysql_*, que é obsoleto
$con = mysql_connect($db_host, $db_user, $db_pass);
if (!$con) {
    die('Não foi possível conectar: ' . mysql_error()); // Exposição de detalhes do erro
}

// Seleciona o banco de dados
mysql_select_db($db_name, $con);

// Injeção de SQL possível devido à falta de sanitização
$id = $_GET['id'];  // entrada diretamente da URL
$result = mysql_query("SELECT * FROM users WHERE id = $id");

// Uso de práticas obsoletas
echo "<h1>Detalhes do Usuário</h1>";
echo "<ul>";
while ($row = mysql_fetch_array($result)) {
    echo "<li>Nome: " . $row['name'] . "</li>";  // Exibição de dados do usuário
    echo "<li>Email: " . $row['email'] . "</li>"; // Exibição de dados do usuário
}
echo "</ul>";

// Não fechamento da conexão com o banco e tag de fechamento PHP ausente
