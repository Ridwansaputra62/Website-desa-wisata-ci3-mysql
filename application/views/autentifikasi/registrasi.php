<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin | Desa Wisata Sedari</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body, html {
            height: 100%;
            margin: 0;
            background: linear-gradient(135deg, #1d3557, #457b9d, #a8dadc);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-login {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            padding: 40px;
            width: 100%;
            max-width: 480px;
            animation: fadeIn 1s ease forwards;
            color: #fff;
        }

        .form-control {
            border-radius: 10px;
        }

        .form-group label {
            font-weight: 500;
        }

        .btn-login {
            border-radius: 10px;
            font-weight: 600;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .input-group-text {
            background-color: #f1f1f1;
        }

        .text-danger {
            font-size: 13px;
        }

        .form-title {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="card-login">
            <div class="form-title">
                <i class="fas fa-user-plus"></i> Registrasi Admin
            </div>

            <form action="<?= base_url('auth/registrasi'); ?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama Wisata</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Wisata" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <div class="input-group">
                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Masukkan Password">
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePassword('password1', 'eye1')">
                                <i class="fa fa-eye" id="eye1"></i>
                            </span>
                        </div>
                    </div>
                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password">
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePassword('password2', 'eye2')">
                                <i class="fa fa-eye" id="eye2"></i>
                            </span>
                        </div>
                    </div>
                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-info btn-block btn-login">Daftar</button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, eyeId) {
            const input = document.getElementById(fieldId);
            const eye = document.getElementById(eyeId);
            if (input.type === 'password') {
                input.type = 'text';
                eye.classList.remove('fa-eye');
                eye.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                eye.classList.remove('fa-eye-slash');
                eye.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
