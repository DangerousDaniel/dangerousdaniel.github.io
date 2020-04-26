@extends('layouts.app')

<title>Digital Negotiator - Welcome</title>

<style>
    body {
        background-color: #E3EDE5 !important;
    }
</style>

@section('content')
    <img class="welcome-banner" src="{{URL::asset('/img/test.png')}}" alt="Welcome Banner (not found)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="card text-white mb-3">
                <div class="welcome-card-body">
                    <br/>
                    <h4 class="card-title">Welcome to Digital Negotiator</h4>

                    {{--not finished--}}
                    <p class="card-text">In digital negotiator you play as a company trying to research and develop cutting edge technology.
                        By trading Research Cards to complete goals, you are gaining knowledge.
                        with this knowledge you can develop inventions that shape the course of this world.
                        Spending your companies’ resources is a risk reward system. Like Nintendo in 1995 with the virtual boy, it sucked, the technology wasn’t there yet, the rest the industry wasn’t on board, and it failed.
                        But if you look at 2016, Microsoft, Sony, Valve, Oculus, HTC all come out with VR headsets within a few years of each other, and it’s considered the next big thing
                    </p>



                    <h4 class="card-title" style="margin-top: 50px;">Game Components</h4>

                    <h5 class="other-title">Categories</h5>
                    <p class="card-text">The game features {{ count($categories) }} categories.
                        Categories represent different fields or aspects of IT, and will appear on Research Cards and Goal Cards.
                        The categories are:
                    </p>
                    <ul class="card-text">
                        @foreach ($categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>

                    <h5 class="other-title">Research Cards</h5>
                    <p class="card-text">Each player has 8 Research Cards in their hand at all times.
                        Each Research Card features either a +3 bonus to a single category, or a +2 bonus to one category and a +1 bonus to another.
                        Research Cards can be traded with other players to work towards completing a Goal.
                    </p>


                    <h5 class="other-title">Goal Cards</h5>
                    <p class="card-text">Goal Cards are completed by trading for the necessary Research Cards with your fellow innovators.
                        Each Goal Card will have Research Category targets that you need to hit in order to complete.
                        Completing a Goal Card will earn you 1 Victory Point, as well as 1 Innovation Point which you can invest in an invention.
                    </p>

                    <h5 class="other-title">Inventions</h5>
                    <p class="card-text">Inventions can be created by players investing Innovation Points into them.
                        As you accumulate Innovation Points, you can invest in up to {{ App\Variables::find(2)->value + 1 }} different Inventions each round.
                        You can invest as many Innovation Points as you want into each of the {{ App\Variables::find(2)->value + 1 }} Inventions you choose, but you
                        can't get an Innovation Point back once it's been invested. All other players across all classes can also invest in these same Inventions,
                        and at the end of a round, the {{ App\Variables::find(2)->value }} Inventions with the most invested Innovation Points will be created and will
                        officially be a part of your reality. This may unlock future Inventions to invest in for later rounds.
                    </p>
                    <p class="card-text">
                        You will be awarded Victory Points if Inventions that you invested in end up being created, with more heavily
                        invested ones awarding more points. Remember that all players can invest in Inventions, so collaborate with your peers on which ones you want to
                        go for each round, or you may end up losing your investments!
                    </p>
                    <br/>

                    <h4 class="card-title" style="margin-top: 50px;">Game Rules</h4>
                    <h5 class="other-title">Objective</h5>
                    <p class="card-text">
                        The object of the game is to trade Research Cards with other players and complete Goals to earn Victory Points and Innovation Points.
                        Investing the Innovation Points you earn into Inventions can also earn you Victory Points, which are necessary to win the game.
                    </p>
                    <h5 class="other-title">Trading</h5>
                    <p class="card-text">
                        To trade with other players, navigate to the My Trades page under Game Board at the top of the screen. Type in the W Number of the player
                        you wish to make a trade with, then select one of your cards to offer and one of their cards that you want. A short code will be generated
                        for each trade offer you make and these can be viewed on your Trades page under Outgoing Trades. You'll have to give that code to the person
                        you want to trade with and they'll have to enter it into a field under their Incoming Trades section in order to accept the trade.
                        You can also cancel an Outgoing Trade or decline an Incoming Trade at any time. Each of your Research Cards can only be tied up in one trade
                        at a time, so make sure to communicate with your peers before offering trades so they can get completed quickly!
                    </p>
                    <h5 class="other-title">Rounds</h5>
                    <p class="card-text">
                        Your class instructor will determine the length of a round, and during this round players can each invest many Innovation Points into several
                        Inventions. At the end of a round, Inventions with the most Innovation Points invested will be officially created or "invented", and players
                        who have invested in those Inventions will earn bonus Victory Points. Some future Inventions require earlier Inventions to be created first
                        before they will show up to be invested in, so you can build your own strange reality where Blue-Ray Discs existed before Inkjet Printers!
                    </p>

                    <br/>

                    <h4 data-toggle="tooltip"
                        title="Like this one!">
                        Hovering your mouse over game elements will provide a descriptive tooltip. &#9432;</h4>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>
@endsection