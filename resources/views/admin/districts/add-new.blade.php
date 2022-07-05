@extends('admin.layouts.app')
@section('content')

<div class="page-content" id="addNewDistrict">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Transport4Transport - <span class="text-primary">Country Registration Form</span></h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">

            <a type="button" class="btn btn-primary" href={{route('admin.districts')}}>
            <i class="fas fa-arrow-left mr-1"></i>
            Back
        </a>


</div>
</div>


<form action="{{route('store.districts')}}" method="post">

        @csrf
        <div class="row justify-content-center">
            <div class="col-12 mb-3">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
            </div>

            {{--General Details--}}
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br>
                        @endif
                        <h6 class="card-title">
                            General
                        </h6>
                        <div class="row">
                            <div class="col-md-12 mb-12 mt-12">
                                <label for="productname">Name*</label>
                                <input type="text" name="name" id="productname" class="form-control"
                                placeholder="Enter Name" required/>
                            </div>
                            <div class="col-md-12 mb-12 mt-12 mt-3">
                                <label for="productname">Country Name*</label>
                                <select class="custom-select"  name="country_id" id="country_id">
                                    <option selected>Select Country</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 text-right mt-3">
                                <input type="submit" class="btn btn-primary " value="Add"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection