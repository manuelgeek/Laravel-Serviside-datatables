@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Post</div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped printable" id="datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '{!! route('post.index') !!}',
            "columns": [
                {data: 'DT_Row_Index', orderable: false, searchable: false},
                { data: 'title', name: 'title' },
                { data: 'body', name: 'body' },
                { data: 'category', name: 'category' },
                { data: 'author', name: 'author' },
                { data: 'status', name: 'status' },
                { data: 'created_at', name: 'created_at' },
                { data: 'actions', name: 'actions' }
            ]
        });
    </script>

    @endsection
