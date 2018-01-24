@extends('layouts.app')
@section('headers')
    <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create</div>
                    <div class="panel-body">
                        <form action="/leader" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control"  placeholder="First Name" name="first_name"  value="{{ old('first_name')  }}" required>
                                </div>

                                <div class="col-sm-3">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="text" class="form-control"  placeholder="Middle Name" name="middle_name" value="{{ old('middle_name') }}" >

                                </div>

                                <div class="col-sm-4">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control"  placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required>
                                </div>

                                <div class="col-sm-1">
                                    <label for="suffix">Suffix</label>
                                    <input type="text" class="form-control"  placeholder="Suffix" name="suffix" value="{{ old('suffix') }}">
                                </div>
                            </div>

                            <div class="clear"></div>
                            <hr>

                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="contact_number">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option selected disabled>Please select one option</option>
                                        @foreach($genders as $key => $gender)
                                                <option value="{{ $key }}">{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-sm-3">
                                    <label for="birth_date">Birth Date</label>
                                    <input type="text" class="form-control" id="datepicker"  placeholder="Birthdate" name="birth_date" value="{{ old('birth_date') }}" required>
                                </div>

                                <div class="col-sm-3">
                                    <label for="school">School</label>
                                    <input type="text" class="form-control"  placeholder="School" name="school" value="{{ old('school') }}" >
                                </div>

                                <div class="col-sm-3">
                                    <label for="work_place">Work</label>
                                    <input type="text" class="form-control"  placeholder="Work" name="work_place" value="{{ old('work_place') }}">
                                </div>
                            </div>

                            <div class="clear"></div>
                            <hr>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" class="form-control"  placeholder="Contact Number" name="contact_number" value="{{ old('contact_number') }}">
                                </div>

                                <div  class="col-sm-4">
                                    <label for="fb_account">Facebook Account</label>
                                    <input type="text" class="form-control"  placeholder="Facebook Account" name="fb_account" value="{{ old('fb_account') }}">
                                </div>

                                <div  class="col-sm-4">
                                    <label for="email_address">Email Address</label>
                                    <input type="text" class="form-control"  placeholder="Email Address" name="email_address" value="{{ old('email_address') }}">
                                </div>
                            </div>

                            <div class="clear"></div>
                            <hr>

                            <div class="form-group">

                                <div class="col-sm-4">
                                    <label for="contact_number">Network</label>
                                    <select class="form-control" name="network">
                                        <option selected disabled>Please select one option</option>
                                        @foreach($networks as $network)
                                                <option value="{{ $network->id }}">{{ $network->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label for="level">Level</label>
                                    <select class="form-control" name="level">
                                        <option selected disabled>Please select one option</option>
                                        @foreach($levels as $key => $level)
                                                <option value="{{ $key }}">{{ $level }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label for="cell_group">Cell Group</label>
                                    <input type="text" class="form-control"  placeholder="Cell Group" value="{{ old('cell_group') }}" >
                                </div>
                            </div>

                            <div class="clear"></div>
                            <hr>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        @include("layouts.errors")
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        } );
    </script>
@endsection