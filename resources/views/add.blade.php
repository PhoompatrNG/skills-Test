
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
        <form action="{{ route('customer.store') }}" method="POST">
            @csrf
            <input type="hidden" name="CustomerID" value="{{ $Customer ? $Customer->CustomerID : '' }}">
            <div class="form-group">
                <label for="prefix">Prefix:</label>
                <select name="prefix" class="form-control" required>
                    <option value="">Select Prefix</option>
                    <option value="Mr." {{ $Customer && $Customer->Prefix == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                    <option value="Ms." {{ $Customer && $Customer->Prefix == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                    <option value="Mrs." {{ $Customer && $Customer->Prefix == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                    <option value="Dr." {{ $Customer && $Customer->Prefix == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                </select>
            </div>

            <div class="form-group">
                <input type="text" name="idcard" class="form-control" placeholder="ID Card" required value="{{$Customer ? $Customer->IDCard : null}}">
            </div>
            <div class="form-group">
                <input type="text" name="f_name" class="form-control" placeholder="First Name" required value="{{$Customer ? $Customer->FName : null}}">
            </div>

            <div class="form-group">
                <input type="text" name="l_name" class="form-control" placeholder="Last Name" required value="{{$Customer ? $Customer->LName : null}}">
            </div>

            <div class="form-group">
                <input type="text" name="address" class="form-control" placeholder="Address" required value="{{$Customer ? $Customer->Address : null}}">
            </div>

            <div class="form-group">
                <select name="gender" class="form-control" required>
                    <option value="M" {{ $Customer && $Customer->Gender == 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ $Customer && $Customer->Gender == 'F' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <input type="date" name="birth_date" class="form-control" required value="{{ $Customer ? $Customer->BirthDate : '' }}">
            </div>

            <div class="form-group">
                <select name="customer_size" class="form-control" required>
                    <option value="S" {{ $Customer && $Customer->CustomerSize == 'S' ? 'selected' : '' }}>Small</option>
                    <option value="M" {{ $Customer && $Customer->CustomerSize == 'M' ? 'selected' : '' }}>Medium</option>
                    <option value="B" {{ $Customer && $Customer->CustomerSize == 'B' ? 'selected' : '' }}>Big</option>
                </select>
            </div>

            <div class="form-group">
                <select name="customer_grade" class="form-control" required>
                    <option value="A" {{ $Customer && $Customer->CustomerGrade == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $Customer && $Customer->CustomerGrade == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ $Customer && $Customer->CustomerGrade == 'C' ? 'selected' : '' }}>C</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">เพิ่มลูกค้า</button>
            </div>
        </form>
    </div>
</body>
</html>
@endauth
