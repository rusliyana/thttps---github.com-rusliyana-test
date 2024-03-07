  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA USER</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
    <tr>
    <td>id</td>
    <td>NAMA USER</td>
    <td>EMAIL</td>
</tr>

</thead>
<tbody>

<?php foreach ($user as $user_name) : ?>
    <tr>
        <td><?php echo $user_name['id']; ?></td>
        <td><?php echo $user_name['name']; ?></td>
        <td><?php echo $user_name['email']; ?></td>
        <td>

    <?php endforeach; ?>

</table>

</div>
</div>
</div>
</div>
         