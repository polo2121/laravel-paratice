@extends('layout')

@section('title', 'Home')
@section('cssLink')
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
            <p class="title">Hospital Status</p>
            <div class="h_status">
                <div class="doctor">

                    <!-- <p class="count" id="dcount">10</p> -->
                    <p class="count" id="dcount">10</p>
                    <p class="name doctor-name">Doctor</p>
                    <img width="100%" src="{{ asset('image/wave3.svg') }}" alt="wave1">

                </div>
                <div class="nurse nurse-name">
                    <p class="count" id="ncount">30</p>
                    <p class="name nurse-name">Nurse</p>

                    <img width="100%" src="{{ asset('image/wave1.svg') }}" alt="wave1">

                </div>
                <div class="room room-name">
                    <p class="count" id="bcount">40</p>
                    <p class="name room-name">Room</p>

                    <img width="100%" src="{{ asset('image/wave2.svg') }}" alt="wave1">

                </div>
            </div>


            <div class="drugDetailStatus">
                <div class="drugDetailTable">
                    <div class="theTable">
                        <div class="tableTitle">
                            <h1 class="">Message</h1>
                            <img width="40px" src="./resources/pills.svg" alt="">
                        </div>

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
                                            <a href="{{ route('message.edit', ['lang' => App::getLocale(), 'message' => $message->id]) }}"
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
                                @endforeach

                            </tbody>
                        </table>

                        <div class="addView">
                            <a href="{{ route('message.create', App::getLocale()) }}">Add</a>
                            <a href="{{ route('message.index', App::getLocale()) }}">See All</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="drugDetailStatus">
                <div class="drugDetailTable">


                    <div class="theTable">
                        <div class="tableTitle">
                            <h1 class="">Drug Details</h1>
                            <img width="40px" src="./resources/pills.svg" alt="">
                        </div>


                        <table>
                            <thead>
                                <th>Name</th>
                                <th>Ml/Mg</th>
                                <th>Amount</th>
                                <th>Price(per item)</th>
                                <th colspan="2" class="action">Action</th>
                            </thead>
                            <tbody>

                                @foreach ($drugs as $drug)
                                    <tr>
                                        <td>{{ $drug->drug_name }}</td>
                                        <td>{{ $drug->drug_ml }}</td>
                                        <td>{{ $drug->drug_amount }}</td>
                                        <td>{{ $drug->drug_price }}</td>
                                        <td>
                                            <a href="{{ route('drugs.edit', [App::getLocale(), $drug->id]) }}"
                                                class="edit">Edit</a>
                                            <form action="{{ route('drugs.destroy', [App::getLocale(), $drug->id]) }}"
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
                                @endforeach

                            </tbody>
                        </table>

                        <div class="addView">
                            <a href="{{ route('drugs.create', App::getLocale()) }}">Add</a>
                            <a href="{{ route('drugs.index', App::getLocale()) }}">See All</a>
                        </div>
                    </div>

                </div>
            </div>


            <div class="drugDetailStatus">
                <div class="drugDetailTable">


                    <div class="theTable">
                        <div class="tableTitle">
                            <h1 class="">Room Status</h1>
                            <img width="40px" src="./resources/pills.svg" alt="">
                        </div>


                        <table>
                            <thead>
                                <th>Room No</th>
                                <th>Status</th>
                                <th>Patient</th>
                                <th>Price</th>
                                <th colspan="2" class="action">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td>{{ $room->room_num }}</td>
                                        <td>{{ $room->status }}</td>
                                        <td>{{ $room->patient }}</td>
                                        <td>{{ $room->price }}</td>
                                        <td>
                                            <a href="" class="edit">Edit</a>
                                            <a href="" class="delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="addView">
                            <a href="./insertRoomForm.php">Add</a>
                            <a href="">See All</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="drugDetailStatus">
                <div class="drugDetailTable">


                    <div class="theTable">
                        <div class="tableTitle">
                            <h1 class="">Appointment</h1>
                            <img width="40px" src="./resources/pills.svg" alt="">
                        </div>


                        <table>
                            <thead>
                                <th>Doctor</th>
                                <th>Room No</th>
                                <th>Date</th>
                                <th colspan="2" class="action">Action</th>
                            </thead>
                            <tbody>


                                @foreach ($appoints as $appoint)
                                    <tr>
                                        <td>{{ $appoint->doc_name }}</td>
                                        <td>{{ $appoint->room_no }}</td>
                                        <td>{{ $appoint->created_at }}</td>
                                        <td>
                                            <a href="./updateMessageForm.php?id=" class="edit">Edit</a>
                                            <a href="./controllers/messageControllers/deleteMessageController.php?id="
                                                class="delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                        <div class="addView">
                            <a href="./insertApointForm.php">Add</a>
                            <a href="">See All</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('javaScriptLink')
    <script src="{{ asset('/js/alertMessage.js') }}"></script>
@endsection
