<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Reservation</h1>
    <form action="/edit-reservation/{{$reservation->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name='title' value="{{$reservation->title}}">
        <input name="startDate" type="date" placeholder="startDate" value="{{$reservation->startDate}}">
        <input name="endDate" type="date" placeholder="endDate" value="{{$reservation->endDate}}">
        <button type="submit">Save changes</button>
    </form>
</body>
</html>