<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logorasefa.png') }}" />
    <style>
        body {
            font-family: 'Sans', Serif;
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
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* CSS styling (sesuaikan sesuai kebutuhan) */
        /* ... */
    </style>
    <link rel="stylesheet" href="{{asset('style/main.css')}}">
</head>
<body>
    <div class="login-container">
        <h2 class="ds-logo"><span>R</span>asefa</h2>
        <form class="login-form" method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required placeholder="nama@contoh.com" value="{{ old('email') }}" autofocus>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required autofocus>
            </div>
            <div class="form-group">
                <button type="submit" >Login</button>
            </div>
        </form>
        <div class="register-link">
            <p>Belum punya akun? <a href="{{asset('role')}}">Daftar di sini</a></p>
        </div>
        @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success')}}
                    <button type="button" class="btn-close" data-bs-dissmis="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('LoginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('LoginError')}}
                    <button type="button" class="btn-close" data-bs-dissmis="alert" aria-label="Close"></button>
                </div>
            @endif
    </div>
</body>
</html>

