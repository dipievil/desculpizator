<?

if($_REQUEST['txt_modo']){

	$start = "Isso é culpa da ";
	
	switch ($_REQUEST['txt_modo']){
		case "Educado":
			$start = "Acredito que tudo isso seja culpa";
			$end = ".";
		break;
		case "Básico":
			$start = "Isso é culpa ";
			$end = "!!!";
		break;
		case "Apressado":
			$start = "É culpa ";
			$end = "!";
		break;
		case "Inseguro":
			$start = "Tenho quase certeza que seja culpa ";
			$end = " eu acho...";	
		break;
		case "Confiante":
			$start = "É óbvio que tudo isso é culpa";
			$end = "!!!";	
		break;
		case "Estressado":
			$start = "Ninguém enxerga mesmo que isso tudo é culpa ";
			$end = "!!!";
		break;
		case "Feliz":
		$start = "É claro que a responsabilidade é ";
		$end = "!!!";
		break;
		case "Ingnorante":
			$start = "Essa merda toda que tá acontecendo só pode ser culpa ";
			$end = "!!!";	
		break;
		default:
			$start = "Isso é culpa da ";
			$end = ".";
		break;
	}

	$desculpa = $start.$_REQUEST['txt-culpado']." que ".$_REQUEST['txt-acao'] ." ".$_REQUEST['txt_oque'].$end." #desculpizator http://goo.gl/bMndoW";
}

?>

<html lang="pt-br">
<head>
    <title>desculpizator - As mesmas desculpinhas!</title>
    <meta charset="utf-8">
	<meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="SistemasD">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="As mesmas desculpinhas prontas de sempre (literalmente!) ou alguma teroria maluca! Esse é o Desculpizator!" />
    <meta name="keywords" content="PT, PSDB, política, teoria, desculpas, foradillma, forapt" />
	
    <meta property="og:title" content="desculpizator"> 
    <meta property="og:url" content="http://goo.gl/bMndoW"> 
    <meta property="og:locale" content="pt_BR"> 
    <meta property="og:description" content="As mesmas desculpinhas prontas de sempre (literalmente!) ou alguma teroria maluca! Esse é o Desculpizator!"> 
	
	<script src="jquery-1.10.2.js"></script>
	<script src="angular.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">
	</head>
	<body>
	<header>
		<center>
		<h1>Desculpizator - beta-</h1>
		</center>
	</header>
	
	<?
		if(strlen($desculpa)>0) {
	?>
	<div id="results" name="results" style="padding:20px;">
		<form id="formResults" name="formResults" class="form-horizontal">
			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txt_suadesculpa">Sua versão dos fatos é:</label>
			  <div class="col-md-4">                     
				<textarea class="form-control" id="txt_suadesculpa" name="txt_suadesculpa"><? echo $desculpa; ?></textarea>
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-8 control-label">Copie seu texto e espalhe!</label>
			</div>	
		</form>
	</div>

        <script>
              document.formResults.txt_suadesculpa.focus();
              document.formResults.txt_suadesculpa.select();
        </script>
	<?
	
	}
	
	?>
	<div id="formDesculpa" name="formDesculpa" style="padding:20px;">
		<form id="formDesculpa" name="formDesculpa" class="form-horizontal" method="post" >
			<fieldset>

				<!-- Form Name -->
				<legend>Suas desculpas</legend>
				
				<p>Então você sabe dizer porque isso aconteceu? Explique então: de quem é a culpa?</p>
				<br/>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="txt-culpado">Isso é culpa </label>
				  <div class="col-md-4">
					<select id="txt-culpado" name="txt-culpado" class="form-control">
					  <option value="da Dilma">da Dilma</option>
					  <option value="do Lula">do Lula</option>
					  <option value="do PT">do PT</option>
					  <option value="do FHC">do FHC</option>
					  <option value="da Ditadura">da Ditadura</option>
					  <option value="dos Comunistas">do Comunismo</option>
					  <option value="dos Fascistas">do Fascimo</option>
					  <option value="do Aécio">do Aécio</option>
					  <option value="do Collor">do Collor</option>
					  <option value="da Esquerda">da Esquerda</option>
					  <option value="da Direita">da Direita</option>
					  <option value="da FIFA">da FIFA</option>
					  <option value="da Marina">da Marina</option>
					</select>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="txt-acao">... que</label>
				  <div class="col-md-4">
					<select id="txt-acao" name="txt-acao" class="form-control">
					  <option value="aprovou">aprovou</option>
					  <option value="sancionou">sancionou</option>
					  <option value="vendeu">vendeu</option>
					  <option value="construiu">construiu</option>
					  <option value="iludiu">iludiu</option>
					  <option value="mandou matar">mandou matar</option>
					  <option value="criou">criou</option>
					  <option value="desarmou">desarmou</option>
					  <option value="matou de fome">matou de fome</option>
					  <option value="roubou">roubou</option>
					  <option value="roubou">salvou</option>
					  <option value="escondeu">escondeu</option>
					  <option value="sabotou">sabotou</option>
					  <option value="da Marina">mentiu para</option>
					  <option value="armou uma armadilha para">armou uma armadilha para</option>
					</select>
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="txt_oque">...</label>
				  <div class="col-md-4">
					<select id="txt_oque" name="txt_oque" class="form-control">
					  <option value="o Brasil">o Brasil</option>
					  <option value="o Estatuto do desarmamento">o Estatuto do desarmamento</option>
					  <option value="os EUA">o Brasil para os EUA</option>
					  <option value="o povo brasileiro">o povo brasileiro</option>
					  <option value="os negros">os negros</option>
					  <option value="os brancos">os brancos</option>
					  <option value="os ETs">os ETs</option>
					  <option value="o sexo">o sexo</option>
					  <option value="o avião">o avião</option>
					  <option value="a mala">a mala</option>
					  <option value="o dinheiro do povo">o dinheiro do povo</option>
					  <option value="a soberania nacional">a soberania nacional</option>
					  <option value="o exército brasileiro">o exército brasileiro</option>
					  <option value="a nação">a nação</option>
					</select>
				  </div>
				</div>
				
				<!-- Select Basic -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="txt_modo">Modo</label>
				  <div class="col-md-4">
					<select id="txt_modo" name="txt_modo" class="form-control">
					  <option value="Educado">Educado</option>
					  <option value="Básico">Básico</option>
					  <option value="Apressado">Apressado</option>
					  <option value="Inseguro">Inseguro</option>
					  <option value="Confiante">Confiante</option>
					  <option value="Estressado">Estressado</option>
					  <option value="Feliz">Feliz</option>
					  <option value="Ingnorante">Ingnorante</option>
					</select>
				  </div>
				</div>		
			
				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="enviar">Pronta?</label>
				  <div class="col-md-4">
					<button id="enviar" name="enviar" class="btn btn-primary">Montar sua desculpa</button>
				  </div>
				</div>
			
			</fieldset>
		</form>

	</div>
	
	<footer>
                <div style="text-align:center">
                     Compartilhe: <a href="http://goo.gl/bMndoW">http://goo.gl/bMndoW</a>
                        (c) Brazil - 2014
                </div>
	</footer>
		
		<!-- JavaScript -->
		<script src="bootstrap.js"></script>
	
	</body>
                <script>
                  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                  ga('create', 'UA-10481035-12', 'auto');
                  ga('send', 'pageview');
                </script>
</html>

