 <!--Header Start-->
 <?php include('inc/header.php') ?>
 <!--Header End-->


 <section class="dasboard_info">
     <div class="container-fluid">
         <div class="dashboard-tab-innr">
             <div class="capa-outr">
                 <div class="row mt-5">
                     <div class="col-md-12">
                         <form action="" method="get">
                             <label for="zip_code" class="form-label">Search By ZIP</label>

                             <div class="input-group mb-3">
                                 <input type="number" class="form-control zip-validation" id="zip_code" name="zip_code" value="<?php echo $_GET['zip_code'] ?? null ?>" placeholder="Zip code">
                                 <div class="input-group-append">
                                     <button class="btn btn-outline-secondary" type="submit">Search
                                         Plans</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="row mt-5">
                     <div class="col-md-12">
                         <?php if ($carriers > 0) : ?>

                             <?php foreach ($carriers as $key) : ?>
                                 <div class="card mb-3">
                                     <div class="card-body">
                                         <h4 class="card-title"><?php echo $key->company ?></h4>
                                         <div class="carrier-info d-flex justify-content-between">
                                             <img style="display: none;" src="https://www.highspeedinternet.com/app/uploads/2018/11/Cox-Center-Color-1-300x188.png" alt="" width="120px">

                                             <div class="contact-details">
                                                 <p>Carrier Type - <?php echo $key->carrier_type ?></p>

                                                 <p>Contact Details - <a style="color: #47a79c;" href="tel:+<?php echo $key->customer_service ?>"><?php echo $key->customer_service ?></a>
                                                 </p>
                                             </div>

                                             <div class="carrier-link">
                                                 <a name="carrier-link" id="carrier-link" class="btn btn-link" href="<?php echo $key->website ?>" role="button">View Plan</a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             <?php endforeach; ?>

                         <?php endif; ?>

                         <?php if (isset($_GET['zip_code']) && count($carriers) == 0) : ?>
                             <div class="card mb-3 p-3">
                                 Sorry no plans found on this (<?php echo $_GET['zip_code'] ?>) zip code
                             </div>
                         <?php endif; ?>


                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <?php include('inc/footer.php') ?>


 <?php include('inc/common_scripts.php') ?>

 <script>
     $(document).on("keypress", ".zip-validation", function(e) {
         if (e.target.value.length > 8) {
             e.preventDefault();
         }
         return !/[0-9]/.test(e.key) ? e.preventDefault() : null;
     })
 </script>

 </body>

 </html>