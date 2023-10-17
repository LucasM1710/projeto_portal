<?php
	verificaPermissaoMenuC(1);
	
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}

	
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

?>

<!--Saudacao area do cliente-->
<div class="saudacao">
	<h4 id="nome-user" class="text-md-end">Bem-vindo(a), <?php echo $_SESSION['Nome']; ?></h4>
	<!--<h4 class="text-md-end">ER Analítica</h4>-->
	</div>

	<div class="card" style="width: calc(100% - 200px); position: relative; top: 70px; left: 50%; transform: translateX(-50%); padding: 3%; background-image: url('../Img/body_calibracao.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="card-body">
        <h2 class="card-title" style="font-weight: bold; font-family: 'Montserrat'; font-size:35px; color:#20446C;">Área do cliente</h2>
        <p class="card-text" style="font-weight: regular; font-family: 'Montserrat'; font-size:17px; color:#20446C;">Precisa atualizar sua calibração?</p>
		<p class="card-text" style="font-weight: regular; font-family: 'Montserrat'; font-size:17px; color:#20446C;">Solicite seu orçamento!</p>
        <a id = "botao-saiba-mais" target="_blank" href="https://eranalitica.com.br/?utm_source=area-do-cliente&utm_medium=area-do-cliente&utm_campaign=area-do-cliente&utm_id=saiba-mais" class="btn btn-primary" style="background-color:#EFAF11; font-weight: bold; font-family: 'Montserrat'; font-size:15px; border-color:#EFAF11;">Saber mais</a>
    </div>
	
	</div>
</div>
<br/>
<br/>
<!--------------------------------------------------->

<div class ="wraper-table" style="width: calc(100% - 250px); position: relative; left: 50%; transform: translateX(-50%); padding: 10px 8px;">
				
				<table>
					<br/>
						
						<tr >
		
							<td style="font-weight: 600; font-family: 'Montserrat'; padding:2%; color: #20446c; width: 500px;">NOME DA PASTA</td>
							<td><div class="input-group mb-0.5">
							<form method="post">
							<div style="display: inline-flex;">
								<input name="busca" id="campo-pesquisa" type="text" class="form-control" placeholder="Pesquisar Certificados/Pasta" aria-label="Pesquisar Certificados/Pasta" aria-describedby="button-addon2" style="background-color: #20446c; opacity: 0.6; width:500px;">
								<button name="acao" style="background-color: #daecf5; opacity: 0.5;" class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
							</div>
							</form>
							</div></td>
						</tr>




					
<!-----Tabela de pastas relacionadas com consulta----->
<?php

		$empresa = $_SESSION['Empresa'];
		$explode = explode(', ', $empresa);

		// Inicialize uma parte da consulta SQL para a cláusula WHERE
		$whereClause = " WHERE (";

		foreach ($explode as $value) {
			// Adicione cada valor à cláusula WHERE com a condição NOT LIKE e OR para unir condições
			$whereClause .= "(nome NOT LIKE 'Padrões%' AND nome = '$value') OR ";
		
		}
		// Remova o último " OR " da cláusula WHERE
		$whereClause = rtrim($whereClause, " OR ");
		$whereClause .= ")";
		$itensPorPagina = 5; 
		
		// Montar a consulta completa
		$query = "SELECT * FROM tb_pastas" . $whereClause;
		
		// Verificar se a ação de consulta está definida
		if (isset($_POST['acao'])) {
			$busca = $_POST['busca'];
			// Incluir a condição adicional para a consulta quando a ação está definida
			$query .= " AND nome LIKE '%$busca%'";
		}
		
		// Preparar e executar a consulta SQL
		$sql = MySql::conectar()->prepare($query);
		$sql->execute();
		$pastas = $sql->fetchAll();

		// Defina o número de itens por página e obtenha o número total de resultados
		// Defina o número desejado de itens por página
		$totalResultados = count($pastas);

		// Calcule o número total de páginas
		$totalPaginas = ceil($totalResultados / $itensPorPagina);

		// Obtenha o número da página atual a partir da consulta GET
		
		// Define o número de páginas a serem exibidas antes e depois da página atual
		$paginasAdjacentes = 1;

		if(!isset($_POST['acao'])){
					
			if(isset($_GET['pagina'])){
				$pagina = (int)$_GET['pagina'];
				if($pagina > $totalPaginas){
				$pagina = 1;
			}
				
				// Calcule o índice de início com base na página atual
				$indiceInicio = ($paginaAtual - 1) * $itensPorPagina;
				// Atualize a consulta SQL para buscar apenas os itens da página atual
				$query .= "  LIMIT $indiceInicio, $itensPorPagina";
				/*Eu poderia utilizar o ORDER BY order_id ASC LIMIT para ordernar de forma padrão ao painel*/
			}else{
				$pagina = 1;
				$query.=" ORDER BY id ASC LIMIT 0, $itensPorPagina";
			}
		}else{
			$query.=" ORDER BY id ASC";
		}

		

		// Preparar e executar a consulta SQL atualizada
		$sql = MySql::conectar()->prepare($query);
		$sql->execute();
		$pastas = $sql->fetchAll();
								
?>



				<?php
			
					foreach ($pastas as $key => $value) {

				
				
				?>
				
				<tr>
					<td>
					<div class="pastasedit">
                    <a class="btn edit" style="background: white; font-size: 50px;" href="<?php echo INCLUDE_PATH_PAINEL ?>pastas?id=<?php echo $value['id']; ?>"><i class="fas fa-folder"></i></a> <?php echo $value['nome']; ?>
                </div>
            </td>
        </tr>
				<?php }?>
		</table>
		

	<!-- Seu código HTML existente para exibir os resultados -->













	<!-- Página de navegação -->
	<nav id="pagination" aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			<!-- Link "Previous" para voltar 3 páginas -->
			<li class="page-item">
				<a class="page-link" href="?pagina=<?php echo max($paginaAtual - 3, 1); ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php
			
			// Exibe a página 1
			if ($paginaAtual > $paginasAdjacentes + 1) {
				echo '<li class="page-item"><a class="page-link" href="'.INCLUDE_PATH_PAINEL.'arquivo-cliente?pagina='.$i.'">'.$i.'</a></li>';
				echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
			}

			// Exibe páginas adjacentes à atual
			for ($i = max($paginaAtual - $paginasAdjacentes, 1); $i <= min($paginaAtual + $paginasAdjacentes, $totalPaginas); $i++) {
				echo '<li class="page-item ' . ($paginaAtual == $i ? 'active' : '') . '"><a class="page-link" href="'.INCLUDE_PATH_PAINEL.'arquivo-cliente?pagina=' . $i . '">' . $i . '</a></li>';
			}

			// Exibe a última página
			if ($paginaAtual < $totalPaginas - $paginasAdjacentes) {
				echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
				echo '<li class="page-item"><a class="page-link" href="'.INCLUDE_PATH_PAINEL.'arquivo-cliente?pagina=' . $totalPaginas . '">' . $totalPaginas . '</a></li>';
			}
			?>

			<!-- Link "Next" para avançar 3 páginas -->
			<li class="page-item">
				<a class="page-link" href="?pagina=<?php echo min($paginaAtual + 3, $totalPaginas); ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>

		
		<a href="<?php echo INCLUDE_PATH_PAINEL?>area-cliente"><i class="fas fa-arrow-left"></i> Voltar</a>
	</div>
<!----------------------------------->




		


			<?php
				if(isset($_POST['acao'])){
				/*Buscar arquivos na página das pastas de calibração. Vamos manter dessa forma? (Analisar código)*/
			?>
			<div class ="wraper-table" style="width: calc(100% - 250px); position: relative; left: 50%; transform: translateX(-50%); padding: 10px 8px;">
			<table>
			<br/>
							
				<tr >
			
					<td style="font-weight: 600; font-family: 'Montserrat'; padding:2%; color: #20446c;">ARQUIVO</td>
					<td style="font-weight: 600; font-family: 'Montserrat'; padding:2%; color: #20446c;">DESCRIÇÃO</td>
					<td style="font-weight: 600; font-family: 'Montserrat'; padding:2%; color: #20446c;">DATA DE UPLOAD</td>
					</tr>
			<?php }?>

					<?php

					if(isset($_POST['acao'])){
						foreach ($explode as $key => $value) {
						
						
						
						$busca = $_POST['busca'];
						
						$query2 = " SELECT * FROM tb_arquivos WHERE '$value' = `pasta`";
						$query2 .= " and arquivo like '%$busca%'";

						/*$query3 = " SELECT * FROM tb_padrao WHERE '$value' = `pasta`";
						$query3 .= " and arquivo like '%$busca%'";*/

						$query4 = " SELECT * FROM tb_equipamentos WHERE '$value' = `pasta`";
						$query4 .= " and arquivo like '%$busca%'";

						$query5 = " SELECT * FROM tb_calibracao WHERE '$value' = `pasta`";
						$query5 .= " and arquivo like '%$busca%'";
						
						$sql = MySql::conectar()->prepare($query2);
						$sql->execute();
						$arquivos = $sql->fetchAll();

						/*$sql = MySql::conectar()->prepare($query3);
						$sql->execute();
						$arquivos3 = $sql->fetchAll();*/

						$sql = MySql::conectar()->prepare($query4);
						$sql->execute();
						$arquivos4 = $sql->fetchAll();

						$sql = MySql::conectar()->prepare($query5);
						$sql->execute();
						$arquivos5 = $sql->fetchAll();
						//$nomePasta = Painel::select('tb_pastas','id=?',array($value['pasta_id']))['nome'];
						
						
				
					?>
					<?php
						foreach ($arquivos as $key2 => $value2) {

					?>
					<tr>
					<td title="<?php echo $value2['titulo'];?>"><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value2['arquivo']; ?>"><?php if(strlen($value2['titulo']) > 40){
						echo mb_substr($value2['titulo'], 0,40)."...";	
					}else{
						echo $value2['titulo'];
					}?></a></td>
						<td><?php echo str_replace(array("De ", "Do ", "Dos ", "Da ", "Das "),
    			 array("de ", "do ", "dos ", "da ", "das "), ucwords(mb_strtolower($value2 ['descricao']))); ?></td>
						<td><?php echo $value2 ['data']; ?></td>


					</tr>

					<?php }?>

					<?php
						foreach ($arquivos3 as $key2 => $value2) {

					?>
					<tr>
						<td title="<?php echo $value2['titulo'];?>"><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value2['arquivo']; ?>"><?php if(strlen($value2['titulo']) > 40){
							echo mb_substr($value2['titulo'], 0,40)."...";	
						}else{
							echo $value2['titulo'];
						}?></a></td>
						<td><?php echo str_replace(array("De ", "Do ", "Dos ", "Da ", "Das "),
    			 array("de ", "do ", "dos ", "da ", "das "), ucwords(mb_strtolower($value2 ['descricao']))); ?></td>
						<td><?php echo $value2 ['data']; ?></td>


					</tr>

					<?php }?>

					<?php
						foreach ($arquivos4 as $key2 => $value2) {

					?>
					<tr>
						<td title="<?php echo $value2['titulo'];?>"><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value2['arquivo']; ?>"><?php if(strlen($value2['titulo']) > 40){
							echo mb_substr($value2['titulo'], 0,40)."...";	
						}else{
							echo $value2['titulo'];
						}?></a></td>
						<td><?php echo str_replace(array("De ", "Do ", "Dos ", "Da ", "Das "),
    			 array("de ", "do ", "dos ", "da ", "das "), ucwords(mb_strtolower($value2 ['descricao']))); ?></td>
						<td><?php echo $value2 ['data']; ?></td>


					</tr>

					<?php }?>

					<?php
						foreach ($arquivos5 as $key2 => $value2) {

					?>
					<tr>
						<td title="<?php echo $value2['titulo'];?>"><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value2['arquivo']; ?>"><?php if(strlen($value2['titulo']) > 40){
							echo mb_substr($value2['titulo'], 0,40)."...";	
						}else{
							echo $value2['titulo'];
						}?></a></td>
						<td><?php echo str_replace(array("De ", "Do ", "Dos ", "Da ", "Das "),
    			 array("de ", "do ", "dos ", "da ", "das "), ucwords(mb_strtolower($value2 ['descricao']))); ?></td>
						<td><?php echo $value2 ['data']; ?></td>


					</tr>

					<?php }?>
					<?php
						if(isset($_POST['acao'])){
					
					
					?>
					<style>
						.card{
							display:none;
						}
						#pagination{
							display:none;
						}
					</style>
					<?php  }?>




				<?php }}?>
				</table>
				
			</div>
		</div>

<script>
	$('#myModal').modal('show');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>