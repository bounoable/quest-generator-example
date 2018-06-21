@extends('layouts.base')

@section('body')
<section class="section">
    <div class="container">
        <a href="/reset">Zurücksetzen</a>
        <h1 class="title is-3">Quest-Generator</h1>

        <h2 class="title is-4">Spielerdaten</h2>

        <p class="content">
            <span class="has-text-weight-semibold">Gold:</span> {{ number_format($player->getGold(), 0, ',', '.') }}
        </p>

        <p class="content">
            <span class="has-text-weight-semibold">Items:</span> []
        </p>

        <h2 class="title is-4">Quests generieren</h2>

        <form action="/quests" method="post">
            <div class="field is-grouped is-grouped-multiline">
                <div class="control">
                    <label class="label">Quest-Anzahl</label>
                    <input type="number" name="count" class="input" placeholder="Anzahl">
                </div>

                <div class="control">
                    <label class="label">Max. Missionen/Quest</label>
                    <input type="number" name="maxMissions" class="input" placeholder="Max. Missionen pro Quest">
                </div>

                <div class="control">
                    <label class="label">Max. Belohnungen/Quest</label>
                    <input type="number" name="maxRewards" class="input" placeholder="Max. Belohnungen pro Quest">
                </div>
            </div>

            <div class="field">
                <button type="submit" class="button is-primary has-text-weight-semibold">Quests generieren</button>
            </div>
        </form>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="title is-4">Aktive Quests</h2>

        <div class="columns is-multiline">
            @foreach ($activeQuests as $quest)
                <div class="column is-6">
                    @component('components.quest', ['quest' => $quest, 'manager' => $manager])
                    @endcomponent
                </div>
            @endforeach
        </div>

        <h2 class="title is-4">Abgeschlossene Quests</h2>

        <div class="columns is-multiline">
            @foreach ($completedQuests as $quest)
                <div class="column is-6">
                    @component('components.quest', ['quest' => $quest, 'manager' => $manager])
                    @endcomponent
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection