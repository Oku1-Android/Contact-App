@extends('layouts.main')

@section('content')
<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Company Details</strong>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class = "form-group row">
                        <label for = "company_id" class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">{{ $company->name }}</p>
                        </div>

                        <div class="col-md-12">
                          <div class = "form-group row">
                                <label for = "company_id" class="col-md-3 col-form-label">Address</label>
                                <div class="col-md-9">
                                <p class="form-control-plaintext text-muted">{{ $company->address }}</p>
                              </div>



                 <div class="col-md-12">
                    <div class = "form-group row">
                          <label for = "company_id" class="col-md-3 col-form-label">Website</label>
                          <div class="col-md-9">
                          <p class="form-control-plaintext text-muted">{{ $company->website}}</p>
                        </div>
                    </div>
                 </div>

                 <div class="col-md-12">
                    <div class = "form-group row">
                            <label for = "company_id" class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-9">
                                <p class="form-control-plaintext text-muted">{{ $company->email}}</p>
                            </div>
                        </div>

                        <div class="col-md-15">
                          <div class = "form-group row">
                                <label for = "company_id" class="col-md-3 col-form-label">Contact</label>
                                <div class="col-md-9">
                                <p class="form-control-plaintext text-muted">{{ $company->contacts->count()}}</p>
                              </div>
                          </div>

                  <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-3">
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('companies.destroy', $company->id) }}" class="btn-delete btn btn-outline-danger">Delete</a>
                   <a href="{{route('companies.index',$company->id ) }}" class="btn btn-outline-secondary">Cancel</a>
                   </div>
                  @include('layouts._delete-form')
                </div>
            </div>
            </div>
          </div>
         </div>
       </div>
     </div>
   </div>
</main>

@endsection
