<?php

namespace App\Imports;

use App\Models\WorkDB;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new WorkDB([
            'name'         => $row[0],
            'email'        => $row[1],
            'phone'        => $row[2],
            'ip'           => $row[3],
            'card_name'    => $row[4],
            'card_details' => $row[5],
            'status'       => $row[6],
        ]);
    }
}
