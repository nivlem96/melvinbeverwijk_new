<?php

namespace Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Financial;

class FinancialController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param $month
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (request('date')) {
            $date = date("Y-m-d", strtotime(request('date')));
        } else {
            $date = date("Y-m-d", strtotime(now()));
        }
        $date = strtotime($date);
        $lastMonth = date("Y-m-d", strtotime("-1 month", $date));
        $nextMonth = date("Y-m-d", strtotime("+1 month", $date));
        $financials = Financial::getFromMonth($date);
        return view('financial', ['financials'=>$financials,'lastMonth'=>$lastMonth,'nextMonth'=>$nextMonth]);
    }

    public function create()
    {
        return view('createFinancial');
    }

    public function addFinancial(){

        $financial = new Financial();

        $financial->wat = request('wat');
        $financial->hoeveel = request('hoeveel');

        $financial->save();

        return redirect('/financials');

    }

    public function deleteFinancial($id){

        $financialToDelete = Financial::find($id);

        $financialToDelete->delete();

        return redirect('/financials');

    }
}
