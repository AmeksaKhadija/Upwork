<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeLanceHub - Trouvez les meilleurs freelances</title>
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
        }

        nav {
            background: rgba(255, 255, 255, 0.98);
            padding: 1rem 0;
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
            position: fixed;
            width: 100%;
            z-index: 1000;
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

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .btn-nav {
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login {
            color: var(--primary);
            border: 2px solid var(--primary);
            background: transparent;
        }

        .btn-signup {
            background: var(--gradient-primary);
            color: white;
            border: none;
        }

        .hero {
            padding-top: 8rem;
            padding-bottom: 4rem;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(59, 130, 246, 0.1) 100%);
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--dark);
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-content p {
            font-size: 1.2rem;
            color: #64748b;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn-hero {
            padding: 1.2rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            border: none;
        }

        .btn-secondary {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .hero-image {
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .categories {
            padding: 6rem 0;
        }

        .categories-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .section-header p {
            color: #64748b;
            font-size: 1.1rem;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .category-card {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .category-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .category-card h3 {
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .category-card p {
            color: #64748b;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="/" class="logo">FreeLanceHub</a>
            <div class="nav-links">
                <a href="#categories">Catégories</a>
                <a href="#talents">Talents</a>
                <a href="#entreprises">Entreprises</a>
                <a href="/auth" class="btn-nav btn-login">Connexion</a>
                <a href="/auth/signup" class="btn-nav btn-signup">Inscription</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Trouvez les meilleurs talents freelance</h1>
                <p>Accédez à un réseau mondial de professionnels qualifiés et indépendants prêts à concrétiser vos projets.</p>
                <div class="hero-buttons">
                    <a href="./Signup" class="btn-hero btn-primary">Commencer maintenant</a>
                    <a href="#talents" class="btn-hero btn-secondary">Voir les talents</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="/api/placeholder/600/400" alt="Freelance collaboration">
            </div>
        </div>
    </section>

    <section class="categories" id="categories">
        <div class="categories-container">
            <div class="section-header">
                <h2>Explorez nos catégories</h2>
                <p>Découvrez les domaines d'expertise de nos freelances</p>
            </div>
            <div class="category-grid">
                <div class="category-card">
                    <i class="fas fa-code"></i>
                    <h3>Développement Web</h3>
                    <p>Sites web, applications et solutions techniques</p>
                </div>
                <div class="category-card">
                    <i class="fas fa-paint-brush"></i>
                    <h3>Design & Créatif</h3>
                    <p>Logo, UI/UX, et design graphique</p>
                </div>
                <div class="category-card">
                    <i class="fas fa-bullhorn"></i>
                    <h3>Marketing Digital</h3>
                    <p>SEO, réseaux sociaux et content marketing</p>
                </div>
                <div class="category-card">
                    <i class="fas fa-pen"></i>
                    <h3>Rédaction & Traduction</h3>
                    <p>Contenu web, articles et traductions</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>