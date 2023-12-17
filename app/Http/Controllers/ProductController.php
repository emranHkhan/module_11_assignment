<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity');

        DB::table('products')->insert([
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('products');
    }

    public function index()
    {
        $products = DB::table('products')->get();
        return view('products', compact('products'));
    }

    public function sellProduct(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');

        DB::table('sales')->where('id', $id)->insert([
            'product_id' => $id,
            'product_name' => $name,
            'product_price' => $price,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('products')
            ->where('id', $id)
            ->decrement('quantity', 1);

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');

        $product = DB::table('products')->find($id);

        $productArr = (array)$product;

        return view('updateProduct', compact('productArr'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $newPrice = $request->input('price');

        DB::table('products')
            ->where('id', $id)
            ->update(['price' => $newPrice]);

        return redirect()->route('products');
    }

    public function showSales()
    {

        $sales = DB::table('sales')
            ->select(DB::raw('DATE(created_at) as sale_date'), 'product_name', DB::raw('SUM(product_price) as total_price'))
            ->groupBy('sale_date', 'product_name')
            ->get();

        return view('sales', compact('sales'));
    }

    public function showDashboard()
    {
        // current month total sales
        $currentMonth = DB::table('sales')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(product_price) as total_price'))
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('month')
            ->get();

        // previous month total sales
        $previousMonth = DB::table('sales')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(product_price) as total_price'))
            ->whereRaw('MONTH(created_at) = MONTH(NOW()) - 1')
            ->groupBy('month')
            ->get();

        // totals sales of today
        $today = DB::table('sales')
            ->select(DB::raw('DATE(created_at) as sale_date'), DB::raw('SUM(product_price) as total_price'))
            ->whereDate('created_at', now()->toDateString())
            ->groupBy('sale_date')
            ->get();

        // total sales of yesterday
        $yesterday = DB::table('sales')
            ->select(DB::raw('DATE(created_at) as sale_date'), DB::raw('SUM(product_price) as total_price'))
            ->whereDate('created_at', now()->subDay()->toDateString())
            ->groupBy('sale_date')
            ->get();

        $data = [
            "currentMonth" => $currentMonth[0]->total_price,
            "previousMonth" => $previousMonth[0]->total_price,
            "today" => $today[0]->total_price,
            "yesterday" => $yesterday[0]->total_price
        ];

        return view('dashobard', compact('data'));
    }
}
