<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- ----------------- Defaults ----------------- -->

    <title>Akbal's Clicker</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- ----------------- Google's ----------------- -->

    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans"
      rel="stylesheet"
    />

    <meta name="author" content="Alejandro Akbal" />

    <meta name="description" content="Contador de clicks por segundo" />

    <meta
      name="keywords"
      content="clicker,cps,clicks per second,clicks por segundo, clicks, cleaderboard"
    />

    <!-- ----------------- CSS y JS ----------------- -->

    <link href="/css/clicker.css" type="text/css" rel="stylesheet" />

    <script src="/js/clicker.js"></script>
  </head>

  <body>
    <div class="nav">
      <h1>Akbal's</h1>
      <a href="/">Inicio</a>
      <a href="#" onclick="onClickDatabase()">Leaderboards</a>
      <noscript> Necesitarás JavaScript! </noscript>
    </div>

    <div id="el_boton2" class="boton">
      <button id="el_boton" onclick="onClick()"></button>

      <h2 id="CPS">.</h2>
    </div>

    <div id="Database" class="nada">
      <!-- ----------- INICIO EXTRACCION PHP ----------- -->

      <?php include(dirname(__DIR__)."/php/importar_puntuaciones.php") ?>

      <!-- ----------- FIN EXTRACCION PHP ----------- -->
    </div>

    <span class="opciones">
      <button onclick="cambiar_forma()">Cambiar Forma</button>

      <form action="/php/meter_puntuaciones.php" method="POST">
        <input
          type="text"
          name="meterusuario"
          placeholder="Tu nombre"
          value=""
        />

        <input
          id="meterlapuntuacion"
          type="hidden"
          name="meterpuntuacion"
          value="0"
        />

        <input type="submit" name="submit" value="Enviar" />
      </form>
    </span>
  </body>
</html>
