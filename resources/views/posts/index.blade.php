<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('title') All Posts @endsection
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .create-post-btn {
            background-color: #28a745;
            color: #fff;
        }
        .create-post-btn:hover {
            background-color: #218838;
        }
        .table {
            background-color: #ffffff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table thead th {
            background-color: #343a40;
            color: #fff;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .action-btns a {
            color: inherit;
        }
        .action-btns i {
            margin-right: 10px;
            cursor: pointer;
            color: inherit;
        }
        .action-btns a i:hover, .action-btns i:hover {
            color: #007bff;
        }
        .action-btns form {
            display: inline;
        }
        .action-btns button {
            background: none;
            border: none;
            padding: 0;
            color: inherit;
            cursor: pointer;
        }
        .action-btns button i:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
@extends('layouts.navbar')
@section('content')

    <div class="text-center mt-3">
        <a href="{{ route('posts.create') }}" type="button" class="btn btn-success create-post-btn">Create Post</a>
    </div>

    <div class="container mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post['id'] }}</th>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['postedBy'] }}</td>
                    <td>{{ $post['createdAt'] }}</td>
                    <td class="action-btns">
                        <a href="{{ route('posts.show',$post['id']) }}"><i class="fas fa-eye" title="View"></i></a>
                        <a href="{{route('posts.edit',$post['id']) }}"><i class="fas fa-edit" title="Edit"></i></a>
                        <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" class="delete-form" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-btn" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $post['id'] }}"><i class="fas fa-trash" title="delete"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

@endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            let formToSubmit;

            $('.delete-btn').click(function() {
                formToSubmit = $(this).closest('form');
            });

            $('#confirmDelete').click(function() {
                formToSubmit.submit();
            });
        });
    </script>
</body>
</html>
