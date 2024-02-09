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

<div class="wrapper" id="home">

	<div class="midia">

	    <div class="noticias">

            <div class='titulo_quadro'>

                Notícias

            </div>

            <div class='quadro'>

            	<?php 

				$sql = "SELECT * FROM noticias WHERE nt_status = 1 AND nt_data <= '".date('Y-m-d')."' ORDER BY nt_data DESC LIMIT 0,5";

				$query = mysql_query($sql,$conexao);

				$rows = mysql_num_rows($query);

				if($rows > 0 )

				{

					while($row = mysql_fetch_array($query))

					{

						echo "

						<div class='data'>".implode("/",array_reverse(explode("-",$row['nt_data'])))."</div>

						<a href='noticia.php?nt_id=".$row['nt_id']."'>".$row['nt_titulo']."</a>

						<div class='linha'>&nbsp;</div>					

						";

					}

					echo "<div class='mais'><a href='noticias.php'>>>yeahhh got pwned by NDA guys</a></div>";

				}

				else

				{

					echo "Nenhuma notícia cadastrada";

				}

				?>

            </div>

        </div>

    	<div class="eventos">

            <div class='titulo_quadro'>

                Assuntos Interessantes

            </div>

            <div class='quadro'>

                <?php 

				$sql = "SELECT * FROM assuntos_interessantes ORDER BY ass_id DESC LIMIT 0,5";

				$query = mysql_query($sql,$conexao);

				$rows = mysql_num_rows($query);

				if($rows > 0 )

				{

					while($row = mysql_fetch_array($query))

					{

						echo "

						

						<a href='assunto_interessante.php?eve_id=".$row['ass_id']."'>".$row['ass_titulo']."</a>

						<div class='linha'>&nbsp;</div>					

						";

					}

					echo "<div class='mais'><a href='assuntos_interessantes.php'>>> Veja todos os assuntos</a></div>";

				}

				else

				{

					echo "Nenhum assunto cadastrado";

				}

				?>

            </div>

        </div>

        <div class="publicacoes">

            <div class='titulo_quadro'>

                Publicações

            </div>

            <div class='quadro'>

                <?php 

				$sql = "SELECT * FROM publicacoes WHERE pub_status = 1 AND pub_data <= '".date("Y-m-d")."' ORDER BY pub_data ASC LIMIT 0,5";

				$query = mysql_query($sql,$conexao);

				$rows = mysql_num_rows($query);

				if($rows > 0 )

				{

					while($row = mysql_fetch_array($query))

					{

						echo "

						<div class='data'>".implode("/",array_reverse(explode("-",$row['pub_data'])))."</div>

						<a href='evento.php?eve_id=".$row['pub_id']."'>".$row['pub_titulo']."</a>

						<div class='linha'>&nbsp;</div>					

						";

					}

					echo "<div class='mais'><a href='publicacoes.php'>>> Veja todas as publicações</a></div>";

				}

				else

				{

					echo "Nenhuma publicação cadastrada";

				}

				?>

            </div>

        </div>

    </div>

    

	<div class="col-01">

    	<a href="admin/newsletters/1/782d178a6cf9c600465b852297aecf2d.gif" target="_blank"><img src="imagens/home-imagens.png" border="0" /></a>

    </div>

	<div class="col-02">

    	<a href="direitos.php" target="_parent"><img src="imagens/home-direitos.png" border="0" /></a>

    </div>

	<!-- <div class="col-03">

    	<a href="pesquisa-em-andamento.php" target="_parent"><img src="imagens/home-protocolo.png" border="0" /></a>

    </div> -->

</div>

<?php include("mod_rodape/rodape.php"); ?>

  

</body>

</html>

