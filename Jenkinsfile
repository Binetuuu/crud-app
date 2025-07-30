pipeline {
    agent any

    stages {
        stage('Cloner le dépôt') {
            steps {
                git 'https://github.com/Binetuuu/crud-app.git'
            }
        }

        stage('Vérifier la syntaxe PHP') {
            steps {
                sh 'php -l index.php'
                sh 'php -l create.php'
                sh 'php -l update.php'
                sh 'php -l delete.php'
                sh 'php -l config.php'
            }
        }

        stage('Construire avec Docker') {
            steps {
                sh 'docker compose build'
            }
        }

        stage('Déployer ou lancer les containers') {
            steps {
                sh 'docker compose up -d'
            }
        }
    }
}

