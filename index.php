<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cafe Tore et Fraction</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">
  <script src="jquery-3.3.1/jquery.min.js"></script>
  <!-- <script src="bootstrap4/js/bootstrap.bundle.js"></script> -->
  <script src="bootstrap4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="menu_title">Café Tore et Fraction</h1>

<div id="show" class="carousel slide menu" data-ride="carousel">
  <div class="carousel-inner">
    <?php
        date_default_timezone_set('America/Toronto');


        $first = True;
        $prelunch = false;
        $pages = glob("pages/*.html");

        foreach ($pages as $filename)
        {
            if ( (date('H') > 06) )
            {
               if( (date('H') < 11) )
               {
                    $prelunch = true;
               }
            }

            if( ($prelunch)  &&  strpos($filename, 'repas'))
            {
                next($pages);
            }
            elseif( (!($prelunch)) && strpos($filename, 'ptitdej') )
            {
                next($pages);
            }


            else
            {
                if($first)
                {
                    echo('<div class="carousel-item active">');
                    $first = False;
                }

                else
                {
                    echo('<div class="carousel-item">');
                }
                echo('<div class="page">');
                include($filename);
                echo('</div>');
                echo('</div>');
            }
        }
    ?>
  </div>
</div>

</body>
</html>