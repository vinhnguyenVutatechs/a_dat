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
            <h1 class="h3 mb-2 text-gray-800">Quản lý tài khoản Admin</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản Admin</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.errors.alert')
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tên danh mục</th>
                                    <th>Đường liên kết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tên danh mục</th>
                                    <th>Đường liên kết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($categories as $value)
                                    <tr>
                                        <form action="{{ route('EditCategories', $value->id) }}" method="post">
                                            @csrf
                                            <td><input name="edit_categories" class="w-100" style="padding: 3px; border: 0px;" type="text" value="{{ $value->name }}"></td>
                                            <td><input name="edit_slug" class="w-100" style="padding: 3px; border: 0px;" type="text" value="{{ $value->slug }}"></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Sửa</button>
                                            </td>
                                        </form>
                                        <td>
                                            <a href="{{ route('DeleteCategories', ['id' => $value->id]) }}" class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $categories->links() }}
                        </table>
                        <form action="{{ route('AddCategories') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục</label>
                                <input type="text" name="categories" class="form-control" id="exampleInputEmail1" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Liên kết</label>
                                <input type="text" name="slug" class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
@include('admin.layout.footer')
