<x-app-layout>

    <div class="flex flex-row items-center justify-between gap-4">
        <h3 class="block font-medium text-white">Manage users</h3>
        <a class="flex flex-row items-center gap-1 button text-white" href="/register">
            <span>Create user</span>
        </a>
    </div>

    <br />

    <section class="flex flex-col gap-4 item-bg text-white p-4">
        @foreach($users as $user)
            <div class="flex flex-row items-center justify-between">
                {{ $user->name }} (Team: {{ $user->team->name ?? 'none' }})

                <a class="flex flex-row items-center gap-1 button" href="{{ route('users.edit', $user) }}">
                    <svg class="text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                    <span>{{ __('general.edit') }}</span>
                </a>
            </div>
            <hr />
        @endforeach
    </section>
</x-app-layout>