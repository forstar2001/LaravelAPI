define({ "api": [
  {
    "type": "post",
    "url": "/updateProfile/",
    "title": "User profile Update",
    "version": "0.0.1",
    "name": "updateProfile",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>User email.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "current_password",
            "description": "<p>Users CURRENT PASSWORD.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "new_password",
            "description": "<p>Users NEW PASSWORD.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.(yjOtVc9bBCCqtnwxtounZBD4UnpJsnKR)</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          }
        ]
      }
    },
    "success": {
        "fields": {
        "Success 200" :[
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>User ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>User email.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "current_password",
            "description": "<p>Users CURRENT PASSWORD.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "new_password",
            "description": "<p>Users NEW PASSWORD.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "payload_token",
            "description": "<p>Payload token.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "is_admin",
            "description": "<p>is_admin.</p> "
          }
        ],
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":{\n     \"user_id\": 1,\n     \"username\": \"John\",\n     \"email\": \"john@gmail.com\",\n     \"token\": \"BbIUwypFBGtVpDr6kRTQ27uagatriMeE\",\n     \"package_expire\": \"2017-06-21\",\n     \"is_admin\": 0,\n     \"payload_token\":\"10e76104dbc867234c0bb420f6979db8\"\n     \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile/profile.jpg\",\n},\n\"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidPassword",
            "description": "<p>The email of the User is already exist.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "PasswordMismatched",
            "description": "<p>The current password was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UsernameAlreadyExist",
            "description": "<p>Username Already Exist.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "EmailAlreadyExist",
            "description": "<p>The Email Already Exist.</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":'',\n\"error\":'InvalidPassword'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/profilePictureUpdate/",
    "title": "Profile Picture Update",
    "version": "0.0.1",
    "name": "profilePictureUpdate",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "photo",
            "description": "<p>Users photo.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "photo",
            "description": "<p>Photo of the User.</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile/profile.jpg\",\n},\n\"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidFileType",
            "description": "<p>Invalid File Type.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":'',\n\"error\":'InvalidFileType'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/userForgotPassword/",
    "title": "User Forgot Password",
    "version": "0.0.1",
    "name": "UserForgotPassword",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>Users EMAIL.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>Email of user.</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"email\": \"john@gmail.com\",\n },\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "EmailNotFound",
            "description": "<p>The email was not found.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailNotFound'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/userLogin/",
    "title": "User Login",
    "version": "0.0.1",
    "name": "UserLogin",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>Users unique EMAIL.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password",
            "description": "<p>Users PASSWORD.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "device_id",
            "description": "<p>Device unique Identification.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "device_type",
            "description": "<p>Device type.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "device_push_token",
            "description": "<p>Device push notification token.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>User Id of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Name of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>Email of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Access Token of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "payload_token",
            "description": "<p>User payload token for purchases.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "photo",
            "description": "<p>Photo of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "package_expire",
            "description": "<p>User package expire date d-m-Y H:M:S</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "is_expired",
            "description": "<p>User package expire status 1-expired 0-not expired</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "is_admin",
            "description": "<p>is_admin 1-admin 0-not admin</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"user_id\": 1,\n     \"username\": \"John\",\n     \"email\": \"john@gmail.com\",\n     \"token\": \"BbIUwypFBGtVpDr6kRTQ27uagatriMeE\",\n     \"package_expire\": \"21-06-2017 09:30:00\",\n     \"is_admin\": 0,\n     \"payload_token\":\"10e76104dbc867234c0bb420f6979db8\"\n     \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile/profile.jpg\",\n},\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidLogin",
            "description": "<p>The email or password of the User was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidApiKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UserBlocked",
            "description": "<p>User Blocked.</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'InvalidAPIKey'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/userLogout/",
    "title": "User Logout",
    "version": "0.0.1",
    "name": "UserLogout",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n },\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'InvalidAccessToken'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/userProfile",
    "title": "User Profile",
    "version": "0.0.1",
    "name": "UserProfile",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>User Id of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Name of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>Email of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Access Token of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "payload_token",
            "description": "<p>User payload token for purchases.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "photo",
            "description": "<p>Photo of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "package_expire",
            "description": "<p>User package expire date</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "is_admin",
            "description": "<p>is_admin 1-admin 0-not admin</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "followings",
            "description": "<p>User followings count</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "followers",
            "description": "<p>user followers count</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "posts",
            "description": "<p>User uploaded post details array</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID/p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>post image</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "post_thumb_image",
            "description": "<p>post thumb image</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "likes",
            "description": "<p>post likes count</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "comments",
            "description": "<p>post comments count</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "liked",
            "description": "<p>Post like status 1 -like 0-not</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"user_id\": 1,\n     \"username\": \"John\",\n     \"email\": \"john@gmail.com\",\n     \"token\": \"BbIUwypFBGtVpDr6kRTQ27uagatriMeE\",\n     \"package_expire\": \"21-01-2017 09:15:00\",\n     \"is_admin\": 0,\n     \"followings\": 2,\n     \"followers\": 1,\n     \"payload_token\":\"10e76104dbc867234c0bb420f6979db8\"\n     \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile/profile.jpg\",\n     \"posts\":[{\n       \"post_id\": 1,\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/f6979db8.svg\",\n       \"post_thumb_image\": \"http:\\/\\/www.coloring.com\\/images/posts/thumbnails/f6979db8.svg\",\n       \"likes\": 5,\n       \"liked\": 1,\n       \"comments\": 6,\n     }],\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'InvalidAccessToken'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/userRegister/",
    "title": "User Registration",
    "version": "0.0.1",
    "name": "UserRegister",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Users NAME.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>Users unique EMAIL.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "password",
            "description": "<p>Users PASSWORD.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "device_id",
            "description": "<p>Device unique Identification.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "device_type",
            "description": "<p>Device type.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "device_push_token",
            "description": "<p>Device push notification token.</p> "
          },
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>User Id of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Name of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "email",
            "description": "<p>Email of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Access Token of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "payload_token",
            "description": "<p>User payload token for purchases.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "photo",
            "description": "<p>Photo of the User.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "package_expire",
            "description": "<p>User package expire date</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "is_admin",
            "description": "<p>is_admin 1-admin 0-not admin</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"user_id\": 1,\n     \"username\": \"John\",\n     \"email\": \"john@gmail.com\",\n     \"token\": \"BbIUwypFBGtVpDr6kRTQ27uagatriMeE\",\n     \"package_expire\": \"\",\n     \"is_admin\": 0,\n     \"payload_token\":\"10e76104dbc867234c0bb420f6979db8\"\n     \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile/profile.jpg\",\n},\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "EmailAlreadyExist",
            "description": "<p>The email of the User is already exist.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UsernameAlreadyExist",
            "description": "<p>Username Already Exist</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/listCategories/",
    "title": "List Categories",
    "version": "0.0.1",
    "name": "listCategories",
    "group": "Atrworks",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "category_id",
            "description": "<p>category ID</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "category_name",
            "description": "<p>Category name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "templates",
            "description": "<p>Templates list.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "template_id",
            "description": "<p>template ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "template_name",
            "description": "<p>Template name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "image_name",
            "description": "<p>Image name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "image_url",
            "description": "<p>Image url.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "image_png_url",
            "description": "<p>Image PNG url.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "sub_only",
            "description": "<p>Temolate status 1-subscribers only 0-free.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n [{\n     \"category_id\": \"1\",\n     \"category_name\": \"Flora\",\n     \"templates\": [{\n        \"template_id\": 1,\n        \"category_id\": 1,\n        \"template_name\": \"Rose\",\n        \"image_name\":\"f6979db8.svg\",\n        \"image_url\": \"http:\\/\\/www.coloring.com\\/images/templates/f6979db8.svg\",\n        \"image_png_url\": \"http:\\/\\/www.coloring.com\\/images/templates/f6979db8.png\",\n        \"sub_only\":1 \n     }]\n }],\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Artworks"
  },
  {
    "type": "post",
    "url": "/listTemplates/",
    "title": "List Templates",
    "version": "0.0.1",
    "name": "listTemplates",
    "group": "Atrworks",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "template_id",
            "description": "<p>template ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "category_id",
            "description": "<p>category ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "template_name",
            "description": "<p>Template name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "image_name",
            "description": "<p>Image name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "image_url",
            "description": "<p>Image url.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "image_png_url",
            "description": "<p>Image url.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "sub_only",
            "description": "<p>Temolate status 1-subscribers only 0-free.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n [{\n     \"template_id\": 1,\n     \"category_id\": 1,\n     \"template_name\": \"Rose\",\n     \"image_name\":\"f6979db8.svg\",\n     \"image_url\": \"http:\\/\\/www.coloring.com\\/images/templates/f6979db8.svg\",\n     \"image_png_url\": \"http:\\/\\/www.coloring.com\\/images/templates/f6979db8.png\",\n     \"sub_only\": 1\n }],\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Artworks"
  },
  {
    "type": "post",
    "url": "/listTestTemplates/",
    "title": "List Test Templates",
    "version": "0.0.1",
    "name": "listTestTemplates",
    "group": "Atrworks",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "template_id",
            "description": "<p>template ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "template_name",
            "description": "<p>Template name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "image_name",
            "description": "<p>Image name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "image_url",
            "description": "<p>Image url.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "image_png_url",
            "description": "<p>Image url.</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n [{\n     \"template_id\": 1,\n     \"template_name\": \"Rose\",\n     \"image_name\":\"f6979db8.svg\",\n     \"image_url\": \"http:\\/\\/www.coloring.com\\/images/templates/f6979db8.svg\",\n     \"image_png_url\": \"http:\\/\\/www.coloring.com\\/images/templates/f6979db8.png\",\n  }],\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Artworks"
  },
  {
    "type": "post",
    "url": "/uploadPost/",
    "title": "Upload Post",
    "version": "0.0.1",
    "name": "uploadPost",
    "group": "Atrworks",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Post image.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "template_id",
            "description": "<p>template ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Image name.</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n [{\n     \"post_id\": 1,\n     \"post_name\": \"Rose\",\n     \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/f6979db8.svg\",\n  }],\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "RequiredFieldsNull",
            "description": "<p>Required Fields Null</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Atrworks"
  },
  {
    "type": "post",
    "url": "/listArtIdeas/",
    "title": "List Art Ideas",
    "version": "0.0.1",
    "name": "listArtIdeas",
    "group": "Atrworks",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "template_id",
            "description": "<p>template ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Image url.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_thumb_image",
            "description": "<p>Image thumb image url.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "likes",
            "description": "<p>Likes count.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "comments",
            "description": "<p>Comments count.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "liked",
            "description": "<p>login user post like status. 1 -like 0 -not like</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"post\":[{\n       \"post_id\": 1,\n       \"user_id\": 8,\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/f6979db8.svg\",\n       \"likes\": 5,\n       \"liked\": 1,\n       \"comments\": 8,\n     }],\n     \"pagination\": \n     {\n       \"total\": 24,\n       \"current_page\": 1,\n       \"last_page\": 3,\n       \"per_page\": 8,\n       \"prev_page_url\": null,\n       \"prev_page_url\": \"http:\\/\\/www.coloring.com\\/api/v1/listArtIdeas?page=2\",\n       \"from\": 1,\n       \"to\": 1,\n     },\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Artworks"
  },
  {
    "type": "post",
    "url": "/listComments/",
    "title": "List Comments",
    "version": "0.0.1",
    "name": "listComments",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Image name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>Post added user_id.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Post added username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "likes",
            "description": "<p>Likes count.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "liked",
            "description": "<p>login user post like status. 1 -like 0 -not like</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "template_id",
            "description": "<p>Post template id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "created_at",
            "description": "<p>Post created date/p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "is_favoutire",
            "description": "<p>User post favourite status 1 -favoutire 0-not favourite.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "comments_list",
            "description": "<p>Comments count.</p> "
          },
          
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n       \"post_id\": 1,\n       \"post_name\": \"Yellow Rose\",\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/f6979db8.svg\",\n       \"user_id\": 6,\n       \"username\": \"Paul\",\n       \"liked\":0,\n       \"is_favourite\": 1,\n       \"template_id\": 4,\n       \"created_at\": \"25/02/2016\",\n       \"comments_list\": \n       [{\n         \"comment_id\": 2,\n         \"comment\": \"Lorem Ipsum is simply dummy text\",\n         \"user_id\": 3,\n         \"username\": \"David\",\n         \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile.jpg\",\n         \"created_at\": \"25/02/2016\",\n       }],\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/addComment/",
    "title": "Add Comment",
    "version": "0.0.1",
    "name": "addComment",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "comment",
            "description": "<p>User comment for the Post.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Image name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>Post added user_id.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Post added username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "likes",
            "description": "<p>Likes count.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "liked",
            "description": "<p>login user post like status. 1 -like 0 -not like</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "template_id",
            "description": "<p>Post template id</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "created_at",
            "description": "<p>Post created date/p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "is_favoutire",
            "description": "<p>User post favourite status 1 -favoutire 0-not favourite.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "comments_list",
            "description": "<p>Comments count.</p> "
          },
          
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n       \"post_id\": 1,\n       \"post_name\": \"Yellow Rose\",\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/f6979db8.svg\",\n       \"user_id\": 6,\n       \"username\": \"Paul\",\n       \"liked\":0,\n       \"is_favourite\": 1,\n       \"template_id\": 4,\n       \"created_at\": \"25/02/2016\",\n       \"comments_list\": \n       [{\n         \"comment_id\": 2,\n         \"comment\": \"Lorem Ipsum is simply dummy text\",\n         \"user_id\": 3,\n         \"username\": \"David\",\n         \"frofile\": \"http:\\/\\/www.coloring.com\\/images/profile.jpg\",\n         \"created_at\": \"25/02/2016\",\n       }],\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/likePost/",
    "title": "Like Post",
    "version": "0.0.1",
    "name": "likePost",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "like",
            "description": "<p>1 - Like 0 -Unlike</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\2\",\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/addFavouritePost/",
    "title": "Add Favourite Post",
    "version": "0.0.1",
    "name": "addFavouritePost",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "favourite",
            "description": "<p>1 - favourite 0 -remove favourite</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\"\",\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/followUser/",
    "title": "Follow User",
    "version": "0.0.1",
    "name": "followUser",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "follower_id",
            "description": "<p>Follower user ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "is_follow",
            "description": "<p>Follower status 0-follow 1-unfollow.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\"\",\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/unfollowUser/",
    "title": "Unfollow User",
    "version": "0.0.1",
    "name": "unfollowUser",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "follower_id",
            "description": "<p>Follower user ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\"\",\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/followingList/",
    "title": "List Followings",
    "version": "0.0.1",
    "name": "followingList",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": true,
            "field": "other_user_id",
            "description": "<p>Other user profile ID</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>User ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "photo",
            "description": "<p>profile photo.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "is_follow",
            "description": "<p>follow status. 1- follow 0- not follow</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\[{\n       \"user_id\": 1,\n       \"username\": \"Petter\",\n       \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile/profile.jpg\",\n       \"is_follow\": 1\n}]\"\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/followersList/",
    "title": "List Followers",
    "version": "0.0.1",
    "name": "followersList",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": true,
            "field": "other_user_id",
            "description": "<p>Other user profile ID</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>User ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "photo",
            "description": "<p>profile photo.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "is_follow",
            "description": "<p>follow status. 1- follow 0- not follow</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\[{\n       \"user_id\": 1,\n       \"username\": \"Petter\",\n       \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile/profile.jpg\",\n       \"is_follow\": 0\n}]\"\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/listLikes/",
    "title": "List unread likes",
    "version": "0.0.1",
    "name": "listLikes",
    "group": "Notifications",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "notification_id",
            "description": "<p>Notification ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>Notification description.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>User ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_thumb_image",
            "description": "<p>Post thumbnail image.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Post image.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\[{\n       \"notification_id\": 1,\n       \"description\": \"liked your work\",\n       \"user_id\": 1,\n       \"username\": \"Petter\",\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/15246632.jpg\",\n       \"post_thumb_image\": \"http:\\/\\/www.coloring.com\\/images/posts/thumbnail/15246632.jpg\",\n       \"post_id\": 1,\n       \"post_name\": \"New Image\",\n}]\"\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Notifications"
  },
  {
    "type": "post",
    "url": "/readLikes/",
    "title": "Read likes",
    "version": "0.0.1",
    "name": "readLikes",
    "group": "Notifications",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"result\":\",\n\"status\":\"SUCCESS\",\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Notifications"
  },
  {
    "type": "post",
    "url": "/newComments/",
    "title": "List unread comments",
    "version": "0.0.1",
    "name": "newComments",
    "group": "Notifications",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "notification_id",
            "description": "<p>Notification ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>Notification description.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>User ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_thumb_image",
            "description": "<p>Post thumbnail image.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Post image.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\[{\n       \"notification_id\": 1,\n       \"description\": \"Nice post\",\n       \"user_id\": 1,\n       \"username\": \"Petter\",\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/15246632.jpg\",\n       \"post_thumb_image\": \"http:\\/\\/www.coloring.com\\/images/posts/thumbnail/15246632.jpg\",\n       \"post_id\": 1,\n       \"post_name\": \"New Image\",\n}]\"\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Notifications"
  },
  {
    "type": "post",
    "url": "/readComments/",
    "title": "Read Comments",
    "version": "0.0.1",
    "name": "readComments",
    "group": "Notifications",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"result\":\",\n\"status\":\"SUCCESS\",\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Notifications"
  },
  {
    "type": "post",
    "url": "/listNewFollowings/",
    "title": "List unread followings",
    "version": "0.0.1",
    "name": "listNewFollowings",
    "group": "Notifications",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "notification_id",
            "description": "<p>Notification ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "description",
            "description": "<p>Notification description.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>User ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Username.</p> "
          },
          
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "photo",
            "description": "<p>User profile picture.</p> "
          },
          
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\[{\n       \"notification_id\": 1,\n       \"description\": \"is following you\",\n       \"user_id\": 1,\n       \"username\": \"Petter\",\n       \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile/15246632.jpg\",\n  }]\"\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Notifications"
  },
  {
    "type": "post",
    "url": "/readFollowings/",
    "title": "Read Followings",
    "version": "0.0.1",
    "name": "readFollowings",
    "group": "Notifications",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"result\":\",\n\"status\":\"SUCCESS\",\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Notifications"
  },
  {
    "type": "post",
    "url": "/notificationCount/",
    "title": "Notification Count",
    "version": "0.0.1",
    "name": "notificationCount",
    "group": "Notifications",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "likes",
            "description": "<p>Unread likes count.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "comments",
            "description": "<p>Unread comments count.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "notifications",
            "description": "<p>Unread notification count.</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\{\n       \"likes\": 1,\n       \"comments\": 3,\n       \"notifications\": 1,\n  }\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Notifications"
  },
  {
    "type": "post",
    "url": "/searchUsers/",
    "title": "Search Users",
    "version": "0.0.1",
    "name": "searchUsers",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "key",
            "description": "<p>Usersname search key.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>User ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>Username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "photo",
            "description": "<p>User profile picture</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "is_follow",
            "description": "<p>User following status 1-following 0-not following</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\[{\n       \"user_id\": 1,\n       \"username\": \"mark\",\n       \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile/profile.jpg\",\n       \"is_follow\": 1,\n  }]\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/favouritePosts/",
    "title": "Favourite posts",
    "version": "0.0.1",
    "name": "favouritePosts",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "posts",
            "description": "<p>Favourite posts.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>Post added user ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Post image</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_thumb_image",
            "description": "<p>Post thumb image</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "likes",
            "description": "<p>Likes count</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "comments",
            "description": "<p>Comments count</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "liked",
            "description": "<p>post liked status 1-like 0-not</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "pagination",
            "description": "<p>Pagination details</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"posts\":[{\n       \"post_id\": 1,\n       \"user_id\": 8,\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/f6979db8.svg\",\n       \"post_thumb_image\": \"http:\\/\\/www.coloring.com\\/images/posts/thumbnails/f6979db8.svg\",\n       \"likes\": 5,\n       \"liked\": 1,\n       \"comments\": 8,\n     }],\n     \"pagination\": \n     {\n       \"total\": 24,\n       \"current_page\": 1,\n       \"last_page\": 3,\n       \"per_page\": 8,\n       \"prev_page_url\": null,\n       \"prev_page_url\": \"http:\\/\\/www.coloring.com\\/api/v1/listArtIdeas?page=2\",\n       \"from\": 1,\n       \"to\": 1,\n     },\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/inspire/",
    "title": "Explore-Inspire",
    "version": "0.0.1",
    "name": "inspire",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "posts",
            "description": "<p>Favourite posts.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>Post added user ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Post image</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_thumb_image",
            "description": "<p>Post thumbnail image</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "likes",
            "description": "<p>Likes count</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "comments",
            "description": "<p>Comments count</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "liked",
            "description": "<p>post liked status 1-like 0-not</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "is_favourite",
            "description": "<p>post favourite status 1-favourite 0-not favourite</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Date</p> ",
            "optional": false,
            "field": "created_at",
            "description": "<p>post created date</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "pagination",
            "description": "<p>Pagination details</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"posts\":[{\n       \"post_id\": 1,\n       \"post_name\": \"Yellow Rose\",\n       \"username\": \"John\",\n       \"user_id\": 8,\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/f6979db8.svg\",\n       \"post_thumb_image\": \"http:\\/\\/www.coloring.com\\/images/posts/thumbnails/f6979db8.svg\",\n       \"likes\": 5,\n       \"liked\": 1,\n       \"comments\": 8,\n       \"is_favourite\": 1,\n       \"created_at\": \"27/12/2016\",\n     }],\n     \"pagination\": \n     {\n       \"total\": 24,\n       \"current_page\": 1,\n       \"last_page\": 3,\n       \"per_page\": 8,\n       \"prev_page_url\": null,\n       \"prev_page_url\": \"http:\\/\\/www.coloring.com\\/api/v1/listArtIdeas?page=2\",\n       \"from\": 1,\n       \"to\": 1,\n     },\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/timeline/",
    "title": "Explore-Timeline",
    "version": "0.0.1",
    "name": "timeline",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "posts",
            "description": "<p>Favourite posts.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "username",
            "description": "<p>username.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>Post added user ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Post image</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_thumb_image",
            "description": "<p>Post thumbnail image</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "likes",
            "description": "<p>Likes count</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "comments",
            "description": "<p>Comments count</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "liked",
            "description": "<p>post liked status 1-like 0-not</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "is_favourite",
            "description": "<p>post favourite status 1-favourite 0-not favourite</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Date</p> ",
            "optional": false,
            "field": "created_at",
            "description": "<p>post created date</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "pagination",
            "description": "<p>Pagination details</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"posts\":[{\n       \"post_id\": 1,\n       \"post_name\": \"Yellow Rose\",\n       \"username\": \"John\",\n       \"user_id\": 8,\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/f6979db8.svg\",\n       \"post_thumb_image\": \"http:\\/\\/www.coloring.com\\/images/posts/thumbnails/f6979db8.svg\",\n       \"likes\": 5,\n       \"liked\": 1,\n       \"comments\": 8,\n       \"is_favourite\": 1,\n       \"created_at\": \"27/12/2016\",\n     }],\n     \"pagination\": \n     {\n       \"total\": 24,\n       \"current_page\": 1,\n       \"last_page\": 3,\n       \"per_page\": 8,\n       \"prev_page_url\": null,\n       \"prev_page_url\": \"http:\\/\\/www.coloring.com\\/api/v1/listArtIdeas?page=2\",\n       \"from\": 1,\n       \"to\": 1,\n     },\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/newPosts/",
    "title": "Explore-New Posts",
    "version": "0.0.1",
    "name": "newPosts",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "last_seen",
            "description": "<p>User last time goto this screen. First time app use this field is empty</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "posts",
            "description": "<p>Favourite posts.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>Post added user ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>Post image</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_thumb_image",
            "description": "<p>Post thumbnail image</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_name",
            "description": "<p>Post name</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "likes",
            "description": "<p>Likes count</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "comments",
            "description": "<p>Comments count</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "liked",
            "description": "<p>post liked status 1-like 0-not</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Datetime</p> ",
            "optional": false,
            "field": "last_seen",
            "description": "<p>User last time went to this screen</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"posts\":[{\n       \"post_id\": 1,\n       \"user_id\": 8,\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/f6979db8.svg\",\n       \"post_thumb_image\": \"http:\\/\\/www.coloring.com\\/images/posts/thumbnails/f6979db8.svg\",\n       \"likes\": 5,\n       \"liked\": 1,\n       \"comments\": 8,\n     }],\n     \"last_seen\": \"15-12-2016 09:00:00\",\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/deletePost/",
    "title": "Delete Post",
    "version": "0.0.1",
    "name": "deletePost",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<pPost ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\"\",\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UnauthorisedAccess",
            "description": "<p>Unauthorised Access.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/otherUserProfile/",
    "title": "Other User Profile",
    "version": "0.0.1",
    "name": "otherUserProfile",
    "group": "Gallery",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "friend_id",
            "description": "<pPost ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Array</p> ",
            "optional": false,
            "field": "posts",
            "description": "<p>selected user uploaded posts.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_id",
            "description": "<p>Post ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "user_id",
            "description": "<p>Post added user ID.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "post_image",
            "description": "<p>post image.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "post_thumb_image",
            "description": "<p>Post thumbnail image</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "likes",
            "description": "<p>Likes count</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "comments",
            "description": "<p>Comments count</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "liked",
            "description": "<p>post liked status 1-like 0-not</p> "
          },
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":\n {\n     \"user_id\": 1,\n     \"username\": \"David\",\n     \"photo\": \"http:\\/\\/www.coloring.com\\/images/profile/profile.jpg\",\n     \"followings\": 5,\n     \"followers\": 10,\n     \"is_follow\": 0,\n     \"posts\":[{\n       \"post_id\": 1,\n       \"user_id\": 1,\n       \"post_image\": \"http:\\/\\/www.coloring.com\\/images/posts/f6979db8.svg\",\n       \"post_thumb_image\": \"http:\\/\\/www.coloring.com\\/images/posts/thumbnails/f6979db8.svg\",\n       \"post_thumb_image\": \"http:\\/\\/www.coloring.com\\/images/posts/thumbnails/f6979db8.svg\",\n       \"likes\": 5,\n       \"liked\": 1,\n       \"comments\": 6,\n     }],\n   },\n \"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "Gallery"
  },
  {
    "type": "post",
    "url": "/subscribePackage/",
    "title": "Subscribe Package",
    "version": "0.0.1",
    "name": "subscribePackage",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "type",
            "description": "<p>Subscribe package type 1- monthly 2-yearly.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "package_expire_date",
            "description": "<p>Package expire date. (dd-mm-Y H:m:s)</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "is_expired",
            "description": "<p>Expired status  1-expired 0-not expired.</p> "
          },
          
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":{\n     \"package_expire_date\":\"22-01-2017 09:10:00\",\n     \"is_expired\":0,\n }\"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/subscriptionExpireDate/",
    "title": "Subscription Expire Date",
    "version": "0.0.1",
    "name": "subscriptionExpireDate",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "token",
            "description": "<p>Users ACCESS TOKEN.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "api_key",
            "description": "<p>API key.</p> "
          }
        ]
      }
    },
    "success": {
         "fields": {
        "Success 200": [
          {
            "group": "Parameter",
            "type": "<p>Integer</p> ",
            "optional": false,
            "field": "package_expire_date",
            "description": "<p>Package expire date.(dd-mm-Y H:m:s)</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "is_expired",
            "description": "<p>Expired status  1-expired 0-not expired.</p> "
          },
          
          
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n\"status\":\"SUCCESS\",\n\"result\":{\n     \"package_expire_date\":\"22-01-2017 06:17:00\",\n     \"is_expired\":0,\n }\"error\":''\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAPIKey",
            "description": "<p>The app api key was invalid.</p> "
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "InvalidAccessToken",
            "description": "<p>The access token was invalid.</p> "
          },
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 400 Bad Request\n{\n\"status\":\"ERROR\",\n\"result\":\n {\n },\n\"error\":'EmailAlreadyExist'\n}",
          "type": "json"
        }
      ]
    },
    "filename": "resources/API/api.js",
    "groupTitle": "User"
  },
  
] });