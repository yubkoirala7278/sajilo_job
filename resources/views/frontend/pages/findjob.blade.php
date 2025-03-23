@extends('frontend.layouts.master')
@section('content')
    {{-- Banner Start --}}
    <div class="banner px-16 bg-blue-500 py-10">
        <h1 class="text-5xl font-bold text-white">Find job</h1>
        <div class=" bg-white mt-5 p-2 rounded-xl w-fit lg:flex flex-wrap gap-0">
            <input type="text" class="w-full bg-gray-200 text-gray-500 p-3 border-r border-gray-300 lg:rounded-l-xl sm:w-xs"
                placeholder="Search job, keyword">
            {{-- <input type="text" class="bg-gray-200 p-3 w-md" placeholder="Location"> --}}
            <select name="" id="" class="w-full bg-gray-200 p-3 sm:w-xs text-gray-500 border-r border-gray-300">
                <option>Location</option>
                <option value="">Kathmandu</option>
                <option value="">Pokhara</option>
            </select>
            <select name="" id="" class="bg-gray-200 p-3 sm:w-xs text-gray-500 w-full">
                <option>Select Category</option>
                <option value="">Category One</option>
                <option value="">Category Two</option>
            </select>
            <button
                class=" w-full lg:w-fit  bg-blue-500 py-3 px-10 lg:rounded-r-xl text-white cursor-pointer hover:bg-blue-400 duration-200">Search<i
                    class="fa-solid fa-magnifying-glass text-sm ms-5"></i></button>
        </div>

    </div>

    {{-- Filter Start --}}
    <div class="px-5 sm:px-16 mt-20">
        <div class="flex justify-between flex-wrap gap-4">
            <div class="flex flex-wrap gap-2">
                <span class="bg-gray-200 px-2 py-0.5 rounded-full flex gap-1 items-center">Design<i
                        class="fa-solid fa-xmark text-xs p-1 bg-white ms-1 rounded-full "></i></span>
                <span class="bg-gray-200 px-2 py-0.5 rounded-full flex gap-1 items-center">Teku<i
                        class="fa-solid fa-xmark text-xs p-1 bg-white ms-1 rounded-full "></i></span>
                <span class="bg-gray-200 px-2 py-0.5 rounded-full flex gap-1 items-center">Designer<i
                        class="fa-solid fa-xmark text-xs p-1 bg-white ms-1 rounded-full "></i></span>
            </div>
            <div class="flex gap-2 flex-wrap">
                <select name="" id="" class="border border-gray-400 min-w-42 py-2 rounded-md text-gray-600">
                    <option value="">Latest</option>
                    <option value="">Oldest</option>
                </select>
                <select name="" id="" class="border border-gray-400 min-w-42 py-2 rounded-md text-gray-600">
                    <option value="">12 per page</option>
                    <option value="">10 per page</option>
                </select>

                <div class="flex items-center gap-3 border border-gray-400 px-3 rounded-md">
                    <button class="bg-gray-200 px-1"><i class="fa-solid fa-border-all text-md"></i></button>
                    <button><i class="fa-solid fa-list text-md"></i></button>
                </div>

            </div>
        </div>
    </div>

    {{-- Job List Start --}}
    <div class="grid lg:grid-cols-3 gap-10 px-5 lg:px-16 mt-10">

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

    {{-- Pagination --}}
    <div class="mt-10 px-5 lg:px-16 grid place-content-center">
        <ul class="flex gap-2 items-center">
            <li>
                <a href=""><i class="fa-solid fa-arrow-left p-3 rounded-full bg-gray-200 text-gray-500"></i></a>
            </li>
            <li>
                <a href="" class="text-gray-500 grid place-content-center h-10 w-10 rounded-full hover:bg-blue-600 hover:text-white duration-200">01</a>
            </li>
            <li>
                <a href="" class="text-gray-500 grid place-content-center h-10 w-10 rounded-full hover:bg-blue-600 hover:text-white duration-200">02</a>
            </li>
            <li>
                <a href="" class="text-gray-500 grid place-content-center h-10 w-10 rounded-full hover:bg-blue-600 hover:text-white duration-200">03</a>
            </li>
            <li>
                <a href="" class="text-gray-500 grid place-content-center h-10 w-10 rounded-full hover:bg-blue-600 hover:text-white duration-200">04</a>
            </li>
            <li>
                <a href="" class="text-gray-500 grid place-content-center h-10 w-10 rounded-full hover:bg-blue-600 hover:text-white duration-200">05</a>
            </li>
            <li>
                <a href=""><i class="fa-solid fa-arrow-right p-3 rounded-full bg-gray-200 text-gray-500"></i></a>
            </li>
        </ul>
    </div>


@endsection
