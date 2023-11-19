<?php
    include_once("conexao_reservas.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo/bootstrap-3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilo/justified-nav.css">
        <link rel="icon" type="image/png" href="img/icon_ed15dc96b1894098e29653f14a7f22a9.ico"/>
        <script src="javascript/code.jquery.com_jquery-3.7.1.js"></script>
        <style>
            
            body {font-family: Arial, Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}

            input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }                
            
            input[type=submit]{
                background-color: #9a9a9a;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submite]:hover {
                background-color: #CCCCCC;
            }

            .data-input {
                max-width: 100px;
            }

            .meu-container{
                margin-right: auto;
                margin-left: auto;
                padding-right: 10   0px;
                padding-left: 100px;
            }
            
            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }

            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            .row.content {height: 450px;}
            
            .sidenav {
                padding-top: 20px;
                background-color: #c8c8c8;
                height: 100%;
            }

            .navbar-inverse {
                background-color: #CCCCCC;
                border-color: #CCCCCC;
            }

            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }
            
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {height: auto;}
            }
        </style>    
        <title>Hotel Celestial</title>
    </head>
    <body style = "background-color:#CCCCCC;">
       <div class="meu-container">
            <!-- Menu de navegação -->
            <nav class="navbar navbar-inverse">
                <div class="conteiner-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="img/logo_hotel.PNG" alt="Logo Hotel Celestial" width="100">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="index.html">Início</a></li>
                            <li><a href="sobre.html">Sobre Nós</a></li>
                            <li><a href="acomodacoes.html">Acomodações</a></li>
                            <li><a href="contato.php">Contato</a></li>
                            <li class="active"><a href="#">Reservas</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br>

            <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($dados['sendbox2'])) {
            $query_reserva = "INSERT INTO reservas (completename, email, adultos, criancas, quarto, data_in, data_out) 
            VALUES (:completename, :email, :adultos, :criancas, :quarto, :data_in, :data_out)";
            $cad_reserva = $conn->prepare($query_reserva);
            $cad_reserva->bindParam(':completename', $dados['completename'], PDO::PARAM_STR);
            $cad_reserva->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $cad_reserva->bindParam(':adultos', $dados['adultos'], PDO::PARAM_STR);
            $cad_reserva->bindParam(':criancas', $dados['criancas'], PDO::PARAM_STR);
            $cad_reserva->bindParam(':quarto', $dados['quarto'], PDO::PARAM_STR);
            $cad_reserva->bindParam(':data_in', $dados['data_in'], PDO::PARAM_STR);
            $cad_reserva->bindParam(':data_out', $dados['data_out'], PDO::PARAM_STR);   
            
            $cad_reserva->execute();

            if($cad_reserva->rowCount()){
                echo"Reserva feita com sucesso!! Te aguardamos na data escolhida :D<br>";
            }else{
                echo "Algo deu errado... Tente novamente mais tarde.<br>";
            }
            }
            ?>

            <h3 class="meu-container">Reserve sua Estadia no Hotel Celestial</h3>
            <p class="lead">Bem-vindo à seção de reservas do Hotel Celestial, onde você pode transformar seus planos de viagem em realidade.
            <br> Estamos ansiosos para recebê-lo e garantir que sua estadia seja excepcional em todos os sentidos.
            <br> Aqui, você encontrará todas as informações necessárias para garantir a reserva perfeita.</p>    
            
        <div class="container">
            <form method="POST" action="">
                <div>
                  <label for="completename">Nome Completo</label>
                  <br>
                  <input type="name" id="completename" name="completename" placeholder="Seu nome completo">
                  <br>
                  <br>
                  <label for="email">Email</label>
                  <br>
                  <input type="email" id="email" name="email" placeholder="Seu email">
                </div>
                <br>
                <div>
                  <label for="adultos">Adultos</label>
                  <select id="adultos" name="adultos">
                    <option selected>Escolher...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                <   <option value="5">+5</>
                  </select>
                </div>
                <br>
                <div>
                    <label for="criancas">Crianças</label>
                    <select id="criancas" name="criancas">
                        <option selected>Escolher...</option>
                        <option value="1">0</option>
                        <option value="2">1</option>
                        <option value="3">2</option>
                        <option value="4">3</option>
                        <option value="5">4</option>
                        <option value="6">+5</option>
                    </select>
                  </div>
                  <br>
                  <div>
                    <label for="quarto">Quarto</label>
                    <select id="quarto" name="quarto">
                      <option selected>Escolher...</option>
                      <option value="Standard">Suite Standard Estrela Cadente</option>
                      <option value="Junior">Suíte Júnior Nebulosa Luxuosa</option>
                      <option value="Presidencial">Suíte Presidencial Céu Estrelado</option>
                    </select>
                  </div>
                  <br>
                <div>
                    <label for="data_in">Data de Check-in:</label>
                    <br>
                    <div>
                           <input type="text" class="form-control data-input" id="data_in" name="data_in" placeholder="dd/mm/aa">
                    </div>                    
                </div>
                <br>
                <div>
                    <label for="data_out">Data de Check-out:</label>
                    <br>
                    <div>
                        <input type="text" class="form-control data-input" id="data_out" name="data_out" placeholder="dd/mm/aa"                     </div>
                </div>
                <br>
                <br>
                <input type="submit" value="Reservar" name="sendbox2">
            </form>
        </div>    
    </body>
</html>