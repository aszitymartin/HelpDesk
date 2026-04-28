<x-app-layout>
<form method="POST" action="{{ route('permissions.update', $permission) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $permission->name }}">

    <button type="submit">Update</button>
</form>
</x-app-layout>