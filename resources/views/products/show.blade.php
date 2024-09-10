@extends('layouts.adminApp')

@section('content')
    <div class="container-fluid">
        <!-- Card Wrapper -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Show Product</h2>
                    <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i>
                        Back</a>
                </div>

                <!-- Product Details Card -->
                <div class="card mt-4"> <!-- Added mt-4 class for top margin -->
                    <div class="card-header">
                        <h4 class="card-title">Product Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"><strong>Name:</strong></label>
                                    <p>{{ $product->name }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"><strong>Details:</strong></label>
                                    <p>{{ $product->detail }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
