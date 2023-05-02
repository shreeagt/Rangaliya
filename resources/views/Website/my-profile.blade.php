@extends('layouts.main')
@push('title')
<title>profile</title>  
@endpush
@section('main-section')

@component('components.breadcrumbs')
<a href="/">Home</a>
<i class="fa fa-chevron-right breadcrumb-separator"></i>
<span>My profile</span>
@endcomponent

 
<div class="container">
    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>



{{-- <div class="products-section container">
    <div class="sidebar">

        <ul>
          <li class="active"><a href="{{ route('users.edit') }}">My Profile</a></li>
          <li><a href="{{ route('order.index') }}">My Orders</a></li>
        </ul>
    </div> <!-- end sidebar -->
    <div class="my-profile">
        <div class="products-header">
            <h1 class="stylish-heading">My Profile</h1>
        </div>

        <div>
            <form action="{{ route('users.update') }}" method="POST">
                @method('patch')
                @csrf
                <div class="form-group">
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <div>Leave password blank to keep current password</div>
                    <input id="password" class="form-control" type="password" name="password" placeholder="Password">
                    
                </div>
                <div class="form-group">
                    <input class="form-control" id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>
                <div>
                    <button type="submit" class="my-profile-button">Update Profile</button>
                </div>
            </form>
        </div>

        <div class="spacer"></div>
    </div>
</div> --}}
<div class="m-bottom-40 m-top-40">
<div class="container d-cart-block " >

    <div class="multi-columns-row ">

        <div class="products-header justify-center">
            <h1 class="">My Profile</h1>
        </div>
        <div class="col-sm-4">



            <div class="sidebar">

                <ul>
                    <a href="{{ route('users.edit') }}" style="color:#ed5f5e;font-weight:600"><li class="active list-sidebar">My Profile</li></a>
                  <a href="{{ route('order.index') }}"> <li class="list-sidebar">My Orders</li></a>
                </ul>
            </div> <!-- end sidebar -->
         

{{--             
            <ul>
                <li class="active contact-info-title "><a class="my-profile-button" href="{{ route('users.edit') }}">My Profile</a></li>
                <li class="contact-info-title my-profile-button"><a class="my-profile-button" href="{{ route('order.index') }}">My Orders</a></li>
              </ul> --}}
        </div>
        <div class="col-sm-8">
            <div class="my-profile">
             
        
                <div>
                    <form action="{{ route('users.update') }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <input id="name" class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <div>Leave password blank to keep current password</div>
                            <input id="password" class="form-control" type="password" name="password" placeholder="Password">
                            
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                        <div>
                            <button type="submit" class="my-profile-button">Update Profile</button>
                        </div>
                    </form>
                </div>
        
                <div class="spacer"></div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection