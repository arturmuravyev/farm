<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Farm</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito';
                background-image: linear-gradient(#FFF, #00FFFF);
                height: 100vh;
                padding: 0;
            }

        </style>
    </head>
    <body>
        <div id="app">
            <front-page></front-page>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
