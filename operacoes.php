<!DOCTYPE html>

<html>
	<style type="text/css">
		#centraliza{
		width:75%;
		margin:0 auto;
		}
	</style>
	<head>
		<title>Consultas-Sistema Mercadorias</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Cadastro de mercadorias.">
		<meta name="keywords" content="Mercadorias, Cadastro">
		<meta name="author" content="Bruno Cavalcante">
	</head>

	<body>
		<!-- BARRA DE NAVEGAÇÃO -->
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Sistema Mercadorias</a> <!-- Titulo -->
				</div>
				<ul class="nav navbar-nav"><!-- Itens -->
					<li><a href="index.php">In&iacute;cio-Cadastros</a></li>
					<li class="active">
					<a href="operacoes.php?op=Listar Todos">Consultas</a></li>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container"> <!-- container -->
		 <div class="panel-group">
			<div class="panel panel-primary"><!-- estilo painel -->
			
				<div class="panel-heading"> <!-- titulo -->
					<?php
					if(isset($_GET["op"]))
					{
						if($_GET["op"]=="Listar Todos")
						{
							echo '<h4 align="center">Todos os Registros</h4>';
						}else if($_GET["op"]=="Mais Vendidos")
						{
							echo '<h4 align="center">Mercadorias mais Vendidas</h4>';
						}else if($_GET["op"]=="Mais Comprados")
						{
							echo '<h4 align="center">Mercadorias mais Compradas</h4>';
						}else
						{
							echo '<h4 align="center">Op&ccedil;&atilde;o Inv&aacute;lida</h4>';
						}
					}
					?>
				</div>
				<div class="panel-body"> <!-- corpo -->
					<div class="btn-group btn-group-justified">								  
				        <a href="operacoes.php?op=Listar Todos" class="btn btn-primary" value="Listar Todos">Todos os registros</a>
		    			<a href="operacoes.php?op=Mais Vendidos" class="btn btn-success" value="Mais Vendidos">Mercadorias mais Vendidas</a>
		    			<a href="operacoes.php?op=Mais Comprados" class="btn btn-danger" value="Mais Comprados">Mercadorias mais Compradas</a>	     		
			 		</div>
					<?php
					function busca($sql,$op)
					{
						//conexao
						$server = "localhost";
						$username = "root";
						$password = "vertrigo";
						$db = "teste";
						$conn = new mysqli($server, $username, $password, $db);
							
						// Checar conexão
						if ($conn->connect_error) {
							die("Falha na conex&atilde;o: " . $conn->connect_error);
						}
						$result = $conn->query($sql);
					
						if($result->num_rows > 0)
						{
							echo '<table class="table table-striped" align="center">';
							echo '<thead>';
							echo '<tr class="info">';
							echo '<th>Nome da mercadoria</th>';
							echo '<th>Tipo de mercadoria</th>';
							if($op!="Listar Todos"){
								echo '<th>M&eacute;dia Valor Unit&aacute;rio (R$)</th>';
								echo '<th>Quantidade total</th>';
								echo '<th>M&eacute;dia Valor Total (R$)</th>';
							}
							else{
								echo '<th>Valor Unit&aacute;rio (R$)</th>';
								echo '<th>Quantidade</th>';
								echo '<th>Valor Total (R$)</th>';
							}
							
							echo '<th>Compra/Venda</th>';
							echo '<th>Data do registro</th>';
							echo '</tr>';
							echo '</thead>';
							echo '<tbody>';
							while($row = $result->fetch_assoc())
							{
								if($row["MerNeg"]=='V')
								{
									echo '<tr class="success">';//Verde = venda
								}
								else
								{
									echo '<tr class="danger">';//Vermelho = compra
								}
								echo '<td>'.$row["MerNom"].'</td>';//nome mercadoria
								echo '<td>'.$row["MerTip"].'</td>';//tipo mercadoria
								if($op!="Listar Todos"){
									echo '<td>'.$row["round(avg(MerVal),2)"].'</td>';//media valor unitario
									echo '<td>'.$row["sum(MerQtd)"].'</td>';//soma qtd
									echo '<td>'.$row["round(avg(MerVto),2)"].'</td>';//media valor total
								}
								else{
									echo '<td>'.$row["MerVal"].'</td>';//valor unitario
									echo '<td>'.$row["MerQtd"].'</td>';//qtd
									echo '<td>'.$row["MerVto"].'</td>';//valor total
								}
								echo '<td>'.$row["MerNeg"].'</td>';//Compra/Venda
								echo '<td>'.$row["MerDat"].'</td>';//data
								echo '</tr>';
							}
							echo '</tbody>';
							echo '</table>';
						}
						$conn->close();
					}
					
					if(isset($_GET["op"]))	
					{
						$op = $_GET["op"];
					}
					$sql = "....";
					if($op=="Listar Todos")
					{
						$sql = "select * from tb_mercadoria;";
						busca($sql,$op);
					}
					else if($op == "Mais Vendidos")//o mais vendido e seu ultimo registro
					{
						$sql = "select *,sum(MerQtd),round(avg(MerVto),2),round(avg(MerVal),2) from tb_mercadoria where MerNeg='V' group by MerNom;";
						busca($sql,$op);
					}
					else if($op == "Mais Comprados")//o mais comprado e seu ultimo registro
					{
						$sql = "select *,sum(MerQtd),round(avg(MerVto),2),round(avg(MerVal),2) from tb_mercadoria where MerNeg='C' group by MerNom;";
						busca($sql,$op);
					}							
					else 
					{
						echo "Sem resultados";
					}	
					?>	
				</div><!-- corpo painel -->
			</div><!-- painel -->
		 </div>	<!-- grupo painel -->
		</div>	<!-- container -->
	</body>
</html>
