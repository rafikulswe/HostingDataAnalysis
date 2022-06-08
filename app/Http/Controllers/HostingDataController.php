<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;

class HostingDataController extends Controller
{
    public function showImportForm()
    {
        return view('backend.hostingData.list');
    }

    public function import(Request $request)
    {
        $file = $request->csvFile;
        $path = public_path('uploads/csv');
        $fileOriginalName = $file->getClientOriginalName();
        $file->move($path, $fileOriginalName);

        if (strtolower($file->guessClientExtension()) == 'xlsx' || strtolower($file->guessClientExtension()) == 'csv') {
            Excel::import(new UsersImport, $path . '/' . $fileOriginalName);
            Toastr::success('File Imports Successfully');
            return redirect('importForm');
        } else {
            if (strtolower($file->guessClientExtension()) == 'bin') {
                $output['messege'] = 'Give maximum 8000 row at a file.';
                $output['msgType'] = 'danger';
            } else {
                echo json_encode(['errorMsg' => 'File is not CSV. This file format is ' . $file->guessClientExtension() . '.']);
                $output['messege'] = 'File is not CSV. This file format is ' . $file->guessClientExtension();
                $output['msgType'] = 'danger';
            }
        }
    }
}
