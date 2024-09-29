<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher</title>
</head>
<body>
    <h1>Teacher</h1>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Овог</th>
                <th>Нэр</th>
                <th>Хүйс</th>
                <th>Утас</th>
                <th>Хичээл</th>
            </tr>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{$teacher->id}}</td>
                    <td>{{$teacher->lastName}}</td>
                    <td>{{$teacher->firstName}}</td>
                    <td>{{$teacher->gender}}</td>
                    <td>{{$teacher->phoneNumber}}</td>
                    <td>{{$teacher->lesson}}</td>
                    <td>
                        <a href="{{route('teachers.edit',['teacher'=>$teacher])}}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>