<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function inventory(){
        return view('inventory.all-inventory');
    }
}
