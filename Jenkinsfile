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
                archiveArtifacts artifacts: '**/*', followSymlinks: false, onlyIfSuccessful: true
            }
        }
        stage("Upload api folder") {
            steps {
                sh '''
#!/bin/bash
HOST=zxyxy.net
USER=zxyxynet
PASSWORD=3oR37v3Hho

lftp -u $USER,$PASSWORD $HOST << EOF
set ssl:verify-certificate false
cd www
cd api
mirror -R -v -e --scan-all-first --include=[a-z1-9]*[.]php
EOF'''
            }
        }
    }
}
