<?php

namespace Corvus\Backoffice\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Csv;
use Corvus\Core\Models\PricingGroup;
use Corvus\Core\Models\Warehouse;
use Corvus\Core\Models\StockGroup;
use Corvus\Core\Models\User;
use DB;
use App\Exports\ProductsExport;
use App\Exports\PricesExport;
use App\Exports\StocksExport;
use App\Exports\OrdersExport;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $pricing_groups = PricingGroup::all()->pluck('name', 'id');
        $warehouses = Warehouse::all()->pluck('name', 'id');
        $stock_groups = StockGroup::all()->pluck('name', 'id');

        $accounts = User::query()->whereHas('roles', function($q) {
            $q->where('name', 'vendor');
        })->get()->pluck('name', 'id');

        $pricing_groups->put(0, 'Select');
        $pricing_groups = $pricing_groups->reverse();

        $stock_groups->put(0, 'Select');
        $stock_groups = $stock_groups->reverse();

        $accounts->put(0, 'Select');
        $accounts = $accounts->reverse();

        $warehouses->put(0, 'Select');
        $warehouses = $warehouses->reverse();

        return view('backoffice.tools.export', compact('pricing_groups', 'warehouses', 'stock_groups', 'accounts'));
    }

    public function product_list(){
        return (new ProductsExport())->download('products.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function price_list(Request $request){
        $date_selection = $request->date_selection;
        $pricing_group_id = $request->pricing_group_id;
        return (new PricesExport($date_selection, $pricing_group_id))->download('prices.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function stock_list(Request $request){
        $warehouse_id = $request->warehouse_id;
        $stock_group_id = $request->stock_group_id;
        return (new StocksExport($warehouse_id, $stock_group_id))->download('stocks.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function order_list(Request $request){
        $account_id = $request->account_id;
        $process_date = $request->process_date;
        $order_date = $request->order_date;
        return (new OrdersExport($account_id, $process_date, $order_date))->download('orders.csv', \Maatwebsite\Excel\Excel::CSV);
    }


}
