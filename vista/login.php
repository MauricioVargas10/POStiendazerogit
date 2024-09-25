<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Estilos integrados -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100%;
            background: url(https://images2.alphacoders.com/108/thumb-1920-108142.jpg) center/cover no-repeat;
            
        }

        .maincontainer {
            width: 400px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(7px);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form h2 {
            font-size: 2rem;
            color: white;
            margin-bottom: 20px;
        }

        .input-field {
            position: relative;
            border-bottom: 2px solid #ccc;
            margin: 15px 0;
        }

        .input-field input {
            width: 100%;
            height: 40px;
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            font-size: 1rem;
            padding-right: 30px;
        }

        .input-field label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1rem;
            pointer-events: none;
            transition: 0.3s ease-in;
        }

        .input-field i {
            position: absolute;
            top: 50%;
            right: 0; /* Posiciona el ícono a la derecha */
            transform: translateY(-50%);
            color: #fff;
            font-size: 1.2rem;
            padding-right: 10px;
        }

        .input-field input:focus~label,
        .input-field input:valid~label {
            transform: translateY(-120%);
            font-size: 0.8rem;
            top: 10px;
        }

        .password-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 25px 0 35px 0;
            color: #fff;
        }

        .password-options label {
            display: flex;
            align-items: center;
        }

        #remember {
            accent-color: #fff;
        }

        .password-options label p {
            margin-left: 8px;
        }

        .maincontainer a {
            color: #efefef;
            text-decoration: none;
        }

        .maincontainer a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #fff;
            color: #000;
            font-size: 1rem;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 3px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: #fff;
            color: #fff;
        }

        .account-options {
            text-align: center;
            margin-top: 30px;
            color: #fff;
        }
    </style>
</head>
<body>
  
    <div class="maincontainer">
    <div class="login-logo">
         <img src="assest/dist/img/pos.png" width="200 px">
        </div>
        <form action="" method="post">
            <!-- <h2>Login</h2> -->
            <div class="input-field">
                <input type="text" name="usuario" id="usuario" required>
                <label for="usuario">Usuario</label>
                <i class="fas fa-user"></i>
                
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
                <i class="fas fa-lock"></i>
            </div>

            <!-- <div class="password-options">
                <label for="remember">
                    <input type="checkbox" id="remember">
                    <p>Remember me</p>
                </label>
                <a href="#">Forgot Password</a>
            </div> -->

            <button type="submit">INGRESAR</button>

            <!-- <div class="account-options">
                <p>No tienes una cuenta?<a href="#">Registrarse</a></p>
            </div> -->

            <!-- PHP para la autenticación -->
            <?php
            $login = new ControladorUsuario();
            $login->ctrIngresoUsuario();
            ?>
        </form>
    </div>
</body>
</html>

<!-- /.login-box -->

<!-- jQuery -->
<script src="assest/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assest/dist/js/adminlte.min.js"></script>
</body>