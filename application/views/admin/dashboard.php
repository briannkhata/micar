    <?php include 'menu.php';?>
    <!-- end: sidebar -->
    <section role="main" class="content-body">
        <header class="page-header">
            <h2><?=$page_title;?></h2>
        </header>
        <!-- start: page -->
        <div class="row">

                        <div class="row">
                            <div class="col-lg-6 col-xl-4">
                                <section class="card card-featured-primary mb-4">
                                    <div class="card-body">
                                        <div class="widget-summary">
                                            <div class="widget-summary-col widget-summary-col-icon">
                                                <div class="summary-icon bg-secondary">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <div class="widget-summary-col">
                                                <div class="summary">
                                                    <h4 class="title">Sellers</h4>
                                                    <div class="info">
                                                        <strong class="amount"><?=count($this->M_user->get_sellers());?></strong>
                                                    </div>
                                                </div>
                                                <div class="summary-footer">
                                                    <a class="text-muted text-uppercase">(view all)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div class="col-lg-6 col-xl-4">
                                <section class="card card-featured-secondary mb-4">
                                    <div class="card-body">
                                        <div class="widget-summary">
                                            <div class="widget-summary-col widget-summary-col-icon">
                                                <div class="summary-icon bg-secondary">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </div>
                                            </div>
                                            <div class="widget-summary-col">
                                                <div class="summary">
                                                    <h4 class="title">Cars</h4>
                                                    <div class="info">
                                                        <strong class="amount"><?=count($this->M_car->get_cars());?></strong>
                                                    </div>
                                                </div>
                                                <div class="summary-footer">
                                                    <a class="text-muted text-uppercase">(view all)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                              <div class="col-lg-6 col-xl-4">
                                <section class="card card-featured-secondary mb-4">
                                    <div class="card-body">
                                        <div class="widget-summary">
                                            <div class="widget-summary-col widget-summary-col-icon">
                                                <div class="summary-icon bg-secondary">
                                                    <i class="fas fa-filter"></i>
                                                </div>
                                            </div>
                                            <div class="widget-summary-col">
                                                <div class="summary">
                                                    <h4 class="title">Body Types</h4>
                                                    <div class="info">
                                                        <strong class="amount"><?=count($this->M_body->get_bodies());?></strong>
                                                    </div>
                                                </div>
                                                <div class="summary-footer">
                                                    <a class="text-muted text-uppercase">(view all)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                             <div class="col-lg-6 col-xl-4">
                                <section class="card card-featured-secondary mb-4">
                                    <div class="card-body">
                                        <div class="widget-summary">
                                            <div class="widget-summary-col widget-summary-col-icon">
                                                <div class="summary-icon bg-secondary">
                                                    <i class="fas fa-filter"></i>
                                                </div>
                                            </div>
                                            <div class="widget-summary-col">
                                                <div class="summary">
                                                    <h4 class="title">Models</h4>
                                                    <div class="info">
                                                        <strong class="amount"><?=count($this->M_model->get_models());?></strong>
                                                    </div>
                                                </div>
                                                <div class="summary-footer">
                                                    <a class="text-muted text-uppercase">(view all)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                             <div class="col-lg-6 col-xl-4">
                                <section class="card card-featured-secondary mb-4">
                                    <div class="card-body">
                                        <div class="widget-summary">
                                            <div class="widget-summary-col widget-summary-col-icon">
                                                <div class="summary-icon bg-secondary">
                                                    <i class="fas fa-filter"></i>
                                                </div>
                                            </div>
                                            <div class="widget-summary-col">
                                                <div class="summary">
                                                    <h4 class="title">Makes</h4>
                                                    <div class="info">
                                                        <strong class="amount"><?=count($this->M_make->get_makes());?></strong>
                                                    </div>
                                                </div>
                                                <div class="summary-footer">
                                                    <a class="text-muted text-uppercase">(view all)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
        </div>

        <!-- end: page -->
    </section>
    </div>
    </section>
    <?php include 'footer.php';?>