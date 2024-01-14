<?php

namespace App\Http\Controllers;

use App\Models\DailySellSheet;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Item;

class HomeBladeController extends Controller
{
    public function RedirectToIndexPage()
    {

      return redirect('Maswai-Shop-Management-System/Home-Blade-Files/index-page');
    }


    public function indexPage(){

      //*************Total and Profit of The Shop*************
      $total = 0;
      $profit = 0;

      $yesterday_sells = DailySellSheet::orderBy('created_at', 'desc')->whereDate('created_at', '<=', Carbon::today())->get();
      foreach ($yesterday_sells as $single_item_sells => $value) {
        $total = $total + $value['sells'];
        $profit = $profit + $value['profit'];
      }
      //************* End Total and Profit of The Shop**********

      //**************Shop Capital *********************
      $total_capital = 0;
      $total_profit = 0;
      $total_item = Item::all();

      foreach ($total_item as $item ) {
        $total_capital = $total_capital + ($item['buying_price'] * $item['pices']);
        $total_profit = $total_profit + ($item['selling_price'] - $item['buying_price']);
      }

      // dd(number_format($total_capital));

      $daily_sells_list = DailySellSheet::all();
      $grouped_daily_sells_into_monthes = $daily_sells_list->groupBy(function($daily_sells){
        return $daily_sells->created_at->format('F');
      });

      // dd($grouped_daily_sells); Monthly Sells
      $monthly_sells = 0;
      $monthly_profit = 0;
      foreach ($grouped_daily_sells_into_monthes as $single_month => $data) {

        foreach ($data as $value) {
          // dd($value);
          $monthly_sells = $monthly_sells + $value['sells'];
          $monthly_profit = $monthly_profit + $value['profit'];

        }

         // echo  $single_month. "\n";
         // echo "Total: " .number_format($monthly_sells) . "\n";
         // echo "Profit: " . number_format($monthly_profit). "\n";

         $monthly_sells = 0;
         $monthly_profit = 0;

      }

      return view('HomeBladeFiles.home_page', compact('total', 'profit', 'total_capital', 'grouped_daily_sells_into_monthes', 'total_profit'));
    }

}
