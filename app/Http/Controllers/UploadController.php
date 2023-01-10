<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Customer;
use App\Exports\CustomersExport;
use App\Imports\UsersImport;
use App\Imports\CustomersImport;
use Carbon\Carbon;
use Excel;
use Mail;
use App\Http\Controllers\MailController;

class UploadController extends Controller
{
    public function export(){
        return Excel::download(new CustomersExport,'users.xlsx');
    }

    public function Send_Kro(){
        $now = Carbon::today()->format('m-d');
        $customers = Customer::all();
        foreach ($customers as $customer) {
            if(str_contains($customer->DOB,$now)){
               echo "$customer->DOB and $customer->name and  $now";
               $Mail = new MailController();
               $Mail->sendMail($customer->email);
                
            }
        }
        
    }
  public function importing(Request $request){

        $request->validate([
            'file' => 'required|mimes:xlsx' 
        ]);
         Excel::import(new CustomersImport, $request->file('file'));
         return redirect('/matchit');
        }
    


        
   
}
