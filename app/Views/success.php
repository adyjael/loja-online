<section class="success  animate__animated animate__fadeInLeft">

    <div class="success-header">
        <span class="fir">Uhu! Pedido confirmado </span>
        <span class="sec">Agora é só aguardar que logo o produto chegará até você</span>
    </div>

    <section class="success-content">
        <div class="success-info">
            <div class="info">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 256 256">
                        <rect width="256" height="256" fill="none"></rect>
                        <path d="M128,16a88.1,88.1,0,0,0-88,88c0,75.3,80,132.2,83.4,134.6a8.3,8.3,0,0,0,9.2,0C136,236.2,216,179.3,216,104A88.1,88.1,0,0,0,128,16Zm0,56a32,32,0,1,1-32,32A32,32,0,0,1,128,72Z">
                        </path>
                    </svg>
                </div>
                <p>
                    Entrega em <b id="endereco">Rua José dias coelho - Lisboa</b>
                </p>
            </div>
            <div class="info">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256">
                        <rect width="256" height="256" fill="none"></rect>
                        <path d="M104,16h48a8,8,0,0,0,0-16H104a8,8,0,0,0,0,16Z"></path>
                        <path d="M128,32a96,96,0,1,0,96,96A96.2,96.2,0,0,0,128,32Zm45.3,62.1-39.6,39.6a8.2,8.2,0,0,1-11.4,0,8.1,8.1,0,0,1,0-11.4l39.6-39.6a8.1,8.1,0,1,1,11.4,11.4Z"></path>
                    </svg>
                </div>
                <p>
                    Previsão de entrega <br>

                    <b>7 dias- 15 dias</b>
                </p>
            </div>
            <div class="info">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
                        <rect width="256" height="256" fill="none"></rect>
                        <path d="M152,120H136V56h8a32.1,32.1,0,0,1,32,32,8,8,0,0,0,16,0,48,48,0,0,0-48-48h-8V24a8,8,0,0,0-16,0V40H108a48,48,0,0,0,0,96h12v64H104a32.1,32.1,0,0,1-32-32,8,8,0,0,0-16,0,48,48,0,0,0,48,48h16v16a8,8,0,0,0,16,0V216h16a48,48,0,0,0,0-96Zm-32,0H108a32,32,0,0,1,0-64h12Zm32,80H136V136h16a32,32,0,0,1,0,64Z"></path>
                    </svg>
                </div>
                <p>
                    Pagamento na entrega
                    <br>
                    <b>Dinheiro</b>
                </p>
            </div>
        </div>

        <div class="entrega-img">
            <img src="<?= URL_BASE ?>/assets/entrega.svg" alt="">
        </div>

    </section>

</section>

<script type="text/javascript">
        var rua = window.localStorage.getItem("rua");
        document.getElementById("endereco").innerHTML = rua;
</script>