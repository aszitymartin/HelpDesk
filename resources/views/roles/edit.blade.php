<x-app-layout>
<form method="POST" action="{{ route('roles.update', $role) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $role->name }}">

    @foreach($permissions as $permission)
        <label>
            <input type="checkbox"
                   name="permissions[]"
                   value="{{ $permission->name }}"
                   {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}>
            {{ $permission->name }}
        </label>
    @endforeach

    <button type="submit">Update</button>
</form>
</x-app-layout>