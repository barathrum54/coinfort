@extends('layouts.app')
@section('content')
@include('topads')

@include('promoted-list')
<section>
    <ul class="nav nav-pills mb-3 main-table-tabs" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active main-table-tabs-tab" id="pills-hot-tab" data-bs-toggle="pill"
                data-bs-target="#pills-hot" type="button" role="tab" aria-controls="pills-hot"
                aria-selected="true">🔥Hot</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link main-table-tabs-tab" id="pills-alltimebest-tab" data-bs-toggle="pill"
                data-bs-target="#pills-alltimebest" type="button" role="tab" aria-controls="pills-alltimebest"
                aria-selected="false">😎All Time Best</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link main-table-tabs-tab" id="pills-presale-tab" data-bs-toggle="pill"
                data-bs-target="#pills-presale" type="button" role="tab" aria-controls="pills-presale"
                aria-selected="false">🎫Presale</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-hot" role="tabpanel" aria-labelledby="pills-hot-tab">
            <div class="main-table-wrap">
                <div class="main-table">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="row mx-0 ">
                                <div class="col list-header" style="border-radius: 15px 0px 0px 0px;padding: 10px;">
                                    Asset</div>
                                <div class="col d-none d-lg-block list-header">Symbol</div>
                                <div class="col list-header">Market Cap</div>
                                <div class="col d-none d-lg-block list-header">Launch</div>
                                <div class="col list-header" style="border-radius: 0px 15px 0px 0px;">Upvotes</div>
                            </div>
                        </div>
                    </div>

                    @foreach ($hot as $promoted_coin)
                    <a href="/coin/{{ $promoted_coin->id }}">

                        <div class="row text-center coin-row promoted-row">
                            <div class="col coin-col ">
                                <div class="row w-100">
                                    <div class="col-6 col-lg-4">
                                        <img src="{{ $promoted_coin->icon }}" class="coin-logo" alt="">
                                    </div>
                                    <div class="col-6 col-lg-8 coin-name">
                                        {{ $promoted_coin->name }}
                                    </div>

                                </div>
                            </div>

                            <div class="col coin-col d-none d-lg-block">
                                {{ $promoted_coin->symbol }}
                            </div>

                            <div class="col coin-col ">
                                {{ $promoted_coin->market_cap }}
                            </div>
                            <div class="col coin-col d-none d-lg-block ">
                                {{ $promoted_coin->launch_date }}
                            </div>
                            @if ($promoted_coin->voted)
                                <div class="col coin-col  voteButton">
                                    <button class="upvote-button voted" disabled id="{{ $promoted_coin->id }}">🚀
                                        @if ($promoted_coin->votes == null) <span
                                                id="voteNumber">0</span>
                                        @else <span id="voteNumber">{{ $promoted_coin->votes }}</span>
                                        @endif
                                    </button>
                                </div>
                            @else
                                <div class="col coin-col  voteButton">
                                    <button class="upvote-button" id="{{ $promoted_coin->id }}">🚀
                                        @if ($promoted_coin->votes == null) <span
                                                id="voteNumber">0</span>
                                        @else <span id="voteNumber">{{ $promoted_coin->votes }}</span>
                                        @endif
                                    </button>
                                </div>
                            @endif
                        </div>
                    </a>

                @endforeach


                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="pills-alltimebest" role="tabpanel"
            aria-labelledby="pills-alltimebest-tab">
            <div class="main-table-wrap">
                <div class="main-table">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="row mx-0 ">
                                <div class="col list-header" style="border-radius: 15px 0px 0px 0px;padding: 10px;">
                                    Asset</div>
                                <div class="col d-none d-lg-block list-header">Symbol</div>
                                <div class="col list-header">Market Cap</div>
                                <div class="col d-none d-lg-block list-header">Launch</div>
                                <div class="col list-header" style="border-radius: 0px 15px 0px 0px;">Upvotes</div>
                            </div>
                        </div>
                    </div>

                    @foreach ($allTime as $promoted_coin)
                    <a href="/coin/{{ $promoted_coin->id }}">

                        <div class="row text-center coin-row promoted-row">
                            <div class="col coin-col ">
                                <div class="row w-100">
                                    <div class="col-6 col-lg-4">
                                        <img src="{{ $promoted_coin->icon }}" class="coin-logo" alt="">
                                    </div>
                                    <div class="col-6 col-lg-8 coin-name">
                                        {{ $promoted_coin->name }}
                                    </div>

                                </div>
                            </div>

                            <div class="col coin-col d-none d-lg-block">
                                {{ $promoted_coin->symbol }}
                            </div>

                            <div class="col coin-col ">
                                {{ $promoted_coin->market_cap }}
                            </div>
                            <div class="col coin-col d-none d-lg-block ">
                                {{ $promoted_coin->launch_date }}
                            </div>
                            @if ($promoted_coin->voted)
                                <div class="col coin-col  voteButton">
                                    <button class="upvote-button voted" disabled id="{{ $promoted_coin->id }}">🚀
                                        @if ($promoted_coin->votes == null) <span
                                                id="voteNumber">0</span>
                                        @else <span id="voteNumber">{{ $promoted_coin->votes }}</span>
                                        @endif
                                    </button>
                                </div>
                            @else
                                <div class="col coin-col  voteButton">
                                    <button class="upvote-button" id="{{ $promoted_coin->id }}">🚀
                                        @if ($promoted_coin->votes == null) <span
                                                id="voteNumber">0</span>
                                        @else <span id="voteNumber">{{ $promoted_coin->votes }}</span>
                                        @endif
                                    </button>
                                </div>
                            @endif
                        </div>
                    </a>

                @endforeach


                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-presale" role="tabpanel" aria-labelledby="pills-presale-tab">
            <div class="main-table-wrap">
                <div class="main-table">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="row mx-0 ">
                                <div class="col list-header" style="border-radius: 15px 0px 0px 0px;padding: 10px;">
                                    Asset</div>
                                <div class="col d-none d-lg-block list-header">Symbol</div>
                                <div class="col list-header">Market Cap</div>
                                <div class="col d-none d-lg-block list-header">Launch</div>
                                <div class="col list-header" style="border-radius: 0px 15px 0px 0px;">Upvotes</div>
                            </div>
                        </div>
                    </div>

                    @foreach ($presale as $promoted_coin)
                    <a href="/coin/{{ $promoted_coin->id }}">

                        <div class="row text-center coin-row promoted-row">
                            <div class="col coin-col ">
                                <div class="row w-100">
                                    <div class="col-6 col-lg-4">
                                        <img src="{{ $promoted_coin->icon }}" class="coin-logo" alt="">
                                    </div>
                                    <div class="col-6 col-lg-8 coin-name">
                                        {{ $promoted_coin->name }}
                                    </div>

                                </div>
                            </div>

                            <div class="col coin-col d-none d-lg-block">
                                {{ $promoted_coin->symbol }}
                            </div>

                            <div class="col coin-col ">
                                {{ $promoted_coin->market_cap }}
                            </div>
                            <div class="col coin-col d-none d-lg-block ">
                                {{ $promoted_coin->launch_date }}
                            </div>
                            @if ($promoted_coin->voted)
                                <div class="col coin-col  voteButton">
                                    <button class="upvote-button voted" disabled id="{{ $promoted_coin->id }}">🚀
                                        @if ($promoted_coin->votes == null) <span
                                                id="voteNumber">0</span>
                                        @else <span id="voteNumber">{{ $promoted_coin->votes }}</span>
                                        @endif
                                    </button>
                                </div>
                            @else
                                <div class="col coin-col  voteButton">
                                    <button class="upvote-button" id="{{ $promoted_coin->id }}">🚀
                                        @if ($promoted_coin->votes == null) <span
                                                id="voteNumber">0</span>
                                        @else <span id="voteNumber">{{ $promoted_coin->votes }}</span>
                                        @endif
                                    </button>
                                </div>
                            @endif
                        </div>
                    </a>

                @endforeach


                </div>
            </div>
        </div>
    </div>


</section>
@endsection