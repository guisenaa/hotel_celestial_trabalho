<?php
include_once("conexao.php"); //Incluir o arquivo de conexão com o banco de dados.
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
                            <li class="active"><a href="#">Contato</a></li>
                            <li><a href="reservas.php">Reservas</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <br>
            <h3 class="meu-container">Entre em Contato Conosco</h3>

            <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if(!empty($dados['sendbox'])) {       
            $query_msg = "INSERT INTO mensagens (name, email, country, mensagem)
            VALUES (:name, :email, :country, :mensagem)";
            $cad_msg = $conn->prepare($query_msg);
            $cad_msg->bindParam(':name', $dados['name'], PDO::PARAM_STR);
            $cad_msg->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $cad_msg->bindParam(':country', $dados['country'], PDO::PARAM_STR);
            $cad_msg->bindParam(':mensagem', $dados['mensagem']);

            $cad_msg->execute();

            if($cad_msg->rowCount()){
                echo'Mensagem enviada com sucesso!<br>';
            }else {
                echo'Erro: Mensagem não foi enviada com sucesso!<br>';
            }
            }
            ?>

            <div class="container">
                <form method="POST" action="">
                    <label for="name">Nome</label>
                    <input type="name" id="name" name="name" placeholder="Seu nome...">
                                        
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Seu email...">
                    <br>
                    <br>
                    <label for="country">País</label>
                    <select id="country" name="country">
                        <option value="australia">Austrália</option>
                        <option value="brazil">Brasil</option>
                        <option value="canada">Canadá</option>
                        <option value="france">França</option>
                        <option value="germany">Alemanha</option>
                        <option value="italy">Itália</option>
                        <option value="japan">Japão</option>
                        <option value="spain">Espanha</option>
                        <option value="switzerland">Suíça</option>
                        <option value="unitedkingdom">Reino Unido</option>
                    </select>

                    <label for="mensagem">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" placeholder="Escreva algo..." style="height: 200px;"></textarea>
                    <input type="submit" value="Enviar" name="sendbox">
                </form>
            </div>

    </body>
</html>