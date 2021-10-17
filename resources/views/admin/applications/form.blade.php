<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CoinFort 💰 Secure Gem Finder</title>
    <link rel="icon" href="{{ asset('front/') }}/img/favicon.png" type="image/png">

    <link rel="stylesheet" href="{{ asset('front/') }}/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('front/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('front/') }}/css/menu.css">
</head>

<body>
    <!--================Header Menu Area =================-->
    <div class="mobile-menu">

        <input type="checkbox" id="active">
        <label for="active" class="menu-btn"><span></span></label>
        <label for="active" class="close"></label>
        <div class="wrapper">
            <ul>
                <li>
                    <button type="button" class="btn add-coin promote">Promote</button>
                </li>
                <li>
                    <button type="button" class="btn add-coin">Promote</button>
                </li>
                <li>
                    <button type="button" class="btn add-coin">Promote</button>
                </li>
            </ul>
        </div>
    </div>

    <header class="header_area">
        
        <div class="main_menu">
            <nav class="row navbar m-0 py-1">
                <div class="col-12 col-lg-6 col-xl-2 col-lg-2">
                    <a href="/"><img class="logo" src="{{ asset('front') }}/img/logo.png" alt=""></a>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-lg-6">

                        </div>

                        <div class="col-12 col-lg-6 text-right navbar-right">
                            <button type="button" class="btn add-coin navbar-right-btn wwu">Work with us</button>
                            <a href="/add-coin">
                                <button type="button" class="btn add-coin navbar-right-btn">Add a Coin</button>
                            </a>
                            <button type="button" class="btn add-coin navbar-right-btn promote">Promote</button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="side-main">
        <div class="container my-5">

            <div class="card application-form-card shadow mb-4">
                <div class="card-header py-3">
                  
                    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                </div>
                <div class="card-body application-form-card">
                    @if (Session::get('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <form action="{{ url('/admin/applications') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" placeholder="e.g. Doge Coin" name="name"
                                        class="form-control form-input-bg" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                @error('symbol')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Symbol</label>
                                    <input type="text" placeholder="e.g. DOGE" name="symbol"
                                        class="form-control form-input-bg" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">

                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea placeholder="e.g. Doge Coin is a meme token for BSC" type="text"
                                        name="description" class="form-control form-input-bg" required></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                @error('logo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="text" name="logo" placeholder="e.g https://i.ibb.co/logo.png"
                                        class="form-control form-input-bg" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                @error('launch_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{--  --}}
                                <div class="form-group">
                                    <label>Launch Date</label>
                                    <input type="date" name="launch_date" class="form-control form-input-bg" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">


                                @error('telegram')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Telegram</label>
                                    <input type="text" placeholder="e.g. https://t.me/dogecoinofficial" name="telegram"
                                        class="form-control form-input-bg" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">

                                @error('website')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Website</label>
                                    <input name="website" placeholder="e.g. https://www.dogecoin.com" type="text"
                                        class="form-control form-input-bg">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                @error('twitter')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input name="twitter" placeholder="e.g. https://twitter.com/dogecoin" type="text"
                                        class="form-control form-input-bg">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">

                                @error('discord')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Discord</label>
                                    <input name="discord" placeholder="e.g. https://www.discord.gg/46TRkm" type="text"
                                        class="form-control form-input-bg">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">

                                @error('reddit')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Reddit</label>
                                    <input name="reddit" placeholder="e.g. https://www.reddit.com/r/dogecoin"
                                        type="text" class="form-control form-input-bg">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">

                                @error('market_cap')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Market Cap in USD </label>
                                    <input name="market_cap" placeholder="e.g. 15000000" type="text"
                                        class="form-control form-input-bg">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">

                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Price In USD</label>
                                    <input name="price_in_usd" placeholder="e.g. 0.0000005" type="text"
                                        class="form-control form-input-bg">
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">


                                <div class="form-group">
                                    <label>Contract Adress</label>
                                    <input name="contract_adress" type="text" class="form-control form-input-bg">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">

                                <div class="form-group">
                                    <label>Chain</label>
                                    <input placeholder="e.g. Binance Smart Chain" name="chain" type="text"
                                        class="form-control form-input-bg">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">

                                <div class="form-group">
                                    <label>Additional Information</label>
                                    <textarea placeholder="" type="text" name="description" class="form-control form-input-bg"
                                        ></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">

                                <div class="form-group">
                                    <label>Contact Information</label>
                                    <textarea placeholder="Please provide official contact name and adresses" type="text" name="description" class="form-control form-input-bg"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="col-12">



                                <div class="form-group">
                                    <button class="btn btn-dark btn-block text-light" type="submit" style="font-size: 16px">Add Coin</button>
                                </div>

                            </div>
                        </div>



                    </form>

                </div>
            </div>
        </div>

    </main>


    <!-- ================ start footer Area ================= -->
    <footer>
        <section>
            <div class="row mt-5 justify-content-center">
                <div class="col-12 col-lg-3 text-center ">
                    <a href="/promote">
                        <h3 class="marketing-text"><span style="font-style:italic">Marketing is Real Easy</span> <br>
                            Learn How to do it</h3>
                    </a>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-12 col-lg-3 text-light text-center">
                    <div class="row mt-5">
                        <div class="col"><a href="/privacy-policy" class="text-light mr-3">Privacy Policy</a>
                            <a href="/terms-conditions" class="text-light mr-3">Terms & Conditions</a>
                            <a href="/disclaimer" class="text-light">Disclaimer</a>
                        </div>
                    </div>
                    CoinFort © 2021 - contact@coinfort.net
                </div>
            </div>
        </section>
    </footer>
    <!-- ================ End footer Area ================= -->

    <script src="{{ asset('front') }}/vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>


    <script>

    </script>
</body>

</html>
