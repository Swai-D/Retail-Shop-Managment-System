<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MobileMoney;
use Carbon\ Carbon;
class WakalaController extends Controller
{
    public function wakala_form()
    {
      // $today_transaction = MobileMoney::orderBy('created_at', 'desc')->whereDate('created_at', Carbon::today())->limit(1)->get();
      $today_transaction = MobileMoney::orderBy('created_at', 'desc')->limit(1)->get();
      $total = 0;
      foreach ($today_transaction as $key => $value) {
        $total = ($value->m_pesa + $value->tigo_pesa + $value->airtel_money + $value->halo_pesa + $value->cash + $value->pending);
      }

      $balance = 1650000-$total;
      // $data = MobileMoney::get();
      return view('WakalaBladeFiles.wakala_form', compact('today_transaction', 'total', 'balance'));
    }

    public function get_mobile_money_data()
    {
       // MobileMoney::delete();
       MobileMoney::create($this->validateInputMobileMoney());
      // dd($data);
      return redirect()->back();
    }

    public function validateInputMobileMoney()
    {
      return request()-> validate([
        'm_pesa' => ['required','string','max:255'],
        'tigo_pesa' => ['required','string','max:255'],
        'airtel_money' => ['required','string','max:255'],
        'halo_pesa' => ['required','string','max:255'],
        'cash' => '',
        'pending' => '',
        ]);
    }
}
