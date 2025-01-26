    <div class="col-lg-8  col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex m-b-30">
                    <h5 class="card-title m-b-0 align-self-center">Leeds Contratados V/S Leeds Perdidos</h5>
                    <div class="ml-auto align-self-center">
                        <ul class="list-inline font-12">
                            <li><span class="label label-success label-rounded"><i class="fa fa-circle"></i> Contratados</span></li>
                            <li><span class="label label-info label-rounded"><i class="fa fa-circle text-info"></i>Perdidos(No Contratados)</span></li>
                        </ul>
                    </div>
                </div>
                <div class="incomeexpenses ct-charts" id="admin-dhasboard-income-vs-expenses"></div>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h2 class="m-b-0 font-light"><?php echo e($payload['income']['year']); ?></h2>
                        <small><?php echo e(cleanLang(__('lang.period'))); ?></small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h2 class="m-b-0 font-light"><?php echo e("$".number_format($payload['income']['total'],"0",",",".")); ?></h2>
                        <small>Contratados</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h2 class="m-b-0 font-light"><?php echo e("$".number_format($payload['expenses']['total'],"0",",",".")); ?></h2>
                        <small>Perdidos (No Contratados)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--[DYNAMIC INLINE SCRIPT] - Backend Variables to Javascript Variables-->
    <script>
        NX.admin_home_chart_income = JSON.parse('<?php echo json_encode(clean($payload["income"]["monthly"])); ?>', true);
        NX.admin_home_chart_expenses = JSON.parse('<?php echo json_encode(clean($payload["expenses"]["monthly"])); ?>', true);
        NX.admin_home_c3_leads_title = "<?php echo e($payload['leads_chart_center_title']); ?>";
    </script><?php /**PATH /home/crmhuelen/public_html/application/resources/views/pages/home/admin/widgets/second-row/income.blade.php ENDPATH**/ ?>