<div class="quest">
    <div class="columns">
        <div class="column is-7">
            <p class="title is-5">Missionen</p>
    
            <ul class="mission-list">
                @foreach ($quest->getMissions() as $mission)
                    <li>
                        <div class="mission">
                            <span class="mission-status">
                                @if ($mission->isCompleted())
                                    <i class="fas fa-check has-text-success"></i>
                                @else
                                    <i class="far fa-circle has-text-warning"></i>
                                @endif
                            </span>
    
                            <p class="mission-desc">
                                {{ $manager->describe($mission) }}
                            </p>

                            @if (!$mission->isCompleted())
                                <a href="/missions/{{ $mission->getId() }}/complete" class="mission-complete">
                                    <i class="fas fa-check"></i>
                                </a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="column is-5">
            <p class="title is-5">Belohnungen</p>
    
            <ul class="reward-list">
                @foreach ($quest->getRewards() as $index => $reward)
                    <li>
                        <div class="reward">
                            <span class="reward-index">
                                {{ $index + 1 }}.
                            </span>

                            <p class="reward-desc">
                                {{ $manager->describe($reward) }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>