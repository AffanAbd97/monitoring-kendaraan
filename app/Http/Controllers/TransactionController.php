<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Models\Logs;
use App\Models\Transaction;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Str;

class TransactionController extends Controller
{
    public function index()
    {
        // Your code here
        return view('pages.transaction.index');
    }

    public function approval(Request $request, $id)
    {
        $actor = Auth::user()->role;
        $trans = Transaction::where('id', $id)->first();

        if ($request->status == 'HeadACC' && $trans->tahap == 'waiting') {
            $trans->tahap = 'firstACC';
            $trans->date_approve_1 = now();
        } else if ($request->status == 'PoolACC' && $trans->tahap == 'firstACC') {
            $trans->tahap = 'secondACC';
            $trans->date_approve_2 = now();
        } else {
            if ($request->status == 'reject' && $trans->tahap == 'waiting') {
                $trans->tahap = 'firstReject';
            } else if ($request->status == 'reject' && $trans->tahap == 'firstACC') {
                $trans->tahap = 'secondReject';
            }
        }
        $trans->save();
        $this->createLog($actor, $trans->id_pegawai, $trans->employee->nama_pegawai, $request->status);
        flash()->option('position', 'bottom-right')->success('Izin Diberikan');
        return redirect()->back();

    }

    function createLog($actor, $idPegawai, $namaPegawai, $action)
    {
        $arr = ['HeadACC', 'PoolACC'];
        $text = '';
        if (in_array($action, $arr)) {
            $text = 'Permintaan Pegawai ' . $idPegawai . ' - ' . $namaPegawai . ' di izinkan';
        } else if ($action == 'reject') {
            $text = 'Permintaan Pegawai ' . $idPegawai . ' di tolak';
        }

        $log = new Logs();
        $log->aktivitas = $text;
        $log->actor = $actor;
        $log->save();
    }

    public function export()
    {
        return Excel::download(new TransactionExport, 'users.xlsx');
    }

    public function createTrans(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'id_pegawai' => 'required|exists:employees,id_pegawai',
            'tambang' => 'required',
            'driver' => 'required',
            'kendaraan' => 'required',
        ]);
        if ($validated->fails()) {
            flash()->option('position', 'bottom-right')->error('Data Gagal Tersimpan');

            return redirect()
                ->back()
                ->withErrors($validated)
                ->withInput();

        }
 
        $trans = new Transaction();
        $trans->id = Str::uuid();
        $trans->id_pegawai = $request->id_pegawai;
        $trans->id_kendaraan = $request->kendaraan;
        $trans->id_driver = $request->driver;
        $trans->tujuan_tambang = $request->tambang;
        $trans->save();
        flash()->option('position', 'bottom-right')->success('Data Tersimpan');
        return redirect()->back();
    }
}
