<div class="container">
<div class="m-4">
    <h2 class="text-center">Crud in Laravel LiveWire</h2>
</div>
    <div class="text-end"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-user">Add User</button></div>
    @if (session()->has('message'))
        <div class="message alert alert-success my-2 p-1">
            <p class="m-1">
                {{ session('message') }}
            </p>
        </div>
    @endif
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
            <td>{{ $num++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
                <button wire:click='edit({{ $user->id }})' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-user">Edit</button>
                &nbsp;
                <button wire:click='delete({{ $user->id }})' class="btn btn-danger">Delete</button>
            </td>
        </tr>
        </tbody>
        @empty
        <p class="text-danger text-center">No users yet</p>
        @endforelse
    </table>
    {{--Add Modal--}}
    <div class="modal fade" id="add-user"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                <div class="modal-body">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group my-2">
                            <label>Email:</label>
                            <input type="email" class="form-control" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" wire:model="password" class="form-control">
                            @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" wire:click.prevent="store()" data-bs-dismiss="modal" aria-label="Close">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{--  Edit modal  --}}
    <div class="modal fade" id="edit-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="resetInputFields()"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group my-2">
                            <label>Email:</label>
                            <input type="email" class="form-control" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password"  class="form-control">
                            @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


