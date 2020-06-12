<!--    NOMES: KEVIN BASTOS  E  MATHEUS ROCHA  E  MATHEUS SOUZA       -->


<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br">
    <head>
        <meta name="charset" content="utf-8" />
        <meta name="viewport" content="width-device-width, initial-scale=1.0"/>
        <title> Login - Trabalho APS - A4 </title>
        <link href="CASS/bootstrap.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="estilo.css">
    </head>
<body>

<center>  Bem Vindo(a)!!!  </center>
<!-- <a href="cadastrar.php"><button type="button" class="btn btn-secondary"
 data-toggle="popover" title="Somente para funcionários">Cadastrar Produto</button></a> -->

<center><a href="formulario.php" > <button> Cadastro de Veículo </button></center> </a> <br> <br>
<center>
<div class="row align-items-center">
<div class="container"> <br> <br> <br>
    <h2>Entrar</h2>
    <form method="POST">
        <input type="email" placeholder="Usuario" name="email"> <br>
        <input type="password" placeholder="Senha" name="senha"> <br> <br>
        <input class="btn btn-primary" type="submit" value="Acessar"> <br> <br> <br>
        <a href="cadastrar.php"> Ainda não é inscrito? <strong> Cadastre-se! </strong>
    </form>
</div></div></center>
<?php
if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if(!empty($email) && !empty($senha))
    {
        $u->conectar("projeto_login","127.0.0.1","root","");
        if($u->msgErro == "")
        {
            if($u->logar($email,$senha))
            {
                header("location: formulario.php");
            }
            else
            {
                header("location: formulario.php");
                ?>
              <!--  <div class="msg-erro"> 
                    Email e/ou senha estão incorretos!
                </div>          -->
                <?php
            }
            }
            else
            {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro; ?>
                </div>
                <?php
            }
            }
            else
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