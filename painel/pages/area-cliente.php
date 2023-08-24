<?php
	verificaPermissaoMenuC(1);
	
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
	

	

?>


<!--
<div class="box-content">

	


Criação do Modal-->

<!-- Botão para abrir o modal -->


<!-- O Modal
<div class="modal" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">

		 Cabeçalho do Modal
			<div class="modal-header">
				<h4 class="modal-title">Estamos atualizando a área do cliente.</h4>
			</div>

			Corpo do Modal 
			<div class="modal-body">
				<p>Nosso site está recebendo atualizações em tempo real! Estamos trabalhando para tornar sua experiência ainda melhor.</p>
				<img src='../Img/construcao.png'/>
			</div>
			 Rodapé do Modal
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
			

		</div>
	</div>
</div>

Final do Modal-->

<!--
<div class="nome-user">
<h2>Olá, <?php echo $_SESSION['Nome']; ?></h2>
</div>
<br/>

<div class="busca">
		<h4><i class="fa fa-search"></i> Realizar uma busca</h4>
		<form method="post">
			<input placeholder ="Procure pelo nome da pasta..." type = "text" name = "busca">
			<input type="submit" name="acao" value="Buscar">	
		</form>
</div>busca-->
<?php
	
	$empresa = $_SESSION['Empresa'];
	$explode = explode(', ',$empresa);
	

	foreach ($explode as $value) {


		$query = "SELECT * FROM tb_pastas WHERE '$value' = `nome`";
		
		
		if(isset($_POST['acao'])){
			$busca = $_POST['busca'];
			$query = " SELECT * FROM tb_pastas WHERE '$value' = `nome`";
			$query .= " and '$value' like '%$busca%'";
		
		}
			$sql = MySql::conectar()->prepare($query);
			$sql->execute();
			$pastas = $sql->fetchAll();

			

			
	?>

		<?php	
			foreach ($pastas as $key => $value) {
			//$nomePasta = Painel::select('tb_pastas','id=?',array($value['pasta_id']))['nome'];
							
		?>	
		<!--
				<div class="pastasedit">
				<a class="btn edit" style="background: white; font-size: 50px;" href="<?php echo INCLUDE_PATH_PAINEL ?>pastas?id=<?php echo $value['id'];?>"><i class="fas fa-folder"></i></a> <?php echo $value['nome'];?>
				<hr>
				</div>

		<?php }}?>

<?php
		
		

		//$query.="WHERE `pasta_id` == $empresa";
			
	
		
			
?>			
			
			<?php
				if(isset($_POST['acao'])){
			?>
			<div class ="wraper-table" >
				<table>
					<br/>
					<tr>
						<td>Arquivo</td>
						<td>Descrição</td>
						<td></td>
					</tr>
					<div class="voltar">
					<a <?php selecionadoMenu('area-cliente');?> href="<?php echo INCLUDE_PATH_PAINEL?>area-cliente"><i class="fas fa-arrow-left"></i> Voltar</a>
					</div>
			<?php }?>
					<?php

					if(isset($_POST['acao'])){
						foreach ($explode as $key => $value) {
						
						
						
						$busca = $_POST['busca'];
						
						$query2 = " SELECT * FROM tb_arquivos WHERE '$value' = `pasta`";
						$query2 .= " and arquivo like '%$busca%'";

						$query3 = " SELECT * FROM tb_padrao WHERE '$value' = `pasta`";
						$query3 .= " and arquivo like '%$busca%'";

						$query4 = " SELECT * FROM tb_equipamentos WHERE '$value' = `pasta`";
						$query4 .= " and arquivo like '%$busca%'";

						$query5 = " SELECT * FROM tb_calibracao WHERE '$value' = `pasta`";
						$query5 .= " and arquivo like '%$busca%'";
						
						$sql = MySql::conectar()->prepare($query2);
						$sql->execute();
						$arquivos = $sql->fetchAll();

						$sql = MySql::conectar()->prepare($query3);
						$sql->execute();
						$arquivos3 = $sql->fetchAll();

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
						<td><?php echo $value2 ['arquivo']; ?></td>
						<td><?php echo str_replace(array("De ", "Do ", "Dos ", "Da ", "Das "),
    			 array("de ", "do ", "dos ", "da ", "das "), ucwords(mb_strtolower($value2 ['descricao']))); ?></td>
						<td><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value2['arquivo']; ?>">Abrir</a></td>


					</tr>

					<?php }?>

					<?php
						foreach ($arquivos3 as $key2 => $value2) {

					?>
					<tr>
						<td><?php echo $value2 ['arquivo']; ?></td>
						<td><?php echo str_replace(array("De ", "Do ", "Dos ", "Da ", "Das "),
    			 array("de ", "do ", "dos ", "da ", "das "), ucwords(mb_strtolower($value2 ['descricao']))); ?></td>
						<td><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value2['arquivo']; ?>">Abrir</a></td>


					</tr>

					<?php }?>

					<?php
						foreach ($arquivos4 as $key2 => $value2) {

					?>
					<tr>
						<td><?php echo $value2 ['arquivo']; ?></td>
						<td><?php echo str_replace(array("De ", "Do ", "Dos ", "Da ", "Das "),
    			 array("de ", "do ", "dos ", "da ", "das "), ucwords(mb_strtolower($value2 ['descricao']))); ?></td>
						<td><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value2['arquivo']; ?>">Abrir</a></td>


					</tr>

					<?php }?>

					<?php
						foreach ($arquivos5 as $key2 => $value2) {

					?>
					<tr>
						<td><?php echo $value2 ['arquivo']; ?></td>
						<td><?php echo str_replace(array("De ", "Do ", "Dos ", "Da ", "Das "),
    			 array("de ", "do ", "dos ", "da ", "das "), ucwords(mb_strtolower($value2 ['descricao']))); ?></td>
						<td><a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value2['arquivo']; ?>">Abrir</a></td>


					</tr>

					<?php }?>





				<?php }}?>
				</table>

			</div>
		</div>
Incluindo o JavaScript do Bootstrap -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!--
<script>
	$('#myModal').modal('show');
</script>-->