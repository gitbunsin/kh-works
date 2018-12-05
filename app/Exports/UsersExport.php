<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection
{
    public function collection()
    {
//        return User::all();
//        $db = db::connection('mysql2');
        return db::table('users')->get();
    }
}