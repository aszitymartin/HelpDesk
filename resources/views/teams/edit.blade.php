<x-app-layout>
    <form class="flex flex-col gap-4 item-bg text-white p-4" method="POST" action="{{ route('teams.update', $team) }}">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-1">
            <label for="team_name">{{ __('teams.Team name') }}</label>
            <input class="innerp" type="text" id="team_name" name="name" value="{{ $team->name }}" placeholder="{{ __('teams.Team name') }}">
        </div>
        <button class="button w-fc" type="submit">{{ __('general.update') }}</button>
    </form>
</x-app-layout>