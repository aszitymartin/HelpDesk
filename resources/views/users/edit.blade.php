<x-app-layout>

    <div class="flex flex-row items-center justify-between gap-4">
        <h3 class="block font-medium text-white">{{ $user->name }}</h3>
        <a class="flex flex-row items-center gap-2 button text-white" href="/users">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
            <span>{{ __('general.back') }}</span>
        </a>
    </div>

    <br />

    <form class="flex flex-col gap-4 item-bg text-white p-4" method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')

        <label for="select" class="block text-sm/6 font-medium text-white">{{ __('teams.teams') }}</label>
        <el-select id="select" name="team_id" value={{ $user->team_id }} class="mt-2 block">
            <button type="button" class="grid w-full cursor-default grid-cols-1 rounded-md bg-white/5 py-1.5 pr-2 pl-3 text-left text-white outline-1 -outline-offset-1 outline-white/10 focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-indigo-500 sm:text-sm/6">
                <el-selectedcontent class="col-start-1 row-start-1 flex items-center gap-3 pr-6">
                    <x-icon name="add-circle" class="svg-icon" />
                    <span class="block truncate">Select a team</span>
                </el-selectedcontent>
                <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true" class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-400 sm:size-4">
                    <path d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                </svg>
            </button>

            <el-options anchor="bottom start" popover class="max-h-56 w-(--button-width) overflow-auto rounded-md bg-gray-800 py-1 text-base outline-1 -outline-offset-1 outline-white/10 [--anchor-gap:--spacing(1)] data-leave:transition data-leave:transition-discrete data-leave:duration-100 data-leave:ease-in data-closed:data-leave:opacity-0 sm:text-sm">
                
                @foreach($teams as $team)

                    <el-option value="{{ $team->id }}" {{ $user->team_id === $team->id ? 'selected' : '' }} class="group/option relative block cursor-default py-2 pr-9 pl-3 text-white select-none focus:bg-white/5 focus:text-white focus:outline-hidden">
                        <div class="flex items-center">
                            <x-icon name="add-circle" class="svg-icon" />
                            <span class="ml-3 block truncate font-normal group-aria-selected/option:font-semibold">{{ $team->name }}</span>
                        </div>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-400 group-not-aria-selected/option:hidden group-focus/option:text-white in-[el-selectedcontent]:hidden">
                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5">
                            <path d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                        </span>
                    </el-option>

                @endforeach
            </el-options>
        </el-select>

        <h3 class="block text-sm/6 font-medium text-white">Roles</h3>
        @if (count($roles) > 0)
            @foreach($roles as $role)

                <div class="relative flex flex-wrap items-center">
                    <input class="peer h-5 w-5 cursor-pointer appearance-none rounded border-2 border-slate-500 bg-gray-800 transition-colors checked:border-emerald-500 checked:bg-emerald-500 checked:hover:border-emerald-600 checked:hover:bg-emerald-600 focus:outline-none focus:outline-none checked:focus:border-emerald-700 checked:focus:bg-emerald-700 checked:focus:ring-emerald-300 focus-visible:outline-none disabled:cursor-not-allowed disabled:border-slate-100 disabled:bg-slate-50" type="checkbox" value="{{ $role->name }}" name="roles[]" id="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }} />
                    <label class="cursor-pointer pl-2 text-slate-500 peer-disabled:cursor-not-allowed peer-disabled:text-slate-400" for="{{ $role->name }}"> {{ $role->name }} </label>
                    <svg class="pointer-events-none absolute left-0.5 top-1 h-4 w-4 -rotate-90 fill-white stroke-white opacity-0 transition-all duration-300 peer-checked:rotate-0 peer-checked:opacity-100 peer-disabled:cursor-not-allowed" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" aria-labelledby="title-1 description-1" role="graphics-symbol"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.8116 5.17568C12.9322 5.2882 13 5.44079 13 5.5999C13 5.759 12.9322 5.91159 12.8116 6.02412L7.66416 10.8243C7.5435 10.9368 7.37987 11 7.20925 11C7.03864 11 6.87501 10.9368 6.75435 10.8243L4.18062 8.42422C4.06341 8.31105 3.99856 8.15948 4.00002 8.00216C4.00149 7.84483 4.06916 7.69434 4.18846 7.58309C4.30775 7.47184 4.46913 7.40874 4.63784 7.40737C4.80655 7.406 4.96908 7.46648 5.09043 7.57578L7.20925 9.55167L11.9018 5.17568C12.0225 5.06319 12.1861 5 12.3567 5C12.5273 5 12.691 5.06319 12.8116 5.17568Z" /></svg>
                </div>

            @endforeach
        @else
            <span>{{ __('roles.No roles') }}</span>
        @endif

        <button class="button w-fc" type="submit">{{ __('general.save') }}</button>

    </form>
</x-app-layout>