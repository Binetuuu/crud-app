pipeline {
    agent any

    stages {
        stage('Cloner le code') {
            steps {
                git url: 'https://github.com/Binetuuu/crud-app.git', branch: 'main'
            }
        }

        stage('Tests') {
            steps {
                echo 'Exécution des tests PHP...'
                sh 'docker exec crud-php php -l /var/www/html/index.php'
            }
        }

        stage('Déploiement') {
            steps {
                echo 'Déploiement avec Docker Compose...'
                sh 'docker-compose down'
                sh 'docker-compose build'
                sh 'docker-compose up -d'
            }
        }
    }

    post {
        success {
            echo 'Déploiement réussi'
        }
        failure {
            echo 'Le pipeline a échoué'
        }
    }
}

