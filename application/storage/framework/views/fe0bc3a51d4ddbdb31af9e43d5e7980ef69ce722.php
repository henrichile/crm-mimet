<!--modal-->
<div class="modal card-modal" role="dialog" aria-labelledby="cardModal" id="cardModal">
    <div class="modal-dialog" id="cardModalContainer">
        <div class="modal-content hidden" id="cardModalContent">
            <div class="modal-body row min-h-200" id="cardModalBody">
                <!--close button-->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ti-close"></i>
                </button>

                <!--left panel-->
                <div class="col-lg-6 card-left-panel" id="card-leads-left-panel">
                </div>

                <!--right panel-->
                <div class="col-lg-6 card-right-panel" id="card--leads-right-panel">
                </div>
            </div>
            <!--convert to customer-->
            <form id="convertLeadForm">
                <div class="modal-body row hidden min-h-200"id="leadConvertToCustomer">
                    <!--close button-->
                    <button type="button" class="close js-lead-convert-to-customer-close" aria-hidden="true"
                        id="js-close-convert-lead-form">
                        <i class="ti-close"></i>
                    </button>
                    <?php echo $__env->make('pages.lead.convert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="modal-footer text-right hidden" id="leadConvertToCustomerFooter">
                </div>
            </form>
        </div>
    </div>
</div>
<!--js dom elements-->
<?php echo $__env->make('pages.lead.components.js-elements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/mimet.etasoft.cl/public_html/application/resources/views/pages/lead/modal.blade.php ENDPATH**/ ?>