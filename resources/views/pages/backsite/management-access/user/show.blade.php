<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ isset($user->name) ? $user->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ isset($user->email) ? $user->email : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Role</th>
        <td>
            @foreach($user->role as $id => $role)
                <span class="mb-1 mr-1 badge bg-yellow text-dark">{{ isset($role->title) ? $role->title : 'N/A' }}</span>
            @endforeach
        </td>
    </tr>
    <tr>
        <th>Type User</th>
        <td>
            <span class="mb-1 mr-1 badge bg-success">{{ isset($user->detail_user->type_user->name) ? $user->detail_user->type_user->name : 'N/A' }}</span>
        </td>
    </tr>
</table>
