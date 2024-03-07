
<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">BUKU</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
    <tr>
    <td>ID</td>
    <td>TAJUK</td>
    <td>SINOPSIS</td>
    <td>BUKU</td>
    <td colspan="2">DOWNLOAD</td>

</tr>

<?php foreach ($news as $news_item) : ?>
    <tr>
        <td><?php echo $news_item['id']; ?></td>
        <td><?php echo $news_item['title']; ?></td>
        <td><?php echo $news_item['text']; ?></td>
        <td><?php echo $news_item['buku']; ?></td>
        <td>

        <a href="<?php echo base_url() ?>user/download/<?php echo $news_item['id']; ?>" class="dwn">download</a>
</td>
</tr>

    <?php endforeach; ?> 

</tbody>
</table>

</div>
</div>
</div>
</div>
