<?php include "header.php"?>	
	<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h1>Adicionar Produtos</h1>
		</div>
		<div class="col=md-2 text-right">
			<h1><a href="index.php" class="btn btn-primary">
			<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Voltar</a></h1>
		</div>
	</div>
	<br/>
	
<form method="post">
	<div class="form-group">
		<label for="tipoProduto">Tipo de Produto</label>
		<input type="text" class="form-control" id="tipoProduto" name="tipoProduto" placeholder="Digite o tipo de Produto" required>
	</div>
    <div class="form-group">
		<label for="nomeProduto">Nome Produto</label>
		<input type="text" class="form-control" id="nomeProduto" name="nomeProduto" placeholder="Digite o nome do Produto" required>
	</div>
    <div class="form-group">
		<label for="precoProduto">Preço</label>
		<input type="text" class="form-control" id="precoProduto" name="precoProduto" placeholder="Digite o preço do Produto" required>
	</div>
    <div class="form-group">
		<label for="qtProduto">Quantidade</label>
		 <input type="text" class="form-control" id="qtProduto" name="qtProduto" placeholder="Digite a quantidade" required>
	</div>
		<label for="tipoNegocio" class="radio-inline">
			<input type="radio" id="tipoNegocio" name="tipoNegocio" value="Compra">Compra
		</label>
		<label for="tipoNegocio" class="radio-inline">
			<input type="radio" id="tipoNegocio" name="tipoNegocio" checked="" value="Venda">Venda
	    </label><br><br>
  
  <button type="submit" class="btn btn-default" name="submit">Adicionar</button>
</form>

<?php
    require 'config.php';
    
    if(!empty($_POST))
    {
        //Acompanha os erros de validação
        $tipoProduto = null;
        $nomeProduto = null;
        $precoProduto = null;
        $qtProduto = null;
        $tipoNegocio = null;
		
        $tipoProduto = $_POST['tipoProduto'];
        $nomeProduto = $_POST['nomeProduto'];
        $precoProduto = $_POST['precoProduto'];
        $qtProduto = $_POST['qtProduto'];
		$tipoNegocio = $_POST['tipoNegocio'];   
        
        //Inserindo no Banco:

            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO produto (tipoProduto,nomeProduto,precoProduto,qtProduto,tipoNegocio) VALUES(?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($tipoProduto,$nomeProduto,$precoProduto,$qtProduto,$tipoNegocio));
            Banco::desconectar();
            header("Location: index.php");
        
    }
?>

<?php include "footer.php"?>	