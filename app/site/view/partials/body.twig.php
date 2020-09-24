<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>{% block title %} {% endblock %} - Inovar Imóveis Botucatu</title>
  <meta charset="utf-8">
  <!-- VIEWPORT -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- MATERIAL ICONS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- MATERIALIZE CSS -->
  <link href="{{BASE}}vendor/materialize/css/materialize.min.css" rel="stylesheet">
  <!-- OWL  CAROUSEL CSS -->
  <link rel="stylesheet" href="{{BASE}}assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{BASE}}assets/css/owl.theme.default.min.css">
  <!-- MY STLE -->
  <link href="{{BASE}}assets/css/main.css" rel="stylesheet">
  <!-- SHORTCUT -->
  <link rel="shortcut icon" href="{{BASE}}assets/img/favicon.ico" type="image/x-icon">      
</head>
<body>

  {% include 'partials/header.twig.php' %}
  
  {% block body %}
  
  <button class="btn">Teste</button>
  
  {% endblock %} 
  <!-- END BLOCK BODY -->

  {% block script %}
  
  {% endblock %}



  {% include 'partials/footer.twig.php' %}







</body>
</html>