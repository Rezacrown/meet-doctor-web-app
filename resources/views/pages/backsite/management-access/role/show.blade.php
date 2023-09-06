
{{-- @section('content') --}}
<table class="table table-bordered">
    <tr>
        <th>Role</th>
        <td>{{ isset($role->title) ? $role->title : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Permission</th>
        <td>
            @foreach($role->permission as $id => $permission)
                <span class="mb-1 mr-1 badge bg-yellow text-dark">{{ isset($permission->title) ? $permission->title : 'N/A' }}</span>
            @endforeach
        </td>
    </tr>
</table>
{{-- @endsection --}}

