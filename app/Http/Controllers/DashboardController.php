<?php

namespace App\Http\Controllers;

use Session;
use Response;
use Exception;
use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
// use MongoDB\BSON\ObjectID;
// use Illuminate\Http\RedirectResponse;
use App\Models\Store;
use App\Models\Message;
use App\Models\Feedback;
use App\Models\Challenge;
use App\Models\Usersemail;
use Illuminate\Http\Request;
use App\Models\UserChallenge;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Intervention\Support\Facades\Image; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class DashboardController extends Controller
{
    // search 
    public function search(Request $request)
    {
        $searchData = $request->input('search');

        $users = User::where(function ($query) use ($searchData) {
            $query->where('name', 'LIKE', "%{$searchData}%")
                ->orWhere('email', 'LIKE', "%{$searchData}%");
                
        })->get();
         // Adjust 'name' as per your column
    
        return response()->json($users); // Return the retrieved data as JSON
        
    }


    // users
    public function viewmembers(Request $request)
    {
        
        $data = User::all();
        return view('dashboard.viewmembers',compact('data'));
    }

    public function deletemembers($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect()->back()->with("success", "users deleted successfully!");
    }

    // useremail
    public function usersemail(Request $request)
    {
        $users = Usersemail::all();
        return view('dashboard.useremail', compact('users'));
    }

    public function deleteuseremail($id)
    {
        $delete = Usersemail::find($id);
        $delete->delete();
        return redirect()->back()->with("success", "User email deleted successfully!");
    }   
    
    // userchallenge
    public function userschallenge(Request $request)
    {
        $user = UserChallenge::all();

        return view('dashboard.userschallenge',compact('user'));
    }

    public function deleteuserschallenge($id)
    {
        $delete = UserChallenge::find($id);
        $delete->delete();
        return redirect()->back()->with("success", "userschallenge deleted successfully!");
    }

    // store
    public function datastores(Request $request)
    {
        $store = Store::all();
        return view('dashboard.store', compact('store'));
    }

    public function addstoredata()
    {
        return view('dashboard.addstoredata');
    }

    public function insertstore(Request $request)
    {
         #validation
         $request->validate([
            'item'          => 'required',
            'type'          => 'required',
            'amount'        => 'required',
            'ios_id'        => 'required',
            'android_id'    => 'required',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        $store = new Store();
        $store->item        = $request->get('item');
        $store->type        = $request->get('type');
        $store->Price       = $request->get('amount');
        $store->ios         = $request->get('ios_id'); 
        $store->android     = $request->get('android_id'); 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $imageName = time() . rand(1, 100) . '.' . $request->image->extension();
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move('Uploads/User_image_store', $imageName);
            
            $store->image = $imageName;
        }
        
        $store->save();
        return redirect('/stores')->with('success','DataStore Successfully!!');
    }

    public function editstoredata($id)
    {
        $store = Store::find($id);
        return view('dashboard.editstoredata', compact('store'));
    }

    // download
    public function download($id)
    {
        $store = Store::find($id);
        $filepath = storage_path("app/upload/{$store->image}");
        return \Response::download($filepath);
    }

    public function updatestoredate(Request $request, $id)
    {
        $store = Store::find($id);
        $store->item        = $request->get('item');
        $store->type        = $request->get('type');
        $store->Price       = $request->get('amount');
        $store->ios         = $request->get('ios'); 
        $store->android     = $request->get('android'); 

        if ($request->hasfile('image')) {

            $destination = 'Uploads/User_image_store/' .$store->image;
                    if(File::exists($destination))
                    {
                        File::delete($destination);
                    }

            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            // $extension = $file->getClientOriginalExtension(); //getting image extension
            // $filename = time() . '.' . $extension;
            $file->move('Uploads/User_image_store/', $imageName); //store image
            $store->image = $imageName;
        } 
        $store->update(); 

        return redirect('/stores')->with('success','Store Data Updated Successfully!!');
    }

    public function deletestoredata($id)
    {
        $delete = Store::find($id);
        $destination = 'Uploads/User_image_store/' . $delete->image;
        if (File::exists($destination)) {

            File::delete($destination);
        }
        $delete->delete();
        return redirect()->back()->with("success","Store Data Successfully!!");
    }

    // challenge
    public function challenges(Request $request)
    {
        $challenge = Challenge::all();
        return view('dashboard.challenge', compact('challenge'));
    }

    public function deletechallenge($id)
    {   
        $delete = Challenge::find($id);
        $delete->delete();
        return redirect()->back()->with("success", "challenge deleted successfully!");
    }


    // message 
    public function message()
    {
        $messages = Message::all();
        return view('dashboard.message', compact('messages'));
    }

    public function addmessage()
    {
        return view('dashboard.addmessage');
    }

    public function storeMessage(Request $request)
    {
       
            #validation
            $request->validate([
                'sender'     => 'required',
                'receiver'   => 'required',
                'message'    => 'required',
            ]);

            $message = new Message();
            $message->sender = $request->get('sender');
            $message->receiver = $request->get('receiver');
            $message->message = $request->get('message');
            $message->timestamp = Carbon::now()->format('Y-m-d\TH:i:s.vP');       
            $message->save();
            return redirect('/message')->with('success','Message Insert Successfully!!');
    
    }

    public function editmessage($id)
    {
        $message = Message::find($id);
        return view('dashboard.editmessage', compact('message'));
    }

    public function updatemessage(Request $request, $id)
    {
        $message = Message::find($id);
        $message->sender = $request->get('sender');
        $message->receiver = $request->get('receiver');
        $message->message = $request->get('message');
        $message->timestamp = Carbon::now()->format('Y-m-d\TH:i:s.vP');
        $message->update(); 

        return redirect('/message')->with('success','Message Updated Successfully!!');
    }

    public function deletemessage($id)
    {
        $delete = Message::find($id);
        $delete->delete();
        return redirect()->back()->with("success", "Message deleted successfully!");
    }


    // feedback
    public function feedback()
    {
        $feedback = Feedback::all();
        return view('dashboard.feedback', compact('feedback'));
    }

    public function storeFeedback(Request $request)
    {   
        
        #validation
        $request->validate([
            'email'     => 'required|email',
            'message'   => 'required',
            // 'datetime' => 'required|date',
        ]);

        
        $feedback = new Feedback();
        $feedback->email = $request->email;
        $feedback->message = $request->message;
        // $feedback->datetime = $request->datetime;
        date_default_timezone_set('Asia/Kolkata');
        $feedback->datetime = Carbon::now()->format('d/m/y, h:i a');
        $feedback->save();
       
        return redirect()->back()->with('success','Feedback Insert Successfully!!');
        
    }

    public function editfeedback($id)
    {

        $feedback = Feedback::find($id);
        return view('dashboard.editfeedback', compact('feedback'));
    }

    public function updatefeedback(Request $request, $id)
    {
        $feedback = Feedback::find($id);
        $feedback->email = $request->email;
        $feedback->message = $request->message;
        // $feedback->datetime = $request->datetime;
        date_default_timezone_set('Asia/Kolkata');
        $feedback->datetime = Carbon::now()->format('d/m/y, h:i a');
        $feedback->update(); 

        return redirect('/feedback')->with('success','Feedback Updated Successfully!!');
    }

    public function deletefeedback($id)
    {   
        $delete = Feedback::find($id);
        $delete->delete();
        return redirect()->back()->with("success", "Feedback deleted successfully!");
    }

    // change password
    public function changePassword(Request $request)
    {
        #validations
            $request->validate([
                'CurrentPassword'   => 'required',
                'NewPassword'       => 'min:8|required',
            ]);


            $hashedPassword = Auth::guard('admin')->user()->password;
            if (Hash::check($request->CurrentPassword , $hashedPassword)) {
                if (!Hash::check($request->NewPassword , $hashedPassword)) {
    
                    $users = Admin::find(Auth::guard('admin')->id());
                    $users->update([
                        'password' => bcrypt($request->NewPassword)
                        ]);
                   
                    return redirect()->back()->with('success','Password Change Successfully');
                }
                else{
                    return redirect()->back()->with('error','new password can not be the old password!');
                } 
            }
            else{
                return redirect()->back()->with("error","old password doesn't matched");
            }
    }
}


