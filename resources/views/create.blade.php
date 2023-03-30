<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Create') }}</title>
</head>
<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <input type="text" placeholder="name" name="name">
        <input type="number" placeholder="score" name="score">
        <button type="submit">{{ __('Add') }}</button>
    </form>
</body>
</html>
