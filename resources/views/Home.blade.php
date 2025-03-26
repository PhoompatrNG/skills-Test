@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>รายชื่อลูกค้า</h2>
        <a href="{{ route('add') }}" class="btn btn-primary">+ เพิ่มลูกค้า</a>
    </div>

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>ที่อยู่</th>
                <th>เพศ</th>
                <th>วันเกิด</th>
                <th>ขนาดลูกค้า</th>
                <th>เกรดลูกค้า</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Customer as $index => $customer)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $customer->Prefix }}</td>
                <td>{{ $customer->FName }}</td>
                <td>{{ $customer->LName }}</td>
                <td>{{ $customer->Address }}</td>
                <td>{{ $customer->Gender }}</td>
                <td>{{ $customer->BirthDate }}</td>
                <td>{{ $customer->CustomerSize }}</td>
                <td>{{ $customer->CustomerGrade }}</td>
                <td class="text-center">
                    <a href="{{ route('customer.edit', $customer->CustomerID) }}" class="btn btn-sm btn-warning">✏️ แก้ไข</a>
                    <form action="{{ route('customer.destroy', $customer->CustomerID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('คุณแน่ใจว่าจะลบลูกค้านี้?')">🗑️ ลบ</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endauth
