<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function accounting()
    {
        return view('accounting.accounting');
    }
    public function accountingRfq()
    {
        return view('accounting.accounting-rfq');
    }
    public function accountingVendor()
    {
        return view('accounting.accounting-vendor');
    }
}
