<?php include "header.php"?>
<?php
require 'config.php';

$codigo = 0;

if(!empty($_GET['codigo']))
{
    $codigo = $_REQUEST['codigo'];
}

if(!empty($_POST))
{
    $codigo = $_POST['codigo'];


    //Delete do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM produto where codigo = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($codigo));
    Banco::desconectar();
    header("Location: index.php");
}
?>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well">Excluir Produto</h3>
                </div>
                <form class="form-horizontal" action="deletar.php" method="post">
                    <input type="hidden" name="codigo" value="<?php echo $codigo;?>"/>
                    <div class="alert alert-danger"> Deseja excluir o produto?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="index.php" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>           
        </div>
    </body>    


<?php include "footer.php"?> 