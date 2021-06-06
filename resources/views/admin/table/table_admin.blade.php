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
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Ngày tạo</th>
                                    <th>Quyền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Ngày tạo</th>
                                    <th>Quyền</th>
                                    <th>Xóa</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($admin as $key=>$value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td><a href="tel:{{ $value->phone }}">{{ $value->phone }}</a></td>
                                        <td>{{ $value->updated_at->format('m:H d/m/Y') }}</td>
                                        <td><span style="background: #4c5eff; color: black;">#admin</span></td>
                                        <td>
                                            <a href="{{ route('DeleteAdmin', ['id' => $value->id]) }}" class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $admin->links() }}
                        </table>
                        <form action="{{ route('AddAdmin') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số điện thoại</label>
                                <input type="tel" name="phone" class="form-control" id="exampleInputPassword1" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="">
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
