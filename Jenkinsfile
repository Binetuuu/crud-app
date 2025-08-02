pipeline {
    agent any  // Jenkins peut exécuter ce pipeline sur n'importe quel agent

    environment {
        // On donne des noms aux conteneurs pour les réutiliser plus bas
        APP_CONTAINER = "crud-php"
        MYSQL_CONTAINER = "crud-mysql"
        PHPMYADMIN_CONTAINER = "crud-phpmyadmin"
    }

    stages {
        stage('Vérification Docker') {
            steps {
                echo "🔍 Vérification que Docker est installé..."
                sh 'docker --version'
            }
        }

        stage('Cloner le code') {
            steps {
                // Clonage du code source depuis ton dépôt GitHub
                git url: 'https://github.com/Binetuuu/crud-app.git', branch: 'main'
            }
        }

        stage('Tests') {
            steps {
                echo "✅ Lancement des tests PHP..."
                // Teste la syntaxe du fichier index.php dans le conteneur crud-php
                sh "docker exec ${APP_CONTAINER} php -l /var/www/html/index.php"
            }
        }

        stage('Déploiement') {
            steps {
                echo "🚀 Déploiement avec Docker Compose..."

                sh '''
                    # 🔄 On arrête les anciens conteneurs s’ils existent
                    docker-compose down || true

                    # 🧹 On supprime les conteneurs existants pour éviter le conflit
                    docker rm -f crud-php crud-mysql crud-phpmyadmin || true

                    # 🔨 On reconstruit les images
                    docker-compose build

                    # ▶️ On relance tous les services
                    docker-compose up -d
                '''
            }
        }
    }

    post {
        success {
            echo "✅ Le pipeline s'est terminé avec succès."
        }
        failure {
            echo "❌ Le pipeline a échoué."
        }
    }
}

