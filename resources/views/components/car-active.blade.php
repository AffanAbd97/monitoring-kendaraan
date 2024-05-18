<div
    class="w-full h-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 col-span-2">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Kendaraan Bekerja</h5>

    </div>
    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($car as $item)
                <li class="py-3 sm:py-4">
                    <div class="flex items-center">

                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{ $item->nama_kendaraan }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $item->jenis_kendaraan }}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            {{ strtoupper($item->plat_nomor) }}
                        </div>
                    </div>
                </li>
            @empty
                <li class="py-3 sm:py-4">
                    <div class="flex items-center">


                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            Tidak Ada Kendaraan Yang sedang Bekerja
                        </p>


                    </div>
                </li>
            @endforelse

        </ul>
    </div>
</div>
