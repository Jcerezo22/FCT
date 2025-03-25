<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // Autenticacion CAS
  require_once 'config.php';
  require_once 'vendor/autoload.php';
  phpCAS::setLogger();
  phpCAS::setVerbose(true);
  phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context, $client_service_name);
  phpCAS::setNoCasServerValidation();

  phpCAS::setHTMLHeader(
      '<html>
    <head>
      <title>__TITLE__</title>
    </head>
    <body>
    <h1>__TITLE__</h1>' 
  );
  phpCAS::setHTMLFooter(
      '<hr>
      <address>
        phpCAS __PHPCAS_VERSION__,
        CAS __CAS_VERSION__ (__SERVER_BASE_URL__)</address>
    </body>
  </html>' 
  );
  
  try {
      phpCAS::forceAuthentication();
  } catch (Exception $e) {
      echo "<SCRIPT>location.href='https://pruebas.maristaschamberi.com/'</SCRIPT>";
      exit();
  }
?>
