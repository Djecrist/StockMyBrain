<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO | Create</title>
</head>
<body style="text-align:center">
    <h1>La Todolist</h1><br>
    <h3>
        <x-alert />
    </h3>
    <form action="/upload" method="post">
        CRÉER UNE TACHE <br><br>
        Nom<input type="text" name="Nom" /><br>
        Texte<input type="text" name="Texte" /><br>
        Date<input type="date" name="Date" /><br>
        <input type="submit" value="Create" />
    </form>
    <br>
    <a href="/home">Retour</a>

            <a href="{{asset('/' . $todo->id . '/edit')}}">Modifier</a>
            <a href="{{asset('/' . $todo->id . '/completed')}}">Valider</a>
            <a href="{{asset('/' . $todo->id . '/delete')}}">Supprimer</a>
        </li>

</body>
</html>
