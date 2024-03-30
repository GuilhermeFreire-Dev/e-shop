<?php

namespace App\Utils;
use Throwable;

class Log
{
	public static function error(Throwable $throwable): array
	{
		$uuid = uuid_create();
		\Illuminate\Support\Facades\Log::error("[{$uuid}][{$throwable->getFile()}][{$throwable->getLine()}]\n[{$throwable->getMessage()}]");
		return [
			'uuid'=> $uuid,
			'error'=> $throwable->getMessage(),
		];
	}

	public static function alert(Throwable $throwable): array
	{
		$uuid = uuid_create();
		\Illuminate\Support\Facades\Log::alert("[{$uuid}][{$throwable->getFile()}][{$throwable->getLine()}]\n[{$throwable->getMessage()}]");
		return [
			'uuid'=> $uuid,
			'error'=> $throwable->getMessage(),
		];
	}
}