@extends('frontend.layouts.master')
@section('content')
    {{-- Professional Filter --}}
    <div class="px-5 lg:px-16 bg-gray-100 p-10">
        <h2 class="text-2xl text-center font-bold">Find Your Ideal Candidate</h2>
        <p class="text-center text-gray-400">Refine your search with the filters below</p>

        <form action="" class="mt-10">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="col-span-1 flex flex-col">
                    <label for="" class="font-bold text-md">Job Category</label>
                    <select class="select text-gray-600 font-semibold w-full">
                        <option disabled selected>All Category</option>
                        <option>Crimson</option>
                        <option>Amber</option>
                        <option>Velvet</option>
                    </select>
                </div>
                <div class="col-span-1 flex flex-col">
                    <label for="" class="font-bold text-md">Experience Level</label>
                    <select class="select text-gray-600 font-semibold w-full">
                        <option disabled selected>All Experience</option>
                        <option>Crimson</option>
                        <option>Amber</option>
                        <option>Velvet</option>
                    </select>
                </div>
                <div class="col-span-1 flex flex-col">
                    <label for="" class="font-bold text-md">Location</label>
                    <select class="select text-gray-600 font-semibold w-full">
                        <option disabled selected>All Location</option>
                        <option>Crimson</option>
                        <option>Amber</option>
                        <option>Velvet</option>
                    </select>
                </div>
                <div class="col-span-1 flex flex-col">
                    <label for="" class="font-bold text-md">Key Skills</label>
                    <select class="select text-gray-600 font-semibold w-full">
                        <option disabled selected>All Skill</option>
                        <option>Crimson</option>
                        <option>Amber</option>
                        <option>Velvet</option>
                    </select>
                </div>
                <div class="col-span-1 flex flex-col">
                    <label for="" class="font-bold text-md">Availibility</label>
                    <select class="select text-gray-600 font-semibold w-full">
                        <option disabled selected>Any</option>
                        <option>Crimson</option>
                        <option>Amber</option>
                        <option>Velvet</option>
                    </select>
                </div>
                <div class="col-span-1 flex items-end">
                    <button class="btn bg-blue-600 text-white w-fit">
                        <i class="fa-solid fa-magnifying-glass size-[1.2em] me-1"></i>
                        Search Candidate
                    </button>
                </div>
            </div>

        </form>


    </div>


    {{-- Professional Talent --}}
    <div class="mt-20 px-5 lg:px-16">
        <h2 class="text-4xl text-center font-bold">Hire Our Professional Talent</h2>
        {{-- <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-10">
            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/1.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 px-2 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                    <button class="btn btn-primary block mt-5 w-full">Hire Now</button>
                </div>

            </div>

            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/2.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 px-2 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                    <button class="btn btn-primary block mt-5 w-full">Hire Now</button>
                </div>
            </div>

            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/1.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 px-2 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                    <button class="btn btn-primary block mt-5 w-full">Hire Now</button>
                </div>
            </div>

            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/2.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 px-2 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                    <button class="btn btn-primary block mt-5 w-full">Hire Now</button>
                </div>
            </div>


            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/1.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 px-2 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                    <button class="btn btn-primary block mt-5 w-full">Hire Now</button>
                </div>

            </div>

            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/2.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 px-2 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                    <button class="btn btn-primary block mt-5 w-full">Hire Now</button>
                </div>
            </div>

            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/1.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 px-2 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                    <button class="btn btn-primary block mt-5 w-full">Hire Now</button>
                </div>
            </div>

            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/2.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 px-2 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                    <button class="btn btn-primary block mt-5 w-full">Hire Now</button>
                </div>
            </div>


        </div> --}}

        <div class="grid lg:grid-cols-2 gap-5 mt-20">
            <div class="col-span-1 bg-gradient-to-br from-blue-50 via-white to-green-50 p-6 md:p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <!-- Avatar Section -->
                    <div class="flex flex-col items-center md:col-span-1">
                        <div class="avatar relative group">
                            <div class="w-20 md:w-28 rounded-full ring-4 ring-blue-200 ring-offset-4 ring-offset-white transition-transform duration-300 group-hover:scale-105">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" alt="John Doe" class="object-cover rounded-full"/>
                            </div>
                        </div>
                        <div class="text-center mt-4 md:mt-5">
                            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight">John Doe</h2>
                            <p class="text-gray-500 text-sm italic">Kathmandu, Nepal</p>
                            <p class="text-gray-500 text-sm italic">example@gmail.com</p>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div class="space-y-2 md:col-span-2">
                        <h3 class="text-lg md:text-xl font-semibold text-gray-800 flex flex-wrap items-center gap-2">
                            <span class="text-blue-600 text-lg">Qualification</span>
                            <span class="text-sm text-blue-700 bg-blue-100 px-3 md:px-4 py-1 rounded-full shadow-sm">+2</span>
                            <span class="text-sm text-blue-700 bg-blue-100 px-3 md:px-4 py-1 rounded-full shadow-sm">BE Computer</span>
                        </h3>
                        <h3 class="text-lg md:text-xl font-semibold text-gray-800 flex items-center gap-2">
                            <span class="text-blue-600 text-lg">Experience</span>
                            <span class="text-sm text-blue-700 bg-blue-100 px-3 md:px-4 py-1 rounded-full shadow-sm">5 Years</span>
                        </h3>
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-gray-800 underline decoration-wavy decoration-blue-400">Skills</h3>
                            <div class="flex gap-2 flex-wrap">
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">HTML</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">CSS</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">JavaScript</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">React</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">Next.js</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">Java</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">.NET</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">LibGDX</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">Unity</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-gray-800 underline decoration-wavy decoration-green-400">Available For</h3>
                            <div class="flex gap-2 flex-wrap">
                                <span class="text-sm text-green-700 bg-green-100 px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-green-600 hover:text-white transition-all duration-200">Full Time</span>
                                <span class="text-sm text-green-700 bg-green-100 px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-green-600 hover:text-white transition-all duration-200">Remote</span>
                                <span class="text-sm text-green-700 bg-green-100 px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-green-600 hover:text-white transition-all duration-200">Part Time</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons Section -->
                <div class="mt-6 flex flex-col md:flex-row gap-4">
                    <button class="w-full bg-blue-600 text-white py-2 md:py-3 rounded-xl font-medium text-sm shadow-md hover:bg-blue-700 hover:scale-105 transition-all duration-300">View Details</button>
                    <button class="w-full bg-green-600 text-white py-2 md:py-3 rounded-xl font-medium text-sm shadow-md hover:bg-green-700 hover:scale-105 transition-all duration-300">Hire Now</button>
                </div>
            </div>


            <div class="col-span-1 bg-gradient-to-br from-blue-50 via-white to-green-50 p-6 md:p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <!-- Avatar Section -->
                    <div class="flex flex-col items-center md:col-span-1">
                        <div class="avatar relative group">
                            <div class="w-20 md:w-28 rounded-full ring-4 ring-blue-200 ring-offset-4 ring-offset-white transition-transform duration-300 group-hover:scale-105">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" alt="John Doe" class="object-cover rounded-full"/>
                            </div>
                        </div>
                        <div class="text-center mt-4 md:mt-5">
                            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight">John Doe</h2>
                            <p class="text-gray-500 text-sm italic">Kathmandu, Nepal</p>
                            <p class="text-gray-500 text-sm italic">example@gmail.com</p>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div class="space-y-2 md:col-span-2">
                        <h3 class="text-lg md:text-xl font-semibold text-gray-800 flex flex-wrap items-center gap-2">
                            <span class="text-blue-600 text-lg">Qualification</span>
                            <span class="text-sm text-blue-700 bg-blue-100 px-3 md:px-4 py-1 rounded-full shadow-sm">+2</span>
                            <span class="text-sm text-blue-700 bg-blue-100 px-3 md:px-4 py-1 rounded-full shadow-sm">BE Computer</span>
                        </h3>
                        <h3 class="text-lg md:text-xl font-semibold text-gray-800 flex items-center gap-2">
                            <span class="text-blue-600 text-lg">Experience</span>
                            <span class="text-sm text-blue-700 bg-blue-100 px-3 md:px-4 py-1 rounded-full shadow-sm">5 Years</span>
                        </h3>
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-gray-800 underline decoration-wavy decoration-blue-400">Skills</h3>
                            <div class="flex gap-2 flex-wrap">
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">HTML</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">CSS</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">JavaScript</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">React</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">Next.js</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">Java</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">.NET</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">LibGDX</span>
                                <span class="text-sm text-gray-800 bg-white px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-blue-600 hover:text-white transition-all duration-200">Unity</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-gray-800 underline decoration-wavy decoration-green-400">Available For</h3>
                            <div class="flex gap-2 flex-wrap">
                                <span class="text-sm text-green-700 bg-green-100 px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-green-600 hover:text-white transition-all duration-200">Full Time</span>
                                <span class="text-sm text-green-700 bg-green-100 px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-green-600 hover:text-white transition-all duration-200">Remote</span>
                                <span class="text-sm text-green-700 bg-green-100 px-3 md:px-4 py-1 md:py-2 rounded-full shadow-md hover:bg-green-600 hover:text-white transition-all duration-200">Part Time</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons Section -->
                <div class="mt-6 flex flex-col md:flex-row gap-4">
                    <button class="w-full bg-blue-600 text-white py-2 md:py-3 rounded-xl font-medium text-sm shadow-md hover:bg-blue-700 hover:scale-105 transition-all duration-300">View Details</button>
                    <button class="w-full bg-green-600 text-white py-2 md:py-3 rounded-xl font-medium text-sm shadow-md hover:bg-green-700 hover:scale-105 transition-all duration-300">Hire Now</button>
                </div>
            </div>


        </div>


        {{-- Pagination --}}
        <div class="mt-30 px-16 grid place-content-center">
            <ul class="flex gap-2 items-center">
                <li>
                    <a href=""><i class="fa-solid fa-arrow-left p-3 rounded-full bg-gray-200 text-gray-500"></i></a>
                </li>
                <li>
                    <a href=""
                        class="text-gray-500 grid place-content-center h-10 w-10 rounded-full hover:bg-blue-600 hover:text-white duration-200">01</a>
                </li>
                <li>
                    <a href=""
                        class="text-gray-500 grid place-content-center h-10 w-10 rounded-full hover:bg-blue-600 hover:text-white duration-200">02</a>
                </li>
                <li>
                    <a href=""
                        class="text-gray-500 grid place-content-center h-10 w-10 rounded-full hover:bg-blue-600 hover:text-white duration-200">03</a>
                </li>
                <li>
                    <a href=""
                        class="text-gray-500 grid place-content-center h-10 w-10 rounded-full hover:bg-blue-600 hover:text-white duration-200">04</a>
                </li>
                <li>
                    <a href=""
                        class="text-gray-500 grid place-content-center h-10 w-10 rounded-full hover:bg-blue-600 hover:text-white duration-200">05</a>
                </li>
                <li>
                    <a href=""><i class="fa-solid fa-arrow-right p-3 rounded-full bg-gray-200 text-gray-500"></i></a>
                </li>
            </ul>
        </div>
    </div>
@endsection
