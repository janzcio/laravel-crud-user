@extends('layouts.master')

@section('title', 'User Management')

@section('extend_css')
    <style>
        .card-header-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
        }
    </style>
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>Page of Users</h4>
                                        <span>List of users</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item" style="float: left;">
                                            <a href="#!"> <i class="fas fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item" style="float: left;">
                                            <a href="#!">Users Table</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">
                        <div class="alert-container">
                            <!-- Alert messages will be inserted here -->
                        </div>

                        <div class="card">
                            <div class="top-container">
                                <div class="card-header card-header-custom">
                                    <div>
                                        <h5>Basic Table For Users</h5>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#userModal"
                                            onclick="openAddUserModal()"> <i class="fas fa-plus"></i> Add User</button>
                                    </div>
                                </div>
                                {{-- <div class="button-top-action mb-1 pr-1">

                                </div> --}}
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date Created</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userTableBody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- User Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userForm">
                        <input type="hidden" id="userId" name="id">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group current_password_container">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitButton">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extend_js')
    <script>
        $(document).ready(function() {
            loadUsers();

            $('#userForm').on('submit', function(e) {
                e.preventDefault();
                const id = $('#userId').val();
                const url = id ? '/api/users/' + id : '/api/users';
                const type = id ? 'PUT' : 'POST';
                const token = '{{ session('token') }}';

                $.ajax({
                    type: type,
                    url: url,
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Authorization': 'Bearer ' +
                            token // Include the token in the Authorization header
                    },
                    success: function(user) {
                        $('#userModal').modal('hide');
                        showAlert('success', id ? 'User updated successfully!' :
                            'User added successfully!');
                        loadUsers();
                    },
                    error: function(xhr) {
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = 'An error occurred. Please check the following:<br>';
                        for (const key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessage += `${errors[key].join(', ')}<br>`;
                            }
                        }
                        showAlert('danger', errorMessage);
                    }
                });
            });
        });

        function showAlert(type, message) {
            $('.alert-container').html(`
                <div class="alert alert-${type} background-${type} alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong> ${message}
                </div>
            `);
            setTimeout(function() {
                $('.alert-container .alert').fadeOut();
            }, 5000);
        }

        function loadUsers() {
            // Get the token from the session
            const token = '{{ session('token') }}'; // Use Blade syntax to get the token

            $.ajax({
                url: '/api/users',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + token // Include the token in the Authorization header
                },
                success: function(response) {
                    const users = response.data; // Assuming the user data is in the 'data' property

                    $('#userTableBody').empty();
                    users.forEach(function(user, index) {
                        const createdAt = new Date(user.created_at);
                        const options = {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        };
                        const formattedDate = createdAt.toLocaleDateString('en-US', options);

                        $('#userTableBody').append(`
                    <tr id="user-row-${index + 1}">
                        <td>${index + 1}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${formattedDate}</td>
                        <td class="action-buttons text-center">
                            <button class="btn btn-warning btn-sm" onclick="openEditUserModal(${user.id})">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id})">Delete</button>
                        </td>
                    </tr>
                `);
                    });
                },
                error: function(xhr) {
                    console.error('Error loading users:', xhr);
                    // Handle errors appropriately
                }
            });
        }

        function deleteUser(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                // Get the token from the session
                const token = '{{ session('token') }}'; // Use Blade syntax to get the token

                $.ajax({
                    type: 'DELETE',
                    url: '/api/users/' + id,
                    headers: {
                        'Authorization': 'Bearer ' + token // Include the token in the Authorization header
                    },
                    success: function() {
                        loadUsers();
                        showAlert('success', 'User deleted successfully!');
                    },
                    error: function(xhr) {
                        showAlert('danger', 'Error deleting user: ' + JSON.stringify(xhr.responseJSON));
                    }
                });
            }
        }

        function openAddUserModal() {
            $('#userId').val('');
            $('#name').val('');
            $('#email').val('');
            $('#password').val('');
            $('.current_password_container').hide();
            $('#modalTitle').text('Add User');
            $('#submitButton').text('Add User');
        }

        function openEditUserModal(id) {
            const token = '{{ session('token') }}';

            $.ajax({
                url: '/api/users/' + id,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + token // Include the token in the Authorization header
                },
                success: function(response) {
                    const user = response.data; // Assuming the user data is in the 'data' property

                    console.log(user, "user");
                    $('#userId').val(user.id);
                    $('#name').val(user.name);
                    $('#email').val(user.email);
                    $('.current_password_container').show();
                    $('#password').val(''); // Clear the password field
                    $('#password_confirmation').val(''); // Clear the password confirmation field
                    $('#modalTitle').text('Edit User');
                    $('#submitButton').text('Update User');
                    $('#userModal').modal('show');
                },
                error: function(xhr) {
                    console.error('Error loading users:', xhr);
                }
            });
        }
    </script>
@endsection
