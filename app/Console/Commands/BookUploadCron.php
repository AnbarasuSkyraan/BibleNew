<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Uploadrecord;
use App\Models\Book;
use App\Imports\BooksImport;

class BookUploadCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Book:Upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
                    Book::where('uploadnotprocess',1)->update(['version_id' => $row->version_id,'uploadnotprocess' => 0,'uploadedid' => $row->id]);
                    Uploadrecord::where('id',$row->id)->update(['processed' => 1]);
                }
            }
        }
    }
}
