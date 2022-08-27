@extends('layout')

@section('title', 'Home')
@section('cssLink')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">


@endsection
@section('body')
    <div class="mainbody">
        <div class="nav">
            <div class="systemname">Sakura Hospital</div>
            <ul class="menu">
                <a href="./doctorlist.html">
                    <li class="active">
                        <ion-icon name="apps"></ion-icon>
                        <p>
                            Dashboard
                        </p>
                    </li>
                </a>
                <a href="./doctorlist.php">
                    <li>
                        <ion-icon name="git-network"></ion-icon>
                        <p>

                            Doctor List

                        </p>
                    </li>
                </a>
            </ul>
            <hr>
            <ul class="menu">

            </ul>
            <!-- <img class="nameSVG" width="50%" src="./doctor.svg" alt=""> -->

        </div>

        <div class="body">
            <p class="title">Incoming Message</p>

            <div class="drugDetailStatus">
                <div class="drugDetailTable">
                    <div class="theTable">
                        <table>
                            <thead>
                                <th>Message</th>
                                <th>Time</th>
                                <th colspan="2" class="action">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                    <tr>
                                        <td class="msgCell">
                                            <img width="20px" src="./pills.png" alt="">
                                        </td>
                                        <td>{{ $message->message_content }}</td>
                                        <td>
                                            <a href="{{ route('message.edit', [App::getLocale(), $message->id]) }}"
                                                class="edit">Edit</a>
                                            <form action="{{ route('message.destroy', [App::getLocale(), $message->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="delete">Delete</a>
                                                <div class="alertBox hidden">
                                                    <div>
                                                        <h1>Are you sure you want to delete this?</h1>
                                                        <div>
                                                            <button class="yes" type="submit">Delete Now</button>
                                                            <a class="no">Never Mind</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </td>
                                    </tr>
                                    {{-- {{ $messages->links }} --}}
                                @endforeach

                            </tbody>
                        </table>

                        <span>
                            {{ $messages->links() }}
                        </span>

                        <div class="addView">
                            <a href="{{ route('index', App::getLocale()) }}">Go Back</a>
                            <div></div>
                        </div>
                    </div>

                </div>
            </div>


            @if (session()->has('status'))
                <!-- start of success or fail message notification section -->
                <div class="message-alert-box message-success slide-in-right">
                    <div class="success-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#FFFFFF" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M12 2.25a4.49 4.49 0 00-3.397 1.549 4.49 4.49 0 00-3.497 1.307 4.49 4.49 0 00-1.307 3.497A4.49 4.49 0 002.25 12c0 1.357.6 2.573 1.548 3.397a4.491 4.491 0 001.307 3.498A4.49 4.49 0 008.603 20.2 4.49 4.49 0 0012 21.75a4.49 4.49 0 003.397-1.549 4.491 4.491 0 003.497-1.307 4.491 4.491 0 001.307-3.497A4.49 4.49 0 0021.75 12a4.49 4.49 0 00-1.548-3.397 4.491 4.491 0 00-1.307-3.497 4.49 4.49 0 00-3.498-1.307A4.49 4.49 0 0012 2.25zm3.059 8.062a.75.75 0 10-.993-1.124 12.785 12.785 0 00-3.209 4.358L9.53 12.22a.75.75 0 00-1.06 1.06l2.135 2.136a.75.75 0 001.24-.289 11.264 11.264 0 013.214-4.815z"
                                clip-rule="evenodd" />
                        </svg>

                    </div>
                    <div class="content">
                        <h4>Successful</h4>
                        <p>{{ session('status') }}</p>
                    </div>
                </div>
                <!-- end of success or fail message notification section -->
            @endif
        </div>
    </div>
@endsection

@section('javaScriptLink')
    <script src="{{ asset('/js/alertMessage.js') }}"></script>
@endsection
