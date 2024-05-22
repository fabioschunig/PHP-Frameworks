<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Séries</title>
</head>

<body>
    <h1>Séries</h1>

    <ul>
        <?php foreach ($series as $serie) : ?>
            <li><?= $serie ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>