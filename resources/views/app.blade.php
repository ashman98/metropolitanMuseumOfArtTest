<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + Vue</title>
    @vite(['resources/js/app.js',"resources/js/Pages/{$page['component']}.vue"])
    {{--        @vite(['resources/js/app.jsx'])--}}

    @inertiaHead
</head>
<body class="font-sans antialiased">
@inertia
</body>
</html>
