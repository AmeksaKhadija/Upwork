<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord | FreeLanceHub</title>
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
            z-index: 1000;
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

        .nav-link:hover, .nav-link.active {
            background: var(--gradient-primary);
            color: white;
        }

        .user-profile {
            position: relative;
            padding: 1rem;
            border-top: 2px solid rgba(0, 0, 0, 0.05);
            margin-top: auto;
            cursor: pointer;
        }

        .user-profile:hover .user-menu {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .profile-main {
            display: flex;
            align-items: center;
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

        .user-menu {
            display: none;
            position: absolute;
            bottom: 100%;
            left: 0;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 0.5rem;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .user-menu-item {
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.2s ease;
            border-radius: 8px;
            margin: 0.3rem;
        }

        .user-menu-item:hover {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary);
        }

        .user-menu-item i {
            margin-right: 0.8rem;
            width: 20px;
            text-align: center;
        }

        .user-menu-item.logout {
            color: var(--error);
        }

        .user-menu-item.logout:hover {
            background: rgba(239, 68, 68, 0.1);
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .welcome-header {
            margin-bottom: 2rem;
        }

        .welcome-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .welcome-subtitle {
            color: #64748b;
            font-size: 1.1rem;
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
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
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
            font-size: 1.5rem;
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

        .stat-info {
            flex: 1;
        }

        .stat-title {
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .stat-change {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            gap: 0.25rem;
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
            margin-top: 2rem;
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

        .card-action {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
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

        .project-item:last-child {
            border-bottom: none;
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

        .activity-item:last-child {
            border-bottom: none;
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

        @media (max-width: 1024px) {
            .sidebar {
                width: 80px;
                padding: 1.5rem 0.75rem;
            }

            .logo, .nav-link span, .user-info {
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

            .user-menu {
                left: 100%;
                bottom: 0;
                margin-left: 0.5rem;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .welcome-title {
                font-size: 1.5rem;
            }

            .welcome-subtitle {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <a href="/" class="logo">FreeLanceHub</a>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="fas fa-th-large"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-briefcase"></i>
                    <span>Projets</span>
                </a>
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
        </ul>
        <a href="/Auth/logout" class="logout-button">
            <i class="fas fa-sign-out-alt"></i>
            <span>Déconnexion</span>
        </a>

                