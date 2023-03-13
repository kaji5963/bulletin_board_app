<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Services\BoardService;

class BoardController extends Controller
{
    /**
     * @return view
     */
    public function index()
    {
        $boards = BoardService::getBoardList();
        $user = BoardService::getUser();

        return view('board.index', compact('boards', 'user'));
    }

    /**
     * @param  \Illuminate\Http\BoardRequest  $request
     * @return to_route
     */
    public function store(BoardRequest $request)
    {
        BoardService::createBoard($request);

        return to_route('board.index');
    }

    /**
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        $board = BoardService::editBoard($id);

        return view('board.edit', compact('board'));
    }

    /**
     * @param  \Illuminate\Http\BoardRequest  $request
     * @param  int  $id
     * @return to_route
     */
    public function update(BoardRequest $request, $id)
    {
        BoardService::updateBoard($request, $id);

        return to_route('board.index');
    }

    /**
     * @param  int  $id
     * @return to_route
     */
    public function destroy($id)
    {
        BoardService::deleteBoard($id);

        return to_route('board.index');
    }
}
