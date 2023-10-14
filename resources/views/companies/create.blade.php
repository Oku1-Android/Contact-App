@extends('layouts.main')

@section('content')
 <!-- content -->
 <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Add New Companies</strong>
            </div>
            <div class="card-body">

              <form action="{{route('companies.store')}}" method="post" >
                @csrf
                {{-- @method('PUT') --}}
              @include('companies._form')

            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@section('title', 'Contact App | Add new companies')
