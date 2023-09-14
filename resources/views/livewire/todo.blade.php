<div class="container">
<div class="m-4">
    <h2 class="text-center">Crud in Laravel LiveWire</h2>
</div>
    <div class="text-end"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-and-add">Add User</button></div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
        </thead>
        @forelse($users as $user)
        <tbody>
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
                <button class="btn btn-primary">Edit</button>
                &nbsp;
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        </tbody>
        @empty
        <p class="text-danger text-center">No users yet</p>
        @endforelse
    </table>
    {{--Modal--}}
    <div class="modal fade" id="edit-and-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>


