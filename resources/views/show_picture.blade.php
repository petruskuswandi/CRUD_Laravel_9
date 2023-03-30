<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Picture</title>
</head>
<body>
    <p>{{ $pic->name }}</p>
    <p>{{ $pic->path }}</p>
    <img src="{{ $url }}" alt="" height="200px">
    <form action="{{ route('picture.delete', $pic) }}" method="POST">
        @method('delete')
        @csrf
        <button type="submit">Delete</button>
    </form>
    <form action="{{ route('picture.copy', $pic) }}" method="get">
        <button type="submit">Copy</button>
    </form>
    <form action="{{ route('picture.move', $pic) }}" method="get">
        <button type="submit">Move</button>
    </form>
</body>
</html>
