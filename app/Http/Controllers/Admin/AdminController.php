<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Version;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Record;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\DB;
use App\Exports\VersionsExport;
use Maatwebsite\Excel\Facades\Excel;
use Response;
class AdminController extends Controller
{
    public function ExportVersions() 
    {
        return Excel::download(new VersionsExport, 'AllVersions.xlsx');
    }
    public static function bookcount($version_id)
    {
        return Book::where('version_id',$version_id)->count();
    }
    public static function versecount($version_id)
    {
        return Record::where('version_id',$version_id)->count();
    }
    function loginpost(Request $request){
         //Validate Inputs
        
         $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);

         $creds = $request->only('email','password');

         if( Auth::guard('admin')->attempt($creds) ){
             return redirect()->route('admin.addversions');
         }else{
             return redirect()->route('admin.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    public function dashboard(Request $request)
    {
        return view('dashboard.admin.home');
    }
 

    //Version Crud Operations
    public function AddVersions(Request $request)
    {
        $maxnum=Version::with('version_num')->max('version_num');
        
        return view('admin.versions.add',['version_num' => $maxnum+1]);
    }
    public function AddChapter(Request $request)
    {
        $versions=Version::all();
        $books=Book::all();
        $maxnum=Chapter::with('chapter_num')->max('chapter_num');
        return view('admin.chapters.add',['versions' => $versions,'books' => $books,'chapter_number' =>  $maxnum+1]);
    }   
    public function AddRecords(Request $request)
    {
        $versions=Version::all();
        return view('admin.records.add',['versions' => $versions]);
    }
    public function updaterecordspost(Request $request)
    {
        $request->validate([
            'version'=>'required',
            'book_name'=>'required',
            'chapter_name'=>'required', 
            'status' => 'required',
            'vers_content' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
         ],[
             'version.required'=>'Version Name is Required',
             'vers_content.required'=>'Vers Content is Required',
             'status.required'=>'Status is Required',
             'book_name.required' => 'Book Name Is Required',
             'chapter_name.required' => 'Chapter Name Is Required',
             'meta_keyword.required'=>'Meta Keyword is Required',
             'meta_description.required'=>'Meta Description is Required',
         ]);
      
        $records=Record::where('id',$request->id)->update(['version_id' => $request->version,'book_id' => $request->book_name,'chapter_id' => $request->chapter_name,'content' => $request->vers_content,'status' => $request->status,'meta_keyword' => $request->meta_keyword,'meta_description' => $request->meta_description]);
        
         if($records)
         {
            return redirect()->back()->with('success', 'Sucessfully Updated');  
         }
         else
         {
            return redirect()->back()->with('error', 'Problem on Update');  
         }
    }
    public function getVersionNum(Request $request,$id)
    {
        return Version::where('id',$id)->pluck('version_num')[0];
    }
    public function getBookNum(Request $request,$id)
    {
        return Book::where('id',$id)->pluck('book_num')[0];
    }
    public function getChapterNum(Request $request,$id)
    {
        return Chapter::where('id',$id)->pluck('chapter_num')[0];
    }
    public function AddRecordPost(Request $request)
    {
        $request->validate([
            'version'=>'required',
            'book_name'=>'required',
            'chapter_name'=>'required', 
            'status' => 'required',
            'vers_content' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
         ],[
             'version.required'=>'Version Name is Required',
             'vers_content.required'=>'Vers Content is Required',
             'status.required'=>'Status is Required',
             'book_name.required' => 'Book Name Is Required',
             'chapter_name.required' => 'Chapter Name Is Required',
             'meta_keyword.required'=>'Meta Keyword is Required',
             'meta_description.required'=>'Meta Description is Required',
         ]);
         $records=new Record();
         $records->version_id=$request->version;
         $records->book_id=$request->book_name;
         $records->chapter_id=$request->chapter_name;
         $records->version_num=$this->getVersionNum($request->version);
         $records->chapter_num=$this->getChapterNum($request->chapter_name);
         $records->book_num=$this->getBookNum($request->book_name);
         $records->status=$request->status;
         $records->content=$request->vers_content;
         $records->meta_keyword=$request->meta_keyword;
         $records->meta_description=$request->meta_description;
   
         if($records->save())
         {
            return redirect()->back()->with('success', 'Sucessfully Added');  
         }
         else
         {
            return redirect()->back()->with('error', 'Problem on Insert');  
         }

    }
    public function AddChapterPost(Request $request)
    {
        $request->validate([
            'version'=>'required',
            'book_name'=>'required',
            'chapter_num' => 'required|integer',
            'chapter_name'=>'required', 
            'status' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
         ],[
             'version.required'=>'Version Name is Required',
             'status.required'=>'Status is Required',
             'chapter_num.required'=>'Chapter Number is Required',
             'chapter_num.integer' => 'Chapter Number must be on Integer',
             'book_name' => 'Book Name Is Required',
             'chapter_name' => 'Chapter Name Is Required',
             'meta_keyword.required'=>'Meta Keyword is Required',
             'meta_description.required'=>'Meta Description is Required',
         ]);
         $chapters=new Chapter();
         $chapters->version_id=$request->version;
         $chapters->book_id=$request->book_name;

         $chapters->chapter_num=$request->chapter_num;
         $chapters->chapter_name=$request->chapter_name;
         $chapters->meta_keyword=$request->meta_keyword;
         $chapters->meta_description=$request->meta_description;
         $chapters->status=$request->status;
         if($chapters->save())
         {
            return redirect()->back()->with('success', 'Sucessfully Added');  
         }
         else
         {
            return redirect()->back()->with('error', 'Problem on Insert');  
         }
    }
    public function AddVersionsPost(Request $request)
    {
        
        $request->validate([
            'version_name'=>'required',
            'status'=>'required',
            'meta_keyword'=>'required', 
            'meta_description'=>'required',
            'version_num' => 'required|integer'
         ],[
             'version_name.required'=>'Version Name is Required',
             'version_num.required'=>'Version Number is Required',
             'version_num.integer'=>'Version Number must be a Number',
             'status.required'=>'Status is Required',
             'meta_keyword.required'=>'Meta Keyword is Required',
             'meta_description.required'=>'Meta Description is Required',
         ]);
         $version=new Version();
         $version->version_name=$request->version_name;
         $version->status=$request->status;
         $version->version_num=$request->version_num;
         $version->metakeywords=$request->meta_keyword;
         $version->metadescription=$request->meta_description;
         $version->createdby=auth::user()->name;
         $version->updatedby=auth::user()->name;
         $version->createdid=auth::user()->id;
         $version->updatedid=auth::user()->id;
         $version->save();
         if($version->save())
         {
            return redirect()->back()->with('success', 'Sucessfully Added');  
         }
         else
         {
            return redirect()->back()->with('error', 'Problem on Insert');  
         }
    }
    public function UpdateChapterPost(Request $request)
    {
        $request->validate([
            'version'=>'required',
            'book_name'=>'required', 
            'chapter_name'=>'required',
            'status'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
         ],[
             'version.required'=>'Version Name is Required',
             'book_name.required'=>'Book Name is Required',
             'chapter_name.required'=>'Chapter Name is Required',
             'status.required'=>'Status is Required',
             'meta_keyword.required'=>'Meta keyword is Required',
             'meta_description.required'=>'Meta Description is Required',
         ]);
         $updatechapters=Chapter::where('id',$request->id)->update(['version_id' => $request->version,'book_id' => $request->book_name,'status' => $request->status,'chapter_name' => $request->chapter_name,'meta_description' => $request->meta_description,'meta_keyword' => $request->meta_keyword]);
         if($updatechapters)
         {
            return redirect()->back()->with('success', 'Sucessfully Updated');  
         }
         else
         {
            return redirect()->back()->with('error', 'Problem on update');  
         }
    }
    public function UpdateBooksPost(Request $request)
    {
        $request->validate([
            'version'=>'required',
            'book_title'=>'required', 
            'book_short_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
         ],[
             'version.required'=>'Version Name is Required',
             'book_title.required'=>'Book Title is Required',
             'book_short_title.required'=>'Book Short Title is Required',
             'meta_keyword.required'=>'Meta Description is Required',
             'meta_description.required'=>'Meta Description is Required',
         ]);
         $updatebooks=Book::where('id',$request->id)->update(['version_id' => $request->version,'title' => $request->book_title,'short_title' => $request->book_short_title,'meta_keyword' => $request->meta_keyword,'meta_description' => $request->meta_description]);
         if($updatebooks)
         {
            return redirect()->back()->with('success', 'Sucessfully Updated');  
         }
         else
         {
            return redirect()->back()->with('error', 'Problem on update');  
         }
    }
    public function UpdateVersionPost(Request $request)
    {
        
        $request->validate([
            'version_name'=>'required',
            'status'=>'required',
            'meta_keyword'=>'required', 
            'meta_description'=>'required',
         ],[
             'version_name.required'=>'Version Name is Required',
             'status.required'=>'Status is Required',
             'meta_keyword.required'=>'Meta Keyword is Required',
             'meta_description.required'=>'Meta Description is Required',
         ]);
         $updateversion=Version::where('id',$request->id)->update(['version_name' => $request->version_name,'status' => $request->status,'metakeywords' => $request->meta_keyword,'metadescription' => $request->meta_description]);
         if($updateversion)
         {
            return redirect()->back()->with('success', 'Sucessfully Updated');  
         }
         else
         {
            return redirect()->back()->with('error', 'Problem on update');  
         }  
         
    }
    public function ManageBooks(Request $request,$pagenumber)
    {
        $noofrecords=10;
        $bookscount=Book::count();
        if($noofrecords > 10)
        {
            $pagescount=($bookscount/$noofrecords);
            $pagescount+=($bookscount%$noofrecords > 0) ? 1 : 0;
        }
        else
        {
            $pagescount=$bookscount == 0 ? 0 : 1;
        }
        $start=(($pagenumber-1)*10);
        $books = Book::offset($start)->limit(10)->get();  
       return view('admin.books.manage',['books' => $books,'bookscount'=> $bookscount,'pagescount' => $pagescount,'noofrecords' => $noofrecords,'pagenumber' => $pagenumber]);
    }
    public function ManageChapters(Request $request,$pagenumber=1)
    {
        $noofrecords=10;
        $chapterscount=Chapter::count();
        if($noofrecords > 10)
        {
            $pagescount=($chapterscount/$noofrecords);
            $pagescount+=($chapterscount%$noofrecords > 0) ? 1 : 0;
        }
        else
        {
            $pagescount=$chapterscount == 0 ? 0 : 1;
        }
        $start=(($pagenumber-1)*10);
        $end=$start+10;
        $chapters = DB::table('chapters')
        ->join('versions', 'chapters.version_id', '=', 'versions.id')
        ->join('books', 'chapters.book_id', '=', 'books.id')
        ->select('chapters.id as id','versions.version_name as version_name','versions.id as version_id','books.id as book_id','books.title as book_name','chapters.chapter_name as chapter_name', 'chapters.status as status','chapters.meta_keyword as meta_keyword','chapters.meta_description as meta_description')
        ->get();
    
        return view('admin.chapters.manage',['chapters' => $chapters,'chapterscount'=> $chapterscount,'pagescount' => $pagescount,'noofrecords' => $noofrecords,'pagenumber' => $pagenumber]);
    }
    public function ManageRecords(Request $request,$pagenumber=1)
    {
        $noofrecords=10;
        $recordscount=Record::count();
        if($noofrecords > 10)
        {
            $pagescount=($recordscount/$noofrecords);
            $pagescount+=($recordscount%$noofrecords > 0) ? 1 : 0;
        }
        else
        {
            $pagescount=$recordscount == 0 ? 0 : 1;
        }
        $start=(($pagenumber-1)*10);
        $end=$start+10;
        $records = DB::table('records')
        ->join('versions', 'records.version_id', '=', 'versions.id')
        ->join('books', 'records.book_id', '=', 'books.id')
        ->join('chapters', 'records.chapter_id', '=', 'chapters.id')
        ->select(
            'records.*',
            'books.id as book_id',
            'books.title as book_name',
            'chapters.id as chapter_id',
            'chapters.chapter_name as chapter_name',
            'versions.id as version_id',
            'versions.version_name as version_name',
            )->get();
        return view('admin.records.manage',['records' =>$records,'recordscount'=> $recordscount,'pagescount' => $pagescount,'noofrecords' => $noofrecords,'pagenumber' => $pagenumber]);
    }
    public function ManageVersion(Request $request,$pagenumber)
    {
        $noofrecords=10;
        $versionsCount=Version::count();
        if($versionsCount > 10)
        {
            $pagescount=intval($versionsCount/$noofrecords);
            $pagescount+=($versionsCount%$noofrecords > 0) ? 1 : 0;
        }
        else
        {
            $pagescount=$versionsCount == 0 ? 0 : 1;
        }
        $start=(($pagenumber-1)*10);
        $end=$start+10;
        $versions = Version::offset($start)->limit(10)->get();  
       return view('admin.versions.manage',['versions' => $versions,'versionscount'=> $versionsCount,'pagescount' => $pagescount,'noofrecords' => $noofrecords,'pagenumber' => $pagenumber]);
    }
    public function getVersions(Request $request,$pagenumber)
    {
        $data=array();
        $start=(($pagenumber-1)*10)+1;
        $end=$start+10;
        $versions = Version::limit($start,$end)->get();     
        $data['success']=true;
        $data['versions']=$versions;
        return response()->json($data);
    }
    public function DeleteRecords(Request $request)
    {
            $deleted=Record::where('id',$request->id)->delete();
            if($deleted == 1)
            {
                $data['success']=true;
                $data['message']='Deleted..';
            }
            else
            {
                $data['success']=false;
                $data['message']='Problem On Delete..';
            }
      
       
        return response()->json($data);
    }
    public function DeleteChapterRecord(Request $request)
    {
        $data=array();
        $records=Record::where('chapter_id',$request->id)->count();
        if($records == 0)
        {
            $deleted=Chapter::where('id',$request->id)->delete();
            if($deleted == 1)
            {
                $data['success']=true;
                $data['message']='Deleted..';
            }
            else
            {
                $data['success']=false;
                $data['message']='Problem On Delete..';
            }
        }
        else
        {
            $data['success']=false;
            $data['message']='Not Allowed to Delete..';
        }
       
        return response()->json($data);
    }
    public function DeleteVersionRecord(Request $request)
    {
        $data=array();
        $books=Book::where('version_id',$request->id)->count();
        $chapters=Chapter::where('version_id',$request->id)->count();
        $records=Record::where('version_id',$request->id)->count();
        if($books == 0 && $chapters == 0 && $records == 0)
        {
            $deleted=Version::where('id',$request->id)->delete();
            if($deleted == 1)
            {
                $data['success']=true;
                $data['message']='Deleted..';
            }
            else
            {
                $data['success']=false;
                $data['message']='Problem On Delete..';
            }
        }
        else
        {
            $data['success']=false;
            $data['message']='Not Allowed to Delete..';
        }
       
        return response()->json($data);
    }
    public function DeleteBookRecord(Request $request)
    {
        $data=array();
     
        $chapters=Chapter::where('book_id',$request->id)->count();
        $records=Record::where('book_id',$request->id)->count();
        if($chapters == 0 && $records == 0)
        {
            $deleted=Book::where('id',$request->id)->delete();
            if($deleted == 1)
            {
                $data['success']=true;
                $data['message']='Deleted..';
            }
            else
            {
                $data['success']=false;
                $data['message']='Problem On Delete..';
            }
        }
        else
        {
            $data['success']=false;
            $data['message']='Not Allowed to Delete..';
        }
       
        return response()->json($data);
    }
    public function EditRecords(Request $request,$id)
    {
        $editrecords=Record::where('id',$id)->get();
        return view('admin.records.edit',['editrecords' => $editrecords,'id' => $id]);
    }
    public function EditVersions(Request $request,$id)
    {
        $editversions=Version::where('id',$id)->get();
       return view('admin.versions.edit',['editversions' => $editversions,'id' => $id]);
    }
    public function EditChapters(Request $request,$id)
    {
        $chapters=Chapter::where('id',$id)->get();
        return view('admin.chapters.edit',['chapters' => $chapters,'id' => $id]);

    }
    public function EditBooks(Request $request,$id)
    {
        $versions=Version::all();
        $editbooks=Book::where('id',$request->id)->get();

       return view('admin.books.edit',['editbooks' => $editbooks,'id' => $id,'versions' => $versions]);
    }
   
    public function AddBooks(Request $request)
    {
        
        $maxnum=Book::with('book_num')->max('book_num');
        $versions=Version::all();
        return view('admin.books.add',['versions' => $versions,'book_number' => $maxnum+1]);
    }
    public function AddBooksPost(Request $request)
    {
        $request->validate([
            'version'=>'required',
            'book_number' => 'required|integer',
            'book_title'=>'required', 
            'book_short_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
         ],[
             'version.required'=>'Version Name is Required',
             'book_number.required'=> 'Book Number is Required',
             'book_number.integer' => 'Book Number must be an Number',
             'book_title.required'=>'Book Title is Required',
             'book_short_title.required'=>'Book Short Title is Required',
             'meta_keyword.required'=>'Meta Description is Required',
             'meta_description.required'=>'Meta Description is Required',
         ]);
            
         $books=new Book();
         $books->version_id=$request->version;
         $books->book_num=$request->book_num;
         $books->title=$request->book_title;
         $books->short_title=$request->short_title;
         $books->meta_keyword=$request->meta_keyword;
         $books->meta_description=$request->meta_description;
         if($books->save())
         {
            return redirect()->back()->with('success', 'Sucessfully Added');  
         }
         else
         {
            return redirect()->back()->with('error', 'Problem on Insert');  
         }
    }
    public function PickVersions(Request $request)
    {
        $result=Version::all();
        return response()->json(array('success' => true, 'data' => $result));
    }
    
    public function PickBooks(Request $request)
    {
        $result=Book::where('version_id',$request->id)->get();
        return response()->json(array('success' => true, 'data' => $result));
    }
    public function PickChapters(Request $request)
    { 
        $result=Chapter::where('book_id',$request->id)->get();
        return response()->json(array('success' => true, 'data' => $result));
    }
  
    public function getprayerdata(Request $request)
    {
        // $data=array();
        // $data[0]['prayer_title']='Sample Prayer Title1';
        // $data[0]['prayer_sub_title']='Sample Prayer subTitle1';
        // $data[0]['refer_from']='refer from 1';
        // $data[0]['book_num']='booknum1';
        // $data[0]['chapter_num']='chapternum1';
        // $data[0]['vers_num']='vers_num1';
        // $data[0]['background_mp3']='Sample Prayer Title1';

        // return response()->json(array('Result ' => 1,'error ' => 0,  'data' => $result));
    }
}
