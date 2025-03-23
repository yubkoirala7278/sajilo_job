@extends('frontend.layouts.master')
@section('content')
    {{-- Banner Start --}}
    <div class="banner px-5 lg:px-16 bg-blue-500 py-10">
        <h1 class="text-5xl font-bold text-white">Find the right job</h1>
        <div class=" bg-white mt-5 p-2 rounded-xl w-fit flex flex-wrap gap-0">
            <input type="text" class="bg-gray-200 text-gray-500 p-3 border-r border-gray-300 lg:rounded-l-xl w-full lg:w-md"
                placeholder="Search job, keyword">
            {{-- <input type="text" class="bg-gray-200 p-3 w-md" placeholder="Location"> --}}
            <select name="" id="" class="bg-gray-200 p-3 w-full lg:w-md text-gray-500">
                <option>Location</option>
                <option value="">Kathmandu</option>
                <option value="">Pokhara</option>
            </select>

            <button
                class="w-full lg:w-fit bg-blue-500 py-3 px-10 lg:rounded-r-xl text-white cursor-pointer hover:bg-blue-400 duration-200">Search<i
                    class="fa-solid fa-magnifying-glass text-sm ms-5"></i></button>
        </div>
        <div class="">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-white mt-5">Popular Search</h2>
                <a href="" class="text-white text-xl">View All<i class="fa-solid fa-chevron-right ms-1"></i></a>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 mt-5 gap-5">
                <div class="col-span-1 flex bg-white p-3 rounded-lg gap-2 items-center">
                    <i class="fa-solid fa-pen-nib bg-blue-200 p-3 rounded-lg text-blue-700 rotate-90"></i>
                    <div class="">
                        <h3 class="font-bold">Graphics & Design</h3>
                        <span class="text-sm text-gray-500">357 Open position</span>
                    </div>
                </div>

                <div class="col-span-1 flex bg-white p-3 rounded-lg gap-2 items-center">
                    <i class="fa-solid fa-pen-nib bg-blue-200 p-3 rounded-lg text-blue-700 rotate-90"></i>
                    <div class="">
                        <h3 class="font-bold">Code & Programing</h3>
                        <span class="text-sm text-gray-500">357 Open position</span>
                    </div>
                </div>


                <div class="col-span-1 flex bg-white p-3 rounded-lg gap-2 items-center">
                    <i class="fa-solid fa-pen-nib bg-blue-200 p-3 rounded-lg text-blue-700 rotate-90"></i>
                    <div class="">
                        <h3 class="font-bold">Graphics & Design</h3>
                        <span class="text-sm text-gray-500">357 Open position</span>
                    </div>
                </div>


                <div class="col-span-1 flex bg-white p-3 rounded-lg gap-2 items-center">
                    <i class="fa-solid fa-pen-nib bg-blue-200 p-3 rounded-lg text-blue-700 rotate-90"></i>
                    <div class="">
                        <h3 class="font-bold">Graphics & Design</h3>
                        <span class="text-sm text-gray-500">357 Open position</span>
                    </div>
                </div>

                <div class="col-span-1 flex bg-white p-3 rounded-lg gap-2 items-center">
                    <i class="fa-solid fa-pen-nib bg-blue-200 p-3 rounded-lg text-blue-700 rotate-90"></i>
                    <div class="">
                        <h3 class="font-bold">Graphics & Design</h3>
                        <span class="text-sm text-gray-500">357 Open position</span>
                    </div>
                </div>


                <div class="col-span-1 flex bg-white p-3 rounded-lg gap-2 items-center">
                    <i class="fa-solid fa-pen-nib bg-blue-200 p-3 rounded-lg text-blue-700 rotate-90"></i>
                    <div class="">
                        <h3 class="font-bold">Graphics & Design</h3>
                        <span class="text-sm text-gray-500">357 Open position</span>
                    </div>
                </div>


                <div class="col-span-1 flex bg-white p-3 rounded-lg gap-2 items-center">
                    <i class="fa-solid fa-pen-nib bg-blue-200 p-3 rounded-lg text-blue-700 rotate-90"></i>
                    <div class="">
                        <h3 class="font-bold">Graphics & Design</h3>
                        <span class="text-sm text-gray-500">357 Open position</span>
                    </div>
                </div>


                <div class="col-span-1 flex bg-white p-3 rounded-lg gap-2 items-center">
                    <i class="fa-solid fa-pen-nib bg-blue-200 p-3 rounded-lg text-blue-700 rotate-90"></i>
                    <div class="">
                        <h3 class="font-bold">Graphics & Design</h3>
                        <span class="text-sm text-gray-500">357 Open position</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Fact Start --}}
    <div class="xl:grid md:grid-cols-2 lg:grid-cols-4 mt-20 px-5 lg:px-16 hidden">
        <div class="col-span-1 flex items-center">
            <h2 class="text-5xl font-bold">Sajilo Jobs</h2>
        </div>
        <div class="col-span-1">
            <h3 class="text-5xl font-bold">10K +</h3>
            <span class="text-gray-400 font-semibold">Live Job</span>
        </div>
        <div class="col-span-1">
            <h3 class="text-5xl font-bold">5K +</h3>
            <span class="text-gray-400 font-semibold">Companies</span>
        </div>
        <div class="col-span-1">
            <h3 class="text-5xl font-bold">10K +</h3>
            <span class="text-gray-400 font-semibold">Professional Work</span>
        </div>
    </div>

    {{-- Recent Job Post --}}
    <div class="mt-20 px-5 lg:px-16">
        <h2 class="text-4xl font-bold text-center">Recent Job Post</h2>
        <div class="grid lg:grid-cols-3 mt-5 gap-10">

            <div class="col-span-1 shadow-2xl p-6 rounded-2xl">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <div class="bg-blue-200 text-red-500 p-2 rounded-full">
                            <svg width="28px" height="28px" viewBox="0 0 32 32" fill="none">
                                <rect x="17" y="17" width="10" height="10" fill="#FEBA08" />
                                <rect x="5" y="17" width="10" height="10" fill="#05A6F0" />
                                <rect x="17" y="5" width="10" height="10" fill="#80BC06" />
                                <rect x="5" y="5" width="10" height="10" fill="#F25325" />
                            </svg>
                        </div>
                        <div class="">
                            <h4 class="font-semibold">Microsoft</h4>
                            <p class="text-xs font-medium"><i
                                    class="fa-solid fa-location-dot me-1 text-orange-400"></i>Washington, USA</p>
                        </div>
                    </div>
                    <span class="px-2 border text-blue-600 border-blue-600 rounded-2xl">
                        save
                    </span>
                </div>

                <hr class="mt-5 text-gray-400">

                <div class="mt-5">
                    <h3 class="text-blue-800 font-bold text-xl">Senior UX Developer</h3>
                    <div class="flex gap-5 mt-2">
                        <div class="flex items-center gap-x-2">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <p>Full Time</p>
                        </div>
                        <div class="flex items-center gap-x-2">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <p>Onsite</p>
                        </div>
                    </div>
                    <div class="flex justify-between mt-5">
                        <div class="flex items-center gap-2">
                            <i class="fa-regular fa-calendar text-blue-500"></i>
                            5 days ago
                        </div>
                        <button
                            class="bg-blue-600 px-5 py-1.5 text-white rounded-2xl cursor-pointer hover:bg-blue-500">Apply
                            Now</button>
                    </div>
                </div>
            </div>

            <div class="col-span-1 shadow-2xl p-6 rounded-2xl">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">

                        <div class="bg-blue-200 text-red-500 p-2 rounded-full">
                            <svg width="28px" height="28px" viewBox="0 0 32 32" fill="none">
                                <rect x="17" y="17" width="10" height="10" fill="#FEBA08" />
                                <rect x="5" y="17" width="10" height="10" fill="#05A6F0" />
                                <rect x="17" y="5" width="10" height="10" fill="#80BC06" />
                                <rect x="5" y="5" width="10" height="10" fill="#F25325" />
                            </svg>
                        </div>
                        <div class="">
                            <h4 class="font-semibold">Microsoft</h4>
                            <p class="text-xs font-medium"><i
                                    class="fa-solid fa-location-dot me-1 text-orange-400"></i>Washington, USA</p>
                        </div>
                    </div>
                    <span class="px-2 border text-blue-600 border-blue-600 rounded-2xl">
                        save
                    </span>
                </div>

                <hr class="mt-5 text-gray-400">

                <div class="mt-5">
                    <h3 class="text-blue-800 font-bold text-xl">Senior UX Developer</h3>
                    <div class="flex gap-5 mt-2">
                        <div class="flex items-center gap-x-2">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <p>Full Time</p>
                        </div>
                        <div class="flex items-center gap-x-2">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <p>Onsite</p>
                        </div>
                    </div>
                    <div class="flex justify-between mt-5">
                        <div class="flex items-center gap-2">
                            <i class="fa-regular fa-calendar text-blue-500"></i>
                            5 days ago
                        </div>
                        <button
                            class="bg-blue-600 px-5 py-1.5 text-white rounded-2xl cursor-pointer hover:bg-blue-500">Apply
                            Now</button>
                    </div>
                </div>
            </div>


            <div class="col-span-1 shadow-2xl p-6 rounded-2xl">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <div class="bg-blue-200 text-red-500 p-2 rounded-full">
                            <svg width="28px" height="28px" viewBox="0 0 32 32" fill="none">
                                <rect x="17" y="17" width="10" height="10" fill="#FEBA08" />
                                <rect x="5" y="17" width="10" height="10" fill="#05A6F0" />
                                <rect x="17" y="5" width="10" height="10" fill="#80BC06" />
                                <rect x="5" y="5" width="10" height="10" fill="#F25325" />
                            </svg>
                        </div>
                        <div class="">
                            <h4 class="font-semibold">Microsoft</h4>
                            <p class="text-xs font-medium"><i
                                    class="fa-solid fa-location-dot me-1 text-orange-400"></i>Washington, USA</p>
                        </div>
                    </div>
                    <span class="px-2 border text-blue-600 border-blue-600 rounded-2xl">
                        save
                    </span>
                </div>

                <hr class="mt-5 text-gray-400">

                <div class="mt-5">
                    <h3 class="text-blue-800 font-bold text-xl">Senior UX Developer</h3>
                    <div class="flex gap-5 mt-2">
                        <div class="flex items-center gap-x-2">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <p>Full Time</p>
                        </div>
                        <div class="flex items-center gap-x-2">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <p>Onsite</p>
                        </div>
                    </div>
                    <div class="flex justify-between mt-5">
                        <div class="flex items-center gap-2">
                            <i class="fa-regular fa-calendar text-blue-500"></i>
                            5 days ago
                        </div>
                        <button
                            class="bg-blue-600 px-5 py-1.5 text-white rounded-2xl cursor-pointer hover:bg-blue-500">Apply
                            Now</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Talent Section --}}
    <div class="grid lg:grid-cols-12 gap-5 mt-20 px-5 lg:px-16">
        <div class="col-span-6">
            <img src="{{ asset('frontend/image/professional.jpg') }}" class="w-full h-full rounded-2xl" alt="">
        </div>
        <div class="col-span-6 flex flex-col justify-center">
            <h2 class="text-4xl font-bold">Find and Hire <br> Top Professional Talent Today </h2>
            <p class="mt-5 text-gray-600"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis,
                ratione nobis. Incidunt eaque quo cumque asperiores architecto natus explicabo aspernatur veritatis
                impedit optio adipisci error consequatur debitis soluta ullam quos perspiciatis repudiandae illo
                esse suscipit earum nam dicta, sit pariatur. Sapiente esse tenetur quasi molestias, iste nisi iusto
                nostrum officia consequatur placeat nobis unde consequuntur dignissimos mollitia, pariatur magni.
                Laboriosam. </p>
            <div class="flex gap-2 mt-5">
                <a href="" class="text-white bg-blue-600 px-5 py-2 rounded-md hover:bg-blue-500 duration-200">Hire
                    Professional</a>
                <a href=""
                    class="border border-gray-300 px-5 py-2 rounded-md hover:bg-blue-600 hover:text-white hover:border-blue-600 duration-200">Post
                    a Job</a>
            </div>
        </div>
    </div>

    {{-- Professional Talent --}}
    <div class="mt-20 px-5 lg:px-16">
        <h2 class="text-4xl text-center font-bold">Professional talent on board</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-5">
            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/1.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                </div>
            </div>

            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/2.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                </div>
            </div>

            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/1.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                </div>
            </div>

            <div class="col-span-1 shadow-xl">
                <img src="{{ asset('frontend/image/professional/2.jpeg') }}"
                    class=" max-h-52 w-full object-cover rounded-t-lg" alt="">
                <div class=" space-y-0 text-center py-4 ">
                    <h3 class="text-xl text-blue-500 font-bold">Shyam Pradhan</h3>
                    <small>Front-end Developer</small>
                </div>
            </div>


        </div>
    </div>

    {{-- Opportunity --}}
    <div class="mt-20 px-5 lg:px-16 ">
        <div class="bg-blue-600 py-10 rounded-lg  grid place-content-center">
            <h2 class="text-4xl text-white text-center font-bold uppercase">Opportunity is waiting</h2>
            <p class="text-white text-center my-6 max-w-3xl">Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Doloremque quasi, maiores facilis non blanditiis repellat quae deserunt natus nam veniam.</p>
            <div class="text-center"><button class="btn btn-primary w-fit">Create your free profiles</button>
            </div>
        </div>
    </div>
@endsection
