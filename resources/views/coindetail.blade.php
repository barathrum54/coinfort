@extends('layouts.app')

@section('content')
    @include('topads')
    <section>
        <div class="detail-panel">

            <div class="row">
                <div class="col-12 col-lg-10">
                    <div class="row detail-name-row">
                        <div class="col-12 col-lg-1">
                            <img class="detail-logo" src="{{ $coin->icon }}" alt="">
                        </div>
                        <div class="col-12 col-lg-4 d-flex flex-column ">
                            <h2 class="detail-name">{{ $coin->name }}</h2>
                            <div class="d-flex justify-content-start detail-name-inner-row">
                                <h3 class="detail-ticker">{{ $coin->symbol }}</h3>
                                <h3 class="detail-votes"><span
                                        style="font-size: 18px">{{ $coin->votes }}</span>&nbsp;&nbsp; Vote </h3>
                            </div>
                        </div>
                    </div>
                    @if ($coin->chain != null && $coin->contract_adress != null)
                        
                    <div class="row ">
                        <div class="col-12">
                            <div class="detail-contract">
                                {{ $coin->chain }} : {{ $coin->contract_adress }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-12 d-flex justify-content-between detail-info-row">
                            <div class="detail-info-snip">
                                <span>Market Cap</span> {{ $coin->market_cap }}
                            </div>
                            <div class="detail-info-snip">
                                <span>Price</span> {{ $coin->price }}
                            </div>
                            <div class="detail-info-snip">
                                <span>Launch Date</span> {{ $coin->launch_date }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="detail-description">
                                {{ $coin->description }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-2 d-flex  align-items-center flex-column">
                    <a name="" id="" class="detail-btn" href="{{$coin->website}}" target="_blank" role="button">Visit Web Site</a>
                    <a name="" id="" class="detail-btn" href="{{$coin->telegram}}" target="_blank" role="button">Join Telegram</a>
                    <a name="" id="" class="detail-btn" href="{{$coin->twitter}}" target="_blank" role="button">Follow Twitter</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center ">
                    @if ($coin->voted)
                        <div class="col coin-col  voteButton">
                            <button class="upvote-button voted detail" disabled id="{{ $coin->id }}">🚀
                                @if ($coin->votes == null) <span id="voteNumber">0</span>
                                @else <span id="voteNumber">Vote</span>
                                @endif
                            </button>
                        </div>
                    @else
                        <div class="col coin-col  voteButton">
                            <button class="upvote-button detail" id="{{ $coin->id }}">🚀
                                @if ($coin->votes == null) <span id="voteNumber">0</span>
                                @else <span id="voteNumber">Vote</span>
                                @endif
                            </button>
                        </div>
                    @endif
                    <br>
                    <span style="opacity: .8">You can vote once every 12 hours </span>

                </div>
            </div>
        </div>

    </section>
    @include('promoted-list')
@endsection
