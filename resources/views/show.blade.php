<!DOCTYPE html>
<html>
<head>
    <title>Example</title>
</head>
<body>
    <p>Id : {{ $student->id }}</p>
    <p>Name : {{ $student->name }}</p>
    <p>Score : {{ $student->score }}</p>
    <br>
    <p>Activities : </p>
    @foreach ($student->activities as $activity)
        <p>{{ $activity->name }}</p>
    @endforeach
</body>
</html>
