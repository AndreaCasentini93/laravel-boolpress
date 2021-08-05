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
        <h1>Hai ricevuto un nuovo messaggio!</h1>
        <strong>Nome</strong>: {{ $lead->name }}
        <strong>Email</strong>: {{ $lead->email }}
        <strong>Messaggio</strong>:<br><p>{{ $lead->message }}</p>
    </div>
</body>
</html>