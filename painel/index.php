<?php
ob_start();
	include('../config.php');
 
	if(Painel::logado() == false){
		include('login.php');
	}
    else{
		if($_SESSION['tipo'] == 2){
			include('main_antigo.php');
			
		}
		else{
    		include('main.php');
		}
           //redirecionando para pagina conforme o tipo do usuário
			    /*
			    }*/
		
    }
 
ob_end_flush();

?>