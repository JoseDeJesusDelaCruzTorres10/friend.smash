<?php require __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Your comrades need you!</title>
    <meta property="og:title" content="¡Tus compañeros te necesitan!" />
    <meta property="og:description" content="¡Deja de mirar a tus amigos y empieza a aplastarlos! Juega Friend Smash!" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://apps.facebook.com/<?= $appNamespace ?>/share.php" />
    <meta property="og:image" content="<?= $serverUrl ?>/images/share.png" />
    <meta property="fb:app_id" content="<?= $appId ?>" />
  </head>
  <body>
    <script>
      window.location = '<?= $serverUrl ?>';
    </script>
    <h1>Your comrades need you!</h1>
    <p>Stop staring at your friends, and start smashing them! Play Friend Smash!</p>

    <img src="<?= $serverUrl ?>/images/share.png" />
  </body>
</html>
