<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <h2><i class="fas fa-car"></i> Jalanin</h2>
                <p>Sistem Manajemen Sewa Kendaraan</p>
            </div>
            
            <div class="login-body">
                <?php
                $flash = $this->getFlash();
                if($flash):
                ?>
                <div class="alert alert-<?= $flash['type'] ?>">
                    <i class="fas fa-<?= $flash['type'] == 'success' ? 'check-circle' : 'exclamation-circle' ?>"></i>
                    <?= $flash['message'] ?>
                </div>
                <?php endif; ?>
                
                <form action="<?= BASE_URL ?>auth/login" method="POST">
                    <div class="form-group">
                        <label for="username" class="form-label">
                            <i class="fas fa-user"></i> Username
                        </label>
                        <input type="text" 
                               id="username" 
                               name="username" 
                               class="form-control" 
                               placeholder="Masukkan username" 
                               required 
                               autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Password
                        </label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-control" 
                               placeholder="Masukkan password" 
                               required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>
                
                <div style="margin-top: 25px; text-align: center; padding-top: 20px; border-top: 1px solid #e5e7eb;">
                    <p style="font-size: 13px; color: #6b7280; margin-bottom: 10px;">Demo Account:</p>
                    <div style="font-size: 12px; color: #9ca3af;">
                        <p style="margin: 5px 0;">Admin: <strong>admin / password</strong></p>
                        <p style="margin: 5px 0;">User: <strong>user1 / password</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>