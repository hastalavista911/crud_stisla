<!-- Main Content -->
<?php $cek_session = $this->session->userdata("role");?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Active Users</h4>
                        </div>
                        <div class="card-body">
                            <?= $active_users ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>