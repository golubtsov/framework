<?php

namespace App\Services;

use App\Models\Note;
use Framework\Helpers\Auth;

class NoteService
{
    public static function getNotes(): array
    {
//        return (new Note())->where('user_id', Auth::user()->id)->get();
        return [];
    }

    public static function getNote(int $id): ?\stdClass
    {
        return (new Note())->find($id);
    }

    public static function create(array $data): bool
    {
        $note = new Note();

        return $note->create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'text' => $data['text']
        ]);
    }
}