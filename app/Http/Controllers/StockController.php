<?php

namespace App\Http\Controllers;

use App\Models\DailySellSheet;
use App\Models\CreditorName;
use App\Models\CreditorTable;
use App\Models\TotalandProfit;
use Illuminate\Http\Request;
use App\Models\Variation;
use App\Models\Item;

use Carbon\Carbon;


class StockController extends Controller
{

    public function stock_register_form()
    {
      return view('StockBladeFiles.stock_register_form');
    }

    public function stock_register_form_store_data(Request $request)
    {
      $data = new Item();
      $data->item_name = $request->get('item_name');
      $data->buying_price = $request->get('buying_price');
      $data->selling_price = $request->get('selling_price');
      $data->pack = $request->get('pack');
      $data->pices = $request->get('pices');
      //changing time format
      // $newdate = date('d/m/Y ', strtotime($request->expire_date));
      // dd($newdate);
      $data->expire_date = $request->expire_date;
      $data->intake_date = $request->get('intake_date');
      $data->item_category = $request->get('item_category');
      $data->size = $request->get('size');
      $data->profit = ($request->get('selling_price') - $request->get('buying_price'));
      $data->discount_price = $request->get('item_category');
      $data->item_image = $request->get('item_image');
      $data->save();
      return redirect('/Maswai-Shop-Management-System/Stock-Blade-Files/stock_table_list')->with('Message', "Item was Updated Successifully");
    }

    public function stock_status_page()
    {
      $Snacks_and_Conifectionary = Item::where([['item_category', 'Conifectionary & Snacks'],['pices','<=', 10 ]])->get();
      $Detergent_and_Cleaning = Item::where([['item_category', 'Detergent & Cleaning'],['pices','<=', 5 ]])->get();
      $Sanitary_and_Beauty = Item::where([['item_category', 'Sanitary & Beauty'],['pices','<=', 5 ]])->get();
      $Soda_and_Cane = Item::where([['item_category', 'Soda-Bottle & Cane'],['pices','<=', 5 ]])->get();
      $Grocery = Item::where([['item_category', 'Grocery'],['pices','<=', 5 ]])->get();
      return view('StockBladeFiles.stock_status_page', compact('Snacks_and_Conifectionary', 'Detergent_and_Cleaning', 'Grocery', 'Sanitary_and_Beauty', 'Soda_and_Cane' ));
    }

    public function stock_table_list()
    {
      // $StockTableList = Item::all();
      $StockTableList = Item::orderBy('created_at', 'desc')->get();
      return view('StockBladeFiles.stock_table_list', compact('StockTableList'));
    }

    public function category_table_list()
    {
      return view('StockBladeFiles.category_table_list');
    }



    public function daily_sells_sheet()
    { $total = 0;
      $profit = 0;
      // $allItems = Item::orderBy('created_at', 'desc')->get();
      $allItems = Item::all();
      // $allItems = Item::all();
      $sold_items = DailySellSheet::orderBy('created_at', 'desc')->whereDate('created_at', Carbon::today())->get();
      // dd($sold_items);
      foreach ($sold_items as $single_item_sells) {
        $total = $total + $single_item_sells['sells'];
        $profit = $profit + $single_item_sells['profit'];
      }
      return view('StockBladeFiles.daily_sells_sheet', compact('allItems', 'sold_items', 'total', 'profit'));
    }

    public function item_sold(Request $request, Item $item_id )
    {
      $item_sold = Item::where('id', '=', $item_id->id)->get();
      $pices_sold = $request->item_sold;

      foreach ($item_sold as $item) {
        if ($item['pices'] >= $pices_sold && $pices_sold > 0 ) {
          $mauzo = ($item['selling_price']* ($pices_sold));
          $daily_sells_sheet = new DailySellSheet();
          $daily_sells_sheet->item_id = $item['id'];
          $daily_sells_sheet->item_name = $item['item_name'];
          $daily_sells_sheet->selling_price = $item['selling_price'];
          $daily_sells_sheet->size = $item['size'];
          $daily_sells_sheet->profit = $item['profit'];
          $daily_sells_sheet->pices_sold = $pices_sold;
          $daily_sells_sheet->sells = $mauzo;
          $daily_sells_sheet->save();
          $pices_left =( ($item['pices']) - ($pices_sold));
          // dd($pices_left);
            Item::where('id', '=', $item_id->id)->update([
            'pices' => $pices_left,
          ]);
          return redirect()->back();

        }

        else {
          return redirect()->back()->with('Message', "Mauzo Hayajafanyika jaribu Tena !");
        }

      }


    }

    public function credit_sells_sheet()
    { $all_item = Item::where('pices', '>', 0)->get();
      $creditor_names = CreditorName::all();
      return view('StockBladeFiles.credit_sells_sheet', compact('all_item', 'creditor_names'));
    }


    public function creditor_table()

    {
      $creditors_list = CreditorTable::orderBy('created_at', 'desc')->get()->groupBy('creditor_id');
      // $total_balance = 0;
      // foreach ($creditors_list as $key => $value) {
      //   $total_balance = $total_balance + $value->total_cost;
      //   foreach ($value as $key) {
      //     if (($key->total_cost  == $total_balance)) {
      //        CreditorTable::where('creditor_id', $request->creditor_id)->delete();
      //     }
      //   }
      // }

      return view('StockBladeFiles.creditors_table', compact('creditors_list'));
    }

    public function credit_store_name(Request $request)

    {

      if (isset($request->creditor_name)) {
        $creditor_name = new CreditorName();
        $creditor_name->creditor_name = $request->creditor_name;
        $creditor_name->save();
        return redirect()->back()->with('Message', 'Credito\'s name save Successifully ');
      }
      else {
        return redirect()->back()->with('Message', 'Plese Provide Credito\'s Name Before Submit The Form');
      }
    }

    public function credit_item_info(Request $request)
    {
      $item_detail = explode('/', $request->creditor_id);

      if (isset($request->item_id)) {
        $items = $request->item_id;
        $pices_sold = $request->pices_sold;
        // dd($pices_sold);
        $integerIDs = array_map('intval', $items);
        $pices_sold_by_credit = array_map('intval', $pices_sold);
        $items_sold_by_credit = Item::whereIn('id', $integerIDs)->get();
        $loop_balance = 0;
        $i = 0;
        foreach ($items_sold_by_credit as $key => $value) {
          $creditor_table = new CreditorTable();
          $creditor_table->pices_sold = $pices_sold_by_credit[$i];
          $creditor_table->creditor_id = $item_detail[0];
          $creditor_table->creditor_name = $item_detail[1];
          $creditor_table->item_id = $value->id;
          $creditor_table->item_name = $value->item_name;
          $creditor_table->size = $value->size;
          $creditor_table->price = $value->selling_price;
          $creditor_table->total_cost = ($value['selling_price']* ($pices_sold_by_credit[$i]));
          $loop_balance = ($value['selling_price']* ($pices_sold_by_credit[$i]));
          $remaining_balance = ($value['selling_price']* ($pices_sold_by_credit[$i]));
          $creditor_table->save();

          $pices_left =( ($value['pices']) - ($pices_sold_by_credit[$i]));
          Item::where('id', '=', $value->id)->update([
          'pices' => $pices_left,
          ]);
          $i = $i + 1;



        }

        // $data = CreditorTable::where('creditor_id', '=', $item_detail[0])->get();
        // dd($data);
        // foreach ($data as $key => $value) {
        //   CreditorTable::where('creditor_id', '=', $item_detail[0])->update([
        //     'remaining_balance' => (int)$value['remaining_balance'] + (int)$loop_balance,
        //   ]);
        // }



        return redirect('/Maswai-Shop-Management-System/Stock-Blade-Files/daily_sells_sheet')->with('Message','Item Sold By Credit');

      }

      else {
        return redirect()->back()->with('Message','Please Enter the Data Before Submit The Form');
      }


    }

    public function clear_credit(Request $request)
    {
      if (isset($request->balance_paid)) {

        $credit_records = CreditorTable::where('creditor_id', $request->creditor_id)->get();
        $total_balance = 0;

        foreach ($credit_records as $key => $value) {

          $total_balance = $total_balance + $value->total_cost;
          $paid_balance = ($value->balance_paid + $request->balance_paid);
          $remaining_balance = ($total_balance - $paid_balance);

          //Update Balance
           CreditorTable::where('creditor_id', $request->creditor_id)->update([
             'balance_paid' => $paid_balance,
             'remaining_balance' => $remaining_balance,
           ]);

           // CreditorTable::orWhere('balance_paid', '>=', $total_balance)->delete();

      }

       CreditorTable::where('balance_paid', '>=', $total_balance)->delete();

       foreach ($credit_records as $key => $value) {
          $creditors_balance_details = CreditorTable::orderBy('created_at', 'desc')->where('creditor_id', $request->creditor_id)->limit(1)->get();
          $total_balance = $total_balance + $value->total_cost;

        }

        return redirect()->back()->with("Message", 'Thank You');
      }

      else {
        return redirect()->back()->with("Message", 'Please Be Serious');
      }

    }


    public function daily_sells_list()
    {
      $total = 0;
      $profit = 0;
      $sold_items = DailySellSheet::orderBy('created_at', 'desc')->whereDate('created_at', Carbon::today())->get();;
      foreach ($sold_items as $single_item_sells) {
        $total = $total + $single_item_sells['sells'];
        $profit = $profit + $single_item_sells['profit'];
      }

      // dd($sold_items);
      return view('StockBladeFiles.daily_sales_list', compact('sold_items', 'total', 'profit'));
    }

    public function sells_list()
    {
      $total = 0;
        $profit = 0;
        // $allItems = Item::orderBy('created_at', 'desc')->get();
        $allItems = Item::all();
        $sold_items = DailySellSheet::orderBy('created_at', 'desc')->whereDate('created_at', '<', Carbon::today())->get();
        // dd($sold_items);
        foreach ($sold_items as $single_item_sells => $value) {
          $total = $total + $value['sells'];
          $profit = $profit + $value['profit'];
        }

      return view('StockBladeFiles.sales_list', compact('allItems', 'sold_items', 'total', 'profit'));

    }

    public function update_stock(Item $item_id)
    {
      $item_selected = Item::where('id', $item_id->id)->get();
      return view('StockBladeFiles.stock_update_form', compact('item_selected'));
    }


    public function update_stock_form(Request $request, Item $item_id)
    {
      $data = Item::where('id', '=', $item_id->id)->get();

      if (isset($request->item_name)) {
          Item::where('id', '=', $item_id->id)->update(['item_name' => $request->item_name]);
      }

      if (isset($request->selling_price)) {
          // $profit = $request->selling_price - $request->buying_price
          Item::where('id', '=', $item_id->id)->update(['selling_price' => $request->selling_price]);
      }

      if (isset($request->buying_price)) {
          Item::where('id', '=', $item_id->id)->update(['buying_price' => $request->buying_price]);
      }

      if (isset($request->pack)) {
          Item::where('id', '=', $item_id->id)->update(['pack' => $request->pack]);
      }

      if (isset($request->pices)) {
          Item::where('id', '=', $item_id->id)->update(['pices' => $request->pices]);
      }

      if (isset($request->expire_date)) {
          Item::where('id', '=', $item_id->id)->update(['expire_date' => $request->expire_date]);
      }

      if (isset($request->size)) {
          Item::where('id', '=', $item_id->id)->update(['size' => $request->size]);
      }

        $status = Item::where('id', '=', $item_id->id)->get();
        foreach ($status as $key => $value) {
          $new_profit = ($value->selling_price - $value->buying_price);

        }

        //update profit
      Item::where('id', '=', $item_id->id)->update(['profit' => $new_profit]);

      return redirect('/Maswai-Shop-Management-System/Stock-Blade-Files/stock_table_list')->with('Message', 'Item Was Updates Successifully !');

    }


    public function daily_sells_delete_item(DailySellSheet $item_id)
    {
      $sold_item = DailySellSheet::where('id', '=', $item_id->id)->get();
      $updated_item = Item::where('id', '=', $item_id->item_id)->get();

      // foreach ($sold_item as  $value) {
      //
      //   foreach ($updated_item as $key ) {
      //      Item::where('id', '=', $item_id->item_id)->update([
      //        'pices' => $key->
      //      ]);
      //   }
      // }

     }

     public function sales_over_view()
     {
       $total = 0;
         $profit = 0;
         // $allItems = Item::orderBy('created_at', 'desc')->get();
         $allItems = Item::all();
         $sold_items = DailySellSheet::orderBy('created_at', 'desc')->whereMonth('created_at', '<=', Carbon::now())->get();
         dd($sold_items);
         foreach ($sold_items as $single_item_sells => $value) {
           $total = $total + $value['sells'];
           $profit = $profit + $value['profit'];
         }

       return view('StockBladeFiles.sales_over_view');

     }



     public function variation(Request $request)
     {
           $data = new Variation();
           $data->actual_amount = $request->actual_amount;
           $data->system_amount = $request->system_amount;
           $data->variation = ($request->actual_amount) - ($request->system_amount);
           $data->save();
           // dd($data)

           // return redirect('/Maswai-Shop-Management-System/Stock-Blade-Files/daily_sells_list');
           return redirect()->back()->with('Message', 'Thanks the variation Has been saved to the data base');

     }


}
