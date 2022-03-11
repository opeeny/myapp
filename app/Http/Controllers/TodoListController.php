<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ListItem;

class TodoListController extends Controller
{
    //
    public function index(){

        /*return view("welcome", ['listItems'=>ListItem::all()]);*/
        return view('welcome', ['listItems'=>ListItem::where('is_complete',0)->get()]);
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
    public function markItem($id){
        
        $listItem=ListItem::find($id);
        $listItem->is_complete=1;
        $listItem->save();
        /*
         \Log::info($id);//this logs to see output of ids in the console checked from storage/Logs
         \Log::info($listItem);
         *$newListItem=new ListItem;
          $newListItem->is_complete=1;
          $newListItem->save();
        */
        return redirect('/');
    }
}
