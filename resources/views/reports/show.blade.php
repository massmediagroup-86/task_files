@extends ('layouts.app')

@section('content')
    <div class="box-body">
        <div class="table-responsive">
            <div class="alert alert-secondary" role="alert">
                {{$file->name}}
            </div>
            <div class="alert alert-secondary" role="alert">
                {{$file->comment}}
            </div>
            <div class="alert alert-secondary" role="alert">
                {{$file->delete_date}}
            </div>
            <div class="alert alert-secondary" role="alert">
                Views count: {{$file->view_count}}
            </div>
            <div class="alert alert-secondary" role="alert">
                Temporary links count: {{ $file->tokens->count()}}
            </div>
            <div class="alert alert-secondary" role="alert">
                Used temporary links count: {{ $file->tokens->where('active','=',0)->count()}}
            </div>
            <div class="alert alert-secondary" role="alert">
                Avaible temporary links count: {{ $file->tokens->where('active','=',1)->count()}}
            </div>
            <div class="alert alert-secondary" role="alert">
                Permanent link:  <a href="{{url('showfile/'.$userFileModel->permanent_token ) }}" target="_blank">{{url( 'showfile/'.$userFileModel->permanent_token ) }}</a>
            </div>



        </div>
    </div>

@endsection
