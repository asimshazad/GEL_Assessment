@extends('layouts.main')

@section('content')
<div class="container-fluid">
<style> button { background: unset !important;border: unset !important;outline: unset !important; }</style>

    <div class="row">
        <div class="col-12">

            <div class="row mb-2">

                <div class="col-sm-12">
                    <div class="text-sm-end">
                        <a href="{{ route('companies.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"> Add New Company</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @include('notification')
                    <h4 class="card-title">Companies List</h4>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Registeration Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $company->name}}</td>
                                <td>{{ ($company->email ? $company->email: '-') }}</td>
                                <td>{!! $company->logo() !!}</td>
                                <td>{{ ($company->website ? $company->email: '-')}}</td>
                                <td>{{ $company->created_at}}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('companies.edit',$company->id) }}" class="text-success">Edit</a>

                                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('companies.destroy',[$company->id]) }}" method="POST" >
                                       @csrf
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="text-danger border-0">Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    @if ($companies->hasPages())
                       {{ $companies->links('vendor.pagination.custom') }}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection