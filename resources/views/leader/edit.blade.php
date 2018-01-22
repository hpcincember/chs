@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Leader ID # {{$leader->id}}</div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="first_name">First Name</label>
                                    <input type="first_name" class="form-control"  placeholder="First Name"  value="{{ old('first_name', $leader->first_name) }}" required>
                                </div>

                                <div class="col-sm-3">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="middle_name" class="form-control"  placeholder="Middle Name" value="{{ old('middle_name', $leader->middle_name) }}" required>

                                </div>

                                <div class="col-sm-4">
                                    <label for="last_name">Last Name</label>
                                    <input type="last_name" class="form-control"  placeholder="Last Name" value="{{ old('last_name', $leader->last_name) }}" required>
                                </div>

                                <div class="col-sm-1">
                                    <label for="suffix">Suffix</label>
                                    <input type="suffix" class="form-control"  placeholder="Suffix" value="{{ old('suffix', $leader->suffix) }}" required>
                                </div>
                            </div>

                            <div class="clear"></div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="school">School</label>
                                    <input type="school" class="form-control"  placeholder="School" value="{{ old('school', $leader->school) }}" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="work_place">Work</label>
                                    <input type="work_place" class="form-control"  placeholder="Work" value="{{ old('work_place', $leader->work_place) }}" required>
                                </div>
                            </div>

                            <div class="clear"></div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="contact_number" class="form-control"  placeholder="Contact Number" value="{{ old('contact_number', $leader->contact_number) }}" required>
                                </div>

                                <div  class="col-sm-4">
                                    <label for="fb_account">Facebook Account</label>
                                    <input type="fb_account" class="form-control"  placeholder="Facebook Account" value="{{ old('fb_account', $leader->fb_account) }}" required>
                                </div>

                                <div  class="col-sm-4">
                                    <label for="email_address">Email Address</label>
                                    <input type="email_address" class="form-control"  placeholder="Email Address" value="{{ old('email_address', $leader->email_address) }}" required>
                                </div>
                            </div>

                            <div class="clear"></div>

                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="contact_number">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option selected disabled>Please select one option</option>
                                        @foreach($genders as $key => $gender)
                                            @if ($leader->getOriginal('gender') == $key)
                                                <option value="{{ $key }}" selected>{{ $gender }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $gender }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-sm-3">
                                    <label for="contact_number">Birth Date</label>
                                    <input type="contact_number" class="form-control"  placeholder="Contact Number" value="{{ old('contact_number', $leader->contact_number) }}" required>
                                </div>

                                <div class="col-sm-3">
                                    <label for="contact_number">Network</label>
                                    <select class="form-control" name="nework">
                                        <option selected disabled>Please select one option</option>
                                        @foreach($networks as $network)
                                            @if ($leader->getOriginal('network') == $network->id)
                                                <option value="{{ $network->id }}" selected>{{ $network->name }}</option>
                                            @else
                                                <option value="{{ $network->id }}">{{ $network->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label for="contact_number">Level</label>
                                    <input type="contact_number" class="form-control"  placeholder="Contact Number" value="{{ old('contact_number', $leader->contact_number) }}" required>
                                </div>
                            </div>

                            <div class="clear"></div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
