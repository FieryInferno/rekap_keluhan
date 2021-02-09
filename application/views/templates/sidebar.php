 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" data-widget="treeview" role="menu" data-accordion="false">
     <nav class="mt-2">
         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
             <div class="sidebar-brand-icon rotate-n-15">
                 <i class="far fa-clipboard"></i>
             </div>
             <div class="sidebar-brand-text mx-3">SI Kendala<sup></sup></div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider ">
         <!-- QUERRY MENU (JOIN 2 TABEL USER_MENU /USER-ACCESS_MENU on primary and foreignkey ) -->
         <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
        FROM `user_menu` JOIN `user_access_menu`   
          ON `user_menu` .`id` = `user_access_menu`.`menu_id`
       WHERE `user_access_menu`.`role_id`= $role_id
       ORDER BY `user_access_menu`.`menu_id` ASC
       ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

         <!-- LOOPING MENU-->
         <?php foreach ($menu as $m) : ?>
             <div class="sidebar-heading">
                 <div href="" class="sidebar-heading" style="color: aliceblue;font-size: 12 px;">
                     <?= $m['menu']; ?></div>
             </div>




             <!-- SIAPKAN SUB-MENU SESUAI MENU JOIN TABEL MENU DAN SUB MENU -->
             <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT*
            FROM `user_sub_menu` JOIN `user_menu`   
            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            WHERE `user_sub_menu`.`menu_id`= $menuId
            AND `user_sub_menu`.`is_active` = 1";

                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
             <?php foreach ($subMenu as $sm) : ?>
                 <?php if ($title == $sm['title']) : ?>
                     <li class="nav-item active">
                     <?php else : ?>
                     <li class="nav-item">
                     <?php endif; ?>
                     <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                         <i class="<?= $sm['icon']; ?>"></i>
                         <span><?= $sm['title']; ?></span></a>
                     </li>
                 <?php endforeach; ?>

                 <hr class="sidebar-divider mt-3">


             <?php endforeach; ?>

             <!-- Divider -->


             <li class="nav-item ">
                 <a class="nav-link" href=" <?= base_url('auth/logout'); ?>">
                     <i class="fas fa-sign-out-alt"></i>
                     <span>Log out</span></a>
             </li>
     </nav>
     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
 </ul>

 <!-- End of Sidebar -->