<?php

    include("classe/conexao.php");

    $msg = false;

    if(isset($_FILES['arquivo'])){

        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); // pega a extensão do arquivo
        $novo_nome = md5(time()) . $estensao;                           // define o nome do arquivo
        $diretorio = "upload/";                                         //define o diretório para onde enviaremos o arquivo

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

        $sql_code = "INSERT INTO arquivo (codigo, arquivo, data) VALUES(null, '$novo_nome', NOW())";

        if($mysqli->query($sql_code))
            $msg = "Arquivo enviado com sucesso!";
        else
            $msg = "Falha ao enviar arquivo.";

    }

?>
<h1>Upload de Arquivos</h1>
<?php if($msg != false) echo "<p> $msg </p>"; ?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Arquivo: <input type="file" required name="arquivo">
    <input type="submit" value="Salvar">
</form>