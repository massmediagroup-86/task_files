@extends ('layouts.app')

@section('content')
    <div class="box-body">
        <div class="table-responsive">
            <div class="alert alert-secondary" role="alert">
                {{$userFileModel->name}}
            </div>
            <div class="alert alert-secondary" role="alert">
                {{$userFileModel->comment}}
            </div>
            <div class="alert alert-secondary" role="alert">
                {{$userFileModel->delete_date}}
            </div>
            <div class="alert alert-secondary" role="alert">
                Views count: {{$userFileModel->view_count}}
            </div>
            <div class="alert alert-secondary" role="alert">
                Permanent link:  <a href="{{url('showfile/'.$userFileModel->permanent_token ) }}" target="_blank">{{url( 'showfile/'.$userFileModel->permanent_token ) }}</a>
            </div>


        </div>
    </div>

@endsection
