@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- Google Font -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            width: 100%;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box; /* ป้องกันไม่ให้เกินขอบ */
        }

        .form-group select:focus,
        .form-group input:focus {
            border-color: #4CAF50;
            background-color: #fff;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .form-group button:active {
            background-color: #3e8e41;
        }

        .form-group .form-control {
            padding: 12px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group select {
            background-color: #ffffff;
            border-color: #ddd;
            color: #333;
        }

        .form-group input[type="date"] {
            background-color: #ffffff;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>{{ $Customer ? 'Update Customer' : 'Add New Customer' }}</h2>
        <form action="{{ route('customer.store') }}" method="POST">
            @csrf
            <input type="hidden" name="CustomerID" value="{{ $Customer ? $Customer->CustomerID : '' }}">

            <!-- Prefix Field -->
            <div class="form-group">
                <label for="prefix">Prefix:</label>
                <select name="prefix" required>
                    <option value="">Select Prefix</option>
                    <option value="Mr." {{ $Customer && $Customer->Prefix == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                    <option value="Ms." {{ $Customer && $Customer->Prefix == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                    <option value="Mrs." {{ $Customer && $Customer->Prefix == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                    <option value="Dr." {{ $Customer && $Customer->Prefix == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                </select>
            </div>

            <!-- ID Card -->
            <div class="form-group">
                <label for="idcard">ID Card:</label>
                <input type="number" name="idcard" placeholder="ID Card" required value="{{ $Customer ? $Customer->IDCard : '' }}">
            </div>

            <!-- First Name -->
            <div class="form-group">
                <label for="f_name">First Name:</label>
                <input type="text" name="f_name" placeholder="First Name" required value="{{ $Customer ? $Customer->FName : '' }}">
            </div>

            <!-- Last Name -->
            <div class="form-group">
                <label for="l_name">Last Name:</label>
                <input type="text" name="l_name" placeholder="Last Name" required value="{{ $Customer ? $Customer->LName : '' }}">
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" placeholder="Address" required value="{{ $Customer ? $Customer->Address : '' }}">
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" required>
                    <option value="M" {{ $Customer && $Customer->Gender == 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ $Customer && $Customer->Gender == 'F' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <!-- Birth Date -->
            <div class="form-group">
                <label for="birth_date">Birth Date:</label>
                <input type="date" name="birth_date" required value="{{ $Customer ? $Customer->BirthDate : '' }}">
            </div>

            <!-- Customer Size -->
            <div class="form-group">
                <label for="customer_size">Customer Size:</label>
                <select name="customer_size" required>
                    <option value="S" {{ $Customer && $Customer->CustomerSize == 'S' ? 'selected' : '' }}>Small</option>
                    <option value="M" {{ $Customer && $Customer->CustomerSize == 'M' ? 'selected' : '' }}>Medium</option>
                    <option value="B" {{ $Customer && $Customer->CustomerSize == 'B' ? 'selected' : '' }}>Big</option>
                </select>
            </div>

            <!-- Customer Grade -->
            <div class="form-group">
                <label for="customer_grade">Customer Grade:</label>
                <select name="customer_grade" required>
                    <option value="A" {{ $Customer && $Customer->CustomerGrade == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $Customer && $Customer->CustomerGrade == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ $Customer && $Customer->CustomerGrade == 'C' ? 'selected' : '' }}>C</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit">บันทึก</button>
            </div>
        </form>
    </div>
</body>
</html>
@endauth
