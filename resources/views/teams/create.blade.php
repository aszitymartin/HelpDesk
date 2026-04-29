<x-app-layout>
    <form class="flex flex-col gap-4 item-bg text-white p-4" method="POST" action="{{ route('teams.store') }}">
        @csrf
        <div class="flex flex-col gap-1">
            <label for="team_name">{{ __('teams.Team name') }}</label>
            <input class="innerp" type="text" id="team_name" name="name" placeholder="{{ __('teams.Team name') }}">
        </div>
        <button class="button w-fc" type="submit">{{ __('general.create') }}</button>
    </form>
</x-app-layout>