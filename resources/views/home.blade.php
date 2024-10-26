<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @auth
    <p>Congrats you are logged in.</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Log out</button>
    </form>

    <form action="/newReservation" method="POST">
        @csrf
        <button type="submit">New reservation</button> 
    </form>

    <div style="border: 3px solid black;">
        <h2>All Reservations</h2>
        @foreach ($reservations as $reservation)
            <div style="background-color: gray; padding: 10px; margin: 10px;">
                <h3>{{$reservation['title']}}</h3>
                <p>Type:{{$reservation['type']}}</p>
                <p>Start date: {{$reservation['startDate']}}</p>
                <p>End date: {{$reservation['endDate']}}</p>
                <p>Client: {{$reservation->client->name}}</p>
                <p><a href="/edit-reservation/{{$reservation->id}}">Edit reservation</a></p>
                <form action="/cancel-reservation/{{$reservation->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Cancel reservation</button>
                </form>
            </div>
        @endforeach
    </div>

    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="surname" type="text" placeholder="surname">
            <input name="email" type="text" placeholder="email">
            <input name="phoneNumber" type="text" placeholder="phoneNumber">
            <input name="password" type="password" placeholder="password">
            <button type="submit">Register</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button type="submit">Log in</button>
        </form>
    </div>
    @endauth
</body>
</html>