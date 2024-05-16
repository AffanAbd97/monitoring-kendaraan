<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800 dark:border-gray-700">

        <ul class="space-y-2">
            {{-- @php
                if (session('authenticate') && session('authenticate')->peran == 'Admin') {
                    $route = route('admin.home');
                } elseif (session('authenticate') && session('authenticate')->peran == 'Dokter') {
                    $route = route('dokter.home');
                } else {
                    $route = route('pasien.home');
                }
                
            @endphp --}}

            <li>
                <a href={#}
                    class="{{ menuActive([]) }}  flex items-center p-2  text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Overview</span>
                </a>
            </li>
     @foreach ($menuItems as $item)
<li>
        <a href="{{ $item['url'] }}"
            class=" {{ menuActive( $item['active']) }} flex items-center justify-between p-2 text-base font-medium text-gray-900 rounded-lg  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">

            <div class="flex items-center justify-start">
                <i
                    class="fa-solid fa-user-nurse text-2xl text-gray-500 transition duration-75 dark:text-gray-400 dark:group-hover:text-white group-hover:text-gray-900 "></i>
                <span class="ml-3">{{$item['label']}}</span>
            </div>
            <span
                class=" {{ $color }} text-sm font-medium   px-2.5 py-0.5 rounded ">{{$role}}</span>
        </a>
    </li>
@endforeach

        </ul>

    </div>

    </div>
</aside>
