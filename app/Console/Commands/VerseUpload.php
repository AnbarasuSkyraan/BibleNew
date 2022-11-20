<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Uploadrecord;
use App\Models\Record;
use App\Imports\VerseImport;
class VerseUpload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Verse:Upload';

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
        if(Uploadrecord::where('processed',0)->where('processstart',0)->where('options','Verse')->count() > 0)
        {
            $uploadrecordscount=Uploadrecord::where('processed',0)->where('processstart',0)->where('options','Verse')->count();
            $uploadrecords=Uploadrecord::where('processed',0)->where('processstart',0)->where('options','Verse')->get();
            if($uploadrecordscount > 0)
            {
                foreach($uploadrecords as $row)
                {
                    Uploadrecord::where('id',$row->id)->update(['processstart' => 1]);
                    Excel::import(new VerseImport, storage_path('app/'.$row->exactpath));
                    Record::where('uploadnotprocess',1)->update(['version_id' => $row->version_id,'uploadnotprocess' => 0,'uploadedid' => $row->id]);
                    Uploadrecord::where('id',$row->id)->update(['processed' => 1]);
                }
            }
        }
    }
}
