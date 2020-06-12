<?php
    require_once 'CLASSES/usuarios.php';
    $u =new Usuario;
?>

<html lang="pt-br">
    <head>
        <meta name="charset" content="utf-8" />
        <meta name="viewport" content="width-device-width, initial-scale=1.0"/>
        <title> Login - Trabalho APS - A4 </title>
        <link rel="stylesheet" href="CSS/estilo.css">        
    </head>
<body>
    <center> <h2> Area de Cadastro!!! </h2> </center>
<div id="corpo-form-cad">
<center>
<div class="row align-items-center">
<div class="container"> <br> <br> <br>
<h1>Cadastrar Usuário</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30"> <br>
        <input type="email" name="email" placeholder="Usuario" maxlength="40"> <br>
        <input type="password" name="senha" placeholder="Senha" maxlength="15"> <br> <br>
        <input type="submit" value="Cadastrar"> <br>
    </form>
    <a href="index.php"> <button> Voltar para a tela inicial </button>
</div>
<?php
//verificar se clicou no botão cadastrar
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    //verificar se esta preenchido
    if(!empty($nome) && !empty($email) && !empty($senha))
    {
        $u->conectar("projeto_login","127.0.0.1","root","");
        if($u->msgErro == "")//se está vazio esta tudo certo
        {
            if($u->cadastrar($nome,$email,$senha))
            {
                ?>
                <div id="msg-sucesso">
                Cadastrado com sucesso! Acesse para entrar!
                </div>
                <?php
            }
            else
            {
                ?>
                <div class="msg-erro"> 
                    Email ja cadastrado!
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
            <?php echo "Erro: ".$u->msgErro;?>
            </div>
            <?php
        }
    }else
    {
        ?>
        <div class="msg-erro">
            Preencha todos os campos!
        </div>
        <?php
    }
}
?>
</body>
</html>