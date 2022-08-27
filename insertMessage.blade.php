@extends('layout')

@section('title', 'Login')

@section('cssLink')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection

@section('body')
    <div class="main">
        <div class="header">
            <span id="logo"><img src="logo.png" alt="" /></span>
            <span class="contact">Care Center
                <p id="phone">
                    <ion-icon name="call"></ion-icon>
                </p>
            </span>
        </div>
        <div class="mainbody">
            <div class="nav">
                <div class="systemname">Sakura Hospital</div>
                <ul class="menu">
                    <a href="./index.php">
                        <li class="active">
                            <ion-icon name="apps"></ion-icon> Dashboard
                        </li>
                    </a>

                    <a href="./doctorlist.php">
                        <li>
                            <ion-icon name="git-network"></ion-icon> Doctor List
                        </li>
                    </a>
                </ul>
            </div>
            <div class="body">

                <form class="formForDrug" action="{{ route('message.store', App::getLocale()) }}" method="post"
                    aria-required="true">
                    @csrf
                    <div class="formTitle">
                        <svg width="91" height="18" viewBox="0 0 91 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.339746 9L9 17.6603L17.6603 9L9 0.339746L0.339746 9ZM89 10.5C89.8284 10.5 90.5 9.82843 90.5 9C90.5 8.17157 89.8284 7.5 89 7.5V10.5ZM9 10.5H89V7.5H9V10.5Z"
                                fill="#DBDBDB" />
                        </svg>


                        <h1>Insert Message</h1>
                        <svg width="91" height="18" viewBox="0 0 91 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M90.6603 9L82 0.339746L73.3397 9L82 17.6603L90.6603 9ZM2 7.5C1.17157 7.5 0.500002 8.17157 0.500002 9C0.500002 9.82843 1.17157 10.5 2 10.5V7.5ZM82 7.5H2V10.5H82V7.5Z"
                                fill="#DBDBDB" />
                        </svg>
                    </div>

                    <div class="inputGp">
                        <label for="name">Message</label>
                        <input type="textarea" name="msg_content" placeholder="e.g: Tomorrow meeting at 1:30 pm">
                    </div>
                    {{-- <div class="inputGp">
                        <label for="ml">Level</label>
                        <select name="msg_level" id="">
                            <option value="Normal">Normal</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </div> --}}

                    {{-- <div class="inputGp">
                        <label for="amount">Time</label>
                        <input type="time" name="msg_time" placeholder="e.g: 03:30 pm">
                    </div> --}}

                    <div class="formIcon">
                        <button type="submit">Submit</button>
                        <img width="40px" src="{{ asset('image/pills.svg') }}" alt="pill image">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
