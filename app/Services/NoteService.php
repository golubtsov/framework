<?php

namespace App\Services;

use App\Models\Note;
use Framework\Helpers\Auth;

class NoteService
{
    public static function getNotes(): array
    {
        return (new Note())->where('user_id', Auth::user()->id)->get();
    }

    public static function getNote(int $id)
    {
        return (new Note())->find($id);
    }
}