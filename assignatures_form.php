<!doctype html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulari assignatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <h1>Formulari Assignatura</h1>

    <form action="gestio_assignatures.php" method="POST">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">


            <label for="nom">Nom</label>
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect"
                    aria-label="Floating label select example" name="professor">
                <option selected>Selecciona un professor</option>
                <?php
                require 'gestio_assignatures.php';
                $rows = findAllTeachers();
                foreach ($rows as $professor) {
                    ?>
                    <option value="<?= $professor->id ?>">
                        <?= $professor->nom ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <label for="floatingSelect">Seleccionar un professor</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect"
                    aria-label="Floating label select example" name="aula">
                <option selected>Selecciona una aula</option>
                <?php
                $rows = findAllClassRooms();
                print_r($rows);
                foreach ($rows as $aula) {
                    ?>
                    <option value="<?= $aula->id ?>">
                        <?= $aula->nom ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <label for="floatingSelect">Seleccionar una aula</label>
        </div>


        <button type="submit" class="btn btn-outline-success" name="insert">Guardar</button>
    </form>
</div>
</body>
</html>