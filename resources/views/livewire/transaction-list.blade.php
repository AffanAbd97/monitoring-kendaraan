<div class="bg-white dark:shadow-none  dark:bg-gray-900 shadow-md sm:rounded-lg overflow-hidden">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full flex items-center gap-2">
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
                        placeholder="Cari Id Pegawai" required="">
                </div>

            </div>
            <a href="{{ route('trans.export') }}" class="block bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-500  text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800s">Export</a>
        </div>
        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Super Admin')
      
            <x-modal-create/>
        @endif
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3" rowspan="2">#</th>
                    <th scope="col" class="px-4 py-3 text-center" colspan="3">Data Pegawai</th>
                    <th scope="col" class="px-4 py-3 text-center" colspan="2">Data Kendaraan</th>
                    <th scope="col" class="px-4 py-3" rowspan="2">Tujuan</th>
                    <th scope="col" class="px-4 py-3" rowspan="2">Status</th>

                    <th scope="col" class="px-4 py-3" rowspan="2">Action</th>


                    {{-- <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th> --}}
                </tr>
                <tr>

                    <th scope="col" class="px-4 py-3">ID Pegawai</th>
                    <th scope="col" class="px-4 py-3">Nama Pegawai</th>
                    <th scope="col" class="px-4 py-3">Kantor</th>
                    <th scope="col" class="px-4 py-3">Nama Kendaraan</th>

                    <th scope="col" class="px-4 py-3">Plat Nomor</th>




                    {{-- <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($transaction as $item)
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-gray-400">
                            {{ $loop->iteration }}</th>
                        <td class="px-4 py-3">{{ $item->employee->id_pegawai }}</td>
                        <td class="px-4 py-3">{{ $item->employee->nama_pegawai }}</td>
                        <td class="px-4 py-3">{{ getOfficeType($item->employee->penempatan) }}</td>
                        <td class="px-4 py-3">{{ $item->car->nama_kendaraan }}</td>
                        <td class="px-4 py-3">{{ strtoupper($item->car->plat_nomor) }}</td>

                        <td class="px-4 py-3">{{ $item->mine->nama_tambang }}</td>
                        <td class="px-4 py-3"> {!! getShortBadge($item->tahap) !!}</td>


                        {{-- <td class="px-4 py-3"><x-transaction-action :status="$item->tahap" /></td> --}}
                        <td class="px-4 py-3">


                            <button data-modal-target="default-modal-{{ $loop->iteration }}"
                                data-modal-toggle="default-modal-{{ $loop->iteration }}"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                <i class="fa-solid fa-eye"></i>
                            </button>

                            <div id="default-modal-{{ $loop->iteration }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">

                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <div class="px-4 sm:px-0">
                                                <h3 class="text-base font-semibold leading-7 text-gray-900">Informasi
                                                </h3>
                                                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Detail
                                                    Informasi Permintaan</p>
                                            </div>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="default-modal-{{ $loop->iteration }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">



                                            <div class="grid grid-cols-2">
                                                <dl class="divide-y divide-gray-100">
                                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                        <dt class="text-sm font-medium leading-6 text-gray-900">ID
                                                            Pegawai</dt>
                                                        <dd
                                                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                            {{ $item->employee->id_pegawai }}</dd>
                                                    </div>
                                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                        <dt class="text-sm font-medium leading-6 text-gray-900">
                                                            Nama Pegawai</dt>
                                                        <dd
                                                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                            {{ $item->employee->nama_pegawai }}</dd>
                                                    </div>
                                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                        <dt class="text-sm font-medium leading-6 text-gray-900">Kantor
                                                            Cabang</dt>
                                                        <dd
                                                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                            {{ getOfficeType($item->employee->penempatan) }}</dd>
                                                    </div>
                                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                        <dt class="text-sm font-medium leading-6 text-gray-900">Tujuan
                                                        </dt>
                                                        <dd
                                                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                            {{ $item->mine->nama_tambang }}</dd>
                                                    </div>



                                                </dl>
                                                <dl class="divide-y divide-gray-100">
                                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                        <dt class="text-sm font-medium leading-6 text-gray-900">Nama
                                                            Kendaraan</dt>
                                                        <dd
                                                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                            {{ $item->car->nama_kendaraan }}</dd>
                                                    </div>
                                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                        <dt class="text-sm font-medium leading-6 text-gray-900">
                                                            Jenis Kendaraan</dt>
                                                        <dd
                                                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                            {{ $item->car->jenis_kendaraan }}</dd>
                                                    </div>
                                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                        <dt class="text-sm font-medium leading-6 text-gray-900">Plat
                                                            Nomor</dt>
                                                        <dd
                                                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                            {{ strtoupper($item->car->plat_nomor) }}</dd>
                                                    </div>
                                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                        <dt class="text-sm font-medium leading-6 text-gray-900">Tanggal
                                                            Approve</dt>
                                                        <dd
                                                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                            <ul>
                                                                <li>
                                                                    <span class="font-bold">Kepala</span>
                                                                    {{ formatDate($item->date_approve_1) }}
                                                                </li>
                                                                <li>
                                                                    <span class="font-bold">Pool</span>
                                                                    {{ formatDate($item->date_approve_2) }}
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </div>


                                                </dl>
                                                <div
                                                    class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 col-span-2">
                                                    <p class="text-sm font-medium leading-6 text-gray-900">Status
                                                    </p>
                                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                                        {!! getStatusBadge($item->tahap) !!}</div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- Modal footer -->
                                        <x-transaction-action :status="$item->tahap" :id="$item->id" />
                                    </div>
                                </div>
                            </div>
                        </td>




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
        {{ $transaction->links() }}
    </div>

</div>
