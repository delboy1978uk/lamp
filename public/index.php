<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>delboy1978uk/devbox</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container tc">
        <div class="text-center">
            <img src="img/skull_and_crossbones.png"/>
        </div>
        <br />
    <h1 class="text-center">Hello, it is <?= date('d/m/Y H:i'); ?></h1>
    <br class="clearfix">

    <?php
    $database   = 'awesome';
    $user = 'dbuser';
    $password = "12345";
    $host       = "mariadb";

    $connection = new PDO("mysql:host={$host};dbname={$database};charset=utf8", $user, $password);
    $sql = "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_TYPE='BASE TABLE'";
    $query      = $connection->query($sql);
    $tables     = $query->fetchAll(PDO::FETCH_COLUMN);

    if (empty($tables)) {

        echo '<p class="lead text-center">There are no tables in database ' . $database . '.</p>';

    } else {

        echo '<p class="lead text-center">Database ' . $database . ' has the following tables:</p>';
        echo '<ul>';

        foreach ($tables as $table) {
            echo '<li>'.$table.'</li>';
        }

        echo '</ul>';

    }
    ?>
    <?= phpinfo(); ?>
  </div>
  </body>
</html>
