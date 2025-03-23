{{-- <header>
    <!-- Top Nav Bar -->
    <div class="grid grid-cols-12  bg-amber-400 p-1.5">
        <div class="col-span-2 flex items-center px-16 mx-auto">
            <select class="select w-fit h-fit py-0.5 opacity-70 rounded-2xl ">
                <option>Nepali</option>
                <option>India</option>
                <option>America</option>
            </select>
        </div>
        <div class="col-span-10 flex justify-center">
            <p class="text-white">Hire Candidate with Flexible Plan. <a href=""
                    class="text-black hover:text-white underline">Sign Up with Sajilo Job</a> </p>
        </div>
    </div>


    <div class="flex justify-between items-center px-16 p-2">
        <div class="logo">
            <a href="{{ route('home') }}" class="text-4xl font-black">
                LOGO
            </a>
        </div>
        <div class="flex gap-2">
            <a href="#"
                class="px-8 py-2 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-500 hover:text-white duration-200">Sign
                In</a>
            <a href="#" class="px-8 py-2 bg-blue-500 rounded-lg text-white hover:bg-blue-400 duration-200">Sign
                Up</a>
        </div>
    </div>

    <div class="flex px-16 bg-gray-200 p-2">
        <ul class="flex gap-10">
            <li>
                <a href="{{ route('find.job') }}"
                    class="text-lg border-b-2 border-transparent hover:border-b-2 hover:border-blue-500 inline-block duration-200">Find
                    Job</a>
            </li>
            <li>
                <a href="{{ route('hireprofessional') }}"
                    class="text-lg border-b-2 border-transparent hover:border-b-2 hover:border-blue-500 inline-block duration-200">Hire
                    Professional </a>
            </li>
            <li>
                <a href="{{ route('post.job') }}"
                    class="text-lg border-b-2 border-transparent hover:border-b-2 hover:border-blue-500 inline-block duration-200">Post
                    Job</a>
            </li>
            <li>
                <a href="{{ route('pricing') }}"
                    class="text-lg border-b-2 border-transparent hover:border-b-2 hover:border-blue-500 inline-block duration-200">Pricing</a>
            </li>
        </ul>
    </div>

</header> --}}


<header>
    <!-- Top Nav Bar -->
    <div class="grid grid-cols-12 bg-amber-400 p-1.5">
        <div class="col-span-12 md:col-span-2 flex items-center justify-center md:justify-start px-4 md:px-16">
            <select class="select w-fit h-fit py-0.5 opacity-70 rounded-2xl text-sm">
                <option>Nepali</option>
                <option>India</option>
                <option>America</option>
            </select>
        </div>
        <div class="col-span-12 md:col-span-10 flex justify-center items-center text-center px-4 md:px-0 mt-2 md:mt-0">
            <p class="text-white text-sm md:text-base">
                Hire Candidate with Flexible Plan.
                <a href="#" class="text-black hover:text-white underline">Sign Up with Sajilo Job</a>
            </p>
        </div>
    </div>

    <!-- Logo Bar -->
    <div class="flex justify-between items-center px-4 md:px-16 p-2 bg-white">
        <div class="logo">
            <a href="{{ route('home') }}" class="text-3xl md:text-4xl font-black text-gray-900">
                LOGO
            </a>
        </div>
        <div class="flex items-center gap-2">
            <!-- Hamburger Icon (Visible on Mobile) -->
            <button id="menu-toggle" class="md:hidden text-gray-900 focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <!-- Sign In/Sign Up Buttons (Hidden on Mobile) -->
            <div class="hidden md:flex gap-2">
                <a href="#" class="px-6 md:px-8 py-2 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-500 hover:text-white duration-200 text-sm md:text-base">Sign In</a>
                <a href="#" class="px-6 md:px-8 py-2 bg-blue-500 rounded-lg text-white hover:bg-blue-400 duration-200 text-sm md:text-base">Sign Up</a>
            </div>
        </div>
    </div>

    <!-- Navigation Menu (Desktop) -->
    <div class="hidden md:flex px-16 bg-gray-200 p-2">
        <ul class="flex gap-10">
            <li>
                <a href="{{ route('find.job') }}" class="text-lg border-b-2 border-transparent hover:border-b-2 hover:border-blue-500 inline-block duration-200">Find Job</a>
            </li>
            <li>
                <a href="{{ route('hireprofessional') }}" class="text-lg border-b-2 border-transparent hover:border-b-2 hover:border-blue-500 inline-block duration-200">Hire Professional</a>
            </li>
            <li>
                <a href="{{ route('post.job') }}" class="text-lg border-b-2 border-transparent hover:border-b-2 hover:border-blue-500 inline-block duration-200">Post Job</a>
            </li>
            <li>
                <a href="{{ route('pricing') }}" class="text-lg border-b-2 border-transparent hover:border-b-2 hover:border-blue-500 inline-block duration-200">Pricing</a>
            </li>
        </ul>
    </div>

    <!-- Sidebar Menu (Mobile) -->
    <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gray-200 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden z-50">
        <div class="flex justify-between items-center p-4 border-b border-gray-300">
            <span class="text-lg font-bold text-gray-900">Menu</span>
            <button id="close-sidebar" class="text-gray-900 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <ul class="flex flex-col gap-6 p-4">
            <li>
                <a href="{{ route('find.job') }}" class="text-lg text-gray-900 hover:text-blue-500 duration-200">Find Job</a>
            </li>
            <li>
                <a href="{{ route('hireprofessional') }}" class="text-lg text-gray-900 hover:text-blue-500 duration-200">Hire Professional</a>
            </li>
            <li>
                <a href="{{ route('post.job') }}" class="text-lg text-gray-900 hover:text-blue-500 duration-200">Post Job</a>
            </li>
            <li>
                <a href="{{ route('pricing') }}" class="text-lg text-gray-900 hover:text-blue-500 duration-200">Pricing</a>
            </li>
            <li>
                <a href="#" class="px-6 py-2 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-500 hover:text-white duration-200 text-sm">Sign In</a>
            </li>
            <li>
                <a href="#" class="px-6 py-2 bg-blue-500 rounded-lg text-white hover:bg-blue-400 duration-200 text-sm">Sign Up</a>
            </li>
        </ul>
    </div>
</header>

<!-- JavaScript for Toggle Sidebar -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const closeSidebar = document.getElementById('close-sidebar');
    const sidebar = document.getElementById('sidebar');

    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    });

    closeSidebar.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
    });

    // Close sidebar when clicking outside
    document.addEventListener('click', (e) => {
        if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
            sidebar.classList.add('-translate-x-full');
        }
    });
</script>
