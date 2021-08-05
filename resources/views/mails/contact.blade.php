<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title -->
    <title>Email</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Hai ricevuto un nuovo messaggio!</h1>
        <div>
            <strong class="text-primary">Nome</strong>: {{ $lead->name }}
        </div>
        <div>
            <strong class="text-primary">Email</strong>: {{ $lead->email }}
        </div>
        <div>
            <strong class="text-primary">Messaggio</strong>:
            <br>
            <p>{{ $lead->message }}</p>
        </div>
    </div>
</body>
</html>