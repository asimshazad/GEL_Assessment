@extends('layouts.main')

@section('content')
<div class="container-fluid">
<style> button { background: unset !important;border: unset !important;outline: unset !important; }</style>

    <div class="row">
        <div class="col-12">

            <div class="row mb-2">

                <div class="col-sm-12">
                    <div class="text-sm-end">
                        <a href="{{ route('employees.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"> Add New Employees</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @include('notification')
                    <h4 class="card-title">Employees List</h4>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Registeration Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($employees as $employee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employee->first_name}}</td>
                                <td>{{ $employee->last_name}}</td>
                                <td>{{ ($employee->email ? $employee->email: '-') }}</td>
                                <td>{{ ($employee->phone ? $employee->phone: '-') }}</td>
                                <td>{{ $employee->company->name}}</td>
                                <td>{{ $employee->created_at}}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('employees.edit',$employee->id) }}" class="text-success">Edit</a>

                                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('employees.destroy',[$employee->id]) }}" method="POST" >
                                       @csrf
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="text-danger border-0">Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            @empty
<tr><td colspan="7">No record found</td></tr>

                            @endforelse


                        </tbody>
                    </table>

                    @if ($employees->hasPages())
                       {{ $employees->links('vendor.pagination.custom') }}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection