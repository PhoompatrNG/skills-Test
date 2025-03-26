@auth
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มลูกค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4>{{ $Customer ? 'แก้ไขข้อมูลลูกค้า' : 'เพิ่มลูกค้าใหม่' }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="CustomerID" value="{{ $Customer ? $Customer->CustomerID : '' }}">

                    <div class="row">
                        <!-- คำนำหน้า -->
                        <div class="col-md-6 mb-3">
                            <label for="prefix" class="form-label">คำนำหน้า:</label>
                            <select name="prefix" class="form-select" required>
                                <option value="">-- เลือกคำนำหน้า --</option>
                                <option value="นาย" {{ $Customer && $Customer->Prefix == 'นาย' ? 'selected' : '' }}>นาย</option>
                                <option value="นาง" {{ $Customer && $Customer->Prefix == 'นาง' ? 'selected' : '' }}>นาง</option>
                                <option value="นางสาว" {{ $Customer && $Customer->Prefix == 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
                            </select>
                        </div>

                        <!-- เลขบัตรประชาชน -->
                        <div class="col-md-6 mb-3">
                            <label for="idcard" class="form-label">เลขบัตรประชาชน:</label>
                            <input type="text" name="idcard" class="form-control" maxlength="13" placeholder="กรอกเลขบัตรประชาชน" required value="{{ $Customer ? $Customer->IDCard : '' }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- ชื่อ -->
                        <div class="col-md-6 mb-3">
                            <label for="f_name" class="form-label">ชื่อ:</label>
                            <input type="text" name="f_name" class="form-control" placeholder="กรอกชื่อ" required value="{{ $Customer ? $Customer->FName : '' }}">
                        </div>

                        <!-- นามสกุล -->
                        <div class="col-md-6 mb-3">
                            <label for="l_name" class="form-label">นามสกุล:</label>
                            <input type="text" name="l_name" class="form-control" placeholder="กรอกนามสกุล" required value="{{ $Customer ? $Customer->LName : '' }}">
                        </div>
                    </div>

                    <!-- ที่อยู่ -->
                    <div class="mb-3">
                        <label for="address" class="form-label">ที่อยู่:</label>
                        <input type="text" name="address" class="form-control" placeholder="กรอกที่อยู่" required value="{{ $Customer ? $Customer->Address : '' }}">
                    </div>

                    <div class="row">
                        <!-- เพศ -->
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">เพศ:</label>
                            <select name="gender" class="form-select" required>
                                <option value="M" {{ $Customer && $Customer->Gender == 'M' ? 'selected' : '' }}>ชาย</option>
                                <option value="F" {{ $Customer && $Customer->Gender == 'F' ? 'selected' : '' }}>หญิง</option>
                            </select>
                        </div>

                        <!-- วันเกิด -->
                        <div class="col-md-6 mb-3">
                            <label for="birth_date" class="form-label">วันเกิด:</label>
                            <input type="date" name="birth_date" class="form-control" required value="{{ $Customer ? $Customer->BirthDate : '' }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- ขนาดลูกค้า -->
                        <div class="col-md-6 mb-3">
                            <label for="customer_size" class="form-label">ขนาดลูกค้า:</label>
                            <select name="customer_size" class="form-select" required>
                                <option value="S" {{ $Customer && $Customer->CustomerSize == 'S' ? 'selected' : '' }}>เล็ก</option>
                                <option value="M" {{ $Customer && $Customer->CustomerSize == 'M' ? 'selected' : '' }}>กลาง</option>
                                <option value="B" {{ $Customer && $Customer->CustomerSize == 'B' ? 'selected' : '' }}>ใหญ่</option>
                            </select>
                        </div>

                        <!-- เกรดลูกค้า -->
                        <div class="col-md-6 mb-3">
                            <label for="customer_grade" class="form-label">เกรดลูกค้า:</label>
                            <select name="customer_grade" class="form-select" required>
                                <option value="A" {{ $Customer && $Customer->CustomerGrade == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $Customer && $Customer->CustomerGrade == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $Customer && $Customer->CustomerGrade == 'C' ? 'selected' : '' }}>C</option>
                            </select>
                        </div>
                    </div>

                    <!-- ปุ่มบันทึก -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success w-100">บันทึกข้อมูล</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endauth
