<?php

function script (string $scriptPath) {
  return ((defined ("BASE_URL")) ? BASE_URL : "/") . 'https/js/' . $scriptPath;
}
