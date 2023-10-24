<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $idade = $_POST["idade"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $senha = $_POST["senha"];

    // Validar os dados
    if (empty($nome)) {
        echo "O nome é obrigatório.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "O email é inválido.";
        exit;
    }

    if (!is_numeric($idade)) {
        echo "A idade deve ser um número.";
        exit;
    }

    if (!is_numeric($telefone)) {
        echo "O telefone deve ser um número.";
        exit;
    }

    if (strlen($senha) < 8) {
        echo "A senha deve ter pelo menos 8 caracteres.";
        exit;
    }



    // Salvar os dados
    $dados = "Nome: $nome\nEmail: $email\nIdade: $idade\nTelefone: $telefone\nEndereço: $endereco\nSenha: $senha\n";

    $arquivo = fopen("teste.txt", "a");
    fwrite($arquivo, $dados);
    fclose($arquivo);

} else {
    // Caso não seja uma requisição POST, redirecione para a página de erro ou trate conforme sua necessidade
    header("Location: erro.html");
    exit;
}
?>
