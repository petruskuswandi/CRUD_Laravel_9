<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Score</th>
            <th>Teacher</th>
            <th>CreateTime</th>
            <th>UpdateTime</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->score }}</td>
                <td>{{ $student->teacher_id }}</td>
                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
