@extends('layouts.profile')

@section('content')
<div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            @include('layouts.dev.infoUser')
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->email }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
@endsection
