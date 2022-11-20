<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Version;
use App\Models\Book;
use App\Models\Record;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('user/Login');
    }
    public function ForgetPassword(Request $request)
    {
        return view('User.forgetpassword');
    }
    public function ForgetPasswordPost(Request $request)
    {
        $request->validate([
            'emailaddress' => 'required',
         
         ],[
             'emailaddress.required' => 'Email Address is Required',
             'emailaddress.email' => 'Please Enter Valid Email Address',
         ]);
         if(User::where('email',$request->emailaddress)->count() == 1)
         {
            $gencode=$this->gencode();
          
            User::where('email',$request->emailaddress)->update(['otp_code' => $gencode]);
            return redirect()->route('user.confirmotp',['email' => $request->emailaddress]);
         }
         else
         {
            return redirect()->back()->with('error', 'Email ID Not Exists');
         }
    }
    public function ConfirmOtp(Request $request)
    {

        return view('User.confirmotp',['email' => $request->email]);
    }
    public function ConfirmOtpPost(Request $request)
    {
        $request->validate([
            'otp_code' => 'required',
         
         ],[
             'otp_code.required' => 'Email Address is Required',
             
         ]);
       
         if(User::where('otp_code',$request->otp_code)->where('email',$request->email)->count() > 0)
         {
            return redirect()->route('user.setpassword',['email' => $request->email]);
         }
         else
         {
            return redirect()->back()->with('error', 'OTP Not Match');  
         }
    }
    public function SetPassword(Request $request)
    {
        return view('User.setpassword',['email' => $request->email]);
    }
    public function ContactUs(Request $request)
    {
        return view('User.contactus');
    }
    public function AboutUs(Request $request)
    {
        return view('User.aboutus');
    }
    public function SetPasswordPost(Request $request)
    {
        $request->validate([
            'password' => 'required',
         
         ],[
             'password.required' => 'Email Address is Required',
             
         ]);
         if(User::where('email',$request->email)->count() > 0)
         {
            User::where('email',$request->email)->update(['password' => Hash::make($request->password)]);
            return redirect()->back()->with('success', 'Password Setted');  
         }
         else
         {
            return redirect()->back()->with('error', 'Problem on Password Set');  
         }
    }
    public function gencode()
    {
        return rand(100000, 999999);
    }
    public function LoginPost(Request $request)
    {
        $request->validate([
            'emailaddress' => 'required',
            'password' => 'required',
         ],[
             'emailaddress.required' => 'Email Address is Required',
             'password.required' => 'Password is Required',
             'emailaddress.email' => 'Please Enter Valid Email Address',
         ]);
        if(Auth::guard('user')->attempt(['email' => $request->emailaddress, 'password' => $request->password]))
        {
            return redirect()->route('home');
        }
        else
        {
            return redirect()->back()->with('error', 'Invalid Authendication Details');  
        }
      
    }
    public function RegistrationPost(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'emailaddress' => 'required',
            'password' => 'required',
            'mobileno' => 'required',
         ],[
             'name.required'=>'Name is Required',
             'emailaddress.required' => 'Email Address is Required',
             'password.required' => 'Password is Required',
             'mobileno.required' => 'Mobile No is Required',
             'emailaddress.email' => 'Please Enter Valid Email Address',
         ]);
         $user=new User();
         $user->name=$request->name;
         $user->email=$request->emailaddress;
         $user->password=Hash::make($request->password);
         $user->mobileno=$request->mobileno;
         if($user->save())
         {
            return redirect()->back()->with('success', 'Sucessfully Registered.Please Login');  
         }
         else
         {
            return redirect()->back()->with('error', 'Error on Registration');  
         }
    }
    public function Home(Request $request)
    {
    
        // dd(DB::table('records')->select('chapter_num')->where('version_id',1)->where('book_num',1)->distinct()->count().'-'.Record::where('version_id',1)->where('book_num',1)->count());
        $versions=Version::all();
        $books_old=Book::where('version_id',1)->where('book_num','<=',38)->get();
        $books_new=Book::where('version_id',1)->where('book_num','>=',39)->get();
        return view('User.home',['version_id' => 1,'versions' => $versions,'books_old' => $books_old,'books_new' => $books_new]);
    }
    public function VersionsView(Request $request,$version_id)
    {
        $versions=Version::all();
        $books_old=Book::where('version_id',$version_id)->where('book_num','<=',38)->get();
        $books_new=Book::where('version_id',$version_id)->where('book_num','>=',39)->get();
        return view('User.versionsview',['version_id' => $version_id,'versions' => $versions,'books_old' => $books_old,'books_new' => $books_new]);
    }
    public function ParallelReading(Request $request)
    {
        $versions=Version::all();
        return view('User.parallelreading',['versions' => $versions]);
    }
    public function PickBooksBoth(Request $request)
    {
        $version_id_one=Version::all()[0]['id'];
        $version_id_two=Version::all()[1]['id'];
        $books_one=Book::where('version_id',$version_id_one)->get();
        $books_two=Book::where('version_id',$version_id_two)->get();
      
        return response()->json(['books_one' => $books_one,'books_two' => $books_two]);
    }
    public function PickVersions(Request $request)
    {
        $versions=Version::all();
        return response()->json(['versions' => $versions]);
    }
    public function GetAllChaptersOptions(Request $request)
    {
        $chapters=DB::table('records')->select('chapter_num')->where('version_id',$request->version_id)->where('book_num',$request->book_num)->distinct()->get();   
        return response()->json(['chapters' => $chapters]);
    }
    public function ChaptersCountBoth(Request $request)
    {
        $books_one=Book::all()[0]['book_num'];
        $chapters=DB::table('records')->select('chapter_num')->where('version_id',1)->where('book_num',$books_one)->distinct()->get();   
        return response()->json(['chapters' => $chapters]);
    }
    public function GetLeftHandSide(Request $request)
    {
        $records=Record::where('version_id',$request->version_id)->where('book_num',$request->book_num)->where('chapter_num',$request->chapter_num)->get();
        return response()->json(['records' => $records]);
    }
    public function GetRightHandSide(Request $request)
    {
        $records=Record::where('version_id',$request->version_id)->where('book_num',$request->book_num)->where('chapter_num',$request->chapter_num)->get();
        return response()->json(['records' => $records]);
    }
    
    public function LeftHandSide(Request $request)
    {
        $version_id_one=Version::all()[1]['id'];
        $book_num=Book::where('version_id',$version_id_one)->get()[0]['book_num'];
        $records=Record::where('version_id',$version_id_one)->where('book_num',$book_num)->where('chapter_num',0)->get();
        return response()->json(['records' => $records]);
    }
    public function RightHandSide(Request $request)
    {
        $version_id_two=Version::all()[0]['id'];
        $book_num=Book::where('version_id',$version_id_two)->get()[0]['book_num'];
        $records=Record::where('version_id',$version_id_two)->where('book_num',$book_num)->where('chapter_num',0)->get();
        return response()->json(['records' => $records]);
    }
    public function ChapterList(Request $request,$version_id,$book_num,$chapter_num)
    {
        $version_name=Version::where('id',$version_id)->pluck('version_name')[0];
        $book_name=Book::where('book_num',$book_num)->pluck('title')[0];
        $versions=Version::all();
        $chapters=DB::table('records')->select('chapter_num')->where('version_id',$version_id)->where('book_num',$book_num)->distinct()->get();   
        $chaptersfirst=DB::table('records')->select('chapter_num')->where('version_id',$version_id)->where('book_num',$book_num)->distinct()->first();   
        $chapterslast=DB::table('records')->select('chapter_num')->where('version_id',$version_id)->where('book_num',$book_num)->distinct()->orderBy('chapter_num', 'desc')->limit(1)->get();   
       
        $records=Record::where('version_id',$version_id)->where('book_num',$book_num)->where('chapter_num',$chapter_num)->get();
        return view('User.chapterlist',['book_name' => $book_name,'chaptersfirst' => $chaptersfirst,'chapterslast' => $chapterslast,'version_name' => $version_name,'version_id' => $version_id,'book_num' => $book_num,'chapter_num' => $chapter_num,'chapters' => $chapters,'versions' => $versions,'records' => $records]);
    }
  
    public static function chapterscount($version_id,$book_num)
    {
        return DB::table('records')->select('chapter_num')->where('version_id',$version_id)->where('book_num',$book_num)->distinct()->get();
    }
    public static function versescount($version_id,$book_num)
    {
        return Record::where('version_id',$version_id)->where('book_num',$book_num)->count();
    }
    public function getBooks(Request $request)
    {
        $data=array();
        $books=Book::where('version_id',$request->id)->get();
        $bookscount=Book::where('version_id',$request->id)->count();
        $data['status']=true;
        $data['books']=$books;
        $data['bookscount']=$bookscount;
        return response()->json($data);

    }
    public function getChapters(Request $request)
    {
        $data=array();
        $chapters=DB::table('records')->select('chapter_num')->where('version_id',$request->version_id)->where('book_num',$request->id)->distinct()->get();
        $chapterscount=DB::table('records')->select('chapter_num')->where('version_id',$request->version_id)->where('book_num',$request->id)->distinct()->count();
        $data['status']=true;
        $data['chapters']=$chapters;
        $data['chapterscount']=$chapterscount;
        return response()->json($data);
    }
    public function getVerses(Request $request)
    {
        $data=array();
        $verses=Record::where('version_id',$request->version_id)->where('book_num',$request->book_num)->where('chapter_num',$request->id)->get();
        $versescount=Record::where('version_id',$request->version_id)->where('book_num',$request->book_num)->where('chapter_num',$request->id)->count();
        $data['status']=true;
        $data['verses']=$verses;
        $data['versescount']=$versescount;
        return response()->json($data);
    }
    public function Bible(Request $request)
    {
        $books_old=Book::where('version_id',1)->where('book_num','<=',38)->get();
        $books_new=Book::where('version_id',1)->where('book_num','>=',39)->get();
        return view('User.bible',['books_old' => $books_old,'books_new' => $books_new]);
    }
}
