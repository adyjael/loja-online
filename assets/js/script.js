

AOS.init();

 const URL_BASE = "http://localhost/projetofinal"
function adicionar_ao_carrinho(id) {

    $.ajax({
        url: URL_BASE + "/adicionarCarrinho",
        type: "POST",
        data: {
            id: id,
        },
        success: function (resposta) {
            resposta = JSON.parse(resposta);
            if (resposta.erro) {
                alert(resposta.msg);
            } else {

                $("#totalProdutos").html(resposta.msg)

            }
        }
    })

}

function eliminar_do_carrinho(id) {
    $.ajax({
        url: URL_BASE + "/eliminarProduto",
        type: "POST",
        data: {
            id: id,
        },
        success: function (resposta) {
            window.location.reload(true);
        }
    })
}


function diminuir_quantidade_produto(id, form) {

    var formControl = (form.parentElement)
    var quantidade = formControl.querySelector(".quantidade")

    var valor = formControl.querySelector(".quantidade").innerHTML
    if (valor == 1) {
        quantidade.innerHTML = 1;
        return;
    }
    $.ajax({
        url: URL_BASE + "/diminuirQuantidade",
        type: "GET",
        data: {
            id: id,
        },
        success: function (resposta) {

            resposta = JSON.parse(resposta);
            if (resposta.erro) {
                alert(resposta.msg);
            } else {
                quantidade.innerHTML = Number(valor) - 1
                $("#precoTotal").html(resposta.precoTotal + "€")

            }
        }
    })
}

function aumentar_quantidade_produto(id, form) {
    var formControl = (form.parentElement)
    var quantidade = formControl.querySelector(".quantidade")
    var valor = Number(formControl.querySelector(".quantidade").innerHTML)

    $.ajax({
        url: URL_BASE + "/aumantarQuantidade",
        type: "GET",
        data: {
            id: id,
        },
        success: function (resposta) {

            resposta = JSON.parse(resposta);
            console.log(resposta);
            if (resposta.erro) {
                alert(resposta.msg);
            } else {

                quantidade.innerHTML = valor +1
                $("#precoTotal").html(resposta.precoTotal + "€")
            }
        }
    })
}


function editarProduto(id) {
    var ModalEditAgenda = new bootstrap.Modal(document.getElementById("editar-produto"))
    $.ajax({
        url: URL_BASE + "/editarProduto",
        type: "POST",
        data: {
            id: id
        },
        success: function (resposta) {
            resposta = JSON.parse(resposta);
            document.querySelector("#form-editar-produto #nome-produto").value = resposta.nome
            document.querySelector("#form-editar-produto #preco-produto").value = resposta.preco
            document.querySelector("#form-editar-produto #quantidade-produto").value = resposta.quantidades
            document.querySelector("#form-editar-produto #id-produto").value = resposta.id

            ModalEditAgenda.show();

        }
    })


}

function eliminarProduto(id) {

    var confirmar = window.confirm("Tem tem que quer apagar esse produto?");

    if (confirmar) {

        $.ajax({
            url: URL_BASE + "/adminEliminarProduto",
            type: "POST",
            data: {
                id: id
            },
            success: function (resposta) {
                window.location.reload(true)
            }
        })
    }

}

function verificarIdade(dataNacimento) {

    const today = new Date();
    const birthDate = new Date(dataNacimento);
    let idade = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        idade--;
    }

    if (idade < 18) {
        alert("Você Precisa ter mais de 18 anos");
    } else {
        return true;
    }


}



$("#btn-confirmar-pedido").on("click", function () {


    $.ajax({
        url: URL_BASE + "/confirmar-pedido",
        type: "GET",
        success: function (resposta) {
            resposta = JSON.parse(resposta);

            if (resposta.length < 1) {
                window.location = URL_BASE + "/confirmar-encomenda"
            } else {
                for (i = 0; i < resposta.length; i++) {
                    alert("O produto : " + resposta[i].nome + "\nSo tem: " + resposta[i].qtd + " Unidades em stock");
                }
            }
            console.log(resposta);

        }
    })

})