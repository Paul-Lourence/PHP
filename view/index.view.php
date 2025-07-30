<?php



use function Core\base_path;

require base_path("partials/head.php");

require base_path("partials/nav.php") ;

 require base_path("partials/banner.php") ;
 ?>
 
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <p>Hello. <? $_SESSION["user"] ["email"] ?? "Guest" ?>Welcome to the home page.</p>
    </div>
  </main>
</div>

    
  <?php require base_path("partials/footer.php") ?>