@extends('layouts.app')
@section('headers')
    <style>
        body {
            background:white;
            font:normal normal 13px/1.4 Segoe,"Segoe UI",Calibri,Helmet,FreeSans,Sans-Serif;
            padding:50px;
        }


        /**
         * Framework starts from here ...
         * ------------------------------
         */

        .tree,
        .tree ul {
            margin:0 0 0 1em; /* indentation */
            padding:0;
            list-style:none;
            color:#369;
            position:relative;
        }

        .tree ul {margin-left:.5em} /* (indentation/2) */

        .tree:before,
        .tree ul:before {
            content:"";
            display:block;
            width:0;
            position:absolute;
            top:0;
            bottom:0;
            left:0;
            border-left:1px solid;
        }

        .tree li {
            margin:0;
            padding:0 1.5em; /* indentation + .5em */
            line-height:2em; /* default list item's `line-height` */
            font-weight:bold;
            position:relative;
        }

        .tree li:before {
            content:"";
            display:block;
            width:10px; /* same with indentation */
            height:0;
            border-top:1px solid;
            margin-top:-1px; /* border top width */
            position:absolute;
            top:1em; /* (line-height/2) */
            left:0;
        }

        .tree li:last-child:before {
            background:white; /* same with body background */
            height:auto;
            top:1em; /* (line-height/2) */
            bottom:0;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Leaders</div>
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
