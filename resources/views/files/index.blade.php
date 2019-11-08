@extends ('layouts.app')

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection



@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">User files ({{$user_files->count()}} files)</h3>

        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <a href="{{route('files.create')}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Create"></i>Create new</a>
                <table  class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>File</th>
                        <th>Comment</th>
                        <th>Delete date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($user_files)
                        @foreach($user_files as $user_file)
                            <tr>
                                <td>{{$user_file->name}}</td>
                                <td>{{$user_file->comment}}</td>
                                <td>{{$user_file->delete_date}}</td>
                                <td>
                                    <a href="{{route('files.edit', $user_file)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                    <a href="{{route('files.show', $user_file)}}" class="btn btn-xs btn-primary"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Show"></i></a>
                                    <a href="{{route('tokens.index', $user_file)}}" class="btn btn-xs btn-primary"><i class="fa fa-key" data-toggle="tooltip" data-placement="top" title="Links"></i></a>
                                    <a data-method="delete" href="{{route('files.destroy', $user_file)}}" class="btn btn-xs btn-danger btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
