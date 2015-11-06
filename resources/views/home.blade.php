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
        <a href="{{ $justGivingUrl }}" class="instructions-button">Instructions</a>

        <div class="page-container main-contents fundraiser-container">
            <h2>University of Portsmouth Team 2015</h2>
            <ul>
                <li>
                    <img src="https://scontent-lhr3-1.xx.fbcdn.net/hprofile-xta1/v/t1.0-1/p320x320/12116001_890728967641152_4429159945721636821_n.jpg?oh=577d5d19fd841f2c6e53638290da583b&oe=56F92A1F" alt="Name" />
                    <p>Ming Wu</p>
                </li>
                <li>
                    <img src="https://scontent-lhr3-1.xx.fbcdn.net/hprofile-xta1/v/t1.0-1/p320x320/12116001_890728967641152_4429159945721636821_n.jpg?oh=577d5d19fd841f2c6e53638290da583b&oe=56F92A1F" alt="Name" />
                    <p>This persons name</p>
                </li>
                <li>
                    <img src="https://scontent-lhr3-1.xx.fbcdn.net/hprofile-xta1/v/t1.0-1/p320x320/12116001_890728967641152_4429159945721636821_n.jpg?oh=577d5d19fd841f2c6e53638290da583b&oe=56F92A1F" alt="Name" />
                    <p>This persons name</p>
                </li>
                <li>
                    <img src="https://scontent-lhr3-1.xx.fbcdn.net/hprofile-xta1/v/t1.0-1/p320x320/12116001_890728967641152_4429159945721636821_n.jpg?oh=577d5d19fd841f2c6e53638290da583b&oe=56F92A1F" alt="Name" />
                    <p>This persons name</p>
                </li>
                <li>
                    <img src="https://scontent-lhr3-1.xx.fbcdn.net/hprofile-xta1/v/t1.0-1/p320x320/12116001_890728967641152_4429159945721636821_n.jpg?oh=577d5d19fd841f2c6e53638290da583b&oe=56F92A1F" alt="Name" />
                    <p>This persons name</p>
                </li>
                <li>
                    <img src="https://scontent-lhr3-1.xx.fbcdn.net/hprofile-xta1/v/t1.0-1/p320x320/12116001_890728967641152_4429159945721636821_n.jpg?oh=577d5d19fd841f2c6e53638290da583b&oe=56F92A1F" alt="Name" />
                    <p>This persons name</p>
                </li>
                <li>
                    <img src="https://scontent-lhr3-1.xx.fbcdn.net/hprofile-xta1/v/t1.0-1/p320x320/12116001_890728967641152_4429159945721636821_n.jpg?oh=577d5d19fd841f2c6e53638290da583b&oe=56F92A1F" alt="Name" />
                    <p>This persons name</p>
                </li>
                <li>
                    <img src="https://scontent-lhr3-1.xx.fbcdn.net/hprofile-xta1/v/t1.0-1/p320x320/12116001_890728967641152_4429159945721636821_n.jpg?oh=577d5d19fd841f2c6e53638290da583b&oe=56F92A1F" alt="Name" />
                    <p>This persons name</p>
                </li>
            </ul>
            <div class="clear-fix"></div>
        </div>
        <div class="page-container main-contents">
            <h2>What is this?</h2>
            <p>This will have information</p>
        </div>
        <div class="page-container main-contents impact-container">
            <h2>East African Playgrounds impact so far</h2>
            <ul>
                <li>
                    <img src="/images/impact/image3.jpg" alt="" />
                    <p>131000</p>
                    <h3>Children Impacted</h3>
                </li>
                <li>
                    <img src="/images/impact/image1.jpg" alt="" />
                    <p>85</p>
                    <h3>Playgrounds</h3>
                </li>
                <li>
                    <img src="/images/impact/image4.jpg" alt="" />
                    <p>30</p>
                    <h3>Arts and Play</h3>
                </li>
                <li>
                    <img src="/images/impact/image2.jpg" alt="" />
                    <p>25</p>
                    <h3>Ugandans Trained</h3>
                </li>
            </ul>
            <div class="clear-fix"></div>
        </div>
        <div class="page-container main-contents">
            <h2>Team Donation Target</h2>
            <div class="target">
                <div class="amount-raised"></div>
            </div>
        </div>
    </div>



@include ('partials/_foot')