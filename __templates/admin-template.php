<!-- include "header.php"; -->

<div class="container-fluid padding">
   <div class="row text-right">
      <div class="col-12">
         <p class="dashboard-name">

         {{ welcome-message }}

         </p>
      </div>
   </div>
</div>

{{ section-admin-dashboard | section-admin-comment | section-admin-add | section-admin-edit }}