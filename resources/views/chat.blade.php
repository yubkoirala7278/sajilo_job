@extends('admin.layout.master')
@section('header-content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <main id="main" class="main">
        <input type="hidden" id="receiverId" value="{{ $receiverId }}">
        <input type="hidden" id="senderId" value="{{ Auth::user()->id }}">
        <section class="section profile">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-lg border-0" style="height: 85vh; border-radius: 15px;">
                            <div class="row g-0 h-100">
                                <!-- Left Sidebar -->
                                <div class="col-md-4 border-end"
                                    style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                                    <div class="card-header bg-primary text-white border-0"
                                        style="border-radius: 15px 0 0 0;">
                                        <h5 class="mb-0"><i class="fas fa-users me-2"></i>{{ Auth::user()->name }}</h5>
                                    </div>
                                    <div class="card-body p-0 overflow-auto" style="height: calc(85vh - 66px);">
                                        <ul class="list-group list-group-flush">
                                            @if (count($users) > 0)
                                                @foreach ($users as $user)
                                                    <a href="/admin/chat/{{ $user->id }}"
                                                        style="text-decoration: none; color: inherit;">
                                                        <li
                                                            class="list-group-item d-flex align-items-center cursor-pointer hover-bg-light py-3 border-bottom">
                                                            <div class="position-relative me-3">
                                                                <img src="{{ asset($user->avatar) }}"
                                                                    class="rounded-circle"
                                                                    style="width: 50px; height: 50px; object-fit: cover;"
                                                                    alt="User">
                                                                <span
                                                                    class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle"
                                                                    style="width: 12px; height: 12px;"></span>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h6 class="mb-1 fw-bold">{{ $user->name }}</h6>
                                                            </div>
                                                        </li>
                                                    </a>
                                                @endforeach
                                            @endif
                                            <li class="list-group-item">
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    style="text-decoration: none;">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Chat Area -->
                                <div class="col-md-8" style="background: #ffffff;">
                                    <div class="card-header bg-white border-bottom d-flex align-items-center py-3"
                                        style="border-radius: 0 15px 0 0;">
                                        <div class="position-relative me-3">
                                            <img src="{{ asset($user->avatar) }}" class="rounded-circle"
                                                style="width: 45px; height: 45px; object-fit: cover;" alt="User">
                                            <span
                                                class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle"
                                                style="width: 12px; height: 12px;"></span>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-bold">{{ $receiverName }}</h6>
                                            <small class="text-success">Active now</small>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="#" class="text-muted me-3 hover-primary"><i
                                                    class="fas fa-phone"></i></a>
                                            <a href="#" class="text-muted me-3 hover-primary"><i
                                                    class="fas fa-video"></i></a>
                                            <a href="#" class="text-muted hover-primary"><i
                                                    class="fas fa-ellipsis-v"></i></a>
                                        </div>
                                    </div>

                                    <div class="card-body overflow-auto p-4"
                                        style="height: calc(85vh - 140px); background: #f5f6f8;" id="chat-body">
                                        <div class="chat-messages">
                                            @if ($notifications->count() > 0)
                                                @foreach ($notifications as $notification)
                                                    @php $data = json_decode($notification->data, true); @endphp
                                                    @if ($data['sender_id'] == auth()->id())
                                                        <div class="mb-4 d-flex justify-content-end">
                                                            <div class="bg-primary text-white p-3 rounded-3 shadow-sm"
                                                                style="max-width: 70%;">
                                                                <p class="mb-1">{{ $data['message'] }}</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="mb-4 d-flex">
                                                            <div class="bg-white p-3 rounded-3 shadow-sm"
                                                                style="max-width: 70%;">
                                                                <p class="mb-1 text-dark">{{ $data['message'] }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-footer bg-white p-3 position-relative">
                                        <form id="chatForm" class="d-flex align-items-center">
                                            <input type="hidden" name="user_id" value="{{ $receiverId }}">
                                            <button id="emoji-button" class="btn btn-outline-secondary rounded-circle me-2"
                                                type="button" style="width: 40px; height: 40px;">
                                                <i class="fa fa-smile"></i>
                                            </button>
                                            <div id="emoji-picker" class="emoji-picker" style="display: none;">
                                                <span class="emoji" data-emoji="😀">😀</span>
                                                <span class="emoji" data-emoji="😃">😃</span>
                                                <span class="emoji" data-emoji="😄">😄</span>
                                                <!-- Add more emojis as needed -->
                                                <span class="emoji" data-emoji="💝">💝</span>
                                            </div>
                                            <input type="text" id="message-input" name="message"
                                                class="form-control rounded-pill" placeholder="Type a message..."
                                                style="border-color: #ced4da;">
                                            <button id="send-button" class="btn btn-primary rounded-circle ms-2"
                                                type="button" style="width: 40px; height: 40px;">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <style>
        .cursor-pointer {
            cursor: pointer;
        }

        .hover-bg-light:hover {
            background-color: #ffffff !important;
            transition: background-color 0.3s ease;
        }

        .chat-messages {
            display: flex;
            flex-direction: column;
        }

        .hover-primary:hover {
            color: #0d6efd !important;
            transition: color 0.2s ease;
        }

        .list-group-item {
            transition: all 0.3s ease;
        }

        .card {
            overflow: hidden;
        }

        .emoji-picker {
            position: absolute;
            bottom: 60px;
            left: 10px;
            background: #fff;
            border: 1px solid #ccc;
            width: 250px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .emoji {
            cursor: pointer;
            font-size: 24px;
            padding: 5px;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function sendMessage() {
                var formData = new FormData($('#chatForm')[0]);
                $.ajax({
                    url: "{{ route('chat.send') }}",
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        $('#message-input').val('');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            $('#send-button').click(function(e) {
                e.preventDefault();
                sendMessage();
            });

            $('#message-input').keypress(function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    sendMessage();
                }
            });

            var chatBody = document.getElementById('chat-body');
            if (chatBody) {
                chatBody.scrollTo({
                    top: chatBody.scrollHeight,
                    behavior: 'smooth'
                });
            }

            Pusher.logToConsole = true;
            var pusher = new Pusher('5303216338af26cb3e15', {
                cluster: 'mt1'
            });
            var channel = pusher.subscribe('my-messenger');
            channel.bind('message-submitted', function(data) {
                fetchLatestNotification();
            });

            function fetchLatestNotification() {
                $.ajax({
                    url: '/admin/fetch-latest-notification',
                    method: 'GET',
                    data: {
                        receiver_id: $('#receiverId').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.error) {
                            console.error(response.error);
                        } else {
                            var data = JSON.parse(response.data);
                            var message = data.message;
                            var senderId = data.sender_id;
                            if (senderId == {{ auth()->id() }}) {
                                $('.chat-messages').append(
                                    '<div class="mb-4 d-flex justify-content-end"><div class="bg-primary text-white p-3 rounded-3 shadow-sm" style="max-width: 70%;"><p class="mb-1">' +
                                    message + '</p></div></div>'
                                );
                            } else {
                                $('.chat-messages').append(
                                    '<div class="mb-4 d-flex"><div class="bg-white p-3 rounded-3 shadow-sm" style="max-width: 70%;"><p class="mb-1 text-dark">' +
                                    message + '</p></div></div>'
                                );
                            }
                            chatBody.scrollTo({
                                top: chatBody.scrollHeight,
                                behavior: 'smooth'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            }

            const emojiButton = document.getElementById('emoji-button');
            const emojiPicker = document.getElementById('emoji-picker');
            const messageInput = document.getElementById('message-input');

            emojiButton.addEventListener('click', function(event) {
                event.stopPropagation();
                emojiPicker.style.display = (emojiPicker.style.display === 'none' || emojiPicker.style
                    .display === '') ? 'block' : 'none';
            });

            emojiPicker.addEventListener('click', function(event) {
                if (event.target.classList.contains('emoji')) {
                    const selectedEmoji = event.target.getAttribute('data-emoji');
                    messageInput.value += selectedEmoji;
                    event.stopPropagation();
                }
            });

            document.addEventListener('click', function(event) {
                if (!emojiPicker.contains(event.target) && event.target !== emojiButton) {
                    emojiPicker.style.display = 'none';
                }
            });
        });
    </script>
@endpush
