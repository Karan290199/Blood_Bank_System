<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
</head>
<body>
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/cc1.jpg" width="1366" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/cc2.jpg" width="1366" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/cc4.jpg" width="1366" height="500">
    </div>
    <div class="carousel-item">
      <img src="images/cc3.jpg" width="1366" height="500">
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<section class="my-3">
  <div class="py-2">
    <h2 class="text-center">Why Donate Blood?</h2>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/cc5.jpg" width = 1100px class="img-fluid aboutimg">
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <img src="images/cc4.jpg" width = 1100px class="img-fluid aboutimg">
      </div>
      <div class="col-lg-4 col-md-4 col-12">
        <p class="bg-danger text-white">It saves lives — what else do you need to know?</p>
        <p class="bg-danger text-white">It is not more painful then losing a loved one that you may save by donating!</p>
        <p class="bg-danger text-white">It is your civic duty.</p>
        <p class="bg-danger text-white">Because we know too many people who can’t give blood.</p>
        <p class="bg-danger text-white">Because some day, I may need someone to do the same for me.</p>
        <p class="bg-danger text-white">Do unto others, as you would have them do unto you!</p>
        <p class="bg-danger text-white">Because if you need blood one day, you would not hesitate to take it, so why would you hesitate to give it?</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
        <p class=" text-white">Blood donation is important because maintaining an adequate blood supply in our community secures blood transfusions for patients.</p>
        <p class="bg-danger text-white">Because I can.</p>
        <p class="bg-danger text-white">Nutter Butters.</p>
        <p class="bg-danger text-white">The question is, why not give blood?</p>
        <p class="bg-danger text-white">It gives donors a medical check at no cost. </p>
        <p class="bg-danger text-white">Free cookies, juice and the satisfaction of helping others.</p>
        <p class="bg-danger text-white">I can’t discover a cure for cancer, but I can help keep someone alive while they are waiting for a cure.</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12"><img src="images/cc3.jpg" class="img-fluid aboutimg"></div>
    </div>
  </div>
</section>
</div>
<script src="content/js/jquery.min.js"></script>
<script src="content/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>
</body>
</html>
