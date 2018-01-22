@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Roles</div>
                    <div class="panel-body tree">
                        <ul class="tree">
                            @foreach($modules as $module => $roles)
                                <li>{{$module}}</li>
                                <ul>
                                    @foreach($roles as $role)
                                        <li>{{$role->operation}}</li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
