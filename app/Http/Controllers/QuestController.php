<?php

namespace App\Http\Controllers;

use App\Player;
use App\ItemRepository;
use App\QuestRepository;
use Bounoable\Quest\Manager;
use Illuminate\Http\Request;
use Bounoable\Quest\Generator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuestController extends Controller
{
    public function index(QuestRepository $quests, Manager $manager, ItemRepository $itemRepo): View
    {
        $player = Player::load();

        $itemNames = array_map(function (string $id) use ($itemRepo) {
            return $itemRepo->byId($id)->getName();
        }, $player->getItems());

        return view('quests.index', [
            'activeQuests' => $quests->active(),
            'completedQuests' => $quests->completed(),
            'manager' => $manager,
            'player' => $player,
            'itemNames' => $itemNames,
        ]);
    }

    public function generate(Request $request, Generator $generator, Manager $manager): RedirectResponse
    {
        $this->validate($request, [
            'count' => 'required|integer|min:1|max:100',
            'maxMissions' => 'required|integer|min:1|max:10',
            'maxRewards' => 'required|integer|min:1|max:10'
        ]);

        $generator
            ->configure()
            ->missionsPerQuest(1, $request->maxMissions)
            ->rewardsPerQuest(1, $request->maxRewards);

        foreach ($generator->generate($request->count) as $generated) {
            $manager->start($generated);
        }

        return redirect('/');
    }
}
