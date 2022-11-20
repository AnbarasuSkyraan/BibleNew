<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
class BooksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Book([
            'book_num' => $row[0],
            'title' => $row[1],
            'short_title' => $row[2],
            'total_chap_count' => $row[3], 
            'uploadnotprocess' => 1,
        ]);

    }
   
}
