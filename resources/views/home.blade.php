<!DOCTYPE html>
<html>
    <head>
        <title>Pixel Creativity Board</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/app.css">

    </head>
    <body>
        <div class="container">
            <div class="grid">
                <table>
                    @foreach($pixels as $gridRow)
                        <tr class="row-{{ $gridRow[0]->y }}">
                            @foreach($gridRow as $pixel)
                                <td id="{{ $pixel->x }}x{{ $pixel->y }}" @if ($pixel->color != null) style="background-color: {{ $pixel->color }}" class="disabled"@endif></td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
            <a href="{{ $justGivingUrl }}" class="donate-button">Donate</a>
        </div>
    </body>
</html>
