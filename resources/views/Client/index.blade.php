<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="card">
            <h5 class="card-header">Featured</h5>
            <hr>
            <div class="card-body">
                <div class="container">
                    <div class="row">


                        <div class="col-md-12">
                            <h4>Liste des client de l'hotel</h4>
                            <hr>
                            <form action="/search/traitement">
                                <div class="input-group">
                                    <div class="form-outline float-lg-right">
                                        <input type="search" name="search" class="form-control" />

                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <hr>

                            @if (session('message'))
                                <div class="alert alert-primary">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            </ul>

                            <div class="table-responsive">
                                <a href="/ajouter" class="btn btn-primary">Ajouter</a>
                                <a href="/affiche" class="btn btn-danger">Imprimer</a>


                                <table id="mytable" class="table table-bordred table-striped">

                                    <thead>

                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>adresse</th>
                                        <th>tel</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Show</th>
                                        <th>Imprimer</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($clients as $client)
                                            <tr>

                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->nom }}</td>
                                                <td>{{ $client->prenom }}</td>
                                                <td>{{ $client->adresse }}</td>
                                                <td>{{ $client->tel }}</td>

                                                <td>
                                                    <a href="/update/{{ $client->id }}"
                                                        onclick="return confirm('Voulez vous modifier les informations du Client')"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                </td>
                                                <td>
                                                    <a href="/delete/{{ $client->id }}"
                                                        onclick="return confirm('Voulez vous Supprimer les informations du client')"><i
                                                            class="fa-solid fa-trash"></i></a>
                                                </td>
                                                <td>
                                                    <a href="/show/{{ $client->id }}"
                                                        onclick="return confirm('Voulez vous Afficher les informations du client')"><i
                                                            class="fa-solid fa-eye"></i></a>
                                                </td>
                                                <td>
                                                    <a href="/afficher/{{ $client->id }}"
                                                        onclick="return confirm('Voulez vous imprimer les informations du client')"><i
                                                            class="fa-solid fa-print"></i></a>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
            </script>
</body>

</html>
