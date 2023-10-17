<!--Final menu-->
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
	<div id="botao-orcamento" class="d-flex justify-content-center align-items-center" style="height: 40vh;">
		<a target="_blank" href="https://eranalitica.com.br/contato/" class="btn btn-primary" style="width: 50%; background-color:#EFAF11; font-weight: bold; font-family: 'Montserrat'; font-size:15px; border-color:#EFAF11;">Entrar em contato/Solicitar orçamento</a>
	</div>


	<div id="pagina-inicial" class="row justify-content-center align-items-center" style="margin-left: 60px; margin-right: 60px; position: relative; top: -130px;">
	<div class="texto-inicial">
		<p id="fs1" class="fs-1">Escolha abaixo o que</p>
		<p id="fs1" class="fs-1">você necessita consultar</p>
		<br/>
		<p class="text-start">Na Área do Cliente você encontra</p>
		<p class="text-start">seus certificados e padrões de maneira rápida e prática</p>
	</div>



    <div id="img-calibracao" class="col-sm-4 mb-3" style="background-image: url('../Img/folder.png'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 400px;">
        <div class="card-body2">
            <h5 id="texto-pasta" class="card-title"><b>Veja aqui seus</b></h5>
            <h5 id="texto-pasta"><b>certificados.</b></h5>
			<br/>
            <p id="sub-texto-pasta" class="card-text" style="font-size:16px;">Acesse seus certificados</p>
            <p id="sub-texto-pasta" class="card-text" style="font-size:16px;">em qualquer momento</p>
            <p id="sub-texto-pasta" class="card-text" style="font-size:16px;">de qualquer lugar</p>
			<br/>
			<p><a id="acesso-documentos" <?php selecionadoMenu('arquivo-cliente');?> href="<?php echo INCLUDE_PATH_PAINEL?>arquivo-cliente" class="btn btn-primary" style="font-size:14px; background-color:#EFAF11; font-weight: bold; font-family: 'Montserrat'; border-color:#EFAF11;">Baixar certificados</a></p>
        </div>
    </div>

    <div id="img-padrao" class="col-sm-4 mb-3" style="background-image: url('../Img/peso.png'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 400px;">
        <div class="card-body2">
		<h5 id="texto-pasta" class="card-title"><b>Veja nossos</b></h5>
            <h5 id="texto-pasta"><b>padrões.</b></h5>
			<br/>
            <p id="sub-texto-pasta" class="card-text" style="font-size:16px;">Precisa verificar os</p>
            <p id="sub-texto-pasta" class="card-text" style="font-size:16px;">padrões utilizados na</p>
            <p id="sub-texto-pasta" class="card-text" style="font-size:16px;">sua calibração?</p>
			<br/>
			<p><a id="acesso-documentos" <?php selecionadoMenu('arquivos-padroes');?> href="<?php echo INCLUDE_PATH_PAINEL?>arquivos-padroes" class="btn btn-primary" style="font-size:14px; background-color:#EFAF11; font-weight: bold; font-family: 'Montserrat'; border-color:#EFAF11;">Acessar padrões</a></p>
        </div>
    </div>
</div>
