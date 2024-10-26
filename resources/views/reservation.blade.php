<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="border: 3px solid black;">
        <h2>New Reservation</h2>
        <form action="/createReservation" method="POST">
            @csrf
            <input name="title" type="text" placeholder="Reservation Title">
            <label><input name="type" type="radio" value="car">car</label>
            <label><input name="type" type="radio" value="premises">premises</label>
            <label><input name="type" type="radio" value="item">item</label>
            <input name="startDate" type="date" placeholder="startDate">
            <input name="endDate" type="date" placeholder="endDate">
            <button type="submit">Create reservation</button>
        </form>
    </div>
</body>
</html>