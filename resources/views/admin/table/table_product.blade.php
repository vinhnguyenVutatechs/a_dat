@include('admin.layout.menu')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        @include('admin.layout.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Phần quà</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách phần quà</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.errors.alert')
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tỷ lệ % xuất hiện</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tỷ lệ % xuất hiện</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($products as $key=>$value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <form action="{{ route('EditProduct', $value->id) }}" method="post">
                                            @csrf
                                            <td><input name="product" class="w-100" style="padding: 3px; border: 0px;" type="text" value="{{ $value->product }}"></td>
                                            <td><input name="ciento" class="w-100" style="padding: 3px; border: 0px;" type="text" value="{{ $value->ciento }}"></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Sửa</button>
                                            </td>
                                        </form>
                                        <td>
                                            <a href="{{ route('DeleteProduct', ['id' => $value->id]) }}" class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $products->links() }}
                        </table>
                        <hr>
                        <form action="{{ route('AddProduct') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phần quà</label>
                                <input type="text" name="product" class="form-control" id="exampleInputEmail1" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tỷ lệ %</label>
                                <input type="number" name="ciento" class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm phần quà</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
@include('admin.layout.footer')
