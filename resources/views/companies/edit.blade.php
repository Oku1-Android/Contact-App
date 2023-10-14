@extends('layouts.main')

@section('content')
 <!-- content -->
 <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Edit Company</strong>
            </div>
            <div class="card-body">

                <form action="{{route('companies.store')}}" method="post" >
                  @csrf
                  {{-- @method('PUT') --}}
                @include('companies._form')
                </form>
{{--
              <form action="{{route('contacts/{contact}.update')}}" method="post" >
                @method('PUT')
                @csrf
              @include('contacts._form')
              </form> --}}

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@section('title', 'Contact App | Add new contact')
