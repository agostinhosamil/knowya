<?php

function style (string $stylePath) {
  return ((defined ("BASE_URL")) ? BASE_URL : "/") . 'https/css/' . $stylePath;
}
