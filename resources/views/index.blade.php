<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Show') }}</title>
</head>
<body>
    <h1>{{ __('Welcome to this page!') }}</h1>

    <p>Locale: {{ App::getLocale() }}</p>
    <a href="{{ route('set_locale', 'en') }}">{{ __('English') }}</a>
    <a href="{{ route('set_locale', 'id') }}">{{ __('Indonesian') }}</a>
    <br>
    @if (Auth::check())
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">{{ __('Logout') }}</button>
        </form>
        <p>{{ __('Name') }}: {{ $user->name }}</p>
        <p>{{ __('Email') }}: {{ $user->email }}</p>
        <p>{{ __('Role') }}: {{ $user->role }}</p>
        <p>ID: {{ $id }}</p>
    @else
        <a href="{{ route('login') }}">{{ __('Login') }}</a>
        <a href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif

    <table border="1">
        <tr>
            <th>ID</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Score') }}</th>
            <th>{{ __('Teacher') }}</th>
            <th>{{ __('Created At') }}</th>
            <th>{{ __('Updated At') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        @foreach ($data as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>
                    <a href="{{route('show', $student->id)}}">{{ $student->name }}</a>
                </td>
                <td>{{ $student->score }}</td>
                <td>{{ $student->teacher_id }}</td>
                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
                <td>
                    <form action="{{ route('edit', $student) }}" method="get">
                        @csrf
                        <button type="submit">{{ __('Edit') }}</button>
                    </form>
                    <form action="{{ route('delete', $student) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit">{{ __('Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ __('Current page') }}: {{ $data->currentPage()}} <br>
    {{ __('Total page') }}: {{ $data->total() }} <br>
    {{ __('Data per page') }}: {{ $data->perPage() }} <br>

    {{ $data->links('pagination::bootstrap-4') }}
</body>
</html>
