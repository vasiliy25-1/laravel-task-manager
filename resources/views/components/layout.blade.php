<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'To-Do List' }}</title>
</head>
<body>
<div>

</div>

<div>
    {{ $slot }}
</div>
</body>
</html>
