<div class="bg-white dark:shadow-none  dark:bg-gray-900 shadow-md sm:rounded-lg overflow-hidden">

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">#</th>
                    <th scope="col" class="px-4 py-3">Aktifitas</th>
                    <th scope="col" class="px-4 py-3">Petugas</th>
                    <th scope="col" class="px-4 py-3">Tanggal</th>


                </tr>
            </thead>
            <tbody>
                @forelse ($log as $item)
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-gray-400">
                            {{ $loop->iteration }}</th>
                        <td class="px-4 py-3">{{ $item->aktivitas }}</td>
                        <td class="px-4 py-3">{{ $item->actor }}</td>
                        <td class="px-4 py-3">{{ formatDate($item->created_at) }}</td>
                     




                    </tr>
                @empty
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-4 py-3 font-medium text-xl text-gray-900 dark:text-white whitespace-nowrap text-center"
                            colspan="4">Data Tidak
                            Ditemukan</th>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="px-4 py-6">
        {{ $log->links() }}
    </div>

</div>
