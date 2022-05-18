@extends('admin.layout.app')
@section('title', 'Categories')
@section('content')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="text-dark"><i class="fa fa-list-alt"></i><b> Categories</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add New Category</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                <td></td>
                                <td class="text-danger"><b>{{ $index + 1 }}</b></td>
                                <td class="text-capitalize">{{ $category->name }}</td>
                                <td>
                                    <!-- Edit Icon -->
                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"
                                        data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                    </a>
                                    <!-- Delete Icon -->
                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"
                                        data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <center>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </center>
                <br>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <center>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </center>
                <br>
                <form action="{{ route('categories.update', 0) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input id="c_name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="c_edit_id" value="">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('categories.destroy', 0) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Category</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-danger font-weight-bold" id="del_name">.</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="c_del_id" value="">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <a id="delCat"><input type="submit" class="btn btn-danger" value="Delete"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <script>
        // on clik Delete Icon
        $('.delete').click(function() {
            $('#c_del_id').val($(this).data('id'));
            $('#del_name').text($(this).data('name'));
        })
        // on clik Edit Icon
        $('.edit').click(function() {
            $('#c_edit_id').val($(this).data('id'));
            $('#c_name').val($(this).data('name'));
        })
    </script>
@endsection
