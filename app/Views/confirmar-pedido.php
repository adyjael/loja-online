<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Informações da encomenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <style type="">
        .login {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .login form {
            width: 600px;
            height: 600px;
            background: #fff !important;
            padding: 20px;
            -webkit-box-shadow: -1px 3px 25px -7px rgba(191, 191, 191, 0.8);
            box-shadow: -1px 3px 25px -7px rgba(191, 191, 191, 0.8);
        }
    </style>

<body>





    <div class="login mt-1 ">

        <form id="form-concluir-encomenda " class="form animate__animated animate__fadeInLeft">
       
            <div class="form-produtos-header mt-1 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 256 256">
                    <rect width="256" height="256" fill="none"></rect>
                    <line x1="56" y1="232" x2="200" y2="232" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
                    <circle cx="128" cy="104" r="32" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
                    <path d="M208,104c0,72-80,128-80,128S48,176,48,104a80,80,0,0,1,160,0Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
                </svg>
                <span>Endereço de Entrega Informe o endereço onde deseja receber seu pedido</span>
            </div>
            <h4>Dados pessoais</h4>
            <div class="row">

                <div class="col-md-12">
                    <label for="nome">Nome:</label>
                    <input class="mt-1 form-control" type="text" id="nome" placeholder="Nome">
                </div>
                <div class="col-md-12">
                    <label for="nome">Data nascimento:</label>
                    <input onchange="verificarIdade(this.value)" class="mt-1 form-control" type="date" id="data-nacimento" placeholder="Data de nascimento">
                </div>
            </div>
            <div class="row mt-2">
                <h4>Dados de entrega</h4>

                <div class="col-md-12">
                    <label for="nome">Rua:</label>
                    <input class="mt-1 form-control" type="text" id="rua" placeholder="Rua">
                </div>
                <div class="col-md-12">
                    <label for="nome">Cidade:</label>
                    <input class="mt-1 form-control" type="text" id="cidade" placeholder="Cidade">
                </div>
                <div class="col-md-12">
                    <label for="nome">Zip:</label>
                    <input class="mt-1 form-control" type="text" id="zip" placeholder="codigo-postal">
                </div>

                <div class="col-md-12">

                    <button onclick="concluirEncomenda()" type="button" id="btn-concluir-encomenda" class="btn btn-primary mt-3">Concluir encomenda</button>
                </div>
            </div>


        </form>
    </div>






    <script type="text/javascript">

        function concluirEncomenda() {
            var nome = document.getElementById("nome").value
            var dataNacimento = document.getElementById("data-nacimento").value
            var rua = document.getElementById("rua").value
            var cidade = document.getElementById("cidade").value
            var zip = document.getElementById("zip").value


            if (nome.trim() == "" || rua == "" || dataNacimento.trim() == "" || cidade.trim() == "" || zip.trim() == "") {
                alert("Preencha todos os campos");
            } else if (!verificarIdade(dataNacimento)) {
                alert("Você Precisa ter mais de 18 anos");
            } else {

                $.ajax({
                    url: URL_BASE + "/inserirEncomenda",
                    type: "POST",
                    data: {
                        nome,
                        dataNacimento,
                        rua,
                        cidade,
                        zip
                    },
                    success: function(resposta) {

                        window.localStorage.setItem("rua", rua + ", " + cidade + ", " + zip);
                        window.location = URL_BASE + "/success";
                    }
                })

            }
        }
    </script>

</body>

</html>