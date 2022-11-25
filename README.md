# api-parentmind
API for ParentMind project

# API Spec

## Register

## Login
Request :
- Method : POST
- Endpoint : `/api/login`
- Header :
  - Content-Type : application/json
  - Accept : application/json
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
   "status": "success",
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

## Get All Articles
Request :
- Method : GET
- Endpoint : `/api/article`
- Header :
  - Content-Type : application/json
  - Accept : application/json
- Response :
```json
{
   "status": "success",
   "message": "Login has been successful",
   "articles": {
      "id": 1,
      "type": "article",
      "title": "Impedit molestias.",
      "category": "perempuan, 1-2th",
      "author": "admin",
      "thumbnail": "https://parentmind.com/thumbnail.png",
      "excerpt": "Fuga dignissimos vel temporibus consequatur dolore",
      "body": "<p>Quo reprehenderit ea eos aliquid et velit nam. Accusamus et aut rem ipsa. Fuga temporibus placeat aut sed repellat. Totam dolores nostrum cumque laboriosam consequatur.</p>",
      "source": "",
      "link": "https://example-source.com",
      "created_at": "2022-11-24T10:37:53.000000Z",
      "updated_at": "2022-11-24T10:37:53.000000Z"
   },
}
```

## Delete Article