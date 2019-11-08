@extends ('layouts.app')


@section('content')
    @if($userFileModel)
    {{ Form::model($userFileModel, ['route' => ['files.update', $userFileModel],'files'=>true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}
    @else
        {{ Form::open(['route' => 'files.store','files'=>true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}
    @endif

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">@if($userFileModel) Edit @else Create @endif file</h3>
        </div>

        <div class="box-body">

            <div class="form-group">
                {{ Form::label('name', "File name", ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control',  'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => "Name of file "]) }}
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-group">
                {{ Form::label('content', "Comment", ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('comment', null, ['class' => 'form-control',  'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => "Comment"]) }}
                    @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('file_name', "Picture", ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::file('file_name', null, ['class' => 'form-control',  'placeholder' => "picture"]) }}
                    @error('file_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('delete_date', "Delete date", ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::date('delete_date') }}
                    @error('delete_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>



        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('files.index', "Cancel", [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit('Save', ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@endsection
