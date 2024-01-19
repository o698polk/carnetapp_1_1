

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Casillero Virtual</title>
  <style>
    /* Estilos generales */
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f2f2f2; /* Color de fondo gris */
    }
    .container {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      box-sizing: border-box;
    }
    h1, p {
      color: #333;
    }
    /* Estilos para dispositivos móviles */
    @media screen and (max-width: 480px) {
      .container {
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">

    <h1>Hola,{{ $dato['nombre_apellido'] }}</h1>
    <h2>Por favor comuníquese con los técnicos de la institución </h2>
     <p>Para verificar su cuenta, acérquese o envié un correo solicitando la verificación de su cuenta con sus datos personales al siguiente correo:example@gmail.com</p>
    <h3><strong>Código:</strong> {{ $dato['code_verifi'] }}</h3>
     <h4>Casillero Virtual</h4>
  </div>
</body>
</html>
