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
$alb_id = anti_injection($_GET['alb_id']);
$sqlalbum = "SELECT * FROM album WHERE alb_id = $alb_id";
$queryalbum = mysql_query($sqlalbum,$conexao);
$rowsalbum = mysql_num_rows($queryalbum);

if($rowsalbum > 0)
{
	$alb_titulo = mysql_result($queryalbum, 0, 'alb_titulo');
	$alb_descricao = mysql_result($queryalbum, 0, 'alb_descricao');
	$alb_data = implode('/',array_reverse(explode('-',mysql_result($queryalbum, 0, 'alb_data'))));
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
<link rel="stylesheet" type="text/css" href="js/shadowbox/shadowbox.css">
<script type="text/javascript" src="js/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
	Shadowbox.init();
</script><link href="css/estilo.css" rel="stylesheet" type="text/css" />

<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
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
    <div id="exibefotos">
			<?php
				
				echo "	<div class='compartilha'>
							<div class='fb-like' data-href='http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING']."' data-width='30' data-colorscheme='light' data-layout='button_count' data-action='like' data-show-faces='false' data-send='true'></div>
						</div>

						<div id='titulo'><a href='newsletters.php'>Newsletters</a> &raquo; ".$alb_titulo."</div>
						<div id='data'>".$alb_data."</div>
						<div id='descricao'>".$alb_descricao."</div>
						<table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'><tr>";
					
					if($rowsalbum == 0)
					{ echo " <center>Álbum não encontrado</center> ";}
				
				
        			$sql = "SELECT * FROM newsletters WHERE fot_album = $alb_id";
					$query = mysql_query($sql,$conexao);
					$rows = mysql_num_rows($query);
					if($rows > 0)
					{
					for($x = 0; $x < $rows ; $x++)
					{
						$fot_imagem = mysql_result($query, $x, 'fot_imagem');	
						$fot_legenda = mysql_result($query, $x, 'fot_legenda');	
						
						$i++;
						if($i % 4 == 0 ? $coluna="</td></tr><tr>" : $coluna="</td>")
						echo "<td valign='top' align='center'>
						
						<div id='galeria'>							
							<a href='$fot_imagem' rel='shadowbox[1]'><img src='imagem.php?arquivo=$fot_imagem&largura=200&altura=160&marca=mini' alt='$fot_legenda' title='$fot_legenda'></a><br>
							$fot_legenda
						</div>";
						echo $coluna; 
					}
					}
					else
					{
						echo "<tr><td>Ainda não há newsletters adicionadas neste ano.</td></tr>";
					}
				echo "</table></div><br>
				<center><input type='button' id='botao_cancelar' onclick='javascript:window.history.back();' value='Voltar'/></center>";
				?>
    </div>
</div>
<!--FIM DO CONTEUDO-->

<?php include("mod_rodape/rodape.php") ?>
</body>
</html>