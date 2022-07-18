<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <h1>Recipe一覧画面表示</h1>
    <div>
        @foreach ($recipes as $recipe)
        <h2>
            ・{{ $recipe->title }}
        </h2>
        <p>
            {{ $recipe->memo }}
        </p>
        <a href="{{ route('recipe.edit', $recipe) }}">編集</a>
        @endforeach
    </div>
</body>

</html>
