@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-xl-6 offset-xl-3">
        <div class="card">
           
            <div class="card-body">

           

            @include('notification')
                <h4 class="card-title">Edit Employee</h4>
                <p class="card-title-desc">Please fill the below fields to edit the employee</p>

                <form class="custom-validation" action="{{ route('employees.update',$employee->id)}}" method="post">
                @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label">Select Company</label>
                        <div>
                            <select name="company_id" class="form-control">
                                @foreach($companies as $company)
                                   <option value="{{ $company->id }}" {{ ($company->id == $employee->company_id ? 'selected' : '')}}>{{ $company->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <div>
                            <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ $employee->first_name }}" />

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <div>
                            <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ $employee->last_name }}" />

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Enter a valid e-mail" value="{{ $employee->email }}"/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <div>
                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $employee->phone }}"/>
                        </div>
                    </div>


                
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect">
                            Cancel
                        </button>

                   

                    </div>
                 
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection