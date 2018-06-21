<?php

namespace App\Http\Controllers;

use App\QuestRepository;
use Illuminate\Contracts\View\View;

class QuestController extends Controller
{
    public function index(QuestRepository $quests): View
    {
        return view('quests.index', [
            'quests' => $quests->all()
        ]);
    }
}
