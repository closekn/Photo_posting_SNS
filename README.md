# Photo posting SNS

画像投稿SNS

## デプロイ

https://photo-posting-sns.herokuapp.com/  
運用テスト状態

## ローカル作業

```shell
# in /laradock
# workspaceの立ち上げ
$ docker-compose up -d workspace nginx
# DBの立ち上げ
$ docker-compose up -d postgres
# workspace内へ
$ docker-compose exec workspace bash
```

```shell
# in workspace
# Migration
$ php artisan migrate
# test data の登録
$ php artisan db:seed
# DB login
$ psql -h laradock_postgres_1 -U [user-name] -d [db-name]
```

## 参考

- [チームラボオンラインスキルアップ課題](https://team-lab.github.io/skillup/)
  - [STEP2-11](https://team-lab.github.io/skillup/step2/11-task.html)
