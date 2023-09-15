<?php

namespace App\Http\Controllers;

use App\Services\NoteService;
use Framework\Helpers\Auth;
use Framework\Helpers\Session;
use Framework\Http\Controller\Controller;
use Framework\Http\Request;
use Framework\Http\Response\Response;
use Framework\View\View;

class NoteController extends Controller
{
    public function __construct()
    {
        if (is_null(Auth::user())) {
            Response::redirect('/login');
        }
    }

    public function index(Request $request): string
    {
        return View::render('notes.list', [
            'notes' => NoteService::getNotes()
        ]);
    }

    public function create(): string
    {
        return View::render('notes.create');
    }

    public function store(Request $request)
    {
        dd($request->getFormDataAll());
    }

    public function edit(Request $request): string
    {
        $id  = $this->getParamUrl($request->getUrl());

        $note = NoteService::getNote($id);

        if (!$note) {
            Session::put('errors', ['Данная запись не найдена']);
            return View::render('notes.update');
        }

        return View::render('notes.update', [
            'note' => NoteService::getNote($id)
        ]);
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    private function getParamUrl(string $url)
    {
        $param = array_reverse(explode('/', $url))[1];

        return is_int((int)$param) ? $param : false;
    }
}