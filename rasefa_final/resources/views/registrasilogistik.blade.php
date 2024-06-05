<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Logistik</title>
    <link rel="stylesheet" href="{{asset('style/main.css')}}">
    <!-- Remixicon Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Remixicon Icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logorasefa.png') }}" />
    <style>
        /* CSS styling (customize as needed) */
        /* .rasefa {
            font-family: Lucida Handwriting, cursive;
            color: #DB7093;
        } */
        /* body {
            font-family: 'Helvetica', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        } */

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 100%; /* Menentukan lebar box form, dalam contoh ini 70% dari lebar layar */
            margin: 0 auto; /* Mengatur margin secara otomatis untuk meletakkan form di tengah */
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
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
        }

        /* Adjust input field width */
        .form-group input {
            padding: 10px;
            border: 1px solid #DB7093;
            border-radius: 3px;
            width: 50%; /* Fill the container's width */
        }

        .form-group button {
            background-color: #DB7093;
            color: #FFFFFF;
            border: none;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            width: 10%; /* Fill the container's width */
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            text-decoration: none;
            color: #DB7093;
        }
        
        .ds-logo span {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #DB7093;
            border-radius: 4px;
            color: #FFF;
            font-size: 22px;
            font-weight: 600;
            text-align: center;
            margin-right: 12px;
        }
        .ds-logo {
            text-transform: uppercase;
            font-size: 18px;
            letter-spacing: 3px;
            color: #000;
            display: flex;
            align-items: center;
        }
        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .login-container {
                width: 100%; /* Reduce container width for smaller screens */
            }

            .form-group input, .form-group button {
                width: 50%; /* Make input fields and button occupy the full width on smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="ds-header-inner">
        <h2 href="{{route('logistic.register')}}" class="ds-logo" style="margin-left:30px">
            <span>R</span>asefa
        </h2>
    </div> 
    <div class="ds-katalog">
        <div class="container">
            <h2 class="ds-heading">Registrasi Sebagai Logistik</h2>
            <form class="login-form" action="{{ route('logistic.register') }}" method="POST">
                @csrf <!-- Include CSRF token for form submissions -->

                <div class="form-group">
                    <label for="nama_logistik">Nama Logistik</label>
                    <input type="text" name="nama_logistik" id="nama_logistik" required>
                </div>

                <div class="form-group">
                    <label for="username_logistik">Username</label>
                    <input type="text" name="username_logistik" id="username_logistik" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <button type="submit" >Register</button>
                </div>
            </form>

            <div class="register-link">
                <a href="{{ route('login') }}">Sudah punya akun? Login di sini</a>
            </div>
        </div>
    </div>
</body>
</html>