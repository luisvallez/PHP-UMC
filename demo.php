<?php

///Llamada a API.
const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);

/// Inidicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

/// Alternativa usar file_get_contents.
$data = json_decode($result, true);

curl_close($ch);
// var_dump($data);

?>

<head>
  <meta charset="UTF-8">
  <title>Next UMC Movie</title>
  <meta name="description" content="La proxima pelicula de marvel">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Centered viewport -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<style>
  :root {
    color-scheme: dark;
  }

  body {
    display: grid;
    place-content: center;
  }

  img {
    margin: 0 auto;
    border-radius: 10px;
  }

  section {
    display: block;
    justify-content: center;
    text-align: center;
  }

  hgroup {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: ce;
  }
</style>

<main>
  <section>
    <h2>La proxima pelicula de Marvel</h2>
    <img src=<?= $data["poster_url"] ?> width="300" alt="<?= $data["title"] ?>" />
    <hgroup>
      <h2>
        <?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días
      </h2>

      <p>
        Fecha de estreno: <?= $data["release_date"] ?>
      </p>

      <p>
        La siguiente es: <?= $data["following_production"]["title"] ?>
      </p>
    </hgroup>
  </section>
</main>