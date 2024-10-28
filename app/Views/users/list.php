<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    
    <h1><?= $nombre1 ?></h1>
    <h1><?= $nombre2 ?></h1>

    <ul>
    <?php foreach($usuarios as $usu){ ?>

        <li><?= $usu ?></li>

    <?php } ?>
    </ul>

</body>
</html>