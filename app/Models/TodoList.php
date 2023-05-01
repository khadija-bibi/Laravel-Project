<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TodoList extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'user_id','is_completed'];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
    public static function getAllTodos(){
        $result=DB::table('todo_lists')
        ->select('title','is_completed', 'user_id')
        ->get()->toArray();
        return  $result;
    }
}
