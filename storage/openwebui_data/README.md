# nchc service

## 安裝
mkdir -p ./jenkins_home
docker compose up -d

## 其他參考
- https://hackmd.io/@JgGTFI_BRjyUv6YuG1bmUQ/S1gPEiHQo

### 特別要注意的是
```
為了要能夠監控 docker 開啟的 agent 所以需要把
/var/run/docker.sock 與 /usr/local/bin/docker 給 mount 到 container 內
並且需要打開 privileged 權限來讓 container 得以使用特殊權限讀取 host 內其他資訊
```


### 會需要輸入一個預設密碼
```
需要使用以下指令讀取該密碼並且輸入

docker exec nchc_jenkins cat /var/jenkins_home/secrets/initialAdminPassword
```
> 7dd888ee273b466388f190ad4069c27e

### 推薦外掛
> 自動

### 設定 agent
設定 agent
產生一組 ssh key 來做與 jenkin 溝通的認証
ssh-keygen -t ed25519 -f jenkin_keys -C "nchc_jenkins" 
會產生一組 jenkin_keys.pub 與 jenkin_keys 的公鑰與私藥

### 把密鑰加入 jenkins 管理 -> 全域 -> credential
- https://nstc125_ip.biobank.org.tw/manage/credentials/
- https://nstc125_ip.biobank.org.tw/manage/credentials/store/system/domain/_/newCredentials
> SSH Username with private key
> System (Jenkins and nodes only)
> Enter directly
> Key: ..............
### nginx_conf
```
server {
    client_max_body_size 100M;  # 允許的最大請求大小
    listen 443 ssl;
    server_name nstc125_ip.biobank.org.tw;

    # 日誌檔案
    error_log /var/log/nginx/nstc125_ip_error.log;
    access_log /var/log/nginx/nstc125_ip_access.log;

    # SSL 設定
    ssl_certificate /ssl/server.cer;
    ssl_certificate_key /ssl/privatekey.key;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers 'ECDHE-ECDSA-AES128-GCM-SHA256:ECDHE-RSA-AES128-GCM-SHA256:DHE-RSA-AES128-SHA256:ECDHE-RSA-AES128-SHA256';
    ssl_prefer_server_ciphers on;
    ssl_stapling on;
    ssl_stapling_verify on;
    resolver 8.8.8.8 1.1.1.1 valid=300s;
    resolver_timeout 5s;

    # 安全標頭
    add_header Strict-Transport-Security "max-age=63072000; includeSubdomains; preload" always;
    add_header X-Frame-Options DENY;
    add_header X-Content-Type-Options nosniff;
    add_header X-XSS-Protection "1; mode=block";

    # 根目錄（通常不使用，但可以保留）
    root /var/www/html;
    index index.php index.html;

    # 反向代理配置
    location / {
        proxy_pass http://192.168.0.125:8080;  # Jenkins 的內部服務地址
        proxy_set_header Host $host;  # 傳遞主機名稱
        proxy_set_header X-Real-IP $remote_addr;  # 傳遞用戶端的真實 IP
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;  # 傳遞用戶端鏈的 IP
        proxy_set_header X-Forwarded-Proto $scheme;  # 傳遞協議（HTTP 或 HTTPS）

        # 重新定向內部回應至公開域名
        proxy_redirect http://192.168.0.125:8080 https://nstc125_ip.biobank.org.tw;

        # 超時設置
        proxy_read_timeout 600;
        proxy_connect_timeout 600;
        proxy_send_timeout 600;
    }
}

```

### SSH
在 Jenkins 中使用 `sshAgent` 是一種連接並操作遠端主機的方式，通常用於執行需要從 Jenkins 代理機器連接到遠端主機進行操作的任務。這個工作流程主要使用 SSH 來建立一個安全的連接並且執行相關的命令。`sshAgent` 通常會與憑證一起使用，這些憑證用於驗證連接。

#### 工作原理
1. **憑證管理**: Jenkins 使用 SSH 密鑰進行驗證。你需要將私鑰儲存在 Jenkins 中，通常是使用 `Credentials` 插件來管理。
2. **sshAgent** 步驟: 在 Jenkinsfile 中使用 `sshAgent` 步驟，它會啟動一個 SSH 代理並且讓之後的步驟能夠使用該代理來進行遠端操作。
3. **遠端執行命令**: 一旦設置了 SSH 代理，接下來你可以使用 `sh` 步驟在遠端主機上執行指令。

#### 配置步驟
1. **儲存 SSH 憑證**: 在 Jenkins 中配置一個 SSH 私鑰憑證，這樣 Jenkins 就可以使用這個密鑰來進行 SSH 連接。
   - 進入 Jenkins 管理頁面 -> 系統管理 -> 憑證 (Credentials) -> 全域憑證 (Global credentials) -> 新增憑證
   - 選擇「SSH 公私鑰對」，並將私鑰放入對應的欄位。

2. **Jenkinsfile 配置**:
   - 在 Jenkinsfile 中使用 `sshAgent` 步驟來指明要使用的 SSH 憑證。

#### 範例
這是一個簡單的範例，展示如何使用 `sshAgent` 連接遠端主機並執行命令：

```groovy
pipeline {
    agent any
    
    environment {
        // 定義要使用的 SSH 憑證 ID
        SSH_CREDENTIALS = 'your-ssh-credentials-id'
    }

    stages {
        stage('Checkout') {
            steps {
                // 檢出程式碼
                git 'https://github.com/your-repository.git'
            }
        }

        stage('Deploy to Remote Server') {
            steps {
                script {
                    // 使用 sshAgent 設置 SSH 代理
                    sshagent(credentials: [env.SSH_CREDENTIALS]) {
                        // 連接遠端主機並執行命令
                        sh 'ssh -o StrictHostKeyChecking=no user@remote_host "cd /path/to/project && git pull origin main"'
                    }
                }
            }
        }
    }
}
```

#### 解釋
1. **agent any**: 這表示 Jenkins 的 pipeline 可以在任何可用的 agent 上執行。
2. **environment**: 定義了一個環境變數 `SSH_CREDENTIALS`，它對應到你在 Jenkins 中儲存的 SSH 憑證 ID。
3. **sshagent(credentials: [env.SSH_CREDENTIALS])**: 這是主要的步驟，會啟動 SSH 代理並且使用指定的 SSH 憑證 ID 來執行後續的步驟。
4. **sh**: 這個步驟會在遠端主機上執行命令，這裡的命令是通過 SSH 連接到遠端主機，並執行 `git pull` 來拉取最新的程式碼。

#### 注意事項
- 需要確保遠端主機的 SSH 服務已啟動並且能夠接受來自 Jenkins 機器的 SSH 連接。
- 必須配置好 Jenkins 上的 SSH 憑證，並且遠端主機需要將公鑰添加到 `~/.ssh/authorized_keys` 文件中，這樣才能完成無密碼登入。
- 使用 `ssh-agent` 步驟時，可以讓你更安全地處理 SSH 密鑰，避免直接在腳本中暴露密鑰。

這樣的配置使得你能夠輕鬆、安全地管理 Jenkins 任務與遠端主機之間的交互。



## jenkins example ssh
```
pipeline {
    agent any

    environment {
        APPTAINER_CACHEDIR = '/data/jenkins/cache'
        APPTAINER_TMPDIR   = '/data/jenkins/tmp'
        JENKINS_BUILD_DIR  = '/data/jenkins/built'
    }

    stages {
        stage('Build image') {
            steps {
                sh "ls -alt"
            }
        }

        stage('Test image') {
            steps {
                sh "date; pwd"
            }
        }

        stage('SSH commands') {
            steps {
                // 使用 withCredentials 步驟來加載儲存的密碼
                withCredentials([usernamePassword(credentialsId: 'hpc-ssh-password-credentials', usernameVariable: 'SSH_USER', passwordVariable: 'SSH_PASSWORD')]) {
                    script {
                        // 使用 sshpass 和加載的密碼進行 SSH 連接
                        sh '''
                        sshpass -p $SSH_PASSWORD -P Password -O 'Login method' -o '2' ssh -o StrictHostKeyChecking=no $SSH_USER@ln01.twcc.ai "hostname"
                        '''
                    }
                }
            }
        }	        
    }
}

```

## API Key
https://nstc125_ip.biobank.org.tw/user/c00cjz00/security/
> Security
> API Token
> 1116a89a425c918a58036747f23ca3ac2e
```
curl -u "c00cjz00:1116a89a425c918a58036747f23ca3ac2e" https://nstc125_ip.biobank.org.tw/job/ssh/api/json |jq

curl -X POST -u "c00cjz00:1116a89a425c918a58036747f23ca3ac2e" https://nstc125_ip.biobank.org.tw/job/ssh/build |jq
```
