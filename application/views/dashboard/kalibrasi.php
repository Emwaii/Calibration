<!-- Head -->
<?php $this->load->view('component/_head') ?>
<!-- Head -->

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <span class="loader"></span>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->


        <!-- ****** Top Header -->
        <?php $this->load->view('component/_header') ?>
        <!-- ****** Top Header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <?php $this->load->view('component/_sidebar') ?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <!-- <h6 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome Jason!</h6> -->
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a>
                                        <i class="fas fa-angle-double-right"></i> Master Kalibrasi
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Kalibrasi</h4>
                                <hr>
                                <h6 class="card-subtitle">
                                    <div class="btn-list">
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#success-header-modal"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                    </div>
                                </h6>
                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Alat</th>
                                                <th>Tanggal Kalibrasi</th>
                                                <th>Lampiran</th>
                                                <th>Quality Pass</th>

                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($kalibrasi as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?php echo $data->nama_alat ?></td>
                                                    <td><?php echo $data->tgl_kalibrasi ?></td>
                                                    <td><a href="<?php echo base_url('upload/kalibrasi/file_lampiran/' . $data->lampiran) ?>"> <?php echo $data->lampiran ?> </a></td>
                                                    <td><?php echo $data->quality_pass ?></td>
                                                    <td>
                                                        <a href="#!" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit-<?= $data->id_kalibrasi ?>">
                                                            <i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                                                        </a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('Kalibrasi/delete_kalibrasi/' . $data->id_kalibrasi) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
                                                            <i class="icon-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Row -->
                <!-- End Location and Earnings Charts Section -->

                <!-- Start Top Leader Table -->
                <!-- <?php //$this->load->view('component/_table') 
                        ?> -->
                <!-- End Top Leader Table -->
            </div>

            <!-- End Container fluid  -->

            <!-- footer -->
            <?php $this->load->view('component/_footer') ?>
            <!-- End footer -->

        </div>
        <!-- End Page wrapper  -->

    </div>
    <!-- End Wrapper -->

    <!-- Jquery -->
    <?php $this->load->view('component/_jquery') ?>
    <!-- End JQuery -->

    <!-- Form Add Modal -->
    <div id="success-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="success-header-modalLabel">Form Tambah Kalibrasi
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="<?php echo base_url('Kalibrasi/save_kalibrasi') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">

                        <div class="form-group">
                            <label for="nama_alat"><strong>Nama Alat</strong></label>
                            <select class="form-control" name="id_alat" id="id_alat">
                                <option selected disabled value="">Choose...</option>
                                <?php foreach ($alat as $l) { ?>
                                    <option value="<?php echo $l['id_alat']; ?>"><?php echo $l['nama_alat']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="lokasi_alat"><strong>Tanggal Kalibrasi</strong></label>
                        <div class="input-group date" id="pengadaan_alat">
                            <input type="text" class="form-control" name="tgl_kalibrasi" id="tgl_kalibrasi" />
                            <span class="input-group-append">
                                <span class="input-group-text bg-light d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>



                        <div class="form-group">
                            <label for="lampiran"><strong>Lampiran</strong></label>
                            <input type="file" class="form-control form-control-file" name="lampiran" id="lampiran" accept=".pdf">
                        </div>
                        <div class="form-group">
                            <label for="quality_pass"><strong>Quality Pass</strong></label>
                            <select id="quality_pass" name="quality_pass" class="form-control">
                                <option selected>Choose...</option>
                                <option>Layak</option>
                                <option>Tidak Layak</option>
                            </select>
                        </div>
                        <!-- End Form -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal Edit -->
    <?php foreach ($kalibrasi as $data) : ?>
        <div class="modal fade" id="edit-<?= $data->id_kalibrasi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Kalibrasi</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo base_url('Kalibrasi/update_kalibrasi') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">

                            <input type="text" hidden name="id_kalibrasi" id="id_kalibrasi" value="<?= $data->id_kalibrasi ?>">
                            <div class="">
                                <label for="nama_alat"><strong>Nama Alat</strong></label>
                                <select class="form-control" name="id_alat" id="id_alat">

                                    <?php foreach ($alat as $l) { ?>
                                        <?php if ($l['id_alat'] == $data->id_alat) : ?>
                                            <option value="<?php echo $l['id_alat']; ?>" <?= 'selected ="selected"' ?>><?php echo $l['nama_alat']; ?> </option>
                                        <?php else : ?>
                                            <option value="<?php echo $l['id_alat']; ?>"><?php echo $l['nama_alat']; ?> </option>
                                        <?php endif; ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <label for="lokasi_alat"><strong>Tanggal Kalibrasi</strong></label>
                            <div class="input-group date" id="pengadaan_alat">
                                <input type="text" class="form-control" name="tgl_kalibrasi" id="tgl_kalibrasi" value="<?= $data->tgl_kalibrasi ?>" />
                                <span class="input-group-append">
                                    <span class="input-group-text bg-light d-block">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>

                            <input type="hidden" name="oldlampiran" id="oldlampiran" value="<?= $data->lampiran ?>" />

                            <div class="form-group">
                                <label for="lampiran"><strong>Lampiran</strong></label>
                                <input type="file" class="form-control form-control-file" name="lampiran" id="lampiran" accept=".pdf">
                            </div>
                            <div class="form-group">
                                <label for="quality_pass"><strong>Quality Pass</strong></label>
                                <select id="quality_pass" name="quality_pass" class="form-control">

                                    <?php if ('Tidak Layak' == $data->quality_pass) : ?>
                                        <option>Layak</option>
                                        <option value="<?= $data->quality_pass ?>" <?= 'selected ="selected"' ?>><?= $data->quality_pass ?> </option>
                                    <?php elseif ('Layak' == $data->quality_pass) : ?>
                                        <option value="<?= $data->quality_pass ?>" <?= 'selected ="selected"' ?>><?= $data->quality_pass ?> </option>
                                        <option>Tidak Layak</option>
                                    <?php else : ?>
                                        <option>Layak</option>
                                        <option>Tidak Layak</option>
                                    <?php endif; ?>

                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Edit End -->

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

        });
    </script>