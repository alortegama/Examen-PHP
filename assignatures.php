<!doctype html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignatures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1>Assignatures</h1>
    <a href="assignatures_form.php" class="btn btn-outline-primary mt-1 me-0 ms-0 mb-4">Crear</a>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <?php
        require 'gestio_assignatures.php';
        $rows = findAll();
        foreach ($rows as $assignatura) {
            ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <!--<h5 class="card-title"><?php echo $assignatura->nom; ?></h5>-->
                        <h5 class="card-title"><?= $assignatura->nom ?></h5>
                        <p class="card-text"><?= $assignatura->professor; ?> <?= $assignatura->aula ?></p>
                    </div>
                    <div class="card-footer">
                        <form action="gestio_assignatures.php" method="POST">
                            <input type="hidden" name="id" value="<?= $assignatura->id ?>"/>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-danger" name="delete">Eliminar</button>
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