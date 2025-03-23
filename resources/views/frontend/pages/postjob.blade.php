@extends('frontend.layouts.master')
@section('content')
    <div class="px-5 lg:px-16 mt-10">
        <div class="grid lg:grid-cols-2 gap-20">
            <div class="col-span-1">
                <h1 class="text-4xl font-bold">Post a Job</h1>
                <p class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque excepturi aliquam explicabo suscipit
                    dignissimos, quas ipsa quisquam iure ad, voluptatem nam tempora doloribus nihil laudantium odio, sint
                    possimus! Accusamus, perferendis?</p>
            </div>
            <div class="col-span-1">
                <div class="p-5 border-2 border-gray-200 rounded-lg">
                    <h2 class="text-xl font-bold">Employer Login</h2>
                    <span>Login with your registered Email & Password</span>
                    <form action="" class="mt-5 space-y-6">
                        <input type="text" class="border border-cyan-500 p-2 rounded-md w-full"
                            placeholder="Email Address">
                        <input type="password" class="border border-cyan-500 p-2 rounded-md w-full" placeholder="Password">
                        <div class="flex justify-between mb-4">
                            <label class="fieldset-label">
                                <input type="checkbox" checked="checked" class="checkbox" />
                                Remember me
                            </label>

                            <a href="" class="text-cyan-500">Forgot Password?</a>
                        </div>
                        <button type="submit" class="text-white bg-blue-600 w-full py-2 rounded-md">Login</button>

                        <a href="">Don't have an account? <span class="text-orange-500">Register Now</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="px-5 lg:px-16 mt-20 bg-blue-600 text-white p-10 grid place-content-center">
        <h2 class="text-4xl font-bold text-center">Most Trusted Job Portal in Nepal</h2>
        <div class="flex flex-wrap gap-40 justify-center items-center mt-10 ">
            <div class="flex flex-col items-center">
                <p class="text-3xl font-bold">10K+</p>
                <p class="">Live Job</p>
            </div>

            <div class="flex flex-col items-center">
                <p class="text-3xl font-bold">5K+</p>
                <p class="">Companies</p>
            </div>

            <div class="flex flex-col items-center">
                <p class="text-3xl font-bold">10K+</p>
                <p class="">Professional Work</p>
            </div>
        </div>
    </div>

    <div class="px-5 lg:px-16 mt-20">
        <div class="grid lg:grid-cols-2">
            <div class="col-span-1">
                <h1 class="text-4xl font-bold">Job Boards</h1>
                <p class="my-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque excepturi aliquam explicabo suscipit
                    dignissimos, quas ipsa quisquam iure ad, voluptatem nam tempora doloribus nihil laudantium odio, sint
                    possimus! Accusamus, perferendis?</p>
                <a href="" class="text-blue-600 border border-blue-600 px-5 py-1.5 rounded-md hover:bg-blue-600 hover:text-white">Learn More</a>
            </div>
            <div class="col-span-1">
                <img src="{{ asset('frontend/image/job-board.png') }}" alt="">
            </div>
        </div>
    </div>

@endsection
