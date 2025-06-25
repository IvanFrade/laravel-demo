<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function startLoan(Request $request) {
        $data = $request->validate([
            'copy_id' => 'required',
            'user_id' => 'required',
        ]);
        
        $data['copy_id'] = strip_tags($data['copy_id']);
        $data['user_id'] = strip_tags($data['user_id']);

        $data['borrowed_at'] = now();

        Loan::create($data);

        return redirect('/home');
    }
}
