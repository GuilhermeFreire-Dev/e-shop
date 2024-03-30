<?php

namespace App\Enums;
use Illuminate\Support\Facades\Http;

enum HttpStatusCodeEnum: int 
{
  case OK = 200;
  case CREATED = 201;
  case ACCEPTED = 202;
  case BAD_REQUEST = 400;
  case NOT_FOUND = 404;
  case SERVER_ERROR = 500;

}