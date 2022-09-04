<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mail</title>
    <link rel="stylesheet" href="{{ asset('css/sendMail.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="title">
            <h1>To subscribers,</h1>
            <div>
                <img id="a1" width="200px" src="{{ asset('image/Sample-1.svg') }}" alt="">
                <img id="a2" width="100px" src="{{ asset('image/Sample-2.svg') }}" alt="">
                <img id="a3" width="150px" src="{{ asset('image/Sample.svg') }}" alt="">
            </div>

        </div>
        <div class="content">
            <div class="inputs">
                <label for="">Choose One</label>
                <select name="" id="">
                    <option value="">Users in database</option>
                    <option value="">Specific user</option>
                </select>
            </div>
            <form action="{{ route('send', App::getLocale()) }}" method="post">
                @csrf
                <div class="inputs">
                    <label for="">To</label>
                    <input name="email" type="email" placeholder="e.g. selttek@gmail.com" required>
                </div>
                <div class="inputs">
                    <label for="">Message</label>
                    <textarea cols="" rows="10" placeholder="Write what ever you want, it will not be sent anyway...."></textarea>
                </div>

                <div class="down-here">
                    <svg width="125" height="88" viewBox="0 0 125 88" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M111.756 73.8438C113.903 66.0472 86.9326 42.361 37.1253 30.6662C-25.1337 16.0478 7.63342 3.19497 76.3331 5.1441"
                            stroke="black" stroke-width="8" stroke-linecap="round" />
                        <path d="M121 73.647C119.336 75.9472 115.343 81.0997 112.681 83.3079" stroke="black"
                            stroke-width="8" stroke-linecap="round" />
                        <path d="M111.876 83.3081C109.836 81.0079 104.942 75.8554 101.678 73.6472" stroke="black"
                            stroke-width="8" stroke-linecap="round" />
                    </svg>

                </div>


                <div class="button">
                    <button href="/" id="activate">Send Now</button>
                </div>
            </form>
        </div>
        <div id="animContainer">
        </div>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.5/lottie.min.js'></script>
<script src="{{ asset('/js/loading.js') }}"></script>

</html>
