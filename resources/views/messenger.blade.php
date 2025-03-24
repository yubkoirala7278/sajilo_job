@extends('admin.layout.master')

@section('content')
    <main id="main" class="main">
        <section class="section profile">
            <div class="container">
                <div class="card shadow-sm border-0" style="height: 85vh; border-radius: 10px; overflow: hidden;">
                    <div class="row g-0 h-100">
                        <!-- Left Sidebar -->
                        <div class="col-md-4 border-end" style="background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f0 100%);">
                            <div class="card-header bg-primary text-white border-0 py-3" style="border-radius: 10px 0 0 0;">
                                <h5 class="mb-0 d-flex align-items-center">
                                    <i class="fas fa-users me-2"></i>{{ Auth::user()->name }}
                                </h5>
                            </div>
                            <div class="overflow-auto" style="height: calc(85vh - 70px);">
                                <ul class="list-group list-group-flush">
                                    @if (count($users) > 0)
                                        @foreach ($users as $user)
                                            <a href="/admin/chat/{{ $user->id }}" class="text-decoration-none text-dark">
                                                <li class="list-group-item d-flex align-items-center py-3 hover-bg-light">
                                                    <div class="position-relative me-3">
                                                        <img src="{{ asset($user->avatar) }}" class="rounded-circle"
                                                            style="width: 45px; height: 45px; object-fit: cover;" alt="User">
                                                        <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle"
                                                            style="width: 10px; height: 10px;"></span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">{{ $user->name }}</h6>
                                                    </div>
                                                </li>
                                            </a>
                                        @endforeach
                                    @endif
                                    <li class="list-group-item py-3">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="text-danger text-decoration-none">
                                            <i class="fas fa-sign-out-alt me-2"></i>{{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Chat Area -->
                        <div class="col-md-8 d-flex align-items-center justify-content-center" style="background: #fff;">
                            <h4 class="text-muted">Select a user to start chatting</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <style>
        .hover-bg-light:hover {
            background-color: #ffffff !important;
            transition: background-color 0.2s ease;
        }

        .list-group-item {
            border: none;
            border-bottom: 1px solid #e9ecef;
        }

        .card {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
@endsection