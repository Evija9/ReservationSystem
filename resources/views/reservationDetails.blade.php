<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="border: 3px solid black;">
        <h2>Reservation Details</h2>
        <form action="/saveReservation" method="POST">
            @csrf
            @foreach ($options as $option)
            @if ($type == 'car')
            <input type="radio" name="option_id" value="{{ $option->id }}">    
            <h3>{{$option['brand']}} {{$option['model']}}</h3>
                <p>{{$option['description']}}</p>
                <p>Production Date: {{$option['productionDate']}}</p>
            @elseif ($type == 'premises')
            <input type="radio" name="option_id" value="{{ $option->id }}">    
            <h3>{{$option['title']}}</h3>
                <p>{{$option['address']}}</p>
                <p>{{$option['city']}}</p>
                <p>{{$option['description']}}</p>
            @elseif ($type == 'item')
            <input type="radio" name="option_id" value="{{ $option->id }}">    
            <h3>{{$option['kind']}} {{$option['model']}}</h3>
                <p>{{$option['description']}}</p>
                <p>Production Date: {{$option['productionDate']}}</p>
                @endif
        @endforeach
        <button type="submit">Save reservation</button>
        </form>
    </div>
</body>
</html>