<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\Transaction;
use Auth;
use Illuminate\Http\Request;

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


}
