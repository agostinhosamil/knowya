<?php

function image (string $imagePath) {
  return ((defined ("BASE_URL")) ? BASE_URL : "/") . 'https/im/' . $imagePath;
}
