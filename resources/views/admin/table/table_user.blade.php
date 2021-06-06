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
                    <h1 class="h3 mb-2 text-gray-800">Tài khoản</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản đã đăng nhập</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @include('admin.errors.alert')
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Mật Khẩu</th>
                                            <th>Trạng Thái</th>
                                            <th>Ngày đăng nhập</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Mật Khẩu</th>
                                            <th>Trạng Thái</th>
                                            <th>Ngày đăng nhập</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($users as $key=>$value)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td>{{ $value->password }}</td>
                                                <td>
                                                    <form action="{{ route('EditKhachHang', $value->id) }}" method="post">
                                                        @csrf
                                                        <select class="form-select" name="status" aria-label="Default select example">
                                                            @if ($value->status == 0)
                                                                <option value="0">Chưa đăng nhập</option>
                                                                <option value="1">Đã đăng nhập</option>
                                                                <option value="2">Tài khoản lỗi</option>
                                                            @endif
                                                            @if ($value->status == 1)
                                                                <option value="1">Đã đăng nhập</option>
                                                                <option value="0">Chưa đăng nhập</option>
                                                                <option value="2">Tài khoản lỗi</option>
                                                            @endif
                                                            @if ($value->status == 2)
                                                                <option value="2">Tài khoản lỗi</option>
                                                                <option value="0">Chưa đăng nhập</option>
                                                                <option value="1">Đã đăng nhập</option>
                                                            @endif
                                                        </select>
                                                </td>
                                                <td>{{ $value->updated_at->format('m:H d/m/Y') }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                                </td>
                                                </form>
                                                <td>
                                                    <a href="{{ route('DeleteUser', ['id' => $value->id]) }}" class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{ $users->links() }}
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
        @include('admin.layout.footer')
