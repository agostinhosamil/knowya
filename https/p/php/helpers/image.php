<?php

function image_path (string $imagePath) {
  return ((defined ("BASE_URL")) ? BASE_URL : "/") . 'https/im/' . $imagePath;
}
