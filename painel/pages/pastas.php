<?php
	verificaPermissaoMenuC(1);
	

	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$arquivo = Painel::select('tb_pastas','id = ?',array($id));

	}else{
		Painel::alert('erro','Você precisa de um parâmeto ID.');
		die();
	}
	

	

	/*$query = "SELECT * FROM tb_arquivos WHERE `pasta_id` = '$value' && '$value'!= 'Padroes'";*/
	


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
<!----------------------------------->


<div class ="wraper-table" style="width: calc(100% - 250px); position: relative; left: 50%; transform: translateX(-50%); padding: 10px 8px;">
				
	<table>
		<br/>
						
			<tr >
		
				<td style="font-weight: 600; font-family: 'Montserrat'; padding:2%; color: #20446c;">ARQUIVO</td>
				<td style="font-weight: 600; font-family: 'Montserrat'; padding:2%; color: #20446c;">DESCRIÇÃO</td>
				<td style="font-weight: 600; font-family: 'Montserrat'; padding:2%; color: #20446c;">DATA DE UPLOAD</td>
				<td><div class="input-group mb-0.5">
				<form method="post" style="text-align: center;">
				<div style="display: inline-flex;">
					<input name="busca" id="campo-pesquisa" type="text" class="form-control" placeholder="Pesquisar padrões" aria-label="Pesquisar padrões" aria-describedby="button-addon2" style="background-color: #20446c; opacity: 0.6;">
					<button name="acao" style="background-color: #daecf5; opacity: 0.5;" class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
				</div>
				</form>
				</div></td>
			</tr>

	<?php
		$empresa = $arquivo['nome'];
		$query = " SELECT * FROM tb_arquivos WHERE '$empresa' = `pasta`";
		$query2 = " SELECT * FROM tb_padrao WHERE '$empresa' = `pasta`";
		$query3 = " SELECT * FROM tb_equipamentos WHERE '$empresa' = `pasta`";
		$query4 = " SELECT * FROM tb_calibracao WHERE '$empresa' = `pasta`";

		
		if(isset($_POST['acao'])){


			$busca = $_POST['busca'];
			$query = " SELECT * FROM tb_arquivos WHERE '$empresa' = `pasta`";
			$query .= " and arquivo like '%$busca%'";
			$query2 = " SELECT * FROM tb_padrao WHERE '$empresa' = `pasta`";
			$query2 .= " and arquivo like '%$busca%'";
			$query3 = " SELECT * FROM tb_equipamentos WHERE '$empresa' = `pasta`";
			$query3 .= " and arquivo like '%$busca%'";
			$query4 = " SELECT * FROM tb_calibracao WHERE '$empresa' = `pasta`";
			$query4 .= " and arquivo like '%$busca%'";
			
		
		}
		//$query.="WHERE `pasta_id` == $empresa";
		
	
		
		$sql = MySql::conectar()->prepare($query);
		$sql->execute();
		$arquivos = $sql->fetchAll();

		$sql = MySql::conectar()->prepare($query2);
		$sql->execute();
		$arquivos2 = $sql->fetchAll();

		$sql = MySql::conectar()->prepare($query3);
		$sql->execute();
		$arquivos3 = $sql->fetchAll();

		$sql = MySql::conectar()->prepare($query4);
		$sql->execute();
		$arquivos4 = $sql->fetchAll();

		$soma = count($arquivos) + count($arquivos2) + count($arquivos3) + count($arquivos4);
			
		
				

		if(isset($_POST['acao'])){
			echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.$soma.' resultado(s)</b></p></div>';
		}


	?>
	

		<?php
			foreach ($arquivos as $key => $value) {
			//$nomePasta = Painel::select('tb_pastas','id=?',array($value['pasta_id']))['nome'];
			

					
				
				
					
		?>
		
		<tr>
			<td title="<?php echo $value['titulo'];?>"><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['arquivo']; ?>"><?php if(strlen($value['titulo']) > 40){
					echo mb_substr($value['titulo'], 0,40)."...";	
				}else{
					echo $value['titulo'];
				}?></a></td>
			<td><?php echo $value ['descricao']; ?></td>
			<td><?php echo $value ['data']; ?></td>

		</tr>

		<?php }?>



		<?php
			foreach ($arquivos2 as $key => $value) {
			//$nomePasta = Painel::select('tb_pastas','id=?',array($value['pasta_id']))['nome'];
			

					
				
				
					
		?>
		
		<tr>
		<td title="<?php echo $value['titulo'];?>"><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['arquivo']; ?>"><?php if(strlen($value['titulo']) > 40){
					echo mb_substr($value['titulo'], 0,40)."...";	
				}else{
					echo $value['titulo'];
				}?></a></td>
			<td><?php echo $value ['descricao']; ?></td>
			<td><?php echo $value ['data']; ?></td>
		


		</tr>

		<?php }?>



		<?php
			foreach ($arquivos3 as $key => $value) {
			//$nomePasta = Painel::select('tb_pastas','id=?',array($value['pasta_id']))['nome'];
			

					
				
				
					
		?>
		
		<tr>
			<td title="<?php echo $value['titulo'];?>"><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['arquivo']; ?>"><?php if(strlen($value['titulo']) > 40){
					echo mb_substr($value['titulo'], 0,40)."...";	
				}else{
					echo $value['titulo'];
				}?></a></td>
			<td><?php echo $value ['descricao']; ?></td>
			<td><?php echo $value ['data']; ?></td>
			


		</tr>

		<?php }?>



		<?php
			foreach ($arquivos4 as $key => $value) {
			//$nomePasta = Painel::select('tb_pastas','id=?',array($value['pasta_id']))['nome'];
			

					
				
				
					
		?>
		
		<tr>
			<td title="<?php echo $value['titulo'];?>"><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['arquivo']; ?>"><?php if(strlen($value['titulo']) > 40){
					echo mb_substr($value['titulo'], 0,40)."...";	
				}else{
					echo $value['titulo'];
				}?></a></td>
			<td><?php echo $value ['descricao']; ?></td>
			<td><?php echo $value ['data']; ?></td>
	


		</tr>

		<?php }?>
	</table>
		<!--pagina de navegação-->
		<nav id="pagination" aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				<li class="page-item">
				<a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
				<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
				</li>
			</ul>
		</nav>
				
		<a href="javascript:void(0)" onClick="history.go(-1); return false;"><i class="fas fa-arrow-left"></i> Voltar</a>
	</div>		
<!----------------------------------->
</div>
</div>