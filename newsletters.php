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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="MogiComp Soluções Web">
<meta name="copyright" content="MogiComp Soluções Web">
<meta name="robots" content="index, follow">
<title>IBCT - Instituto Brasileiro de Cancerologia Torácica - Newsletters</title>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<script language="javascript">
jQuery(document).ready(function()
{
	jQuery(".toggle_container").hide();
 	jQuery(".toggle_container_info").show();
 
	jQuery("h2.trigger").click(function(){
		jQuery(this).toggleClass("active").next().slideToggle("slow");
		return false;
	});
});
</script>
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
<?php include("mod_topo/topo.php") ?>

<!--INICIO DO CONTEUDO-->
<?php include("banner.php") ?>

<div class="wrapper">
	<div id="fotos">
        <p class="titulo">Newsletters</p>
        <?php
			echo "<table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'><tr>";
			$sql = "SELECT * FROM album ORDER BY alb_data ASC";
			$query = mysql_query($sql,$conexao);
			$rows = mysql_num_rows($query);
			
			for($x = 0; $x < $rows ; $x++)
			{
				$alb_id = mysql_result($query, $x, 'alb_id');
				$alb_titulo = mysql_result($query, $x, 'alb_titulo');
				$alb_data = implode('/',array_reverse(explode('-',mysql_result($query, $x, 'alb_data'))));
				$alb_descricao = truncate(nl2br(mysql_result($query, $x, 'alb_descricao')), 50);
				
				$i++;
				if($i % 4 == 0 ? $coluna="</td></tr><tr>" : $coluna="</td>")
				echo "<td valign='top' align='center'>
						<div class='album'>";
							$sql_foto = "SELECT * FROM newsletters WHERE fot_album = $alb_id LIMIT 1";
							$query_foto = mysql_query($sql_foto,$conexao);
							$rows_foto = mysql_num_rows($query_foto);
							
							for($y = 0; $y < $rows_foto ; $y++)
							{
								$fot_imagem = mysql_result($query_foto, 0, 'fot_imagem');
								echo " 
								<a href='exibir-album.php?alb_id=$alb_id' target='_parent'><img src='imagem.php?arquivo=$fot_imagem&largura=200&altura=160&marca=mini'></a>";
							}
							
							echo "
							<span class='tituloalbum'><a href='exibir-album.php?alb_id=$alb_id' target='_parent'>$alb_titulo</a></span>
							<!--<span class='data'>$alb_data</span>-->
						</div>";
				echo $coluna;  
			}
			echo "</table></div>";
		?>
	</div>
</div>
<!--FIM DO CONTEUDO-->

<?php include("mod_rodape/rodape.php") ?>
</body>
</html>