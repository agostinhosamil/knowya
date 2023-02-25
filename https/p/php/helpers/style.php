<?php

function style_path (string $stylePath) {
  return ((defined ("BASE_URL")) ? BASE_URL : "/") . 'https/css/' . $stylePath;
}
