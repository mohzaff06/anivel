<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Explore animation and level design with our creative tools">
    <title>AniVel - Creative Animation & Level Design</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body class=" h-full w-full bg-slate-900 text-white font-sans antialiased overflow-x-hidden" style="font-family: 'Inter', sans-serif;">
    <main class="relative w-full h-full">
        {{$slot}}
    </main>
</body>
</html>
