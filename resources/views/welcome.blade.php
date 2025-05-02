<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Nichos</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-image: url("{{ asset('imagenes/cementerio.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        /* Capa oscura encima de la imagen para resaltar el texto */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Oscurece un poco */
            z-index: 0;
        }

        .content {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            padding: 20px;
        }

        h1 {
            font-size: 3.2rem;
            font-weight: 800;
            margin-bottom: 10px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
        }

        p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
        }

        a.button {
            padding: 14px 35px;
            background-color: rgb(27, 68, 165);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            margin: 10px; /* Add spacing between buttons */
        }

        a.button:hover {
            background-color: rgb(31, 133, 207);
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            a.button {
                padding: 10px 25px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>Sistema de Gestión de Nichos</h1>
        <p>Cementerio General de Quetzaltenango</p>
        <a href="{{ route('login') }}" class="button">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="button" style="background-color: green;">Registrarse</a>
    </div>
</body>

</html>
