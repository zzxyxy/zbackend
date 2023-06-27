pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                // Get some code from a GitHub repository
                git url: 'https://github.com/zzxyxy/zbackend.git', branch: 'main'
            }
        }
        stage('get dependencies') {
            steps {
                sh 'composer install'
            }
        }
        stage('Archive') {
            steps {
                archiveArtifacts artifacts: 'dist/**/*', followSymlinks: false, onlyIfSuccessful: true
            }
        }
    }
}
