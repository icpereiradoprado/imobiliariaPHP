<?php
    require_once 'Controller/GaleriaController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="margin-top: 5%;">
        <form name="cadGaleria" id="cadGaleria" action="" method="POST" enctype="multipart/form-data">
            <div class="fieldForm">
                <label for="foto">Foto Galeria: </label>
                <input type="file" name="fotoGaleria" id="fotoGaleria" required>
                <input type="submit" value="Salvar" style="width: 100px;">
            </div>
        </form>
    </div>
</body>
</html>