<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URL_BASE ?>/assets/css/style.css">
</head>

<body>


    <section class="login">

        <form action="<?= URL_BASE ?>/login" method="POST" class="row w-25">
            <h4>Login</h4>
            <div class="col-md-12">
                <label for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" id="nome">
            </div>

            <div class="col-md-12">
                <label for="senha">Senha</label>
                <input class="form-control" type="text" name="senha" id="senha">
            </div>
            <div class="col-md-12 mt-2">
                <button class="btn btn-primary">Entrar</button>
            </div>
            <div class="col-md-12 mt-2">
                <p class="text-danger"><?= isset($_SESSION["erro"]) ? $_SESSION["erro"] : "" ?></p>
            </div>
        </form>

    </section>



</body>

</html>