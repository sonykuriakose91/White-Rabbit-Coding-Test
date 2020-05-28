<section class="content-header">
    <h1>
        Listings
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add Listing</h3>
                    <div class="box-tools">
                    </div>
                </div>
                <div class="box-body">
                    <?php echo form_open_multipart('listing/add_listing'); ?>
                    <div class="box-body">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <label class="control-label"><span class="text-danger">*</span>File</label>
                                <div class="form-group">
                                    <input type="file" name="upload_files" class="form-control" required="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">
                            <i class="fa fa-check"></i> Save
                        </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>