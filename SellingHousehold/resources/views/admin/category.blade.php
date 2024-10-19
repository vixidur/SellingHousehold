<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
<div class="container">
    @include('admin.layouts.nav')
    @include('admin.layouts.headeradmin')
    <div class="maincategory">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TÊN DANH MỤC</th>
                    <th>HÀNH ĐỘNG</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Nồi</td>
                    <td><button class="edit-btn"><i class="fas fa-edit"></i></button><button class="delete-btn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Chảo</td>
                    <td><button class="edit-btn"><i class="fas fa-edit"></i></button><button class="delete-btn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>03</td>
                    <td>Cốc</td>
                    <td><button class="edit-btn"><i class="fas fa-edit"></i></button><button class="delete-btn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>04</td>
                    <td>Máy xay</td>
                    <td><button class="edit-btn"><i class="fas fa-edit"></i></button><button class="delete-btn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>05</td>
                    <td>Máy ép</td>
                    <td><button class="edit-btn"><i class="fas fa-edit"></i></button><button class="delete-btn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>06</td>
                    <td>Dụng cụ nhà bếp</td>
                    <td><button class="edit-btn"><i class="fas fa-edit"></i></button><button class="delete-btn"><i class="fas fa-trash"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>
@include('admin.layouts.footeradmin')

