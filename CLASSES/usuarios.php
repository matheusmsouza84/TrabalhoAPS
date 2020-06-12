<?php
Class Usuario
{
    private $pdo;
    public $msgErro = ""; //tudo ok se estiver vazio

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try
        {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario.$senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }
    public function cadastrar($nome, $email, $senha)
    {
        global $pdo;
        //verificar se já existe o email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //ja cadastrado
        }
        else
        {
            //caso não, Cadastrar no banco de dados
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        }
    }
    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se o email e senha estão cadastrados,
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            //se sim entrar no sistema (sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;    //logado com sucesso
        }
        else
        {
            return false;   //não conseguiu logar
        }
    }
}
?>