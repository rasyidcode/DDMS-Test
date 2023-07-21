# DDMS Test

- Source code test vue js ada di vue3-test
- Source code test ci4 ada di ci4-test
- Source code test cordova ada di hello-world-app

## Cara menjalankan vue3-test
```shell
npm install
npm run dev
// buka http://localhost:5173/ di browser
```

## Cara menjalankan ci4-test
```shell
composer install
cp env .env
// sesuaikan config database di .env dan set app.baseURL ke http://localhost:8080, dan CI_ENVIRONMENT ke development
php spark migrate
php spark serve // untuk menjalankan projek nya
// buka http://localhost:8080/ di browser
```

## Cara menjalan hello-world-app
```shell
cordova platform add android
cordova run android
```

## Petunjuk
- Vue_Task_1.txt untuk jawaban No. 1
- Vue_Task_2.txt untuk jawaban No. 2
- Vue_Task_3.txt untuk jawaban No. 1
- CI_Task_1.txt untuk jawaban No. 4
- CI_Task_2.txt untuk jawaban No. 5
- CI_Task_3.txt untuk jawaban No. 6
- Jawaban No. 7 dan 8 ada di dalam projek hello-world-app