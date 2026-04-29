<x-app-layout>
<form class="flex flex-col gap-4 item-bg text-white p-4" method="POST" action="{{ route('permissions.update', $permission) }}">
    @csrf
    @method('PUT')

    <div class="flex flex-col gap-1">
        <label for="permission_name">Permission name</label>
        <input class="innerp" type="text" name="permission_name" autocomplete="true" autofocus value="{{ $permission->name }}">
    </div>

    <button class="button w-fc" type="submit">Update</button>
</form>
</x-app-layout>