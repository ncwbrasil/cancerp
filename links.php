<?php
require_once("mod_includes/php/ctracker.php");
include('mod_includes/php/connect.php');
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
<div class="wrapper" id="links">
    <div class='titulo'>Links</div>
    <table width="700" cellspacing="0" cellpadding="3" align="center" border="0" >
        <tr>
            <?php
            $sql = "SELECT * FROM links WHERE lin_status = 1";
            $query = mysql_query($sql,$conexao);
            $rows = mysql_num_rows($query);
            $i=0;
			if($rows > 0)
			{
				for($x=0;$x<$rows;$x++)
				{
					$i++;
					$lin_id = mysql_result($query, $x, 'lin_id');
					$lin_anexo = mysql_result($query, $x, 'lin_anexo');
					$lin_link = mysql_result($query, $x, 'lin_link');
					if($lin_link == ''){$lin_link = '#';} 
					if($i % 7 == 0 ? $coluna="</td></tr><tr>" : $coluna="</td>")
					if(($i % 7) == 0 || $x == ($rows-1))
					{ 
						echo "<td align='center' class='bordabottom2' >";
					}
					else
					{ 
						echo "<td align='center' class='bordarightbottom' >";
						
					}
					echo "<a href='$lin_link' target='_blank'><img style='max-width:150px; max-height:100px;' src='$lin_anexo' border='0' /></a>";
					echo $coluna;
				}
			}
			else
			{
				echo "Nenhum link cadastrado";
			}
            ?>
    </table>
</div>
<?php include("mod_rodape/rodape.php"); ?>
  
</body>
</html>
