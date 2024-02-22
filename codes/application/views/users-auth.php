<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Load Global Scripts --> 
    <?php $this->load->view('partials/global-scripts'); ?>
    <!-- Load Auth Scripts -->
    <script src=<?= base_url("assets/scripts/local/auth/auth.js") ?>></script>
    
</head>
<body>
<?php $this->load->view('partials/auth/auth-header'); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6" id="auth-form">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <a href="/" id="auth-switch"></a>
    </div>
</body>
</html>