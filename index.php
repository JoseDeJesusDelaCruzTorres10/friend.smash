<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Friend Smash!</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta property="og:image" content="<?= $serverUrl ?>/images/logo_large.jpg"/>

    <link href="style/reset.css" rel="stylesheet" type="text/css">
    <link href="style/style.css" rel="stylesheet" type="text/css">

    <!-- Game logic -->
    <script src="scripts/game.js"></script>

    <!-- UI logic -->
    <script src="scripts/ui.js"></script>

    <!--[if IE]><script src="scripts/excanvas.js"></script><![endif]-->
    
    
    <!-- Libraries -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="scripts/moment.js"></script>
    
    <!-- Facebook SDK for Javascript -->
    <script src="//connect.facebook.net/es_MX/sdk.js"></script>
    
    <!-- Init and Login -->
    <script src="scripts/integration/core.js"></script>
    <script src="scripts/integration/login.js"></script>

    <!-- Requests, Sharing and Graph API -->
    <script src="scripts/integration/requests.js"></script>
    <script src="scripts/integration/sharing.js"></script>
    <script src="scripts/integration/graph_api.js"></script>

    <!-- App Events and Payments -->
    <script src="scripts/integration/app_events.js"></script>
    <script src="scripts/integration/payments.js"></script>
  </head>

  <body>
    <div id="fb-root"></div>

    <!-- Share header -->
    <header>
      <div class="container">
        <img class="logo" src="images/logo.png" />
        <button class="image share"></button>
      </div>
    </header>

    <section id="home" class="hidden">
      <div class="panel left">

        <!-- Welcome screen -->
        <div id="welcome">
          <h1>Hola <span class="first_name">...</span></h1>
          <img class="profile" src="images/profile.png" />
          <ul class="stats">
            <li><img src="images/coin40.png" alt="Coins" /> <span class="me coins">...</span></li>
            <li><img class="buybomb" src="images/buybomb40.png" alt="Bombs" /> <span class="me bombs">...</span></li>
          </ul>
        </div>

        <!-- Menu -->
        <div id="menu">
          <button class="image play"></button>
          <button class="image challenge"></button>
          <button class="image leaderboard"></button>
          <button class="image store"></button>
        </div>
      </div>

      <!-- Puntuaje -->
      <div class="panel right hidden" id="leaderboard">
        <div class="nofriends">
          <p>Friend Smash! es mejor con amigos! Haga clic aquí para ver las puntuaciones de sus amigos</p>
          <button class"friendPermissions">Grant user_friends</button>
        </div>
        <div class="friends">
          <h1>Tabla de clasificacion</h1>
          <ul class="scrollable_list leaderboard">
            <li class="loading">Cargando...</li>
            <li class="template">
              <img src="images/profile.png" class="profile small" />
              <div class="namecontainer">
                <span class="rank">1</span>. <span class="name">Ali</span>
              </div>
              <div class="scorecontainer">
                Score <span class="score">99</span>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <!-- Amigos -->
      <div class="panel right hidden friends" id="friendselector">
        <div class="nofriends">
          <p>Friend Smash! es mejor con amigos! Haga clic aquí para ver una lista de amigos para desafiar.</p>
          <button class"friendPermissions">Grant user_friends</button>
        </div>
        <div class="friends">
          <h1>Amigos en Friend Smash!</h1>
          <div class="tabs">
            <button class="friends">Request</button>
            <button class="invitable_friends">Invite</button>
          </div>
          <ul class="scrollable_list friendselector friends">
            <li class="loading">Cargando...</li>
            <li class="template">
              <img src="images/profile.png" class="profile small" />
              <span class="name">...</span>
            </li>
          </ul>
          <ul class="scrollable_list friendselector invitable_friends">
            <li class="loading">Cargando...</li>
            <li class="template">
              <img src="images/profile.png" class="profile small" />
              <span class="name">...</span>
            </li>
          </ul>
          <div class="buttons">
            <button class="image challenge send" disabled="disabled"></button>
          </div>
        </div>
      </div>

      <!-- Tienda del Juego -->
      <div class="panel right hidden" id="store">
        <h1>Tienda del Juego</h1>
        <div class="normal_store">
          <ul class="scrollable_list store invitable_friends">
            <li class="item" data-product="<?= $serverUrl ?>/payments/100coins.html">
              <img src="images/bundle.png" class="icon small" />
              <span class="name">100 monedas</span>
              <img src="images/buy64.png" class="button buy small" alt="Buy" />
              <img src="images/gift64.png" class="button gift small" alt="Gift" />
            </li>
            <li class="item" data-product="<?= $serverUrl ?>/payments/500coins.html">
              <img src="images/bundle.png" class="icon small" />
              <span class="name">500 monedas</span>
              <img src="images/buy64.png" class="button buy small" alt="Buy" />
              <img src="images/gift64.png" class="button gift small" alt="Gift" />
            </li>
            <li class="item" data-product="<?= $serverUrl ?>/payments/1000coins.html">
              <img src="images/bundle.png" class="icon small" />
              <span class="name">1000 monedas</span>
              <img src="images/buy64.png" class="button buy small" alt="Buy" />
              <img src="images/gift64.png" class="button gift small" alt="Gift" />
            </li>
          </ul>
        </div>
        <div class="mobile_store">
          <ul class="scrollable_list friendselector invitable_friends">
            <li class="loading">Loading...</li>
            <li class="template">
              <img src="images/profile.png" class="profile small" />
              <span class="name">...</span>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Game stage -->
    <section id="stage" class="hidden">
      <div id="gameboard">
        <canvas id="canvas"></canvas>
      </div>
      <div id="gamestats">
        <div class="message">
          <img class="profile" src="images/profile.png" />
          <p>Rompio <span class="name">...</span></p>
        </div>
        <div class="score">
          <p>Puntuaje <span class="score_value">...</span></p>
        </div>
        <div class="bombs"></div>
        <div class="lives"></div>
      </div>
    </section>

    <!-- Game Over screen -->
    <section id="gameover" class="hidden">
      <h1>¡Fin del Juego!</h1>
      <img src="images/profile.png" class="profile" />
      <div class="stats">
        <p>Rompistes <span class="name">...</span> <span class="score">...</span> veces y recogio <span class="coins">...</span> <span class="coins_plurality">monedas</span>!</p>
      </div>
      <div class="buttons">
        <button class="image challenge"></button>
      </div>
      <div class="share_composer">
        <textarea placeholder="Di algo sobre tu juego"></textarea>
        <div class="buttons">
          <button class="image close"></button>
          <button class="image share_action"></button>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <p><a href="https://www.facebook.com/appcenter/<?= $appNamespace ?>">Ve Friend Smash! en el Centro de Apps de Facebook</a></p>
      </div>
    </footer>

  </body>
</html>
