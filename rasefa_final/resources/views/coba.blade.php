<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Inter', Serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .login-container h2 {
            text-align: center;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin: 10px 0;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* Meratakan posisi input */
        .form-group input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 80%; /* Mengisi lebar container */
        }

        .form-group button {
            background-color: #DB7093;
            color: #FFFFFF;
            border: none;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            text-decoration: none;
            color: #DB7093;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="ds-logo"><span>R</span>asefa</h2>
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="nama">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="button" onclick="redirectToPage()">Login</button>
            </div>
        </form>
        <div class="register-link">
            <p>Belum punya akun? <a href="{{ asset('registrasi') }}">Daftar di sini</a></p>
        </div>
    </div>

    <script>
        function redirectToPage() {
            // Ambil nilai username dari input
            var username = document.getElementById('username').value;

            // Periksa username dan arahkan sesuai kebijakan yang diinginkan
            if (username === 'seppyy') {
                window.location.href = 'home'; // Arahkan ke halaman 'home' untuk username 'seppy'
            } else if (username === 'jnt') {
                window.location.href = '/'; // Arahkan ke halaman utama untuk username 'jnt'
            } else if (username === 'pledis ent ') {
                window.location.href = 'app'; // Arahkan ke halaman 'app' untuk username 'toko'
            } else {
                alert('Username tidak valid');
            }
        }
    </script>
</body>
</html>
