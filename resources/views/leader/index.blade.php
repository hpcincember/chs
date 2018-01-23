@extends('layouts.app')
@section('headers')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default table-responsive">
                    <div class="panel-heading">Leaders</div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered datatable" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Suffix</th>
                                <th>School</th>
                                <th>Work</th>
                                <th>Contact Number</th>
                                <th>Facebook Account</th>
                                <th>Email Address</th>
                                <th>Network</th>
                                <th>Gender</th>
                                <th>Level</th>
                                <th>Birth Date</th>
                                <th>First Attend</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('leader.data') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'middle_name', name: 'middle_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'suffix', name: 'suffix'},
                    {data: 'school', name: 'school'},
                    {data: 'work_place', name: 'work_place'},
                    {data: 'contact_number', name: 'contact_number'},
                    {data: 'fb_account', name: 'fb_account'},
                    {data: 'email_address', name: 'email_address'},
                    {data: 'network', name: 'network'},
                    {data: 'gender', name: 'gender'},
                    {data: 'level', name: 'level'},
                    {data: 'birth_date', name: 'birth_date'},
                    {data: 'first_attend', name: 'first_attend'},
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection
