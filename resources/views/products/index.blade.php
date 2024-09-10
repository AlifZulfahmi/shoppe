@extends('layouts.adminApp')

@section('content')
<div class="container-fluid">
    <!-- Card Wrapper -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ecommerce /</span> Product</h4>
            <!-- Card Header -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Products Management</h2>
                    @can('product-create')
                    <a class="btn btn-success" href="{{ route('products.create') }}"><i class="fa fa-plus"></i> Create
                        New
                        Product</a>
                    @endcan
                </div>
            </div>
            <!-- Session Success Message -->
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <!-- Card Body with Data Table -->
            <div class="card">
                <div class="card-body">
                    <table id="productsTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th width="100px">No</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->detail }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}"><i
                                            class="fa-solid fa-list"></i> Show</a>
                                    @can('product-edit')
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('products.edit', $product->id) }}"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    @endcan
                                    @can('product-delete')
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pagination Links -->
{!! $products->links('pagination::bootstrap-5') !!}
@endsection

@section('scripts')
<!-- Include DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#productsTable').DataTable({
        "searching": true, // Enable search
        "paging": true, // Enable pagination
        "info": true // Show info text
    });
});
</script>
@endsection