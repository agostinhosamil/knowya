<?php

function yields () {
  $backTrace = debug_backtrace();

  $trace = isset ($backTrace[2]) ? $backTrace[2] : [];

  if (isset ($trace ['args']) && is_array ($trace ['args'])) {
    $arguments = $trace ['args'];

    if (count ($arguments) >= 1) {
      $lastArgument = $arguments [-1 + count ($arguments)];

      if ($lastArgument instanceof Closure) {
        call_user_func ($lastArgument);
      }
    }
  }
}
