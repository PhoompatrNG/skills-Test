<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กรอกข้อมูลผู้ใช้</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="container">
        <div class="card shadow mx-auto" style="max-width: 700px;">
            <div class="card-header bg-success text-white text-center">
                <h4>กรอกข้อมูลผู้ใช้</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ชื่อ:</label>
                            <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">นามสกุล:</label>
                            <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">วัน เดือน ปี เกิด:</label>
                            <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ old('birthdate') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">รหัสประจำตัวประชาชน:</label>
                            <input type="text" name="idcard" class="form-control" maxlength="13" value="{{ old('idcard') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ที่อยู่:</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">โทรศัพท์:</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">อายุ:</label>
                        <input type="number" id="age" name="age" class="form-control" value="{{ old('age') }}" required readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">ลงทะเบียน</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login.form') }}">เข้าสู่ระบบ</a>
                </div>
                @include('error')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('birthdate').addEventListener('input', function() {
            var birthdate = this.value;
            var age = calculateAge(birthdate);
            document.getElementById('age').value = age;
        });

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
</body>
</html>
