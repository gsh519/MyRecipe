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
    <h1>MyRecipe新規登録</h1>
    @if (session('message'))
    <div>
        <p>
            {{ session('message') }}
        </p>
    </div>
    @endif
    <form action="{{ route('recipe.add') }}" method="post">
        @csrf
        <!-- 料理名 -->
        <div>
            <label>料理名</label>
            <input type="text" name="title">
        </div>

        <!-- 材料 -->
        <div>
            <div>
                <label>材料</label>
                <input type="text" name="ingredients[]">
            </div>
        </div>

        <!-- 作り方 -->
        <div>
            <div>
                <label>作り方</label>
                <input type="text" name="how_to_makes[]">
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
                <input type="checkbox" class="__is_favorite" name="is_favorite" value="0">
            </label>
        </div>

        <!-- 料理メモ -->
        <div>
            <label>料理メモ</label>
            <input type="textarea" name="memo">
        </div>

        <div>
            <button type="submit">
                登録
            </button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('.__is_favorite').on('click', function() {
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
