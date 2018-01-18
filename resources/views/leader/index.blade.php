@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Leaders</div>
                    <div class="panel-body">
                        <ol>
                            <li>Hello from WebCodeGuide</li>
                            <li>Nice list!</li>
                            <li>Leader
                                <ol type="a">
                                  @foreach($roles as $role)
                                    <li>{{$role[0]}}</li>
                                  @endforeach
                                </ol>
                            </li>
                            <li>Last list item!</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
