<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro de Veículo </title>
</head>
<body>
    <div id="divform">
    <form action="recebe.php" method="POST">      <!- POST passa direto para o servidor sem a gente ver ->
<b>Informações de cadastro do carro</b>  <br> <br>
    <label><b>Nome do carro:</b> </label>
    <input type="text" name="txtNome" id="name" />  <br> <br>
    <label><b>Modelo:</b> </label>
    <input type="text" name="txtModelo" id="Modelo" />  <br> <br>
    <label><b>Ano:</b> </label>
    <input type="number" name="txtAno" id="Ano" />  <br> <br>
    <label><b>Preço:</b> </label>
    <input type="number" name="txtPreco" id="Preco" />  <br> <br>
    <label><b>Cor:</b> </label>
<select id="cor">
    <option value=""> Selecione </option>
    <option value="Vermelho"> Vermelho </option>
    <option value="Azul"> Azul </option>
    <option value="Branco"> Branco </option>
</select>
<br> <br>
    <label for="foto"><b> Foto: </b> </label>
    <input type="file" name="foto" required /> <br> <br> <br>
<input type="submit" value="Cadastrar"/>
<input type="reset" value="Limpar" />
</form>
</div>    
</body>
</html>