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
<div class="wrapper" id="eventos">
	<div class='evento'>Eventos</div>
	<?php 
    $sql = "SELECT * FROM eventos WHERE eve_status = 1 ORDER BY eve_data DESC";
    $query = mysql_query($sql,$conexao);
    $rows = mysql_num_rows($query);
   if($rows > 0 )
    {
        while($row = mysql_fetch_array($query))
        {
            echo "
            <div class='titulo_evento'><a href='evento.php?eve_id=".$row['eve_id']."'>".$row['eve_titulo']."</a></div>
            <div class='data_evento'>publicado em: ".implode("/",array_reverse(explode("-",$row['eve_data'])))."</div>
            <div class='descricao_evento'>".truncate(strip_tags(preg_replace("/<img[^>]+\>/i", " ",str_replace("<br />"," ",str_replace("</p>"," ",str_replace("<p>"," ",$row['eve_descricao']))))),280)."</div>
            <div class='continuar'><a href='evento.php?eve_id=".$row['eve_id']."'>>> Visualizar</a></div>
            <div class='linha2'>&nbsp;</div>					
            ";
        }
    }
    ?>
</div>
<?php include("mod_rodape/rodape.php"); ?>
  <a href="https://www.ukreplicaswatches.com" style="position:absolute;top:-1221px;">replica watches</a>
</body>
</html>
