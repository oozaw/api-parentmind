# api-parentmind
API for ParentMind project

# API Spec
- URL : `https://parentmind.my.id/api`

## Register
Request :
- Method : POST
- Endpoint : `/register`
- Header :
  - Content-Type : `application/json`
  - Accept : `application/json`
- Request Body :
  
```json
{
   "name": "string",
   "username": "string|min:6|max:20|unique",
   "email": "string|unique|valid email",
   "password": "string|min:6"
}
```
- Response :
```json
{
   "status": true,
   "message": "Register has been successful"
}
```

## Login
Request :
- Method : POST
- Endpoint : `/login`
- Header :
  - Content-Type : `application/json`
  - Accept : `application/json`
- Request Body :
  
```json
{
   "email": "string",
   "password": "string"
}
```
- Response :
```json
{
   "status": true,
   "message": "Login has been successful",
   "user": {
      "id": "2",
      "name": "Brody Jhonson",
      "username": "jhonson_21",
      "email": "brjhon@example.com",
      "token": "14|70nhABDJEhXcuaRJmtvtaXD2AbYyKu8pFs2X7wZj",
      "created_at": "2022-11-24T10:37:52.000000Z",
      "updated_at": "2022-11-24T10:37:52.000000Z",
   }
}
```

## Login Firebase
Request :
- Method : POST
- Endpoint : `/login-fb`
- Header :
  - Content-Type : `application/json`
  - Accept : `application/json`
- Request Body :
  
```json
{
   "name": "string",
   "email": "string|unique|valid email",
   "password": "string|min:6"
}
```
- Response :
```json
{
   "status": true,
   "message": "Login has been successful",
   "user": {
      "id": "2",
      "name": "Brody Jhonson",
      "username": "jhonson_21",
      "email": "brjhon@example.com",
      "token": "14|70nhABDJEhXcuaRJmtvtaXD2AbYyKu8pFs2X7wZj",
      "created_at": "2022-11-24T10:37:52.000000Z",
      "updated_at": "2022-11-24T10:37:52.000000Z",
   }
}
```

## Create Article
**TODO**

## Get All Articles
Request :
- Method : GET
- Endpoint : `/articles`
- Header :
  - Content-Type : `application/json`
  - Accept : `application/json`
  - Authorization : `Bearer <token>`
- Parameter :
  - `type` as `video | article`, optional
  - `size` as `Int`, optional
  - `page` as `Int`, optional,
  - `gender` as `laki-laki | perempuan`, optional
  - `category` as `1-2th | 3-4th | 7-12th | 13-16th | 17-21th`, optional
  - `q` as `String` for searching, optional
  
  ----------------
  *TODO Coming Up*
  - Category :
    - `laki-laki` as `1 | 0`, default `0`, optional
    - `perempuan` as `1 | 0`, default `0`, optional
    - `1-2th` as `1 | 0`, default `0`, optional
    - `3-4th` as `1 | 0`, default `0`, optional
    - `7-12th` as `1 | 0`, default `0`, optional
    - `13-16th` as `1 | 0`, default `0`, optional
    - `17-21th` as `1 | 0`, default `0`, optional
    - Notes :
      - 1 for get all articles with related category
      - 0 for get all articles without considering related category
  ----------------
- Response :
```json
{
   "status": true,
   "message": "Articles has been fetched successfully",
   "articles": [
      {
         "id": 54,
         "type": "video",
         "title": "Tutorial Docker Dasar",
         "thumbnail": "post-images/BaUdjm7o6hhAIRwgAUDvGo3wbXvwoGAhCgodJDl3.jpg",
         "excerpt": "Hi guys, ini adalah video pertama tentang roadmap Docker, dimana di video pertama ini, kita akan membahas tentang dasar-dasar Docker.#docker #container #programmerzamannow Slide : https://docs.google....",
         "body": "<div>Hi guys, ini adalah video pertama tentang roadmap Docker, dimana di video pertama ini, kita akan membahas tentang dasar-dasar Docker.<br><br><a href=\"https://www.youtube.com/hashtag/docker\">#docker</a> <a href=\"https://www.youtube.com/hashtag/container\">#container</a> <a href=\"https://www.youtube.com/hashtag/programmerzamannow\">#programmerzamannow</a>",
         "source": "Programmer Zaman Now",
         "link": "https://youtu.be/3_yxVjV88Zk",
         "created_at": "2022-11-29T03:14:49.000000Z",
         "updated_at": "2022-11-29T07:01:16.000000Z",
         "authors": "Admin",
         "category": "Laki-laki, Perempuan, 7-12 th, 13-16 th, 17-21 th"
      },
   ]
}
```

## Get An Article
Request :
- Method : GET
- Endpoint : `/articles/{id}`
- Header :
  - Content-Type : `application/json`
  - Accept : `application/json`
  - Authorization : `Bearer <token>`
- Response :
```json
{
   "status": true,
   "message": "Article has been fetched successfully",
   "article": {
      "id": 54,
      "type": "video",
      "title": "Tutorial Docker Dasar",
      "thumbnail": "post-images/BaUdjm7o6hhAIRwgAUDvGo3wbXvwoGAhCgodJDl3.jpg",
      "excerpt": "Hi guys, ini adalah video pertama tentang roadmap Docker, dimana di video pertama ini, kita akan membahas tentang dasar-dasar Docker.#docker #container #programmerzamannow Slide : https://docs.google....",
      "body": "<div>Hi guys, ini adalah video pertama tentang roadmap Docker, dimana di video pertama ini, kita akan membahas tentang dasar-dasar Docker.<br><br><a href=\"https://www.youtube.com/hashtag/docker\">#docker</a> <a href=\"https://www.youtube.com/hashtag/container\">#container</a> <a href=\"https://www.youtube.com/hashtag/programmerzamannow\">#programmerzamannow</a>",
      "source": "Programmer Zaman Now",
      "link": "https://youtu.be/3_yxVjV88Zk",
      "created_at": "2022-11-29T03:14:49.000000Z",
      "updated_at": "2022-11-29T07:01:16.000000Z",
      "authors": "Admin",
      "category": "Laki-laki, Perempuan, 7-12 th, 13-16 th, 17-21 th"
   }
}
```

## Delete Article
  **TODO**