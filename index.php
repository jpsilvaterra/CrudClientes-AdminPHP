<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h1>Formulario com PHP</h1>

        <p class="error">* Campos obrigatórios.</p><br><br>

        Nome: <input required name="nome" type="text"><span class="error">*</span><br><br>

        E-mail: <input required name="email" type="email"><span class="error">*</span><br><br>

        Website: <input name="website" type="url"><br><br>
        Comentario: <textarea name="comentario" type="text"></textarea><br><br>
        Genero: <input name="genero" value="Masculino" type="radio"> Masculino
        <input name="genero" value="Feminino" type="radio"> Feminino
        <input name="genero" value="Outro" type="radio"> Outro
        <button name="enviado" type="submit">Enviar</button>
        <h1>Dados enviados:</h1>
        <?php

        if (isset($_POST['enviado'])) {

            if (empty($_POST['nome']) || strlen($_POST['nome']) < 3 || strlen($_POST['nome']) > 85) {
                echo "<p class='error'>Preencha o campo nome corretamente.</p>";
                die();
            }

            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo "<p class='error'>Preencha o campo e-mail corretamente.</p>";
                die();
            }

            if (!empty($_POST['website']) && !filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
                echo "<p class='error'>Preencha o campo de website corretamente,</p>";
                die();
            }


            $genero = "Não selecionado";
            if (isset($_POST['genero'])) {
                $genero = $_POST['genero'];
                if ($genero != "masculino" && $genero != "feminino" && $genero != "outros") {
                    echo "<p class='error'>Preencha o campo genero corretamente,</p>";
                    die();
                }
            }
            echo "<p><b>Nome: </b>" . $_POST['nome'] . "</p>";
            echo "<p><b>E-mail: </b>" . $_POST['email'] . "</p>";
            echo "<p><b>Website: </b>" . $_POST['website'] . "</p>";
            echo "<p><b>Comentario: </b>" . $_POST['comentario'] . "</p>";
            echo "<p><b>Genero: </b>" . $_POST['genero'] . "</p>";
        }
        ?>
    </form>
</body>

</html>