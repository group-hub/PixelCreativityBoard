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
        <a href="#" class="instructions-button">Instructions</a>
        <div class="page-container main-contents fundraiser-container">
            <h2>University of Portsmouth Team 2015-16</h2>
            <ul>
                @foreach($fundraisers as $fundraiser)
                    <li>
                        <img src="https://scontent-lhr3-1.xx.fbcdn.net/hprofile-xta1/v/t1.0-1/p320x320/12116001_890728967641152_4429159945721636821_n.jpg?oh=577d5d19fd841f2c6e53638290da583b&oe=56F92A1F" alt="Name" />
                        <p>{{ $fundraiser->name }}</p>
                    </li>
                @endforeach
            </ul>
            <div class="clear-fix"></div>
        </div>
        <div class="page-container main-contents">
            <h2>What is this?</h2>
            <p>We created Pixtivity to make donating a fun and creative process. We encourage everyone to get imaginative together to create an ever evolving piece of art. You are also taking part in bringing joy to children all across East Africa, by funding playgrounds to be built in their school playgrounds.</p>
            <p>There are 4800 squares. There are a minimum 4800 opportunities to support us.</p>
            <p>But there is a catch. For a given amount of time, a couple of neglected coloured squares will turn back to black. We added this to represent that childhood is nurtured, many children have their childhood cut short for all sorts of horrible reasons. Just give them some attention and colour the squares in!</p>
        </div>
        <div class="page-container main-contents">
            <h2>About the charity</h2>
            <p>East African Playgrounds aims to enhance the lives of children across Uganda by developing children’s learning opportunities, creativity and environments through building playgrounds and running arts and play sessions. These playgrounds enable the children to make the most of their childhood by developing their social, mental and physical selves through play. We provide arts and play programs to emphasize the importance of play and help the children develop.</p>
            <p>Our objectives are to train young men and women across East Africa to become professional builders and welders; to then use their new skills to build high quality playgrounds across East Africa. In doing this we aim to provide high quality training and employment through our playground building workshops. Uganda has a high youth unemployment rate, with 62% of has one of the world’s youngest population (78% being under 30). By constructing our playgrounds using local material and our teams of locally trained playground builders we are able to increase the impact we have on development in Uganda. The volunteers from our projects aren’t there to replace staff, these volunteers help with the building of the playground but also so we can train and employ more local staff.</p>
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
            <h2>Team donation target</h2>
            <div class="target">
                <div class="amount-raised" style="width: {{ $percentageRaised }}%"></div>
            </div>
        </div>
        <div class="page-container main-contents">
            <h2>Photo Gallery</h2>
        </div>
        <div class="page-container main-contents">
            <footer>
                <h2>Supported by</h2>
                <a href="http://uu-u.uk/">
                    <img src="/images/uu-u-logo.png" alt="uu-u design" />
                </a>
                <a href="https://www.grouphub.co">
                    <img src="/images/group-hub-logo.png" alt="Group Hub" />
                </a>
                <div class="clear-fix"></div>
            </footer>
        </div>
    </div>

@include ('partials/_foot')