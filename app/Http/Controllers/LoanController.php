<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function startLoan(Request $request, $copy_id) {
        $data['copy_id'] = $copy_id;
        $data['user_id'] = auth()->id();
        $data['borrowed_at'] = now();

        Loan::create($data);

        $copy = DB::table('copies')
                ->where('id', $copy_id)
                ->update(['available' => 0]);

        return redirect('/home');
    }
}
