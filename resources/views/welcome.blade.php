<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SA Rotan Sidoarjo</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700" rel="stylesheet" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            overflow: hidden;
            background: linear-gradient(135deg, #8B4513 0%, #D2691E 25%, #DEB887 50%, #F4A460 75%, #8B4513 100%);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating particles effect */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 1s; }
        .particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 2s; }
        .particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 3s; }
        .particle:nth-child(5) { width: 4px; height: 4px; left: 50%; animation-delay: 4s; }
        .particle:nth-child(6) { width: 6px; height: 6px; left: 60%; animation-delay: 0.5s; }
        .particle:nth-child(7) { width: 3px; height: 3px; left: 70%; animation-delay: 1.5s; }
        .particle:nth-child(8) { width: 5px; height: 5px; left: 80%; animation-delay: 2.5s; }
        .particle:nth-child(9) { width: 4px; height: 4px; left: 90%; animation-delay: 3.5s; }

        @keyframes float {
            0%, 100% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
        }

        .container {
            text-align: center;
            z-index: 10;
            position: relative;
        }

        .logo-container {
            margin-bottom: 2rem;
            animation: logoAppear 1.5s ease-out;
        }

        .logo {
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border: 3px solid rgba(255, 255, 255, 0.3);
            animation: logoFloat 3s ease-in-out infinite;
        }

        .logo-text {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #8B4513, #D2691E);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes logoAppear {
            0% { 
                transform: scale(0) rotate(-180deg);
                opacity: 0;
            }
            70% { 
                transform: scale(1.1) rotate(0deg);
            }
            100% { 
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .welcome-text {
            color: white;
            margin-bottom: 3rem;
            animation: textSlideUp 2s ease-out 0.5s both;
        }

        .welcome-text h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
        }

        .welcome-text p {
            font-size: 1.2rem;
            font-weight: 300;
            opacity: 0.9;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        @keyframes textSlideUp {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .loading-container {
            animation: loadingAppear 2.5s ease-out 1s both;
        }

        .loading-text {
            color: white;
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 1.5rem;
            opacity: 0.8;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .progress-bar {
            width: 300px;
            height: 6px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            margin: 0 auto;
            overflow: hidden;
            backdrop-filter: blur(5px);
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #fff, #f0f0f0, #fff);
            background-size: 200% 100%;
            border-radius: 10px;
            width: 0%;
            animation: progressFill 4s ease-in-out, progressShine 1.5s ease-in-out infinite;
        }

        @keyframes loadingAppear {
            0% {
                transform: translateY(30px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes progressFill {
            0% { width: 0%; }
            100% { width: 100%; }
        }

        @keyframes progressShine {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .fade-out {
            animation: fadeOut 1s ease-in-out forwards;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: scale(1);
            }
            100% {
                opacity: 0;
                transform: scale(1.1);
            }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .welcome-text h1 {
                font-size: 2.2rem;
            }
            
            .welcome-text p {
                font-size: 1rem;
            }
            
            .logo {
                width: 100px;
                height: 100px;
            }
            
            .logo-text {
                font-size: 2rem;
            }
            
            .progress-bar {
                width: 250px;
            }
        }

        @media (max-width: 480px) {
            .welcome-text h1 {
                font-size: 1.8rem;
            }
            
            .progress-bar {
                width: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Floating particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container" id="mainContainer">
        <!-- Logo -->
        <div class="logo-container">
            <div class="logo">
                <div class="logo-text">🏺</div>
            </div>
        </div>

        <!-- Welcome Text -->
        <div class="welcome-text">
            <h1>Selamat Datang</h1>
            <p>SA Rotan Sidoarjo</p>
        </div>

        <!-- Loading -->
        <div class="loading-container">
            <div class="loading-text">Memuat sistem...</div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>
    </div>

    <script>
        // Redirect to login page after 5 seconds
        setTimeout(function() {
            const container = document.getElementById('mainContainer');
            container.classList.add('fade-out');
            
            // Wait for fade out animation to complete then redirect
            setTimeout(function() {
                // Ganti '/login' dengan route login yang sesuai
                window.location.href = '/login';
            }, 1000);
        }, 4000);

        // Add some interactive particles on mouse move
        document.addEventListener('mousemove', function(e) {
            if (Math.random() > 0.95) {
                createTemporaryParticle(e.clientX, e.clientY);
            }
        });

        function createTemporaryParticle(x, y) {
            const particle = document.createElement('div');
            particle.style.position = 'fixed';
            particle.style.left = x + 'px';
            particle.style.top = y + 'px';
            particle.style.width = '4px';
            particle.style.height = '4px';
            particle.style.background = 'rgba(255, 255, 255, 0.6)';
            particle.style.borderRadius = '50%';
            particle.style.pointerEvents = 'none';
            particle.style.zIndex = '100';
            particle.style.animation = 'tempParticle 1s ease-out forwards';
            
            document.body.appendChild(particle);
            
            setTimeout(() => {
                document.body.removeChild(particle);
            }, 1000);
        }

        // Add temporary particle animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes tempParticle {
                0% {
                    transform: scale(1) translateY(0);
                    opacity: 1;
                }
                100% {
                    transform: scale(0) translateY(-50px);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>