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
    <?= phpinfo(); ?>
  </div>
  </body>
</html>
