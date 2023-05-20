<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViaCEP</title>
</head>
<body style=text-align:center; >
 
<?php

function get_endereco($cep){


  
  $cep = preg_replace("/[^0-9]/", "", $cep);
  $url = "http://viacep.com.br/ws/$cep/xml/";

  $xml = simplexml_load_file($url);
  return $xml;
}

?>
<meta charset="utf-8">
<h1>Encontre seu endereço</h1>
<form  action="" method="post">
  <input type="text" name="cep">
  <button type="submit">Buscar</button>
</form>
<?php if($_POST['cep']){ ?>
<h2>Resultado</h2>
<p>
  <?php $endereco = get_endereco($_POST['cep']); ?>
  <b> CEP: </b> <?php echo $endereco->cep; ?><br>
  <b>Logradouro: </b> <?php echo $endereco->logradouro; ?><br>
  <b>Bairro: </b> <?php echo $endereco->bairro; ?><br>
  <b>Localidade: </b> <?php echo $endereco->localidade; ?><br>
  <b>UF: </b> <?php echo $endereco->uf; ?><br>
</p>
<?php } ?>
</body>
</html>