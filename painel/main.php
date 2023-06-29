<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Certificados Área Do Cliente | ER Analítica</title>

	<meta charset="utf-8">
	<meta name="viewport" content= "width=device-width, initial-scale=1.0">
	<meta name="description" content="Consulte seus certificados emitidos e os padrões utilizados na sua calibração através da área do cliente.">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/all.css" > 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/default/zebra_datepicker.min.css">
	<link href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="icon" href="../Img/logo3.png" type="image/x-icon" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SGEXYHZ2C9"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-SGEXYHZ2C9');
    </script>
    <style>.cookieConsentContainer{z-index:999;width:350px;min-height:20px;box-sizing:border-box;padding:30px 30px 30px 30px;background:#232323;overflow:hidden;position:fixed;bottom:30px;right:30px;display:none}.cookieConsentContainer .cookieTitle a{font-family:OpenSans,arial,sans-serif;color:#fff;font-size:22px;line-height:20px;display:block}.cookieConsentContainer .cookieDesc p{margin:0;padding:0;font-family:OpenSans,arial,sans-serif;color:#fff;font-size:13px;line-height:20px;display:block;margin-top:10px}.cookieConsentContainer .cookieDesc a{font-family:OpenSans,arial,sans-serif;color:#fff;text-decoration:underline}.cookieConsentContainer .cookieButton a{display:inline-block;font-family:OpenSans,arial,sans-serif;color:#fff;font-size:14px;font-weight:700;margin-top:14px;background:#000;box-sizing:border-box;padding:15px 24px;text-align:center;transition:background .3s}.cookieConsentContainer .cookieButton a:hover{cursor:pointer;background:#3e9b67}@media (max-width:980px){.cookieConsentContainer{bottom:0!important;left:0!important;width:100%!important}}</style>
</head>

<body>
 
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N49WCPC"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    
	<base base="<?php echo INCLUDE_PATH_PAINEL; ?>"/>
	<!--Início menu-->
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid" >
		<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent" style="font-size: 13px;">
			<ul class="navbar-nav mx-auto mb-2 mb-lg-0">
				
				<li class="nav-item mx-3">
				<a class="nav-link active" aria-current="page" href="#">HOME</a>
				</li>
				<li class="nav-item mx-3">
				<a class="nav-link active" aria-current="page" href="#">SERVIÇOS</a>
				</li>
				<li class="nav-item mx-3">
				<a class="nav-link active" aria-current="page" href="#">BLOG</a>
				</li>
				<li class="nav-item mx-3">
				<a class="nav-link active" aria-current="page" href="#">SUPORTE</a>
				</li>
				<li class="nav-item mx-3">
				<a class="nav-link active" aria-current="page" href="#">FALE CONOSCO</a>
				</li>
				<li class="nav-item dropdown mx-3">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Nossos serviços
				</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">Action</a></li>
					<li><a class="dropdown-item" href="#">Another action</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" href="#">Something else here</a></li>
				</ul>
				</li>
				
			</ul>
			<a class="navbar-brand" href="#">Navbar</a>
			</div>
			
			
		</div>
	</nav>
	<!--Final menu-->
	


	<div class="content">
		<?php Painel::carregarPagina();?>

	</div><!--content-->
	
	<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/jquery.maskMoney.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/jquery.mask.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/jquery.ajaxform.js"></script>
	<script src="<?php echo INCLUDE_PATH?>js/constants.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/helperMask.js"></script>
 	<script defer>
		$(document).ready(function() {
		    $('#pasta').select2();
		    $('#pasta2').select2();
		    $('#pasta3').select2();
		    $('#pasta4').select2();
		 
		});
		var container = document.getElementById("container");
		var button = document.getElementById("btn");

		button.addEventListener("click", function(){
			

			if(container.style.display === "none"){
				container.style.display = "block";
			} else{
				container.style.display = "none";
			}
		});



	
	</script>
    <script>var purecookieTitle="Cookies.",purecookieDesc="Utilizamos cookies para oferecer melhor experiência, melhorar o desempenho, analisar como você interage em nosso site e personalizar conteúdo.",purecookieLink='<a href="https://eranalitica.com.br/politica-de-privacidade/" target="_blank">Política de privacidade</a>',purecookieButton="Aceitar";function pureFadeIn(e,o){var i=document.getElementById(e);i.style.opacity=0,i.style.display=o||"block",function e(){var o=parseFloat(i.style.opacity);(o+=.02)>1||(i.style.opacity=o,requestAnimationFrame(e))}()}function pureFadeOut(e){var o=document.getElementById(e);o.style.opacity=1,function e(){(o.style.opacity-=.02)<0?o.style.display="none":requestAnimationFrame(e)}()}function setCookie(e,o,i){var t="";if(i){var n=new Date;n.setTime(n.getTime()+24*i*60*60*1e3),t="; expires="+n.toUTCString()}document.cookie=e+"="+(o||"")+t+"; path=/"}function getCookie(e){for(var o=e+"=",i=document.cookie.split(";"),t=0;t<i.length;t++){for(var n=i[t];" "==n.charAt(0);)n=n.substring(1,n.length);if(0==n.indexOf(o))return n.substring(o.length,n.length)}return null}function eraseCookie(e){document.cookie=e+"=; Max-Age=-99999999;"}function cookieConsent(){getCookie("purecookieDismiss")||(document.body.innerHTML+='<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>'+purecookieTitle+'</a></div><div class="cookieDesc"><p>'+purecookieDesc+" "+purecookieLink+'</p></div><div class="cookieButton"><a onClick="purecookieDismiss();">'+purecookieButton+"</a></div></div>",pureFadeIn("cookieConsentContainer"))}function purecookieDismiss(){setCookie("purecookieDismiss","1",7),pureFadeOut("cookieConsentContainer")}window.onload=function(){cookieConsent()};</script>
</body>

</html>