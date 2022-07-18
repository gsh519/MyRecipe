<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyRecipe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <h1>MyRecipe編集</h1>
    @if (session('message'))
    <div>
        <p>
            {{ session('message') }}
        </p>
    </div>
    @endif
    <form action="{{ route('recipe.edit', $recipe) }}" method="post">
        @csrf
        <!-- 料理名 -->
        <div>
            <label>料理名</label>
            <input type="text" name="title" value="{{ $recipe->title }}">
        </div>

        <!-- 材料 -->
        <div>
            <div>
                <label>材料</label>
                @if ($recipe->ingredients)
                @foreach ($recipe->ingredients as $ingredient)
                <input type="text" name="ingredients[]" value="{{ $ingredient->ingredient_name }}">
                @endforeach
                @else
                <input type="text" name="ingredients[]" value="">
                @endif
            </div>
        </div>

        <!-- 作り方 -->
        <div>
            <div>
                <label>作り方</label>
                @if ($recipe->how_to_makes)
                @foreach ($recipe->how_to_makes as $how_to_make)
                <input type="text" name="how_to_makes[]" value="{{ $how_to_make->make }}">
                @endforeach
                @else
                <input type="text" name="how_to_makes[]" value="">
                @endif
            </div>
        </div>

        <!-- 主菜・副菜・スープ選択 -->
        <div>
            <label>
                主菜
                <input type="radio" name="dish_type" value="1">
            </label>
            <label>
                副菜
                <input type="radio" name="dish_type" value="2">
            </label>
            <label>
                スープ
                <input type="radio" name="dish_type" value="3">
            </label>
            <label>
                その他
                <input type="radio" name="dish_type" value="9">
            </label>
        </div>

        <div>
            <label>
                お気に入り
                <input type="checkbox" class="__is_favorite" name="is_favorite" value="{{ $recipe->is_favorite }}">
            </label>
        </div>

        <!-- 料理メモ -->
        <div>
            <label>料理メモ</label>
            <input type="textarea" name="memo" value="{{ $recipe->memo }}">
        </div>

        <div>
            <button type="submit">
                更新
            </button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            // 主菜・ 副菜・ スープ選択
            if ("{!! $recipe->dish_type !!}") {
                let dish_type = $('input[value = "{!! $recipe->dish_type !!}"]');
                dish_type.prop('checked', true);
            }

            // お気に入りフラグ
            let is_favorite = $('.__is_favorite');

            if (is_favorite.attr('value') === '1') {
                is_favorite.prop('checked', true);
            }

            is_favorite.on('click', function() {
                if ($(this).attr('value') === '1') {
                    $(this).prop('value', 0);
                } else {
                    $(this).prop('value', 1);
                }
            });
        })
    </script>
</body>

</html>
