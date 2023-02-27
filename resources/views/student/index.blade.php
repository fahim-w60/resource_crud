@extends('master')
@section('title')
    Add Student
@endsection
@section('content')
@include('message.success')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 style="text-align:center;">Add Student</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('crud.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-group">Name</label>
                            <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Name" name="name" >
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-group">Email</label>
                            <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Email" name="email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-group">Phone</label>
                            <input type="number" class="form-control @if($errors->has('phone')) is-invalid @endif" placeholder="Phone" name="phone" value="880" >
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-group">Address</label>
                            <textarea class="form-control @if($errors->has('address')) is-invalid @endif" name="address" id="" cols="30" rows="10" placeholder="Address" ></textarea>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-group">Image</label>
                            <input type="file" class="form-control"  name="image" >
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-5">
                            <button type="submit" class="btn btn-outline-primary form-control">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('student.student_list')
@endsection
