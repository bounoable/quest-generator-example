<?php

namespace App\Http\Controllers;

use App\MissionRepository;
use Bounoable\Quest\Manager;
use Illuminate\Http\RedirectResponse;

class MissionController extends Controller
{
    public function complete(int $id, MissionRepository $missions, Manager $manager): RedirectResponse
    {
        $mission = $missions->byId($id);

        $mission->complete();
        $missions->save($mission);

        if ($manager->check($mission->getQuest())) {
            $manager->complete($mission->getQuest());
        }

        return redirect('/');
    }
}
