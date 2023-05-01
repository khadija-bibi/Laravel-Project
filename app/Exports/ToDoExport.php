<?php

namespace App\Exports;

use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ToDoExport implements FromCollection, WithHeadings
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return TodoList::where('user_id', $this->user->id)->get();
    }

    public function headings(): array
    {
        return [
           'title', 'is_completed', 'user_id'
        ];
    }
}
