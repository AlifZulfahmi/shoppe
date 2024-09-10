@extends('layouts.adminApp')

@section('content')
    <div class="container-fluid">
        <!-- Card Wrapper -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form for Creating Product -->
                <div class="card mt-4"> <!-- Added mt-4 class for top margin -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Product Details</h4>
                        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label"><strong>Name:</strong></label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Product Name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="detail" class="form-label"><strong>Detail:</strong></label>
                                        <textarea id="detail" class="form-control" name="detail" placeholder="Product Detail" style="height:150px">{{ old('detail') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i
                                            class="fa-solid fa-floppy-disk"></i> Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
