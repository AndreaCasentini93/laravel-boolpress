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
    <div>
        <h1>Hai ricevuto un nuovo messaggio!</h1>
        <div>
            <strong>Nome</strong>: {{ $lead->name }}
        </div>
        <div>
            <strong>Email</strong>: {{ $lead->email }}
        </div>
        <br>
        <div>
            <strong>Messaggio</strong>:
            <div class="message">{{ $lead->message }}</div>
        </div>
    </div>
</body>
</html>

<style lang="scss">
    body {
        font-family: 'Roboto';
        color: #3E444A;
    }

    h1 {
        margin-bottom: 50px;
        text-align: center;
        text-transform: uppercase;
        font-size: 20px;
        color: #32373C;
    }

    strong {
        font-size: 16px;
        color: #32373C;
    }

    div {
        font-size: 16px;
    }

    .message {
        text-align: justify;
        font-size: 14px;
    }
</style>