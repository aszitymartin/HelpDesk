<x-app-layout>
<form method="POST" action="{{ route('roles.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Role name">

    <h3>Permissions</h3>
    @foreach($permissions as $permission)
        <label>
            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}">
            {{ $permission->name }}
        </label>
    @endforeach

    <button type="submit">Create</button>
</form>
</x-app-layout>