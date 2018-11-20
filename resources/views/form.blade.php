<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        
    </head>
    <body>

       

        

        <form action="{{ action('ColorController@color') }}" enctype="multipart/form-data" method="POST">        
            {{ csrf_field() }}
          <label for="imagen">Solo imagenes en jpg:</label> <br>
          <input type="file" name="imagen" id="imagen"><br>
          <input type="submit" value="Enviar" />
        </form>
    </body>
</html>