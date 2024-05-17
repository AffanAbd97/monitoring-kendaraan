<div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-2">

    @if ($status != 'secondACC')
        @if ($status == 'firstACC' && ($roles == 'Super Admin' || $roles == 'Pool' || $roles == 'Admin'))
            <form action="{{ route('transaction.approve', ['id' => $id]) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="status" value='PoolACC'>
                <button type="submit"
                    class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    @if ($roles == 'Super Admin' || $roles == 'Admin')
                        Izinkan Sebagai Pool
                    @else
                        Izinkan
                    @endif
                </button>
            </form>
            <form action="{{ route('transaction.approve', ['id' => $id]) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="status" value='reject'>
                <button type="submit"
                    class=" text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Tolak
                </button>
            </form>
        @endif
        @if ($status == 'waiting' && ($roles == 'Super Admin' || $roles == 'Kepala Kantor' || $roles == 'Admin'))
            <form action="{{ route('transaction.approve', ['id' => $id]) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="status" value='HeadACC'>
                <button type="submit"
                    class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    @if ($roles == 'Super Admin' || $roles == 'Admin')
                        Izinkan Sebagai Kepala
                    @else
                        Izinkan
                    @endif
                </button>
            </form>
            <form action="{{ route('transaction.approve', ['id' => $id]) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="status" value='reject'>
                <button type="submit"
                    class=" text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Tolak
                </button>
            </form>
        @endif
    @endif


</div>
