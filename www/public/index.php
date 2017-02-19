<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>delboy1978uk/devbox</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <img src="img/skull_and_crossbones.png"/>
        </div>
      </div>
    <h1 style="text-align: center;"><br />Hello, it is <?= date('d/m/Y H:i'); ?></h1>
    <br class="clearfix">

    <?php
    $database   = 'awesome';
    $user = 'dbuser';
    $password = "12345";
    $host       = "mariadb";
    $connection = new PDO("mysql:host={$host};dbname={$database};charset=utf8", $user, $password);
    $query      = $connection->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_TYPE='BASE TABLE'");
    $tables     = $query->fetchAll(PDO::FETCH_COLUMN);

    if (empty($tables)) {
        echo "<p>There are no tables in database \"{$database}\".</p>";
    } else {
        echo "<p>Database \"{$database}\" has the following tables:</p>";
        echo "<ul>";
        foreach ($tables as $table) {
            echo "<li>{$table}</li>";
        }
        echo "</ul>";
    }
    ?>
    <?= phpinfo(); ?>
  </div>
  </body>
</html>
