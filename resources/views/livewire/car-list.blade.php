<div class="bg-white dark:shadow-none  dark:bg-gray-900 shadow-md sm:rounded-lg overflow-hidden">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full md:w-1/2">

            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input wire:model.live.debounce.200ms="search" type="search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" required="">
            </div>

        </div>

    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">#</th>

                    <th scope="col" class="px-4 py-3">Nama</th>
                    <th scope="col" class="px-4 py-3">Jenis</th>
                    <th scope="col" class="px-4 py-3">Plat Nomor</th>
                    <th scope="col" class="px-4 py-3">Kapasitas BBM</th>
                    <th scope="col" class="px-4 py-3">Konsumsi BBM</th>
                    <th scope="col" class="px-4 py-3">Status Kendaraan</th>
                    <th scope="col" class="px-4 py-3">Status Pakai</th>
                    <th scope="col" class="px-4 py-3">Service Sebelumnya</th>
                    <th scope="col" class="px-4 py-3">Service Selanjutnya</th>
                    <th scope="col" class="px-4 py-3">Penempatan</th>
                    <th scope="col" class="px-4 py-3">Tanggal Pakai</th>

                    {{-- <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($car as $item)
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-gray-400">
                            {{ $loop->iteration }}</th>
                        <td class="px-4 py-3">{{ $item->nama_kendaraan }}</td>
                        <td class="px-4 py-3">{{ $item->jenis_kendaraan }}</td>
                        <td class="px-4 py-3">{{ $item->plat_nomor }}</td>
                        <td class="px-4 py-3">{{ $item->jumlah_bbm }}</td>
                        <td class="px-4 py-3">{{ $item->konsumsi_bbm }}</td>
                        <td class="px-4 py-3">{{ $item->status_kendaraan == 1 ? 'Hak Milik' : 'Sewa' }}</td>
                        <td class="px-4 py-3">
                            {{ $item->status_pakai == 1 ? 'Kendaraan Sedang Dipakai' : 'Kendaraan Belum Dipakai' }}</td>
                        <td class="px-4 py-3">{{ formatDate($item->service_terakhir) }}</td>
                        <td class="px-4 py-3">{{ formatDate($item->service_berikutnya) }}</td>
                        <td class="px-4 py-3">{{ getOfficeType($item->penempatan) }}</td>
                        <td class="px-4 py-3">{{ $item->tanggal_pakai }}</td>




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
        {{ $car->links() }}
    </div>

</div>
