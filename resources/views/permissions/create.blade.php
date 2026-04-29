<x-app-layout>
    <h3 class="text-white uppercase">{{ __('permissions.create permission') }}</h3><br />
    <form class="flex flex-col gap-4 item-bg text-white p-4" method="POST" action="{{ route('permissions.store') }}">
        @csrf
        
        <div class="flex flex-col gap-1">
            <label for="permission_name">{{ __('Permission name') }}</label>
            <input type="text" name="name" id="permission_name" class="innerp" placeholder="Permission name">
        </div>

        <button class="button w-fc" type="submit">{{ __('general.create') }}</button>
    </form>
</x-app-layout>