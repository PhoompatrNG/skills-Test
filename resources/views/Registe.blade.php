<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กรอกข้อมูลผู้ใช้</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .info-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 600px;
            max-width: 100%;
        }

        .info-form table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-form table, .info-form th, .info-form td {
            border: 1px solid #ccc;
        }

        .info-form th, .info-form td {
            padding: 10px;
            text-align: left;
        }

        .info-form th {
            background-color: #f7f7f7;
        }

        .info-form input[type="text"],
        .info-form input[type="date"],
        .info-form input[type="number"],
        .info-form input[type="password"] {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .info-form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px; /* เพิ่มระยะห่างด้านบน */
            display: block;
            width: 100%;
        }

        .info-form button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="info-form">
        <h2>กรอกข้อมูลผู้ใช้</h2>
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <th>ชื่อ</th>
                    <td><input type="text" name="firstname" value="{{ old('firstname') }}" required></td>
                    <th>นามสกุล</th>
                    <td><input type="text" name="lastname" value="{{ old('lastname') }}" required></td>
                </tr>
                <tr>
                    <th>วัน เดือน ปี เกิด</th>
                    <td><input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required></td>
                    <th>รหัสประจำตัวประชาชน</th>
                    <td><input type="text" name="idcard" value="{{ old('idcard') }}" required></td>
                </tr>
                <tr>
                    <th>ที่อยู่</th>
                    <td><input type="text" name="address" value="{{ old('address') }}" required></td>
                    <th>โทร.</th>
                    <td><input type="text" name="phone" value="{{ old('phone') }}" required></td>
                </tr>
                <tr>
                    <th>อายุ</th>
                    <td colspan="3"><input type="number" id="age" name="age" value="{{ old('age') }}" required readonly></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td colspan="3"><input type="text" name="username" value="{{ old('username') }}" required></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td colspan="3"><input type="password" name="password" required></td>
                </tr>
            </table>
            <button type="submit">Submit</button>
        </form>
        <a href="{{ route('login.form') }}" style="text-align: center">เข้าสู่ระบบ</a>
        @include('error')
    </div>
</body>
</html>
<script>
    // เมื่อมีการใส่ข้อมูลในช่อง input ของวันเกิด
    document.getElementById('birthdate').addEventListener('input', function() {
        var birthdate = this.value;
        var age = calculateAge(birthdate); // เรียกฟังก์ชัน calculateAge เพื่อคำนวณอายุ
        document.getElementById('age').value = age; // แสดงผลลัพธ์ที่ได้ใน input ช่องอายุ
    });

    // ฟังก์ชันคำนวณอายุ
    function calculateAge(birthdate) {
        var today = new Date();
        var birthDate = new Date(birthdate);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }
</script>
