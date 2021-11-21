<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://localhost/ciblog/application/views/templates/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>CI Blog</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid" style="background-color:red;">
      <a class="navbar-brand" href="#">Nikhil's Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>posts">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>categories">Categories</a>
          </li>

        </ul>
        <ul class="nav navbar-nav navbar-right" style="padding-right: 67px;">

          <?php if (!$this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>users/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>users/register">Register</a>
            </li>
          <?php endif; ?>
          <?php if ($this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>posts/create">New Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>categories/create">New Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>users/logout">Logout</a>
            </li>
          <?php endif; ?>
        </ul>

      </div>
    </div>
  </nav>
  <div class="container">


    <!-- Flash messages -->
    <?php if ($this->session->flashdata('user_registered')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_created')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_created') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_updated')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_updated') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_created')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_created') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_deleted')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_deleted') . '</p>'; ?>
    <?php endif; ?>




    <?php if ($this->session->flashdata('login_failed')) : ?>
      <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedin')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedout')) : ?>
      <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_deleted')) : ?>
      <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('category_deleted') . '</p>'; ?>
    <?php endif; ?>
  </div>