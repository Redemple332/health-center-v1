<?php

namespace App\Http\Controllers\inventory_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicineReceivingController extends Controller
{
  public function index()
  {
    $title = 'Medicine Receiving';
    return view('content.inventory-management.medicine-receiving.index', compact('title'));
  }
}
