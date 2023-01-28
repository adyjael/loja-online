<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title>MERCEARIA</title>
    <link rel="stylesheet" href="<?= URL_BASE ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>



    <header class="cabecalho">
        <div class="nav">
            <div class="logo">
              <a href="<?= URL_BASE?>">  <img src="<?= URL_BASE ?>/assets/logo.jpg" alt=""></a>
            </div>
            <div class="nav-link">
                <a class="localiza" href="javascript:void()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 256 256">
                        <rect width="256" height="256" fill="none"></rect>
                        <path d="M128,16a88.1,88.1,0,0,0-88,88c0,75.3,80,132.2,83.4,134.6a8.3,8.3,0,0,0,9.2,0C136,236.2,216,179.3,216,104A88.1,88.1,0,0,0,128,16Zm0,56a32,32,0,1,1-32,32A32,32,0,0,1,128,72Z">
                        </path>
                    </svg>
                    <span> Lisboa, PT</span>
                </a>
                <a href="<?= URL_BASE ?>/admin">
                <i class="fa-solid fa-user"></i> Admin
                </a>
                <a href="<?= URL_BASE ?>/carrinho">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 256 256">
                        <rect width="256" height="256" fill="none"></rect>
                        <path d="M223.9,65.4l-12.2,66.9A24,24,0,0,1,188.1,152H72.1l4.4,24H184a24,24,0,1,1-24,24,23.6,23.6,0,0,1,1.4-8H102.6a23.6,23.6,0,0,1,1.4,8,24,24,0,1,1-42.2-15.6L34.1,32H16a8,8,0,0,1,0-16H34.1A16,16,0,0,1,49.8,29.1L54.7,56H216a7.9,7.9,0,0,1,6.1,2.9A7.7,7.7,0,0,1,223.9,65.4Z">
                        </path>
                    </svg>
           
                    <span class="totalProdutos">
                        <span id="totalProdutos"><?= isset($_SESSION["totalProdutos"]) ? $_SESSION["totalProdutos"] :  "0" ?></span>
                    </span>
                </a>
            </div>

          
        </div>
    </header>