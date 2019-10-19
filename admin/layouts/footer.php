</div>
</div>
<!-- /page content -->
</div><!--main-content-->
</div><!--container body-->
<footer>
    <div class="pull-right">
        &copy; Copyright <?php echo date('Y'); ?> - <a href="/">Store Trang Sức</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/starrr/dist/starrr.js"></script>
<!-- validator -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/validator/validator.js"></script>
<!-- Dropzone.js -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/dropzone/dist/min/dropzone.min.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!--checkeditor-->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/ckeditor/ckeditor.js"></script>
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/ckeditor/build-config.js"></script>
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/inputfile/fileinput.js"
        type="text/javascript"></script>
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<!-- Chart.js -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/vendors/Chart.js/dist/Chart.min.js"></script>
<script>
    var editor = CKEDITOR.replace('textarea');
    var editor1 = CKEDITOR.replace('textarea1');
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>
<script>
    $('#myDatepicker').datetimepicker();
    $('#data-table').DataTable();
</script>
<script>
    $(document).on('ready', function () {
        $("#file-view").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            maxFileCount: 10,
            mainClass: "input-group-lg"
        });
    });
</script>
<script>
    function ChangeToSlug()
    {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("title").value;

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
</script>
<script>
    $(document).ready(function() {
        $("#input-24").fileinput({
            uploadUrl: '/file-upload-batch/2',
            maxFilePreviewSize: 10240
        });
    });
</script>
<!-- Custom Theme Scripts -->
<script src="<?php echo curPageURL(); ?>admin/public/admin/build/js/custom.min.js"></script>
<script src="<?php echo curPageURL(); ?>admin/public/admin/main/main.js"></script>
</body>
</html>