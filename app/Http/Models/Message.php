<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'id_user_to', 'id_sender'
    ];

    public function scopeNodeleted($request)
    {
        $request->where('messages.deleted', '=', '0');
    }

    public function scopeNewmessage($request, $id_last_message)
    {
        $request->where('messages.id', '>', $id_last_message)
            ->where('messages.is_new', '=', 1);
    }




    public function scopeDeleted($request)
    {
        $request->where('messages.deleted', '=', '1');
    }
}
