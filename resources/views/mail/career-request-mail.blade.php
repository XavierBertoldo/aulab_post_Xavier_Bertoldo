<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DOcument</title>
</head>

<body style="text-align: center; margin-top:30px">
    <h1>Richiesta di Nuovo ruolo da {{ $info['name'], $info['surname'] }}</h1>
    <h4>per il ruolo di {{ $info['role'] }}</h4>
    <p>email: {{ $info['email'] }}</p>
    <p>motivazione: {{ $info['message'] }}</p>
    <div>
        <button
            style="
            padding:10px;
        background-color:#0DCAF0;
         color:white; 
         border:0px solid transparent;
         border-radius:30px;">
            <a style="all:unset" href="http://127.0.0.1:8000/admin/dashboard">
                vai alla sezione Admin
            </a>
        </button>
    </div>


</body>

</html>
