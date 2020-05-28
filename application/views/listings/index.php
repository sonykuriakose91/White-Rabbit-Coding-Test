<section class="content-header">
    <h1>
        <div class="col-md-5">
            <form method='post' action="<?= ($this->uri->segment(3) == "Deleted") ? base_url('listing/index/Deleted') : base_url('listing/index'); ?>" >
                <input type='text' name='search' value='<?= $search ?>'><input type='submit' name='submit' value='Submit'>
            </form>
        </div>
        Listings
        <a href="<?= base_url('listing/add'); ?>" class="btn btn-success btn-sm pull-right">Add File</a>
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Clients Listing</h3>
                    <div class="box-tools">
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped data_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>File Name</th>
                                <th>File Type</th>
                                <?php if ($this->uri->segment(3) != "" && $this->uri->segment(3) == "Deleted") { ?>
                                    <th>Deleted Time</th>
                                    <?php
                                }
                                else {
                                    ?>
                                    <th>Uploaded Time</th>
                                <?php } ?>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($uploaded_files as $key => $file) { ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $file["file_name"]; ?></td>
                                    <td><?= $file["file_type"]; ?></td>
                                    <td><?= date("d-m-Y h:i:s A", strtotime($file["uploaded_at"])); ?></td>
                                    <td>
                                        <?php if ($file["status"] == "Active") { ?>
                                            <a href="<?= base_url('listing/remove/' . $file["id"]); ?>" onclick="return confirm('Delete?');" class="btn btn-xs btn-danger">Delete</a>
                                            <?php
                                        }
                                        else {
                                            echo "#";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>  
                    <div style='margin-top: 10px;margin-right: 20px;padding: 10px;font-size: 20px;'>
                        <?= $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>