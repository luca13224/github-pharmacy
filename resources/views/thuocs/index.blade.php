@extends('layouts.app')

@section('content')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h2><b>Quản lý Thuốc</b></h2>
					</div>
					
					<div class="col-sm-6 text-right">
						<a href="{{ route('thuoc.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Thêm thuốc mới</span></a>
												
					</div>
				</div>
			</div>
			@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
    <table class="table">
        <thead>
            <tr>
                <th>Mã Thuốc</th>
                <th>Tên Thuốc</th>
                <th>Thương Hiệu</th>
                <th>Liều Lượng</th>
                <th>Số Lượng Tồn</th>
                <th>Giá Nhập</th>
                <th>Giá Bán</th>
                <th>HSD</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($thuocs as $thuoc)
            <tr>
                <td>{{ $thuoc->ma_thuoc }}</td>
                <td>{{ $thuoc->ten_thuoc }}</td>
                <td>{{ $thuoc->thuong_hieu }}</td>
                <td>{{ $thuoc->lieu_luong }}</td>
                <td>{{ $thuoc->so_luong_ton }}</td>
                <td>{{ $thuoc->gia_nhap }}</td>
                <td>{{ $thuoc->gia_ban }}</td>
                <td>{{ $thuoc->HSD }}</td>
                <td>
				<a href="{{ route('thuoc.edit', $thuoc->ma_thuoc) }}" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
				<form action="{{ route('thuoc.destroy', $thuoc->ma_thuoc) }}" method="POST" style="display:inline-block;">
    				@csrf
    				@method('DELETE')
    				<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
				</form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
	<div class="d-flex justify-content-center">
				{{ $thuocs->links('pagination::bootstrap-4') }}
			</div>
</div>
@endsection