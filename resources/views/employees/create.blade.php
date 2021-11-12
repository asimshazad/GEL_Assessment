@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-xl-6 offset-xl-3">
        <div class="card">
           
            <div class="card-body">

           

            @include('notification')
                <h4 class="card-title">Add Employees</h4>
                <p class="card-title-desc">Please fill the below fields to register a Employee</p>

                <form class="custom-validation" action="{{ route('employees.store')}}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Select Company</label>
                        <div>
                            <select name="company_id" class="form-control">
                                @foreach($companies as $company)
                                   <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <div>
                            <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" />

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <div>
                            <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" />

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Enter a valid e-mail" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <div>
                            <input type="text" name="phone" class="form-control" placeholder="Phone" />
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