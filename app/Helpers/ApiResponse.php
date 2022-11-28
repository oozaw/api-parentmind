<?php

namespace App\Helpers;

class ApiResponse {

   public static function response($status, $message, $code) {
      $data = [
         "status" => $status,
         "message" => $message
      ];

      return response()->json($data, $code);
   }

   public static function loginResponse($status, $message, $token, $user = null, $code) {
      $data = [
         "status" => $status,
         "message" => $message,
      ];

      if ($user != null) {
         $data['user']['id'] = $user->id;
         $data['user']['name'] = $user->name;
         $data['user']['username'] = $user->username;
         $data['user']['email'] = $user->email;
         $data['user']['token'] = $token;
         $data['user']['created_at'] = $user->created_at;
         $data['user']['updated_at'] = $user->updated_at;
      }

      return response()->json($data, $code);
   }

   public static function articleGetResponse($status, $message, $articles, $code) {
      $data = [
         "status" => $status,
         "message" => $message
      ];

      if ($articles != null) {
         if ($articles->count() > 1) {
            $data['articles'] = $articles;
         } else {
            $data['article'] = $articles->first();
         }
      }

      return response()->json($data, $code);
   }
}