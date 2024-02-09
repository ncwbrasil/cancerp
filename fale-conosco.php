<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="MogiComp Soluções Web">
<meta name="copyright" content="MogiComp Soluções Web">
<meta name="robots" content="index, follow">
<title>IBCT - Instituto Brasileiro de Cancerologia Torácica - Fale Conosco</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-13079807-3', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<div id='janela' class='janela' style='display:none;'> </div>

<?php
	$pagina = $_GET['pagina'];
	include("mod_topo/topo.php");
	include("banner.php"); 
	include("mod_includes/php/funcoes-jquery.php");
?>

<!--INICIO DO CONTEUDO-->
<div class="wrapper" id="contato">
	<div class="col-01">
		<p class="titulo">Fale Conosco </p>
        
        <span class="elemento">Telefone:</span> (11) 3331-4281 | (11) 98585-6469<br />   
        <span class="elemento">E-mail:</span> cancerdepulmao@cancerdepulmao.com.br <br />
    	Rua. Dr. Martinico Prado, 26/125 - Higienópolis - SP - 01224-010 <br /><br />
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3657.7153279025406!2d-46.65147760000001!3d-23.5427391!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5838672ce82b%3A0x45ed74fa99946678!2sR.+Martinico+Prado%2C+26+-+Vila+Buarque%2C+S%C3%A3o+Paulo+-+SP%2C+01224-010!5e0!3m2!1spt-BR!2sbr!4v1410870382811" width="100%" height="400" frameborder="0" style="border:0"></iframe>
    </div>
	<div class="col-02">
    	 <p>Utilize esse formulário para enviar sua sugestão ou reclamação a respeito de nossos serviços.</p>
         <form name='form_contato' id='form_contato' enctype='multipart/form-data' method='post' action='fale-conosco.php?pagina=envia_contato'>
            <input type="text" name='nome' id='nome' placeholder='Nome'><br>
            <input type="text" name='email' id='email' placeholder='Email'><br>
            <input type="text" name='telefone' id='telefone' placeholder='Telefone'><br>
            <textarea name='mensagem' id='mensagem' placeholder='Digite sua mensagem'></textarea>
            <br><br>
            
            <center><input type='button' name='bt_contato' id='bt_contato' value=' Enviar '></center>
            <div id='erro'>&nbsp;</div>	
         </form>
    </div>
</div>
<!--FIM DO CONTEUDO-->

<?php include("mod_rodape/rodape.php"); ?>
</body>
</html>

<?php
if($pagina == 'envia_contato')
{
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$mensagem = $_POST['mensagem'];
	
	
	$agora = time();
	$data = getdate($agora);
	$dia_semana = $data[wday];
	$dia_mes = $data[mday];
	$mes = $data[mon];
	$ano = $data[year];
	switch ($dia_semana)
	{
		case 0:
			$dia_semana = "Domingo";
		break;
		case 1:
			$dia_semana = "Segunda-feira";
		break;
		case 2:
			$dia_semana = "Terça-feira";
		break;
		case 3:
			$dia_semana = "Quarta-feira";
		break;
		case 4:
			$dia_semana = "Quinta-feira";
		break;
		case 5:
			$dia_semana = "Sexta-feira";
		break;
		case 6:
			$dia_semana = "Sábado";
		break;
	}
	switch ($mes)
	{
		case 1:
			$mes = "Janeiro";
		break;
		case 2:
			$mes = "Fevereiro";
		break;
		case 3:
			$mes = "Março";
		break;
		case 4:
			$mes = "Abril";
		break;
		case 5:
			$mes = "Maio";
		break;
		case 6:
			$mes = "Junho";
		break;
		case 7:
			$mes = "Julho";
		break;
		case 8:
			$mes = "Agosto";
		break;
		case 9:
			$mes = "Setembro";
		break;
		case 10:
			$mes = "Outubro";
		break;
		case 11:
			$mes = "Novembro";
		break;
		case 12:
			$mes = "Dezembro";
		break;
	}
	$datap = $dia_semana.', '.$dia_mes.' de '.$mes.' de '.$ano;


	// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
	require("mod_includes/php/phpmailer/class.phpmailer.php");
	 
	// Inicia a classe PHPMailer
	$mail = new PHPMailer();
	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsSMTP();
	$mail->Host = "mail.cancerdepulmao.com.br"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
	$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	$mail->Username = 'autenticacao@cancerdepulmao.com.br'; // Usuário do servidor SMTP
	$mail->Password = 'info2012mogi'; // Senha do servidor SMTP
	
	 
	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->From = "$email"; // Seu e-mail
	$mail->Sender = "autenticacao@cancerdepulmao.com.br"; // Seu e-mail
	$mail->FromName = "$nome"; // Seu nome
	
	 
	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->AddAddress('cancerdepulmao@cancerdepulmao.com.br');
		
	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	
	$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
	 
	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "IBCT - Contato"; // Assunto da mensagem
	
	$mail->Body = "
<head>
	<style type='text/css'>
		.margem 		{ padding-top:20px; padding-bottom:20px; padding-left:20px;padding-right:20px;}
		a:link 			{}
		a:visited 		{}
		a:hover 		{ text-decoration: underline; color:#007daa;}
		a:active 		{ text-decoration: none; }
		.texto			{ font-family:'Calibri'; color:#666; font-size:14px; text-align:justify; font-weight:normal;}
		hr				{ border:none; border-top:1px solid #007daa;}
	</style>
</head>
<body>
	<table style='font-family:Calibri;' align='center' border='0' bordercolor='#007daa' width='100%' cellspacing='0' cellpadding='0'>
	<tr>
		<td align='left'>
			<font size='3' color='#007daa'><b>Mensagem enviada:</b></font> <span class='texto'>$datap</span> 
			<hr>
			<table class='texto'>
				<tr>
					<td align='right'>
						<b>Nome:</b>
					</td>
					<td align='left'>
						$nome
					</td>
				</tr>
				<tr>
					<td align='right'>
						<b>Email:</b>
					</td>
					<td align='left'>
						$email
					</td>
				</tr>
				<tr>
					<td align='right'>
						<b>Telefone:</b>
					</td>
					<td align='left'>
						$telefone
					</td>
				</tr>
				<tr>
					<td align='right'>
						<b>Mensagem:</b>
					</td>
					<td align='left' valign='top'>
						$mensagem
					</td>
				</tr>
			</table>
			<hr>
			<font size=1>Email enviado automaticamente pelo formulário de contato do site - IBCT - Instituto Brasileiro de Cancerologia Torácica</font>
		</td>
	</tr>
	</table>
</body>
";
/*$mail->AltBody = 'Este é o corpo da mensagem de teste, em Texto Plano! \r\n 
<IMG src="http://seudomínio.com.br/imagem.jpg" alt=":)"  class="wp-smiley"> ';*/
 
// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("/home/login/documento.pdf", "novo_nome.pdf");  // Insere um anexo
 
// Envia o e-mail
$enviado = $mail->Send();
 
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

// Exibe uma mensagem de resultado
	if ($enviado)
	{
		echo "
			<SCRIPT language='JavaScript'>
				abreMask(
				'<img src=imagens/ok.gif> <font color=#007daa><b>$nome</b></font>, sua mensagem foi enviada com sucesso, em breve responderemos.<br><br>'+
				'<input value=\' Ok \' type=\'button\'  class=\'but_mask\' onclick=javascript:window.location.href=\'fale-conosco.php\';>' );
			</SCRIPT>
		";
	}
	else
	{
		echo "
			<SCRIPT language='JavaScript'>
				abreMask(
				'<img src=imagens/x.gif> Erro ao enviar mensagem. <br>$mail->ErrorInfo.<br><br>'+
				'<input value=\' Ok \' type=\'button\'  class=\'but_mask\' onclick=window.history.back();>' );
			</SCRIPT>
		";
	}
}

?>
