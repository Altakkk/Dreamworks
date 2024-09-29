<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <h1>Edit a teacher</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST", action="{{route('teachers.update', ['teacher'=>$teacher])}}">
        @csrf
        @method('put')
        <div>
            <label>Нэр</label>
            <input type="text" name="firstName" placeholder="Нэрээ бичнэ үү." value="{{$teacher->firstName}}">
        </div>
        <div>
            <label>Овог</label>
            <input type="text" name="lastName" placeholder="Овгоо бичнэ үү." value="{{$teacher->lastName}}">
        </div>
        <div>
            <label>Хүйс</label>
            <input type="text" name="gender" value="{{$teacher->gender}}">
        </div>
        <div>
            <label>Утасны дугаар</label>
            <input type="text" name="phoneNumber" placeholder="Утасны дугаараа бичнэ үү." value="{{$teacher->phoneNumber}}">
        </div>
        <div>
            <label>Хичээл</label>
            <input type="text" name="lesson" placeholder="Ордог хичээлээ бичнэ үү." value="{{$teacher->lesson}}">
        </div>
        <div>
            <input type="submit" value="Засах">
        </div>
    </form>
</body>
</html>