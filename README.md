# docker-rep2

rep2 service based on docker

# Usage

Docker Imageのbuild -> 実行 -> アクセス

    $ git clone git@github.com:ysasaki/docker-rep2.git
    $ make build
    $ make run
    $ open http://localhost:8000/

新規ユーザー作成とログイン後、
設定管理 > ユーザー設定編集 > rep2基本設定 > ETC から以下を変更し、設定保存

 - proxy_use する
 - proxy_host 127.0.0.1
 - proxy_port 8080
