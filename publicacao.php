<?php
require_once("mod_includes/php/ctracker.php");
include('mod_includes/php/connect.php');
function truncate( $string, $length, $truncateAfter = TRUE, $truncateString = '...' ) {
    if( strlen( $string ) <= $length ) {
        return $string;
    }
    $position = ( $truncateAfter == TRUE ? strrpos( substr( $string, 0, $length ), ' ' ) :
                                            strpos( substr( $string, $length ), ' ' ) + $length );
    return substr( $string, 0, $position ) . $truncateString;
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="MogiComp Soluções Web">
<meta name="copyright" content="MogiComp Soluções Web">
<meta name="robots" content="index, follow">
<meta NAME="description" CONTENT="O Instituto Brasileiro de Cancerologia Torácica foi fundado em 23/06/98 como uma sociedade civil sem fins lucrativos destinada à prevenção, diagnóstico, pesquisa e tratamento das neoplasias pulmonares e, após 12 anos de existência, pretende tornar-se uma organização da sociedade civil de Interesse Público.">
<meta NAME="keywords" CONTENT="câncer de pulmão, ibct, câncer, pulmão">

<title>IBCT - Instituto Brasileiro de Cancerologia Torácica</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
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
<?php include("mod_topo/topo.php"); ?>
<?php include("banner.php"); ?>
<div class="wrapper" id="publicacoes">
	<?php 
    $pub_id = $_GET['pub_id'];
    $sql = "SELECT * FROM publicacoes WHERE pub_id = $pub_id ";
    $query = mysql_query($sql,$conexao);
    $rows = mysql_num_rows($query);
    if($rows > 0 )
    {
        while($row = mysql_fetch_array($query))
        {
			$anexo = $row['pub_anexo'];
			$final = substr($anexo,(strlen($anexo)-4),strlen($anexo));
            echo "
            <div class='voltar'><input type='button' value='Voltar' onclick=javascript:window.history.back();></div>
            <div class='titulo_publicacao'>".$row['pub_titulo']."</div>
            <div class='data_publicacao'>publicado em: ".implode("/",array_reverse(explode("-",$row['pub_data'])))."</div><br>
            <div class='anexo'>";
			if(strpos($final,'pdf') !== false)
			{ 
				echo "Anexo: <a target='_blank' href='".$row['pub_anexo']."'><img src='imagens/icon-pdf.png' border='0' valign='bottom'></a>";
			}
			elseif(strpos($final,'jpg') !== false || strpos($final,'png') !== false)
			{ 
				echo "Anexo: <a target='_blank' href='".$row['pub_anexo']."'><img src='imagens/icon-img.png' border='0' valign='bottom'></a>";
			}
			echo "</div>
            <div class='descricao_publicacao'>".$row['pub_descricao']."</div>
			<div class='linha'>&nbsp;</div>					
            ";
        }
    }
    ?>
</div>
<?php include("mod_rodape/rodape.php"); ?>
  
</body>
</html>
