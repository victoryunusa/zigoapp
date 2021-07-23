<?php $__env->startPush('script-page'); ?>
    <script src="https://js.stripe.com/v3/"></script>

    <script type="text/javascript">
            <?php if($plan->price > 0.0 && env('ENABLE_STRIPE') == 'on' && !empty(env('STRIPE_KEY')) && !empty(env('STRIPE_SECRET'))): ?>
        var stripe = Stripe('<?php echo e(env('STRIPE_KEY')); ?>');
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '14px',
                color: '#32325d',
            },
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style,
        });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    $("#card-errors").html(result.error.message);
                    show_toastr('Error', result.error.message, 'error');
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }

        <?php endif; ?>

        $(document).ready(function () {
            $(document).on('click', '.apply-coupon', function () {

                var ele = $(this);
                var coupon = ele.closest('.row').find('.coupon').val();
                $.ajax({
                    url: '<?php echo e(route('apply.coupon')); ?>',
                    datType: 'json',
                    data: {
                        plan_id: '<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($plan->id)); ?>',
                        coupon: coupon
                    },
                    success: function (data) {
                        $('.final-price').text(data.final_price);
                        $('#stripe_coupon, #paypal_coupon').val(coupon);
                        if (data != '') {
                            if (data.is_success == true) {
                                show_toastr('Success', data.message, 'success');
                            } else {
                                show_toastr('Error', data.message, 'error');
                            }

                        } else {
                            show_toastr('Error', "<?php echo e(__('Coupon code required.')); ?>", 'error');
                        }
                    }
                })
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css-page'); ?>
    <style>
        #card-element {
            border: 1px solid #a3afbb !important;
            border-radius: 10px !important;
            padding: 10px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php
    $dir= asset(Storage::url('uploads/plan'));
       $dir_payment= asset(Storage::url('uploads/payments'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Order Summary')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="row"> ​
        <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6">
            <div class="plan-3">
                <h6><?php echo e($plan->name); ?></h6>
                <p class="price">
                    <small class="final-price">
                        <sup><?php echo e((env('CURRENCY_SYMBOL')) ? env('CURRENCY_SYMBOL') : '$'); ?></sup>
                        <?php echo e($plan->price); ?>

                    </small>
                    <sub><?php echo e(__('Duration : ').ucfirst($plan->duration)); ?></sub>
                </p>
                <p class="price-text"></p>
                <ul class="plan-detail">
                    <li><?php echo e(($plan->max_users==-1)?__('Unlimited'):$plan->max_users); ?> <?php echo e(__('Users')); ?></li>
                    <li><?php echo e(($plan->max_customers==-1)?__('Unlimited'):$plan->max_customers); ?> <?php echo e(__('Customers')); ?></li>
                    <li><?php echo e(($plan->max_venders==-1)?__('Unlimited'):$plan->max_venders); ?> <?php echo e(__('Vendors')); ?></li>
                </ul>
            </div>
        </div>
        ​
        <div class="col-md-8">
            <section class="nav-tabs">
                <div class="row our-system">
                    <ul class="nav nav-tabs">
                        <?php if(env('ENABLE_STRIPE') == 'on' && !empty(env('STRIPE_KEY')) && !empty(env('STRIPE_SECRET'))): ?>
                            <li>
                                <a data-toggle="tab" class="active" id="contact-tab4" href="#stripe_payment"><?php echo e(__('Stripe')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(env('ENABLE_PAYPAL') == 'on' && !empty(env('PAYPAL_CLIENT_ID')) && !empty(env('PAYPAL_SECRET_KEY'))): ?>
                            <li>
                                <a data-toggle="tab" id="contact-tab5" href="#paypal_payment"><?php echo e(__('Paypal')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="tab-content">
                    <?php if(env('ENABLE_STRIPE') == 'on' && !empty(env('STRIPE_KEY')) && !empty(env('STRIPE_SECRET'))): ?>
                        <div class="tab-pane <?php echo e(((env('ENABLE_STRIPE') == 'on' && !empty(env('STRIPE_KEY')) && !empty(env('STRIPE_SECRET'))) == 'on') ? "active" : ""); ?>" id="stripe_payment">
                            <div class="card">
                                <form role="form" action="<?php echo e(route('stripe.post')); ?>" method="post" class="require-validation" id="payment-form">
                                    <?php echo csrf_field(); ?>
                                    <div class="p-3 mb-3 rounded stripe-payment-div">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="custom-radio">
                                                    <label class="font-16 font-weight-bold text-dark"><?php echo e(__('Credit / Debit Card')); ?></label>
                                                </div>
                                                <p class="mb-0 pt-1 text-sm"><?php echo e(__('Safe money transfer using your bank account. We support Mastercard, Visa, Discover and American express.')); ?></p>
                                            </div>
                                            <div class="col-sm-4 text-sm-right mt-3 mt-sm-0">
                                                <img src="<?php echo e(asset('public/assets/img/payments/master.png')); ?>" height="24" alt="master-card-img">
                                                <img src="<?php echo e(asset('public/assets/img/payments/discover.png')); ?>" height="24" alt="discover-card-img">
                                                <img src="<?php echo e(asset('public/assets/img/payments/visa.png')); ?>" height="24" alt="visa-card-img">
                                                <img src="<?php echo e(asset('public/assets/img/payments/american express.png')); ?>" height="24" alt="american-express-card-img">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="card-name-on" class="form-control-label text-dark"><?php echo e(__('Name on card')); ?></label>
                                                    <input type="text" name="name" id="card-name-on" class="form-control required" placeholder="<?php echo e(\Auth::user()->name); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-3">
                                                <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>
                                                <div id="card-errors" role="alert"></div>
                                            </div>
                                            <div class="col-md-10 mt-4">
                                                <div class="form-group">
                                                    <label for="stripe_coupon" class="form-control-label text-dark"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="stripe_coupon" name="coupon" class="form-control coupon" placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <a href="#" class="btn badge-blue btn-xs rounded-pill mt-4 text-white apply-btn apply-coupon" data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i class="fas fa-save"></i></a>
                                            </div>
                                        </div>
                                        ​
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'><?php echo e(__('Please correct the errors and try again.')); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end Credit/Debit Card box-->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-sm-right px-4">
                                                <input type="hidden" name="plan_id" value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($plan->id)); ?>">
                                                <input type="submit" value="<?php echo e(__('Pay Now')); ?>" class="btn-create badge-blue">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(env('ENABLE_PAYPAL') == 'on' && !empty(env('PAYPAL_CLIENT_ID')) && !empty(env('PAYPAL_SECRET_KEY'))): ?>
                        <div class="tab-pane <?php echo e((env('ENABLE_STRIPE') == 'off' && env('ENABLE_PAYPAL') == 'on') ? "active" : ""); ?>" id="paypal_payment">
                            <div class="card">
                                <form class="w3-container w3-display-middle w3-card-4" method="POST" id="payment-form" action="<?php echo e(route('plan.pay.with.paypal')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="plan_id" value="<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($plan->id)); ?>">
                                    ​
                                    <div class="p-3 mb-3 rounded">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="paypal_coupon" class="form-control-label text-dark"><?php echo e(__('Coupon')); ?></label>
                                                    <input type="text" id="paypal_coupon" name="coupon" class="form-control coupon" placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-auto my-auto">
                                                <a href="#" class="btn badge-blue btn-xs rounded-pill mt-3 text-white apply-btn apply-coupon" data-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>"><i class="fas fa-save"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-sm-right px-5">
                                            <input type="submit" value="<?php echo e(__('Pay Now')); ?>" class="btn-create badge-blue">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/zigoair/resources/views/stripe.blade.php ENDPATH**/ ?>