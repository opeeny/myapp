<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ListItem;

class TodoListController extends Controller
{
    //
    public function index(){

        return view("welcome", ['listItems'=>ListItem::all()]);
    }
    public function saveItem(Request $request) {
       // \Log::info(json_encode($request->all()));
       $newListItem = new ListItem;
       $newListItem-> name = $request->listItem;
       $newListItem-> is_complete = 0;//set to a default value
       $newListItem->save();
       // return view('welcome', ['listItems'=>ListItem::all()]);
        return redirect('/');//redirecting to the default home page route
    }
    //create method index to handle the default router
    
}
