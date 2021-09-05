
## Dockerでの開発環境

[参考QiitaURL](https://qiita.com/kurkuru/items/127fa99ef5b2f0288b81)
[参考QiitaURL](https://qiita.com/ama_keshi/items/b4c47a4aca5d48f2661c)
## Install

```https://www.docker.com/```
今回はdocker hubからinstallしてみる  
```
https://hub.docker.com/signup
```
登録を済ませる
emailaddressに確認が送られてくるので  
ボタンをclickしてdownloadpageへ進む  

![](2021-08-29-17-03-24.png)


現在は```Intel chip```なのでそちらをdonwload  
fileを開き、applicationとして起動する  
簡単なコマンドチュートリアルを行う  
statusbarの箇所にアイコンが出ており、statusが確認できる  
```Docker Desktop running```

**install完了**

---

# image,containerを作成し、browserで確認する
## containerの元となるimageの作成

今回の作業ディレクトリ  
/docker  

ディレクトリ内のファイル  
- main.rb
- Dockerfile 

imageを一覧で確認
```
docker images
```

|ヘッダー|概要| 
|:-|:-|
|REPOSITORY|どのリポジトリからダウンロードしたものか|
|TAG|どのタグを取得したか|
|IMAGE ID|イメージを識別するためのID|
|CREATED|いつ作成されたイメージか|
|SIZE|イメージのサイズ|

- ruby.main.rb
```ruby:main.rb
require 'webrick'

server = WEBrick::HTTPServer.new(
  DocumentRoot: './',
  BindAddres: '0.0.0.0',
  Port: 8000
)

server.mount_proc('/') do |req, res|
 res.body = 'hello'
end

server.start
```
- Dockerfile
```Dockerfile:Dockerfile
FROM ruby:2.7

RUN mkdir /var/www
COPY main.rb /var/www

CMD ["ruby", "/var/www/main.rb"]
```
## imageからcontainerを作成
```
docker image build -t test/webrick:latest .
```
---
container作成実行時に.rbの構文エラー発生  
```end```の記載が抜けていた  
rubyの修正を反映させるには、imageを再度buildする

--- 
repsitoryのヘッダー箇所に**test/webrick**のimageが作成されているか確認する

## imageの削除
```docker image rm <イメージID>```

または

```docker rmi <イメージID>```

---
## containerの操作方法
containerのLifecycle  
**作成→起動→停止→削除**  
image作成まで行ったので以降の作業をしてみる
- containerの作成・起動
```
docker container run -p 8000:8000 --name webrick test/webrick:latest
```

- status確認  
```
docker container <ps> または <ls>
```

停止しているものも含めてすべてのcontainerの確認
```
docker container ls -a
```

- すでに作成した存在しているcontainerの起動
```
docker start <CONTAINER ID>または<NAME>
```

- containerの停止
```
docker container stop <container名>
```

- containerの削除
```
docker container rm <container名>
```

## 公式のリポジトリからcontainerをpullしてみる

```
docker pull nginx
```
コマンドでnginxのcontainerをpullする