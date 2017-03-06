<?php 
	
	require 'config.php';

	$codigo = null;
	if ( !empty($_GET['codigo'])) 
            {
		$codigo = $_REQUEST['codigo'];
            }
	
	if ( null==$codigo ) 
            {
		header("Location: index.php");
            }
	
	if ( !empty($_POST)) 
    {
	
		
		$tipoProduto = $_POST['tipoProduto'];
		$nomeProduto = $_POST['nomeProduto'];
		$precoProduto = $_POST['precoProduto'];
        $qtProduto = $_POST['qtProduto'];
        $tipoNegocio = $_POST['tipoNegocio'];		
	
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE produto  set tipoProduto = ?, nomeProduto = ?, precoProduto = ?, qtProduto = ?, tipoNegocio = ? WHERE codigo = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($tipoProduto,$nomeProduto,$precoProduto,$qtProduto,$tipoNegocio,$codigo));
                    Banco::desconectar();
                    header("Location: index.php");
		
	} 
        else 
            {
                $pdo = Banco::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM produto where codigo = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($codigo));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		
		$tipoProduto = $data['tipoProduto'];
        $nomeProduto = $data['nomeProduto'];
        $precoProduto = $data['precoProduto'];
		$qtProduto = $data['qtProduto'];
		$tipoNegocio = $data['tipoNegocio'];
		
		Banco::desconectar();
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div>
                    <div>
                        <h3 class="well"> Alterar Produto </h3>
                    </div>
             
                    <form action="alterar.php?codigo=<?php echo $codigo?>" method="post">
                        
                      <div class="control-group">
                        <label class="control-label">Tipo de Produto</label>
                        <div class="controls">
                            <input name="tipoProduto" type="text"  placeholder="Tipo de Produto" value="<?php echo !empty($tipoProduto)?$tipoProduto:'';?>">
                                 <span class="help-inline"></span>
                        
                        </div>
                      </div>
                        
                       <div class="control-group">
                        <label class="control-label">Nome Produto</label>
                        <div class="controls">
                            <input name="nomeProduto"  type="text"  placeholder="Nome do Produto" value="<?php echo !empty($nomeProduto)?$nomeProduto:'';?>">                           
                                <span class="help-inline"></span>
                        
                        </div>
                       </div>
                        
                       <div class="control-group">
                        <label class="control-label">Preço</label>
                        <div class="controls">
                            <input name="precoProduto" type="text" placeholder="Preço" value="<?php echo !empty($precoProduto)?$precoProduto:'';?>">                            
                                <span class="help-inline"></span>
                          
                        </div>
                      </div>
                        
                        <div class="control-group">
                        <label class="control-label">Quantidade</label>
                        <div class="controls">
                            <input name="qtProduto" type="text"  placeholder="Quantidade" value="<?php echo !empty($qtProduto)?$qtProduto:'';?>">
                                <span class="help-inline">
                        </div>
						</div>
                       
                      <div class="control-group">
                       <label class="control-label">Tipo de Negócio</label><br>
                       <label for="tipoNegocio" class="radio-inline">
							<input type="radio" id="tipoNegocio" name="tipoNegocio" value="Compra" <?php echo ($tipoNegocio == 'Compra') ? 'checked' : ''; ?>>Compra
						</label>
						<label for="tipoNegocio" class="radio-inline">
							<input type="radio" id="tipoNegocio" name="tipoNegocio" value="Venda" <?php echo ($tipoNegocio == 'Venda') ? 'checked' : ''; ?>>Venda
                      </div>
                      
                        <br/>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Atualizar</button>
                          <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                    </form>
                </div>                 
    </div> 
  </body>
</html>

