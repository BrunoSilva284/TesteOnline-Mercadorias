
<!DOCTYPE html>

<html>
	<script language="javascript">
	function cadastrar()
	{
		val = validaTextos();
		if(val==true)//se retornar true, significa que tudo deu certo
		{
			nome = document.cadastro.nome.value;
			qtd = document.cadastro.qtd.value;
			preco = document.cadastro.preco.value;
			tipo = document.cadastro.tipo.value;
		
			var radio = document.getElementsByName("opradio");
			if(radio[0].checked==true)//compra
			{
				neg = 'C';
			}
			else//venda
			{
				neg = 'V';
			}

					//pagina		dados					callback
			$.post("Cadastro.php",{nome,qtd,preco,tipo,neg},function(status){

				alert(status);				
							
			});
			cadastro.reset();
			radio.reset();
		}
	}
	function validaTextos()
	{
		//	Nome vazio?
		var nome = document.cadastro.nome.value;
		if(nome=="")
		{
			window.alert("Preencha o nome!");
			document.cadastro.nome.focus();
			return false;//para de executar
		}
		//	Qtd vazia?
		var qtd = document.cadastro.qtd.value;
		if(qtd=="")
		{
			window.alert("Preencha a quantidade!");
			document.cadastro.qtd.focus();
			return false;//para de executar
		}
		//		Preço vazio?
		var preco = document.cadastro.preco.value;
		if(preco=="")
		{
			window.alert("Preencha o valor!");
			document.cadastro.preco.focus();
			return false;//para de executar
		}
		// Valida se é um float
		var valido = (preco.match(/^(?!0\d)\d*(\.\d+)?$/mg));//expressao compara se há somente números e talvez um ponto
		if(!valido){	//se nao for valido
			window.alert("Valor invalido!\nUtilize ponto(.) ao inves da virgula.");
			document.cadastro.preco.focus();
			return false;//para de executar
		}
		//	Tipo vazio?
		var tipo = document.cadastro.tipo.value;
		if(tipo=="")
		{
			window.alert("Preencha o tipo de mercadoria!");
			document.cadastro.tipo.focus();
			return false;//para de executar
		}
		
		// Tipo de negocio
		var radio = document.getElementsByName("opradio");
		//radio 0=Compra radio 1=venda
		if(radio[0].checked == radio[1].checked)//só podem ser iguals se não foram selecionados
		{
			window.alert("Preencha o tipo de negocio!");
			document.radio.focus();
			return false;
		}
		return true;		
	}
	</script>
	<style type="text/css">
		#centraliza{
		width:75%;
		margin:0 auto;
		}
	</style>
	<head>
		<title>P&aacute;gina inicial-Sistema Mercadorias</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Cadastro de mercadorias.">
		<meta name="keywords" content="Mercadorias, Cadastro">
		<meta name="author" content="Bruno V. Cavalcante">
	</head>

	<body>
		<!-- BARRA DE NAVEGAÇÃO -->
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Sistema Mercadorias</a> <!-- Titulo -->
				</div>
				<ul class="nav navbar-nav"><!-- Itens -->
					<li class="active"><a href="index.php">In&iacute;cio-Cadastros</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown">Consultas
						<span class="caret"></span></a>
						<ul class="dropdown-menu">				
							<li><a href="operacoes.php?op=Listar Todos" name="consulta" value="Listar">Listar todos os registros</a></li>
							<li><a href="operacoes.php?op=Mais Vendidos" name="consulta" value ="Mais Vendidos">Listar os mais Vendidos</a></li>
							<li><a href="operacoes.php?op=Mais Comprados" name="consulta" value="Mais Comprados">Listar os mais Comprados</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
				
		<!--  cadastrar ação mercadoria -->
		<div class="container">		<!-- centraliza -->
			<div class="panel-group">			<!-- painel -->
				<div class="panel panel-primary"> <!--  estilo painel -->
					<div class="panel-heading">
						<h3 align="center">Cadastro de movimenta&ccedil;&atilde;o de mercadoria</h3><!-- titulo -->
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" method="post"name="cadastro" action="Cadastro.php">		
							<div class="form-group">
								<label class="control-label col-sm-2" for="nome">Nome mercadoria:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nome" placeholder="Nome mercadoria">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="qtd" >Quantidade:</label>
								<div class="col-sm-10">
									<input type="number" min="1" max="9999999" class="form-control" id="qtd" placeholder="Quantidade">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="preco">Pre&ccedil;o (R$):</label>
								<div class="col-sm-10">
									<input type="value" class="form-control" id="preco" placeholder="Pre&ccedil;o (Obs:Utilize ponto (.) e n&atilde;o a v&iacute;rgula.)">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-sm-2" for="tipo">Tipo mercadoria:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="tipo" placeholder="Tipo mercadoria">
								</div>
							</div>
							<div class="form-group">
							<form name="radio">
								<label class="control-label col-sm-2" for="negocio">Selecione tipo de neg&oacute;cio:</label><br>
				  				<label><input type="radio" name="opradio" id="compra">Compra</label>
				  				<label><input type="radio" name="opradio" id="venda">Venda</label>
				  			</form>
							</div>
							<div class="form-group" align="right">			
								<div class="col-sm-offset-2 col-sm-10">
									<button type="button" class="btn btn-success" onClick="cadastrar()">Cadastrar</button>
								</div>
							</div>
						</form>
					</div>	<!-- painel body -->				
				</div> <!-- painel estilo -->	
			</div>	<!-- painel grupo -->	
		</div>	<!-- container -->							
	</body>
</html>
