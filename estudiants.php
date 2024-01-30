<!doctype html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prova avaluada PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div class="container">
    <h1 class="text-primary">Gestió estudiants</h1>
    <a href="estudiants_form.php">Crear un nou estudiant</a>


    <div class="row row-cols-3 row-cols-md-4 g-4">
        <?php
        require 'gestio_estudiants.php';
        $rows = findAll();
        foreach ($rows as $estudiant) {
                ?>
                <div class="col">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center"><?= $estudiant->nom; ?></h5>
                </div>
                <div class="card-body">

                <div class="row">
                    <div class="col">Edat: <?= $estudiant->edat; ?></div>
                    <div class="col">Curs: <?= $estudiant->curs; ?></div>
                </div>
                <ul>
                    <?php
                    foreach ($estudiant->assignatures as $assignatura){?>
                      <li>
                          <?=$assignatura?>
                      </li>

                   <?php }

                    ?>

            </ul>
            </div>
            <div class="card-footer">

                <form method="POST" action="gestio_estudiants.php">
                    <input type="hidden" name="id" value="<?= $estudiant->id; ?>">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-danger" name="delete"><i
                                    class="fa-solid fa-trash"></i> Eliminar
                        </button>
                    </div>
                </form>

            </div>
            </div>
            </div>

            <?php
        }
        ?>
    </div>

</div>
</body>
</html>