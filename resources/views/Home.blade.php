
@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        /* CSS styles for your navigation bar */
        /* You can customize these styles according to your design */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px; /* กำหนดความกว้างสูงสุดของเนื้อหา */
            margin: 0 auto; /* ควบคุมการจัดวางกึ่งกลาง */
            padding: 20px; /* เพิ่มระยะห่างรอบขอบของเนื้อหา */
            background-color: #fff; /* สีพื้นหลังของพื้นที่เนื้อหา */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* เพิ่มเงาใต้เนื้อหา */
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }
        .navbar-right {
            float: right;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
            color: #333;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #e9e9e9;
            cursor: pointer;
        }
        /* เพิ่มสไตล์ให้กับปุ่ม */
        #btn {
            padding: 10px 20px; /* กำหนดขนาดของปุ่ม */
            background-color: #4CAF50; /* สีพื้นหลังของปุ่ม */
            color: white; /* สีของตัวอักษร */
            border: none; /* ลบเส้นขอบ */
            cursor: pointer; /* เปลี่ยนเป็นเคอร์เซอร์เมื่อชี้ไปที่ปุ่ม */
            border-radius: 5px; /* ทำเส้นขอบเป็นโค้ง */
            font-size: 16px; /* ขนาดตัวอักษร */
        }

        /* เพิ่มสไตล์เมื่อชี้เมาส์ไปที่ปุ่ม */
        #btn:hover {
            background-color: #45a049; /* เปลี่ยนสีพื้นหลังเมื่อชี้เมาส์ */
        }

    </style>
</head>
<body>


    <div class="container">
        <!-- ปุ่มสำหรับเพิ่มข้อมูล -->
        <a href="{{ route('add') }}" class="btn btn-primary mb-3">เพิ่มลูกค้า</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Prefix</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Birth Date</th>
                    <th>Customer Size</th>
                    <th>Customer Grade</th>
                    <th>Age</th>
                    <th>Actions</th> <!-- คอลัมน์สำหรับปุ่มแก้ไขและลบ -->
                </tr>
            </thead>
            <tbody>
                @foreach($Customer as $customer)
                <tr>
                    <td>{{ $customer->Prefix }}</td>
                    <td>{{ $customer->FName }}</td>
                    <td>{{ $customer->LName }}</td>
                    <td>{{ $customer->Address }}</td>
                    <td>{{ $customer->Gender }}</td>
                    <td>{{ $customer->BirthDate }}</td>
                    <td>{{ $customer->CustomerSize }}</td>
                    <td>{{ $customer->CustomerGrade }}</td>
                    <td>{{ $customer->Age }}</td>
                    <td>
                        <!-- ปุ่มแก้ไข -->
                        <a href="{{ route('customer.edit', $customer->CustomerID) }}" class="btn btn-warning btn-sm">แก้ไข</a>

                        <!-- ปุ่มลบ -->
                        <form action="{{ route('customer.destroy', $customer->CustomerID) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('คุณแน่ใจว่าจะลบลูกค้านี้?')">ลบ</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
@endauth
