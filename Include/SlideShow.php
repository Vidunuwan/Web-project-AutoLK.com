<?php 
	$title="Slide show";
	require_once('Include/header.php');
?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $sourse1 ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Welcome</h3>
        <p>Sri lanka's number one online auto parts market place</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo $sourse2 ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>All in one place</h5>
        <p>All the accessories your vehicle needs</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo $sourse3 ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5></h5>
        <p></p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<?php require_once('Include/footer.php');?>