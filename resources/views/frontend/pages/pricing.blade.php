@extends('frontend.layouts.master')
@section('content')
    <div class="px-5 lg:px-16 mt-10">
        <div class="text-center">
            <h1 class="text-4xl font-bold">Post a Job</h1>
            <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, cum? Consectetur, facere totam,
                quibusdam
                deserunt reprehenderit iure dicta delectus aut, accusantium optio natus corrupti ipsam. Tempora magnam eos
                modi
                velit.</p>
        </div>

        <div class="grid xl:grid-cols-3 gap-5 mt-20">
            <div class="col-span-1 border-2 rounded-lg border-blue-500">
                <div class="price-header space-y-3 px-5 py-5">
                    <h2 class="uppercase font-semibold">Standard</h2>
                    <p class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus,
                        consectetur.</p>
                    <h3 class="text-3xl text-blue-600 font-bold">Rs.1200<span class="text-gray-400 text-sm">/ Monthly</span>
                    </h3>
                </div>

                <div class="border border-blue-500"></div>

                <ul class="px-5 py-5 space-y-3">
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Post 1 Job</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Urgents & Featured Jobs</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Highlights Job with Colors</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Access & Saved 15 Candidates</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">15 Days Resume Visibility</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">24/7 Critical Support</span>
                    </li>
                </ul>

                <div class="p-5">
                    <button class="btn btn-primary w-full">Choose Plan <i class="fa-solid fa-arrow-right"></i></button>
                </div>

            </div>

            <div class="col-span-1 border-2 rounded-lg border-gray-200">
                <div class="price-header space-y-3 px-5 py-5">
                    <h2 class="uppercase font-semibold">Basic</h2>
                    <p class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus,
                        consectetur.</p>
                    <h3 class="text-3xl text-blue-600 font-bold">Rs.1200<span class="text-gray-400 text-sm">/ Monthly</span>
                    </h3>
                </div>
                <div class="border border-gray-200"></div>

                <ul class="px-5 py-5 space-y-3">
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Post 1 Job</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Urgents & Featured Jobs</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Highlights Job with Colors</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Access & Saved 15 Candidates</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">15 Days Resume Visibility</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">24/7 Critical Support</span>
                    </li>
                </ul>

                <div class="p-5">
                    <button class="btn btn-primary w-full">Choose Plan <i class="fa-solid fa-arrow-right"></i></button>
                </div>

            </div>

            <div class="col-span-1 border-2 rounded-lg border-gray-200">
                <div class="price-header space-y-3 px-5 py-5">
                    <h2 class="uppercase font-semibold">Pro</h2>
                    <p class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus,
                        consectetur.</p>
                    <h3 class="text-3xl text-blue-600 font-bold">Rs.1200<span class="text-gray-400 text-sm">/ Monthly</span>
                    </h3>
                </div>
                <div class="border border-gray-200"></div>

                <ul class="px-5 py-5 space-y-3">
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Post 1 Job</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Urgents & Featured Jobs</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Highlights Job with Colors</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">Access & Saved 15 Candidates</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">15 Days Resume Visibility</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check bg-blue-200 text-blue-500 text-xs p-1 rounded-full"></i>
                        <span class=" text-gray-700 ">24/7 Critical Support</span>
                    </li>
                </ul>

                <div class="p-5">
                    <button class="btn btn-primary w-full">Choose Plan <i class="fa-solid fa-arrow-right"></i></button>
                </div>

            </div>
        </div>
    </div>
@endsection
