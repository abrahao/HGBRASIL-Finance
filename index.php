<?php
require_once 'config/config.php';
require_once 'modules/hg-api.php';

$hg = new HG_API(HG_API_KEY);
$dolar = $hg->dolar_quatation();
// var_dump($dolar['buy']);

// if ($hg->is_error() == false) {
//     $variation = ($dolar['variation'] < 0 ) ? 'danger' : 'info';
// }

?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Cotação</p>
                <?php if ($hg->is_error() == false): ?>
                <p>USD: <span class="badge bg-primary"> <?php echo ($dolar['buy']) ?> </span></p>
                <?php else: ?>
                <p>USD: <span class="badge bg-danger">Serviços indisponíveis</span></p>
                <?php endif ?>
            </div>
            
        </div>
    </div>

<!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>