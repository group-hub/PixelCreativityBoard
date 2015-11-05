@include ('partials/_head')

    @include ('partials/_header')

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

        <div class="page-container main-contents">
            <p>This will have information</p>
        </div>
    </div>



@include ('partials/_foot')