@extends ('layouts.app')

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection



@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">File links</h3>

        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <a href="{{route('tokens.generate',$file)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Create"></i>Create new</a>
                <table  class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Token</th>
                        <th>Active</th>
                        <th>Link</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($file->tokens)
                        @foreach($file->tokens as $token)
                            <tr>
                                <td>{{$token->temporary_token}}</td>
                                <td>{{$token->active}}</td>
                                <td>
                                    <a href="{{url( 'tempfile/'.$token->temporary_token ) }}" target="_blank">{{url( 'tempfile/'.$token->temporary_token ) }}</a>
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
