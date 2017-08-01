<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?=$data["title"]?></title>
    
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">    
    <link rel="stylesheet" href="https://bootswatch.com/slate/bootstrap.min.css">
    <link rel="stylesheet" href="/geografico/public/css/style.css">
    
</head>
<body>

<div class="container-fluid">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/geografico">FindCar Postgis</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/geografico">Equipe <span class="sr-only">(current)</span></a></li>
        <li><a href="/geografico/cars/searchByCityRadius">Serviços</a></li>
        <li><a href="/geografico/cars/searchByCityRadiusAndModel">Cases</a></li>
        <li><a href="/geografico/cars/searchCheapestCarByRadius">Contato</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>