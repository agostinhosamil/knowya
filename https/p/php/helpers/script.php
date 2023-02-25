<?php

function script_path (string $scriptPath) {
  return ((defined ("BASE_URL")) ? BASE_URL : "/") . 'https/js/' . $scriptPath;
}
