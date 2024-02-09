<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Banner</title>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<script type="text/javascript"> 
	$(document).ready(function(){
		$('#slide_fotos').cycle({
			fx: 'fade',
			pager: '#pager' ,
			timeout: 3000,
			next:   '#next',
			prev:   '#prev',
			pause: 1
		});
	
		$('#pause').click(function() { 
			$('#slide_fotos').cycle('pause'); 
		});
		
		$('#play').click(function() { 
			$('#slide_fotos').cycle('resume'); 
		});
	
	});
</script>
<!--[if IE 7]>
<style>
#slideshow {width: 960px;height: 250px;	position: relative; margin:0 auto;}
#slideshow img { width: 960px; height: 250px; position: absolute;left:-40px; border:none;}
<style>
<![endif]-->

<style  type="text/css">
#slideshow 					{ width:960px; height: 250px ;position:relative; margin:0 auto; background:none;}
#slide_fotos p 				{ position: absolute;right:0;top:210px;z-index:3;padding:10px 20px;}
#slide_fotos 				{ height: 100%;overflow: hidden; background:none;}
#slide_fotos  img			{ border:none;}
#pager 						{ position:relative; z-index:10; margin:0 auto; text-align:center; display:inline; margin-left:15px; top:-8px;}
#pager a 					{ text-decoration:none; color:#0068A9;width:14px;height:14px;line-height:14px;text-align:center;display:inline-block;font-size:1px;margin:2px; color:#0068A9; background:#0068A9;-moz-border-radius:14px; -webkit-border-radius:14px; border-radius:14px;  border:none;}
#pager a.activeSlide 		{ color:#00B6BD; text-decoration:underline; background:#00B6BD;-moz-border-radius:14px; -webkit-border-radius:14px; border-radius:14px; border:none;}
#slideshow-control #prev 	{ position:absolute; left:10px; top:80px; z-index:9998; border:none;}
#slideshow-control #next 	{ position:absolute; right:10px; top:80px; z-index:9998; border:none;}
#slideshow-control a	 	{ border:none;}
#comandos					{ width:960px; margin:0 auto; margin-top:15px; text-align:center; z-index:10;}
.banner				{ width:960px; floate:left;  border:none; margin-bottom:30px;}

</style>

</head>

<body>
    <div id="slideshow">
        <ul id="slide_fotos">
            <li><img src='imagens/banner/banner1.jpg' border='0' /></li>
            <!--<li><a href="vacina.php" target="_parent"><img src='imagens/banner/banner2.jpg' border='0' /></a></li>-->
            <li><a href="concienciatotal.php" target="_parent"><img src='imagens/banner/banner4.jpg' border='0' /></a></li>
            <li><a href="http://neolifebemestar.com.br/" target="_parent"><img src='imagens/banner/banner5.jpg' border='0' /></a></li>
            
        </ul>
    </div>
    <div id="comandos">
        <div id="pager"></div><!-- /pager -->
    </div>
    
    <div class="banner">&nbsp;</div>
</body>
</html>