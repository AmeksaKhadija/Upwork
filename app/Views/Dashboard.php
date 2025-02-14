

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord | FreeLanceHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: white;
            border-right: 2px solid rgba(0, 0, 0, 0.05);
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: -1px;
            background: var(--gradient-primary);
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            margin-bottom: 2rem;
        }

        .nav-menu {
            list-style: none;
            flex: 1;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 1rem;
            color: #64748b;
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link i {
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--gradient-primary);
            color: white;
        }

        .user-profile {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-top: 2px solid rgba(0, 0, 0, 0.05);
            margin-top: auto;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 1rem;
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 600;
            color: var(--dark);
        }

        .user-role {
            font-size: 0.9rem;
            color: #64748b;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
        }
        .user-menu-item.logout {
            color: var(--error);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .stat-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .stat-icon.purple {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary);
        }

        .stat-icon.blue {
            background: rgba(59, 130, 246, 0.1);
            color: var(--secondary);
        }

        .stat-icon.green {
            background: rgba(34, 197, 94, 0.1);
            color: var(--success);
        }

        .stat-icon.yellow {
            background: rgba(234, 179, 8, 0.1);
            color: var(--warning);
        }

        .stat-title {
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
        }

        .stat-change {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .stat-change.positive {
            color: var(--success);
        }

        .stat-change.negative {
            color: var(--error);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--dark);
        }

        .projects-list {
            list-style: none;
        }

        .project-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .project-info {
            flex: 1;
        }

        .project-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .project-subtitle {
            font-size: 0.9rem;
            color: #64748b;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-progress {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary);
        }

        .badge-completed {
            background: rgba(34, 197, 94, 0.1);
            color: var(--success);
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            font-size: 0.9rem;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .activity-time {
            font-size: 0.8rem;
            color: #64748b;
        }
     

        .action-btn {
            padding: 0.5rem;
            border-radius: 8px;
            color: #64748b;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: #f8fafc;
            color: var(--primary);
        }
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .add-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .add-button:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #64748b;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
        }

        .form-submit {
            width: 100%;
            padding: 0.75rem;
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            background-color: white;
        }

        .form-select[multiple] {
            padding: 8px;
            width: 100%;
            min-height: 120px;
            border: 1px solid #ddd;
            border-radius: 4px;
            outline: none;
        }

        .form-select[multiple] option {
            padding: 8px;
            margin: 2px 0;
            border-radius: 3px;
            cursor: pointer;
        }

        /* .form-select[multiple] option:hover {
            background-color: #f0f0f0;
        }

        .form-select[multiple] option:checked {
            background-color: #e3f2fd;
            color: #1976d2;
        } */




        .logout-button {
            margin-top: auto;
            margin-bottom: 2rem;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--error);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
            border: none;
            background: none;
            cursor: pointer;
            width: 100%;
            text-align: left;
        }

        .logout-button:hover {
            background: var(--error);
            color: white;
        }

        .logout-button i {
            width: 20px;
            text-align: center;
        }

        @media (max-width: 1024px) {
            .logout-button {
                padding: 1rem;
                justify-content: center;
            }

            .logout-button span {
                display: none;
            }
        }

        @media (max-width: 1024px) {
            .sidebar {
                width: 80px;
                padding: 1rem 0;
            }

            .logo {
                font-size: 1.5rem;
                padding: 0 1rem;
            }

            .menu-item span {
                display: none;
            }

            .menu-item {
                padding: 1rem;
                justify-content: center;
            }

            .main-content {
                margin-left: 80px;
            }
        }


        /*  */

        @media (max-width: 1024px) {
            .sidebar {
                width: 80px;
                padding: 1.5rem 0.75rem;
            }

            .logo,
            .nav-link span,
            .user-info {
                display: none;
            }

            .nav-link {
                justify-content: center;
            }

            .nav-link i {
                margin: 0;
            }

            .main-content {
                margin-left: 80px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
<aside class="sidebar">
        <a href="/" class="logo">FreeLanceHub</a>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="/" class="nav-link active">
                    <i class="fas fa-th-large"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item">
            <?php 
            if($_SESSION["role"]->getId()!=1){
            ?>
                <a href="/Projet" class="nav-link">
                    <i class="fas fa-briefcase"></i>
                    <span>Projets</span>
                </a>

                <a href="/Categorie" class="nav-link">
                <i class="fas fa-bookmark"></i>
                <span>Categories</span>
               </a>

                <a href="/Tags" class="nav-link">
                <i class="fas fa-tags"></i>
                <span>Tags</span>
               </a>
                <?php }?>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Freelances</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-comments"></i>
                    <span>Messages</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-wallet"></i>
                    <span>Paiements</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres</span>
                </a>
            </li>
            <?php 
            if($_SESSION["role"]->getId()===3){
            ?>
            <li class="nav-item">
                <a href="/User/ShowProfile" class="nav-link">
                    <i class="fa-solid fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <?php }?>
        </ul>
        <div class="user-profile">
        
          

            <div class="avatar">JD</div>
            <div class="user-info">
                <div class="user-name"><?= $user->getNom()?></div>
                <div class="user-name"><?= $user->getPrenom()?></div>
                <div class="user-role"><?=$user->getRole()->getRoleName() ?></div>
            </div>
        </div>
     
        
        <a href="/auth/logout" class="user-menu-item logout">
            <i class="fas fa-sign-out-alt"></i>

            Déconnexion
        </a>
    </aside> 

<!-- 

    <main class="main-content">
        <header class="header">
            <h1 class="page-title">Tableau de bord</h1>
        </header> 

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon purple">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div>
                        <div class="stat-title">Projets actifs</div>
                        <div class="stat-value">45</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            12% ce mois
                        </div>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon blue">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <div class="stat-title">Freelances</div>
                        <div class="stat-value">873</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            8% ce mois
                        </div>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <div class="stat-title">Projets terminés</div>
                        <div class="stat-value">284</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            24% ce mois
                        </div>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon yellow">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div>
                        <div class="stat-title">Revenus</div>
                        <div class="stat-value">76.5K€</div>
                        <div class="stat-change negative">
                            <i class="fas fa-arrow-down"></i>
                            3% ce mois
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main> -->
</body>
</html>