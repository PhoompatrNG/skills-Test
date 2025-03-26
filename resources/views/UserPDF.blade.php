<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UserDATA_{{$users->firstname}}</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            src: url('fonts/THSarabunNew.ttf') format('truetype');
            font-weight: normal;
        }

        @font-face {
            font-family: 'THSarabunNew-Bold';
            src: url('fonts/THSarabunNew-Bold.ttf') format('truetype');
            font-weight: bold;
        }

        body {
            font-family: 'THSarabunNew', sans-serif;
        }
        h2 {
            font-family: 'THSarabunNew', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
            font-family: 'THSarabunNew', sans-serif; /* เพิ่มในส่วนของ th และ td ด้วย */
        }

    </style>
</head>
<body>
    <table>
        <tr>
            <td>ชื่อ</td>
            <td>{{ $users->firstname }}</td>
            <td>นามสกุล</td>
            <td>{{ $users->lastname }}<</td>
        </tr>
        <tr>
            <td>วัน เดือน ปี เกิด</td>
            <td>{{ \Illuminate\Support\Carbon::parse($users->birthdate)->format('d/m/Y') }}</td>
            <td>รหัสประจำตัวประชาชน</td>
            <td>{{ $users->idcard }}<</td>
        </tr>
        <tr>
            <td>ที่อยู่</td>
            <td>{{ $users->address }}<</td>
            <td>โทร.</td>
            <td>{{ $users->phone }}<</td>
        </tr>
        <tr>
            <td>อายุ</td>
            <td colspan="3">
                <?php
                    $birthdate = \Carbon\Carbon::parse($users->birthdate);
                    $currentDate = \Carbon\Carbon::now();
                    $diff = $birthdate->diff($currentDate);
                    echo $diff->y . ' ปี ' . $diff->m . ' เดือน ' . $diff->d . ' วัน';
                ?>
            </td>
        </tr>

    </table>
</body>
</html>
