<?php

namespace App\Core\Facades;

use Illuminate\Support\Facades\View;

class Flash {
	const MSG_SUCCESS = 'success';
	const MSG_INFO = 'info';
	const MSG_WARNING = 'warning';
	const MSG_ERROR = 'error';

	protected static $key = 'messages';

	public static function put($text='', $type = 'success', $sticky = false) {
		$message = compact('text', 'type', 'sticky');

		if (session()->has(static::$key)) {
			$messages = session()->get(static::$key);
		}

		$messages[] = $message;
		session()->flash(static::$key, $messages);
	}

	public static function success($text='', $sticky=false) {
		static::put($text, static::MSG_SUCCESS, $sticky);
	}

	public static function info($text='', $sticky=false) {
		static::put($text, static::MSG_INFO, $sticky);
	}

	public static function warning($text='', $sticky=false) {
		static::put($text, static::MSG_WARNING, $sticky);
	}

	public static function error($text='', $sticky=false) {
		static::put($text, static::MSG_ERROR, $sticky);
	}

	public static function render() {
		$messages = [];
		if (session()->has(static::$key)) {
			$messages = session()->pull(static::$key);
		}

		return view('elements.flash', compact('messages'))->render();
	}
}