<?php

namespace App\Http\Controllers;

use App\Models\WorkDB;
use App\Models\MainDBTable;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class WorkingDBController extends Controller
{
    public function workDb()
    {
        $data['workingDbs'] = WorkDB::select('name', 'email', 'phone', 'ip', 'card_name', 'card_details', 'status', 'id')->get();
        
        return view('backend.workDb.list', $data);
    }
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $output = array();
        if (isset($request->db_id) && !empty($request->db_id) && $request->db_id != 0) { //Update existing

            $thisRowData = WorkDB::find($request->db_id);
            $duplicateData = WorkDB::where('id', '!=', $request->db_id)
                ->where('email', $request->email)
                ->orWhere('phone', $request->phone)
                ->orWhere('ip', $request->ip)
                ->first();
                
            if (empty($duplicateData)) {
                $thisRowData->update([
                    'name'        => $request->name,
                    'email'       => $request->email,
                    'phone'       => $request->phone,
                    'ip'          => $request->ip,
                    'card_name'   => $request->card_name,
                    'card_details'=> $request->card_details,
                    'status'      => $request->status,
                ]);
                $output['msgType'] = 1;
                $output['message'] = "Data added Successfully";
                
            } else {

                $isMultipleData = WorkDB::where('id', '!=', $duplicateData->id)
                    ->where('email', $request->email)
                    ->where('phone', $request->phone)
                    ->where('ip', $request->ip)
                    ->count();
                if ($isMultipleData == 0) {
                    $duplicateData->update([
                        'name'        => $request->name,
                        'card_name'   => $request->card_name,
                        'card_details'=> $request->card_details,
                        'status'      => $request->status,
                    ]);
                    $output['msgType'] = 1;
                    $output['message'] = "Data Updated Successfully"; 
                } else {
                    $errorField = $duplicateData->email == $request->email ? 'Email' : ($duplicateData->phone == $request->phone ? 'Phone' : ($duplicateData->ip == $request->ip ? 'IP' : 'Error'));
                    $output['msgType'] = 0;
                    $output['message'] = "{$errorField} is duplicate";
                }
                // Toastr::success("{$errorField} is duplicate");
            }
        } else { // Create New

            $duplicateData = WorkDB::where('email', $request->email)
                ->orWhere('phone', $request->phone)
                ->orWhere('ip', $request->ip)
                ->first();
            if (empty($duplicateData)) {
                $validator = Validator::make($request->all(), [
                    'name'  => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'ip'    => 'required',
                ]);
                
                if ($validator->passes()) {
                    WorkDB::create([
                        'name'        => $request->name,
                        'email'       => $request->email,
                        'phone'       => $request->phone,
                        'ip'          => $request->ip,
                        'card_name'   => $request->card_name,
                        'card_details'=> $request->card_details,
                        'status'      => $request->status,
                    ]);
                    $output['msgType'] = 1;
                    $output['message'] = "Data added Successfully";
                } else {
                    $output['msgType'] = 0;
                    $output['message'] = $validator;
                }
            } else {
                
                $isMultipleData = WorkDB::where('id', '!=', $duplicateData->id)
                    ->where('email', $request->email)
                    ->where('phone', $request->phone)
                    ->where('ip', $request->ip)
                    ->count();
                if ($isMultipleData == 0) {
                    $duplicateData->update([
                        'name'        => $request->name,
                        'card_name'   => $request->card_name,
                        'card_details'=> $request->card_details,
                        'status'      => $request->status,
                    ]);
                    $output['msgType'] = 1;
                    $output['message'] = "Data Updated Successfully"; 
                } else {
                    $errorField = $duplicateData->email == $request->email ? 'Email' : ($duplicateData->phone == $request->phone ? 'Phone' : ($duplicateData->ip == $request->ip ? 'IP' : 'Error'));
                    $output['msgType'] = 0;
                    $output['message'] = "{$errorField} is duplicate";
                    
                }
            }
        }

        return response()->json($output);
    }
}
