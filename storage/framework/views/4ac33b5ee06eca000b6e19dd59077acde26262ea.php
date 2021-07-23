<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Balance Sheet')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/html2pdf.bundle.min.js')); ?>"></script>
    <script>
        var filename = $('#filename').val();

        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,
                filename: filename,
                image: {type: 'jpeg', quality: 1},
                html2canvas: {scale: 4, dpi: 72, letterRendering: true},
                jsPDF: {unit: 'in', format: 'A2'}
            };
            html2pdf().set(opt).from(element).save();
        }

    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="row d-flex justify-content-end">
        <div class="col-auto">
            <?php echo e(Form::open(array('route' => array('report.balance.sheet'),'method' => 'GET','id'=>'report_bill_summary'))); ?>

            <div class="all-select-box">
                <div class="btn-box">
                    <?php echo e(Form::label('start_date', __('Start Date'),['class'=>'text-type'])); ?>

                    <?php echo e(Form::date('start_date',$filter['startDateRange'], array('class' => 'month-btn form-control'))); ?>

                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="all-select-box">
                <div class="btn-box">
                    <?php echo e(Form::label('end_date', __('End Date'),['class'=>'text-type'])); ?>

                    <?php echo e(Form::date('end_date',$filter['endDateRange'], array('class' => 'month-btn form-control'))); ?>

                </div>
            </div>
        </div>
        <div class="col-auto my-auto">
            <a href="#" class="apply-btn" onclick="document.getElementById('report_bill_summary').submit(); return false;" data-toggle="tooltip" data-original-title="<?php echo e(__('apply')); ?>">
                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
            </a>
            <a href="<?php echo e(route('report.balance.sheet')); ?>" class="reset-btn" data-toggle="tooltip" data-original-title="<?php echo e(__('Reset')); ?>">
                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
            </a>
            <a href="#" class="action-btn" onclick="saveAsPDF()" data-toggle="tooltip" data-original-title="<?php echo e(__('Download')); ?>">
                <span class="btn-inner--icon"><i class="fas fa-download"></i></span>
            </a>
        </div>
    </div>
    <?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="printableArea">
        <div class="row mt-4">
            <div class="col">
                <input type="hidden" value="<?php echo e(__('Balance Sheet').' '.'Report of'.' '.$filter['startDateRange'].' to '.$filter['endDateRange']); ?>" id="filename">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0"><?php echo e(__('Report')); ?> :</h5>
                    <h5 class="report-text mb-0"><?php echo e(__('Balance Sheet')); ?></h5>
                </div>
            </div>

            <div class="col">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0"><?php echo e(__('Duration')); ?> :</h5>
                    <h5 class="report-text mb-0"><?php echo e($filter['startDateRange'].' to '.$filter['endDateRange']); ?></h5>
                </div>
            </div>
        </div>

        <div class="row">
            <?php $__currentLoopData = $chartAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $accounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $totalNetAmount=0; ?>

                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accountData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $accountData['account']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $totalNetAmount+=$account['netAmount']; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="card p-4 mb-4">
                        <h5 class="report-text gray-text mb-0"><?php echo e(__('Total'.' '.$type)); ?></h5>
                        <h5 class="report-text mb-0">
                            <?php if($totalNetAmount<0): ?>
                                <?php echo e(__('Dr').'. '.\Auth::user()->priceFormat(abs($totalNetAmount))); ?>

                            <?php elseif($totalNetAmount>0): ?>
                                <?php echo e(__('Cr').'. '.\Auth::user()->priceFormat($totalNetAmount)); ?>

                            <?php else: ?>
                                <?php echo e(\Auth::user()->priceFormat(0)); ?>

                            <?php endif; ?>
                        </h5>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="row mb-4">
            <?php $__currentLoopData = $chartAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $accounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-12 mb-4">
                    <h5 class="text-muted"><?php echo e($type); ?></h5>
                    <div class="row">
                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="col-lg-4 col-md-4 mb-4">
                                <div class="card card-fluid">
                                    <table class="table table-flush">
                                        <thead>
                                        <tr>
                                            <th colspan="2" width="80%"><h6> <?php echo e($account['subType']); ?></h6></th>
                                        </tr>
                                        <tr>
                                            <th width="80%"> <?php echo e(__('Account')); ?></th>
                                            <th> <?php echo e(__('Amount')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="balance-sheet-body">
                                        <?php $totalCredit=0;$totalDebit=0;?>
                                        <?php $__currentLoopData = $account['account']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $totalCredit+=$record['totalCredit'];
                                                $totalDebit+=$record['totalDebit'];
                                            ?>
                                            <tr>
                                                <td><?php echo e($record['account_name']); ?></td>
                                                <td>
                                                    <?php if($record['netAmount']<0): ?>
                                                        <?php echo e(__('Dr').'. '.\Auth::user()->priceFormat(abs($record['netAmount']))); ?>

                                                    <?php elseif($record['netAmount']>0): ?>
                                                        <?php echo e(__('Cr').'. '.\Auth::user()->priceFormat($record['netAmount'])); ?>

                                                    <?php else: ?>
                                                        <?php echo e(\Auth::user()->priceFormat(0)); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Total').' '.$account['subType']); ?></th>
                                            <th>
                                                <?php $total= $totalCredit-$totalDebit; ?>
                                                <?php if($total<0): ?>
                                                    <?php echo e(__('Dr').'. '.\Auth::user()->priceFormat(abs($total))); ?>

                                                <?php elseif($total>0): ?>
                                                    <?php echo e(__('Cr').'. '.\Auth::user()->priceFormat($total)); ?>

                                                <?php else: ?>
                                                    <?php echo e(\Auth::user()->priceFormat(0)); ?>

                                                <?php endif; ?>
                                            </th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/zigoair/resources/views/report/balance_sheet.blade.php ENDPATH**/ ?>