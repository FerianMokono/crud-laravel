<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="containe">
        <div class="card">
            <div class="card card-header">
                <h1>imprimer client de l'hotel</h1>
            </div>

            <div class="card card-body">
                @if ($client)
                    <p>ID :<b>{{ $client->id }}</b></p>
                    <p>Nom :<b>{{ $client->nom }}</b></p>
                    <p>Prenom :<b>{{ $client->prenom }}</b></p>
                    <p>Adresse :<b>{{ $client->adresse }}</b></p>
                    <p>Tel :<b>{{ $client->tel }}</b></p>
                @else
                    <p>erreur</p>
                @endif
                <a href="/imprimer2" class="btn btn-danger">Imprimer</a>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
