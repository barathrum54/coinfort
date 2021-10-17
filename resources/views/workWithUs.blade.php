@extends('layouts.app')

@section('content')
    <div class="text-light container mt-5 pt-5">
        <div class="card text-white bg-dark">
            <div class="card-body" style="font-size: 19px;font-weight:bolder">
                <h1 class="text-center" style="font-weight: bolder">CoinFort hiring mercenaries</h1>
                <h4 class="text-center mb-5 " style="font-weight: bolder">Honest Money for Honest Work</h4>
                <p class="text-center">Looking for extra cash? We provide work for those who are willing to sweat for sweet honest work.</p>
                <br>
                <p class="text-center">Paying daily in BNB for plenty of tasks.</p>
                <br>
                <p class="text-center">If you are a graphic designer or developer please contact our lead developer himself <a
                    class="text-light"href="t.me">@TaskMaster</a></p>
                        <br>
                <p class="text-center">If you have spare time and willing to do easy tasks for BNB please contact our support staff <a
                        class="text-light" href="t.me">@CoinFortSupport</a></p>
                        <br>
                <div class="row">
                    <div class="col text-center">


                        <img src="{{ asset('front') }}/img/logo.png" alt="" class="logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
