<?php

namespace App\Http\Controllers;

use App\Player;
use App\QuestRepository;
use Illuminate\Http\RedirectResponse;

class ResetController extends Controller
{
    public function index(QuestRepository $quests): RedirectResponse
    {
        $quests->delete($quests->all());
        Player::create()->save();

        return redirect('/');
    }
}
