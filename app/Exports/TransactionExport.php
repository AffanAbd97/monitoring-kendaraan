<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = DB::table('transactions as a')->leftJoin('employees as b', 'a.id_pegawai', '=', 'b.id_pegawai')

            ->leftJoin('cars as c', 'a.id_kendaraan', '=', 'c.id')
            ->leftJoin('mines as d', 'a.tujuan_tambang', '=', 'd.id')
            ->leftJoin('drivers as e', 'a.id_driver', '=', 'e.id')
            ->select('a.id_pegawai', 'b.nama_pegawai', 'b.penempatan', 'd.nama_tambang', 'c.nama_kendaraan', 'c.jenis_kendaraan', 'c.plat_nomor', 'e.nama_driver', 'a.tahap', 'a.date_approve_1', 'a.date_approve_2')->get()->map(function ($item) {
                if ($item->penempatan === 'utama') {
                    $item->penempatan = 'Main Office';
                } elseif ($item->penempatan === 'cabang') {
                    $item->penempatan = 'Branch Office';
                }
                // Transform tahap values
                switch ($item->tahap) {
                    case 'firstACC':
                        $item->tahap = 'Diterima Kepala Kantor';
                        break;
                    case 'secondACC':
                        $item->tahap = 'Diterima Pool';
                        break;
                    case 'firstReject':
                        $item->tahap = 'Ditolak Kepala Kantor';
                        break;
                    case 'secondReject':
                        $item->tahap = 'Ditolak Pool';
                        break;
                    case 'waiting':
                        $item->tahap = 'Menunggu keputusan kepala kantor';
                        break;
                }


                return $item;

            });
        ;

        return $data;
    }
    public function headings(): array
    {
        return ["ID Pegawai", "Nama Pegawai", "Kantor", "Tujuan Tambang", "Nama Kendaraan", "Jenis Kendaraan", "Plat Nomor", "Nama Driver", "Tahap", "Tanggal Diterima Kepala", "Tanggal Diterima Pool"];
    }


}
