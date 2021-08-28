
## Dockerでの開発環境

[参考QiitaURL](https://qiita.com/kurkuru/items/127fa99ef5b2f0288b81)
[参考QiitaURL](https://qiita.com/ama_keshi/items/b4c47a4aca5d48f2661c)
- install

```https://www.docker.com/```
今回はdocker hubからinstallしてみる  
```
https://hub.docker.com/signup
```
登録を済ませる
emailaddressに確認が送られてくるので  
ボタンをclickしてdownloadpageへ進む  

/Users/Saki/Documents/スクリーンショット\ 2021-08-02\ 23.26.52.png 

現在は```Intel chip```なのでそちらをdonwload  
fileを開き、applicationとして起動する  
簡単なコマンドチュートリアルを行う  
statusbar？の箇所にアイコンが出ており、statusが確認できる  
```Docker Desktop running```

---
## containerの元となるimageの作成

```docker images```
imageを一覧で確認

|ヘッダー|概要| 
|:-|:-|
|REPOSITORY|どのリポジトリからダウンロードしたものか|
|TAG|どのタグを取得したか|
|IMAGE ID|イメージを識別するためのID|
|CREATED|いつ作成されたイメージか|
|SIZE|イメージのサイズ|

作成ディレクトリ  
/docker  

ディレクトリ内のファイル  
- main.rb
- Dockerfile 


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

```Dockerfile:Dockerfile
FROM ruby:2.7

RUN mkdir /var/www
COPY main.rb /var/www

CMD ["ruby", "/var/www/main.rb"]
```

## imageからcontainerを作成
dockerfileを元にcontainerを作成する

適当なrubyファイルを作成
main.rbをもとにdockerfileでcontainerを作成

```
docker image build -t test/webrick:latest .
```
container作成実行時に.rbの構文エラー発生
rubyのファイフに修正を反映させるには  
imageを再度buildする

---
containerの操作方法

- containerの作成・起動
```
docker container run -p 
```

- status確認  
```
docker container <ps> または <ls>
```

停止しているものも含めてすべてのcontainerの確認
```
docker container ls -a
```

- containerの起動
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

```
docker pull nginx
```
コマンドでnginxのcontainerをpullする
