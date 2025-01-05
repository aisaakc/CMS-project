# filepath: /c:/Users/user/Desktop/CMS-project/cms/resources/views/pages/show.blade.php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Página</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="font-inter bg-gray-50">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $page->title }}</h1>
        <p class="text-gray-700 mb-4">{!! $page->content !!}</p>
        <p class="text-gray-700 mb-4"><strong>Estado:</strong> {{ ucfirst($page->status) }}</p>
        <a href="{{ route('pages.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Volver a la lista</a>
    </div>

</body>

</html>
