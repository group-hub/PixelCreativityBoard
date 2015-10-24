<!DOCTYPE html>
<html>
<head>
    <title>Pixel Creativity Board</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="container">
    <h1>Selected <span id="selected-pixels">0</span> of <span id="max-pixels">{{ $maxPixels }}</span> pixels</h1>
    <div class="grid">
        <table>
            @foreach($gridItems as $gridRow)
                <tr class="row-{{ $gridRow[0]->y }}">
                    @foreach($gridRow as $gridItem)
                        <td id="{{ $gridItem->x }}x{{ $gridItem->y }}" @if ($gridItem->color != null) style="background-color: #{{ $gridItem->color }}" class="disabled"@endif></td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
    <div class="color-selector" style="display: none">
        <select>
            <option value="#ac725e">#ac725e</option>
            <option value="#d06b64">#d06b64</option>
            <option value="#f83a22">#f83a22</option>
            <option value="#fa573c">#fa573c</option>
            <option value="#ff7537">#ff7537</option>
            <option value="#ffad46">#ffad46</option>
            <option value="#42d692">#42d692</option>
            <option value="#16a765">#16a765</option>
            <option value="#7bd148">#7bd148</option>
            <option value="#b3dc6c">#b3dc6c</option>
            <option value="#fbe983">#fbe983</option>
            <option value="#fad165">#fad165</option>
            <option value="#92e1c0">#92e1c0</option>
            <option value="#9fe1e7">#9fe1e7</option>
            <option value="#9fc6e7">#9fc6e7</option>
            <option value="#4986e7">#4986e7</option>
            <option value="#9a9cff">#9a9cff</option>
            <option value="#b99aff">#b99aff</option>
            <option value="#c2c2c2">#c2c2c2</option>
            <option value="#cabdbf">#cabdbf</option>
            <option value="#cca6ac">#cca6ac</option>
            <option value="#f691b2">#f691b2</option>
            <option value="#cd74e6">#cd74e6</option>
            <option value="#a47ae2">#a47ae2</option>
        </select>
    </div>
    <div class="save-button">Save</div>
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/all.js"></script>
</body>
</html>
