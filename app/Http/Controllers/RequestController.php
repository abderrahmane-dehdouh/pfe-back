<?php

namespace App\Http\Controllers;


use App\Models\request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller{

    public function getRequests(\Illuminate\Http\Request $request , Response $response): \Illuminate\Database\Eloquent\Collection
    {
        return Request::all();
    }
    public function hodAccept(\Illuminate\Http\Request $request, string $id): int
    {
        return DB::table('requests')
            ->where('id', $id)
            ->update(['status' => "hodaccepted"]);
    }
    public function supervisorAccept(\Illuminate\Http\Request $request, string $id): int
    {
        return DB::table('requests')
            ->where('id', $id)
            ->update(['status' => "accepted"]);
    }
}
