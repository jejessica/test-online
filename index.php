<?php include "header.php"?>
		<div class="container">
		<div class="row">
				<div class="col-md-10">
					<h1>Lista de Produtos</h1>
				</div><br>
				<div class="col=md-2 text-right">
					<a href="adicionar.php" class="btn btn-primary">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Adicionar	</a>
				</div>
			</div>
			<br/>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="20">Código</th>
						<th>Tipo de produto</th>
						<th>Nome Produto</th>				
						<th>Preço</th>
						<th>Quantidade</th>
						<th>Tipo Negócio</th>
					</tr>
				</thead>
				<tbody>
					   <?php
                        include 'config.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM produto ORDER BY codigo DESC';
                        
                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
							echo '<td>'. $row['codigo'] . '</td>';
                            echo '<td>'. $row['tipoProduto'] . '</td>';
                            echo '<td>'. $row['nomeProduto'] . '</td>';
                            echo '<td>'. $row['precoProduto'] . '</td>';
                            echo '<td>'. $row['qtProduto'] . '</td>';
							echo '<td>'. $row['tipoNegocio'] . '</td>';
                            echo '<td width=170>';                                        
                            echo '<a class="btn btn-warning" href="alterar.php?codigo='.$row['codigo'].'">Atualizar</a>';
                            echo '                  ';
                            echo '<a class="btn btn-danger" href="deletar.php?codigo='.$row['codigo'].'">Excluir</a>';
                            echo '</td>';
                            echo '<tr>';
                        }
                        Banco::desconectar();
                        ?>
				</tbody>
			</table>
		</div>

<?php include "footer.php"?>	
	
