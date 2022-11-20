<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Version;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Record;
use App\Models\Uploadversion;
use App\Models\Uploadrecord;
use App\Imports\BooksImport;
use App\Imports\VerseImport;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
class ExcelController extends Controller
{
    public function ViewBookList(Request $request,$pagenumber=1,$id)
    {
        $noofrecords=10;
        $bookscount=Book::where('uploadedid',$id)->count();
       
        if($bookscount > 10)
        {
            $pagescount=intval($bookscount/$noofrecords);
          
            $pagescount+=($bookscount%$noofrecords > 0) ? 1 : 0;
        }
        else
        {
            $pagescount=$bookscount == 0 ? 0 : 1;
        }
        
        $start=(($pagenumber-1)*10);
        $books = Book::where('uploadedid',$id)->offset($start)->limit(10)->get();  
       return view('admin.Excel.viewbooks',['books' => $books,'bookscount'=> $bookscount,'pagescount' => $pagescount,'noofrecords' => $noofrecords,'pagenumber' => $pagenumber,'id' => $id]);
    }
    public function StatusChange(Request $request)
    {
        $data=array();
        if($request->status == 1)
        {
            $status=2;
        }
        else
        {
            $status=1;
        }
        $updaterecords=Version::where('id',$request->id)->update(['status' => $status]);
        if($updaterecords)
        {
            $data['status']=true;
            $data['message']='Successfully Updated';

        }
        else
        {
            $data['status']=false;
            $data['message']='Problem on Updation';
        }
        return response()->json($data);
    }
    public function ViewVerseList(Request $request,$pagenumber,$id)
    {
        $noofrecords=10;
        $verscount=Record::where('uploadedid',$id)->count();
        if($verscount > 10)
        {
            $pagescount=($verscount/$noofrecords);
            $pagescount+=($verscount%$noofrecords > 0) ? 1 : 0;
        }
        else
        {
            $pagescount=$verscount == 0 ? 0 : 1;
        }
        $start=(($pagenumber-1)*10);
        $verses = Record::where('uploadedid',$id)->offset($start)->limit(10)->get();  
        return view('admin.Excel.viewverses',['verses' => $verses,'verscount'=> $verscount,'pagescount' => $pagescount,'noofrecords' => $noofrecords,'pagenumber' => $pagenumber,'id' => $id]);
    }    
    public function ForCronBook(Request $request)
    {
        if(Uploadrecord::where('processed',0)->where('processstart',0)->where('options','Book')->count() > 0)
        {
            $uploadrecordscount=Uploadrecord::where('processed',0)->where('processstart',0)->where('options','Book')->count();
            $uploadrecords=Uploadrecord::where('processed',0)->where('processstart',0)->where('options','Book')->get();
            if($uploadrecordscount > 0)
            {
                foreach($uploadrecords as $row)
                {
                    Uploadrecord::where('id',$row->id)->update(['processstart' => 1]);
                    Excel::import(new BooksImport, storage_path('app/'.$row->exactpath));
                    Book::where('uploadnotprocess',1)->update(['version_id',$row->version_id,'uploadedid' => $row->id]);
                    Uploadrecord::where('id',$row->id)->update(['processed' => 1]);
                }
            }
        }
    }
    
    public function UploadHistory()
    {
       
        $uploadrecords=Uploadrecord::orderBy('id', 'DESC')->get();
        return view('admin.Excel.uploadHistory',['uploadrecords' => $uploadrecords]);
    }
    public function ConfirmAll(Request $request)
    {

        Uploadrecord::where('id',$request->parentId)->update(['processed' => 1]);
        Uploadversion::where('uploadedid',$request->parentId)->where('processed',0)->update(['processed' => 1]);
        $results=Uploadversion::select('version_name')->where('processed',1)->where('uploadedid',$request->parentId)->get();
      
        return response()->json(array('success' => $results));

    }
    public function ConfirmRecord(Request $request)
    {
        $value=Uploadversion::where('id',$request->id)->update(['processed' => 1]);
        return response()->json(array('success' => true));
    }
    public function RejectRecord(Request $request)
    {
        $value=Uploadversion::where('id',$request->id)->update(['processed' => 2]);
        return response()->json(array('success' => true));
    }
    public function RevertRecord(Request $request)
    {
        $value=Uploadversion::where('id',$request->id)->update(['processed' => 0]);
        return response()->json(array('success' => true));
    }
    public function viewUploadRecords(Request $request,$id)
    {
        $uploadrecords=Uploadversion::where('uploadedid',$id)->orderBy('id', 'DESC')->get();
        return view('admin.Excel.viewUploadRecords',['uploadrecords' => $uploadrecords,'id' => $id]);
    }
    public function ExportVersions() 
    {
        return Excel::download(new VersionsExport, 'AllVersions.xlsx');
    }
    public function ExportBooks() 
    {
        return Excel::download(new BooksExport, 'AllBooks.xlsx');
    }
    public function ExportChapters() 
    {
        return Excel::download(new ChaptersExport, 'AllChapters.xlsx');
    }
    public function ExportRecords() 
    {
        return Excel::download(new RecordsExport, 'AllRecords.xlsx');
    }
    public function NewUpload(Request $request)
    {
        return view('admin/Excel/newupload');
    }
    public function VersUpload(Request $request)
    {
        $versions=Version::all();
        return view('admin/Excel/verseupload',['versions' => $versions]);
    }
    public function BookUpload(Request $request)
    {
        $versions=Version::all();
        return view('admin/Excel/bookupload',['versions' => $versions]);
    }
    public function versUploadVersion(Request $request)
    {
        $request->validate([
            'versions'=>'required',
            'file' => 'required',
            'notes' => 'required',
         ],[
             'versions.required'=>'Options is Required',
             'file.required' => 'File is Required',
             'notes.required' => 'Notes is Required',
         ]);
         $data=$this->UploadExcelFinalVerse($request->versions,$request->file,$request->notes);
         if($data['status'] == true)
         {
             return redirect()->back()->with('success', $data['message']);  
         }
         else
         {
             return redirect()->back()->with('error', $data['message']);  
         }
    }
    public function BookUploadPost(Request $request)
    {
        $request->validate([
            'versions'=>'required',
            'file' => 'required',
            'notes' => 'required',
         ],[
             'versions.required'=>'Options is Required',
             'file.required' => 'File is Required',
             'notes.required' => 'Notes is Required',
         ]);
         $file = $request->file('file');
         $filename = time().'_'.$file->getClientOriginalName();
         $extension = $file->getClientOriginalExtension();
         $str=Storage::disk('local')->put('bible/BookUpload', $file);
         $this->storebookupload($request->versions,$request->notes,$str,Storage::disk('local')->url($str));
         $data['success'] = 1;
         $data['message'] = 'Uploaded Successfully!';
         $data['filepath'] = Storage::disk('local')->url($str);
         $data['exactpath'] = $str;
         $data['extension'] = $extension;
         return response()->json($data);
    }
    public function VerseUploadPost(Request $request)
    {
        $request->validate([
            'versions'=>'required',
            'file' => 'required',
            'notes' => 'required',
         ],[
             'versions.required'=>'Options is Required',
             'file.required' => 'File is Required',
             'notes.required' => 'Notes is Required',
         ]);
         $file = $request->file('file');
         $filename = time().'_'.$file->getClientOriginalName();
         $extension = $file->getClientOriginalExtension();
         $str=Storage::disk('local')->put('bible/VerseUpload', $file);
         $this->storeverseupload($request->versions,$request->notes,$str,Storage::disk('local')->url($str));
         $data['success'] = 1;
         $data['message'] = 'Uploaded Successfully!';
         $data['filepath'] = Storage::disk('local')->url($str);
         $data['exactpath'] = $str;
         $data['extension'] = $extension;
         return response()->json($data);
    }
    public function storebookupload($versions,$notes,$exactpath,$filepath)
    {
        $uploadrecords=new Uploadrecord();
        $uploadrecords->version_id=$versions;
        $uploadrecords->notes=$notes;
        $uploadrecords->options='Book';
        $uploadrecords->filepath=$filepath;
        $uploadrecords->exactpath=$exactpath;
        $uploadrecords->save();
        return 0;
    }
    public function storeverseupload($versions,$notes,$exactpath,$filepath)
    {
        $uploadrecords=new Uploadrecord();
        $uploadrecords->version_id=$versions;
        $uploadrecords->notes=$notes;
        $uploadrecords->options='Verse';
        $uploadrecords->filepath=$filepath;
        $uploadrecords->exactpath=$exactpath;
        $uploadrecords->save();
        return 0;
    }
    public function UploadVersion(Request $request)
    {
        $request->validate([
            'versions'=>'required',
            'file' => 'required',
            'notes' => 'required',
         ],[
             'versions.required'=>'Options is Required',
             'file.required' => 'File is Required',
             'notes.required' => 'Notes is Required',
         ]);
        // $excelrecords=Excel::import(new BooksImport, $request->file);
        $data=$this->UploadExcelFinal($request->versions,$request->file,$request->notes);
        if($data['status'] == true)
        {
            return redirect()->back()->with('success', $data['message']);  
        }
        else
        {
            return redirect()->back()->with('error', $data['message']);  
        }
    }
    public function UploadExcelFinalVerse($versions,$file,$notes)
    {
       
        $data=array();
        $excelrecords=Excel::import(new VerseImport, $file);
        if($excelrecords)
            {
               $uploadrecords=new Uploadrecord();
               $uploadrecords->options='Verse';
               $uploadrecords->status='uploaded';
               $uploadrecords->notes=$notes;
               $uploadrecords->processed=1;
               $uploadrecords->save();
               Record::where('uploadnotprocess',1)->update(['uploadnotprocess' => 0,'version_id' => $versions,'uploadedid' => $uploadrecords->id]);
               $data['status']=true;
               $data['message']='Records Added..';
            }
            else
            {
                $data['status']=false;
                $data['message']='Some thing Wrong..';
            } 
      
        return $data;
     
    }
    public function UploadExcelFinal($versions,$file,$notes)
    {
       
        $data=array();
        $excelrecords=Excel::import(new BooksImport, $file);
        if($excelrecords)
            {
               $uploadrecords=new Uploadrecord();
               $uploadrecords->options='Book';
               $uploadrecords->status='uploaded';
               $uploadrecords->notes=$notes;
               $uploadrecords->processed=1;
               $uploadrecords->save();
               Book::where('uploadnotprocess',1)->update(['uploadnotprocess' => 0,'version_id' => $versions,'uploadedid' => $uploadrecords->id]);
               $data['status']=true;
               $data['message']='Records Added..';
            }
            else
            {
                $data['status']=false;
                $data['message']='Some thing Wrong..';
            } 
      
        return $data;
     
    }
}
