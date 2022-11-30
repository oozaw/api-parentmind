# api-parentmind
API for ParentMind project

# API Spec
- URL : `https://www.parentmind.my.id/api`

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
   "password": "string"
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
  - `category` as `laki-laki | perempuan | 1-2th | 3-4th | 7-12th | 13-16th | 17-21th`, optional
  
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
         "id": 1,
         "type": "article",
         "title": "Impedit molestias.",
         "author": "admin",
         "thumbnail": "https://parentmind.com/thumbnail.png",
         "excerpt": "Fuga dignissimos vel temporibus consequatur dolore",
         "body": "<p>Quo reprehenderit ea eos aliquid et velit nam. Accusamus et aut rem ipsa. Fuga temporibus placeat aut sed repellat. Totam dolores nostrum cumque laboriosam consequatur.</p>",
         "source": "",
         "link": "https://example-source.com",
         "created_at": "2022-11-24T10:37:53.000000Z",
         "updated_at": "2022-11-24T10:37:53.000000Z",
         "category": "perempuan, 1-2th"
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
      "id": 1,
      "type": "article",
      "title": "Impedit molestias.",
      "author": "admin",
      "thumbnail": "https://parentmind.com/thumbnail.png",
      "excerpt": "Fuga dignissimos vel temporibus consequatur dolore",
      "body": "<p>Quo reprehenderit ea eos aliquid et velit nam. Accusamus et aut rem ipsa. Fuga temporibus placeat aut sed repellat. Totam dolores nostrum cumque laboriosam consequatur.</p>",
      "source": "",
      "link": "https://example-source.com",
      "created_at": "2022-11-24T10:37:53.000000Z",
      "updated_at": "2022-11-24T10:37:53.000000Z",
      "category": "perempuan, 1-2th"
   },
}
```

## Delete Article
  **TODO**