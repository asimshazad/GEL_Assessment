@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-xl-6 offset-xl-3">
        <div class="card">
           
            <div class="card-body">

           

            @include('notification')
                <h4 class="card-title">Edit Company</h4>
                <p class="card-title-desc">Please fill the below fields to register a company</p>
                <form class="custom-validation" action="{{ route('companies.update',$company->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <div>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $company->name }}"/>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <div>
                            <input type="email" class="form-control" placeholder="Enter a valid e-mail" value="{{ $company->email }}" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <div>
                            <input type="url" class="form-control" placeholder="URL" value="{{ $company->website }}"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <div>
                            <input type="file" name="logo" class="form-control">
                            @if($company->logo != NULL)
                                <img src="{{ asset($company->logo) }}" class="mt-2" height="100" width="100" />
                            @endif

                           

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