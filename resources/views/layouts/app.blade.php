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
                    <a href="/promote">
                        <button type="button" class="btn add-coin promote w-100">Promote</button>
                    </a>
                </li>
                <li>
                    <a href="/work-with-us">
                        <button type="button" class="btn add-coin  w-100">Work With Us</button>
                    </a>
                </li>
                <li>
                    <a href="/add-coin">
                        <button type="button" class="btn add-coin  w-100">Add a Coin</button>
                    </a>
                </li>
                <li>
                    <a href="/promote">
                        <button type="button" class="btn add-coin  w-100">Learn Marketing</button>
                    </a>
                </li>
                <li>
                    <h4 class="w-100 text-light" style="opacity: .7">
                    CoinFort © 2021 - contact@coinfort.net
                    </h4>
                </li>
            </ul>
        </div>
    </div>

    <header class="header_area">
        <div class="main_menu">
            <nav class="row navbar m-0 py-1">
                <div class="col-6 col-xl-2 col-lg-2">
                    <a href="/"><img class="logo" src="{{ asset('front') }}/img/logo.png" alt=""></a>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">

                        </div>

                        <div class="col-6 text-right navbar-right">
                            <a href="/work-with-us">
                                <button type="button" class="btn add-coin navbar-right-btn wwu">Work with us</button>
                            </a>
                            <a href="/add-coin">
                                <button type="button" class="btn add-coin navbar-right-btn">Add a Coin</button>
                            </a>
                            <a href="/promote">
                                <button type="button" class="btn add-coin navbar-right-btn promote">Promote</button>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->


    <main class="side-main">
        @yield('content')
        
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
        function getCookie(cName) {
            const name = cName + "=";
            const cDecoded = decodeURIComponent(document.cookie); //to be careful
            const cArr = cDecoded.split('; ');
            let res;
            cArr.forEach(val => {
                if (val.indexOf(name) === 0) res = val.substring(name.length);
            })
            return res;
        }
        $(document).ready(function() {
            // $.ajax({
            //     url:"/checkVotes",
            //     type:"post",
            //     data: {"_token": "{{ csrf_token() }}"},
            //     success: function (response) {
            //         if (response != []) {
            //             voteButtons = document.getElementsByClassName('upvote-button');
            //             for (var i = 0; i < voteButtons.length; i++) {
            //                  if (response.includes(Number(voteButtons[i].id))) {
            //                      document.getElementById(voteButtons[i].id).classList.add('voted');
            //                 }
            //             }

            //         }
            //     }
            // })
            if (getCookie("name") == "ads-block") {
                return false;
            } else {
                $("#staticBackdrop").show();
                let expireDate = moment().add("30", "m")._d
                console.log(expireDate)
                document.cookie = "name=ads-block; expires=" + expireDate;
            }
        });


        $(".upvote-button").click(function(e) {
            e.preventDefault();
            if (this.classList.contains('voted')) {
                return true;
            } else {
                this.classList.add('voted');
                voteNumber = this.querySelector('#voteNumber');
                if (this.classList.contains('detail') == false) {
                    voteNumber.innerHTML = Number(voteNumber.innerHTML) + 1;
                }

            }
            let id = this.getAttribute("id")

            $.ajax({
                url: "/vote",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    coin_id: id
                },
                success: function(response) {
                    console.log(response)
                }
            })
        })
    </script>
</body>

</html>
