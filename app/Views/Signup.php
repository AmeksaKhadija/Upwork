<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #3b82f6;
            --accent: #8b5cf6;
            --dark: #1e293b;
            --light: #f8fafc;
            --success: #22c55e;
            --warning: #eab308;
            --error: #ef4444;
            --gradient-primary: linear-gradient(135deg, #6366f1 0%, #3b82f6 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background: var(--light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            background: rgba(255, 255, 255, 0.98);
            padding: 1rem 0;
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: -1px;
            background: var(--gradient-primary);
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
        }

        .signup-container {
            max-width: 500px;
            margin: 4rem auto;
            padding: 2.5rem;
            background: white;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            animation: slide-up 0.8s ease-out;
        }

        @keyframes slide-up {
            from { 
                opacity: 0;
                transform: translateY(50px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .form-header h1 {
            font-size: 2.2rem;
            color: var(--dark);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .form-header p {
            color: #64748b;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 1.8rem;
        }

        label {
            display: block;
            margin-bottom: 0.6rem;
            color: var(--dark);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }

        input, select {
            width: 100%;
            padding: 1.1rem;
            padding-left: 3rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8fafc;
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            background-color: white;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
        }

        .input-group.select-group::after {
            content: '\f107';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            pointer-events: none;
        }

        .password-requirements {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #64748b;
            padding-left: 0.5rem;
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .requirement i {
            font-size: 0.9rem;
            color: var(--success);
        }

        .btn-submit {
            width: 100%;
            padding: 1.1rem;
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.7rem;
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.25);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 2.2rem 0;
            color: #64748b;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider span {
            padding: 0 1.2rem;
            font-size: 0.95rem;
        }

        .social-signup {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.7rem;
            padding: 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-weight: 600;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s ease;
            background-color: white;
        }

        .social-btn:hover {
            background: #f8fafc;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .login-link {
            text-align: center;
            margin-top: 2.2rem;
            color: #64748b;
            font-size: 1rem;
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .signup-container {
                margin: 2rem;
                padding: 1.8rem;
            }

            .form-header h1 {
                font-size: 1.8rem;
            }

            .form-header p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="/Home" class="logo">Upwork</a>
        </div>
    </nav>

    <div class="signup-container">
        <div class="form-header">
            <h1>Créez votre compte</h1>
            <p>Rejoignez notre communauté</p>
        </div>

        <form action="./Signup" method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>
                </div>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Adresse email</label>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="role">Rôle</label>
                <div class="input-group select-group">
                    <i class="fas fa-user-graduate"></i>
                    <select id="role" name="role" required>
                        <option value="" disabled selected>Sélectionnez votre rôle</option>
                        <option value="client">Client</option>
                        <option value="freelancer">Freelancer</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Créez votre mot de passe" required>
                </div>
                
                <div class="password-requirements">
                    <div class="requirement">
                        <i class="fas fa-check-circle"></i>
                        <span>Minimum 8 caractères</span>
                    </div>
                    <div class="requirement">
                        <i class="fas fa-check-circle"></i>
                        <span>Au moins une majuscule</span>
                    </div>
                    <div class="requirement">
                        <i class="fas fa-check-circle"></i>
                        <span>Au moins un chiffre</span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit" name="submit" value="signup">
                <i class="fas fa-user-plus"></i>
                Créer mon compte
            </button>

            <div class="divider">
                <span>ou inscrivez-vous avec</span>
            </div>

            <div class="social-signup">
                <a href="#" class="social-btn">
                    <i class="fab fa-google"></i>
                    Google
                </a>
                <a href="#" class="social-btn">
                    <i class="fab fa-facebook"></i>
                    Facebook
                </a>
            </div>

            <div class="login-link">
                Déjà membre ? <a href="/Auth">Connectez-vous</a>
            </div>
        </form>
    </div>
</body>
</html>