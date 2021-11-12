@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-xl-6 offset-xl-3">
        <div class="card">
           
            <div class="card-body">

           

            @include('notification')
                <h4 class="card-title">Add Company</h4>
                <p class="card-title-desc">Please fill the below fields to register a company</p>
                <form class="custom-validation" action="{{ route('companies.store')}}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <div>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" />

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Enter a valid e-mail" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <div>
                            <input type="url" name="website" class="form-control" placeholder="URL" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <div>
                            <input type="file" name="logo" class="form-control">

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