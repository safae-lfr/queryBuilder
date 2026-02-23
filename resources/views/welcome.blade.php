<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')<p style="color:red">{{ $message }}</p>@enderror

        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')<p style="color:red">{{ $message }}</p>@enderror

        <br>

        <button type="submit">Save</button>
    </form>
</body>
</html>