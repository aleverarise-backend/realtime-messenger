<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();
        $contactId = $request->contact_id;
        return Message::select(
            'id',
            DB::raw("IF(`from_id` = $userId, TRUE, FALSE) as me"),
            'created_at',
            'content'
        )->where(function($query) use ($userId, $contactId){
            $query->where('from_id', $userId)->where('to_id', $contactId);
        })->orWhere(function($query) use ($userId, $contactId){
            $query->where('from_id', $contactId)->where('to_id', $userId);
        })->get();
    }

    public function store(Request $request)
    {
        return Message::create([
            'from_id' => auth()->id(),
            'to_id'   => $request->to_id,
            'content' => $request->content,
        ]);
    }
}
