<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    

    public function productparameter($p1,$p2) {
        // $student = new Student;
        // $student->name = 'Amar';
        // $student->email = 'amar@gmail.com';
        // $student->age = 25;
        // $student->address = 'Lucknow';
        // $student->save();


        DB::table('productparameter')-> insert([
            'parameterName' => $p1,
            'parameterValue' => $p2,
        ]);

     }
}
