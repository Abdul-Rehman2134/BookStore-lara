@extends('admin.layout.app')
@section('title', 'Books')
@section('content')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="text-dark"><i class="fa fa-book"></i><b> Books</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add New Book</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Pages</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $index => $book)
                            <tr>
                                <td class="text-danger"><b>{{ $index + $books->firstItem() }}</b></td>
                                <td><img height="50px" src="{{ asset('assets/image/' . $book->image) }}" alt="image"></td>
                                <td><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></td>
                                <td class="text-capitalize">{{ $book->author->name }}</td>
                                <td class="text-capitalize">{{ $book->category->name }}</td>
                                <td align="center" class="text-capitalize">{{ $book->number_of_pages }}</td>
                                <td align="center">{{ $book->price }}</td>
                                <td>
                                    <!-- Edit Icon -->
                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"
                                        data-id="{{ $book->id }}" data-name="{{ $book->name }}"
                                        data-author="{{ $book->author_id }}" data-category="{{ $book->category_id }}"
                                        data-pages="{{ $book->number_of_pages }}" data-price="{{ $book->price }}"
                                        data-description="{{ $book->description }}">
                                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                    </a>
                                    <!-- Delete Icon -->
                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"
                                        data-id="{{ $book->id }}" data-name="{{ $book->name }}">
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
                                @foreach ($errors->all() as $index => $error)
                                    <li>{{ $index + 1 }}) {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </center>
                <br>
                <form method="POST" action="{{ route('book.store') }}">
                    @csrf
                    @method('post')
                    <div class="modal-header">
                        <h4 class="modal-title">Add Book</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control pb-5"
                                accept="image/png, image/gif, image/jpeg" required>
                        </div>
                        <div class="form-group">
                            <label>Author Name </label>
                            <select name="author" class="form-control">
                                <option value="">Select Author</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value=" ">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pages</label>
                            <input name="pages" type="number" class="form-control" value="{{ old('pages') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="number" class="form-control" value="{{ old('price') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input name="submit" type="submit" class="btn btn-success" value="Add">
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
                                @foreach ($errors->all() as $index => $error)
                                    <li>{{ $index + 1 }}) {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </center>
                <br>
                <form action="{{ route('book.update', 0) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Book</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input value="" id="b_name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" id="b_img" type="file" class="form-control pb-5"
                                accept="image/png, image/gif, image/jpeg" required>
                        </div>
                        <div class="form-group">
                            <label>Author Name </label>
                            <select name="author" id="select_author" class="form-control">
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" id="select_category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pages</label>
                            <input id="b_pages" name="pages" type="number" class="form-control" value="{{ old('pages') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input id="b_price" name="price" type="number" class="form-control" value="{{ old('price') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="b_description" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="b_id" name="id" value="">
                        <input type="submit" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <a id="editBook"><input type="submit" class="btn btn-info" value="update"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('book.destroy', 0) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Book</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Book?</p>
                        <p class="text-danger font-weight-bold" id="del_name">.</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="b_del_id" name="id" value="">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <a id="delBook"><input type="submit" class="btn btn-danger" value="Delete"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="d-flex justify-content-center">
        {{ $books->links('pagination::bootstrap-4') }}
    </div>

    <script>
        // on clik Delete Icon
        $('.delete').click(function() {
            $('.b_del_id').val($(this).data('id'));
            $('#del_name').text($(this).data('name'));
        })
        // on clik Edit Icon
        $('.edit').click(function() {
            $('#b_id').val($(this).data('id'));
            $('#b_name').val($(this).data('name'));
            $('#b_pages').val($(this).data('pages'));
            $('#b_price').val($(this).data('price'));
            $('#b_description').val($(this).data('description'));
            // author value change
            var auth_id = $(this).data('author');
            $("#select_author option:selected").removeAttr("selected");
            $("#select_author option[value=" + auth_id + "]").attr('selected', true);
            // category value change
            var cat_id = $(this).data('category');
            $("#select_category option:selected").removeAttr("selected");
            $("#select_category option[value=" + cat_id + "]").attr('selected', true);
        })
    </script>
@endsection
