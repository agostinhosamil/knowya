<?php

function partial (string $partialFileAlias) {
  $htmlPartialsPath = join(DIRECTORY_SEPARATOR, [dirname(dirname(__DIR__)), 'html']);
  $phpPartialsPath = dirname(__DIR__);

  $partialFileAlias = join('', ['-ex_', $partialFileAlias]);
  
  $extensionRe = '/(\.php)$/i';

  if (!preg_match ($extensionRe, $partialFileAlias)) {
    $partialFileAliasFileName = join('.', [$partialFileAlias, 'php']);

    $partialFileAliasAlternates = [
      $partialFileAliasFileName, 
      join(DIRECTORY_SEPARATOR, [$partialFileAlias, 'index.php'])
    ];
  } else {
    $partialFileAliasAlternates = [
      $partialFileAlias
    ];
  }

  $partialsPaths = [
    $htmlPartialsPath,
    $phpPartialsPath
  ];

  foreach ($partialsPaths as $partialPath) {
    foreach ($partialFileAliasAlternates as $partialFileAliasAlternate) {
      $partialFileAbsolutePath = join(DIRECTORY_SEPARATOR, [
        $partialPath, 
        $partialFileAliasAlternate
      ]);

      if (is_file($partialFileAbsolutePath)) {
        $context = function ($partialFilePath, array $props) {
          $re = '/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/';
          
          foreach ($props as $prop => $value) {
            if (preg_match ($re, $prop)) {
              $$prop = $value;
            }
          }

          @include $partialFilePath;
        };

        $args = func_get_args ();

        $secondArgument = count($args) >= 2 ? $args[1] : [];

        $props = is_array ($secondArgument) ? $secondArgument : [];

        $lastArgument = $args [-1 + count($args)];

        $yieldContext = $lastArgument instanceof Closure ? $lastArgument : null;

        $contextArguments = [$partialFileAbsolutePath, $props, $yieldContext];

        return call_user_func_array ($context, $contextArguments);
      }
    }
  }
}
