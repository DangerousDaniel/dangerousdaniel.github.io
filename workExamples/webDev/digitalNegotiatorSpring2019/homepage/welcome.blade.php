@extends('layouts.app')

<title>Digital Negotiator - Welcome</title>

@section('content')
    <br>
    <img class="welcome-banner" src="{{URL::asset('/img/test.png')}}" alt="Welcome Banner (not found)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="card text-white mb-3">
                <div class="welcome-card-body">
                    <!--Welcome heading-->
                    <h4 class="card-title">Welcome to Digital Negotiator</h4>
                    <!--About Digital Negotiator-->
                    <p class="card-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This website is an instructional aid used by professors with the Nova Scotia Community College for information technology students.
                        This game is manually administered by professors during a semester to conduct a game</p>

                    <p class="card-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Digital Negotiator is a web-based card game, where you compete against other students to gain the most victory points.
                        Create enemies and alliances though trading to reach goals. Completing Goals will also award you with Innovation Points,
                        any player may spend Innovation Points on a Invention Card. At the end of a round the Invention(s) with the most points is invented, creating an alternate version of history to our own.
                    </p>

                    <br>

                    <!--Section 2-->
                    <!--To Get Started heading-->
                    <h4 class="other-title">To Get Started</h4>
                    <!--Told the user what they need to do to get started-->
                    <p class="card-text">Please login to see your dashboard!</p>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection