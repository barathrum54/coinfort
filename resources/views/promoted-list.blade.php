<section class="section-margin">
    <div class="main-table-wrap">
        <div class="main-table ">
            <div class="row ">
                <div class="col-12 ">
                    <div class="row mx-0 gradient-border">
                        <div class="col list-header" style="border-radius: 15px 0px 0px 0px;padding: 10px;">
                            💎 Promoted Coins</div>
                        <div class="col d-none d-lg-block list-header">Symbol</div>
                        <div class="col list-header">Market Cap</div>
                        <div class="col d-none d-lg-block list-header">Launch</div>
                        <div class="col list-header" style="border-radius: 0px 15px 0px 0px;">Upvotes</div>
                    </div>
                </div>
            </div>

            @foreach ($promoted_coins as $promoted_coin)
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
</section>