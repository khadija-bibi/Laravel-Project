<?php

namespace App\Imports;

use App\Models\TodoList;
use Maatwebsite\Excel\Concerns\ToModel;

class ToDoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TodoList([
            'title'=>$row[0], 
            'is_completed'=>$row[1],
            'user_id'=>$row[2],
            //
        ]);
    }
}
