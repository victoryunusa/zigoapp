<?php

namespace App\Http\Controllers;

use App\Mail\EmailTest;
use App\Mail\testMail;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SystemController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('manage system settings'))
        {
            $settings = Utility::settings();

            return view('settings.index', compact('settings'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function store(Request $request)
    {


        if(\Auth::user()->can('manage system settings'))
        {

            if($request->logo)
            {
                $request->validate(
                    [
                        'logo' => 'image|mimes:png|max:20480',
                    ]
                );

                $logoName = 'logo.png';
                $path     = $request->file('logo')->storeAs('uploads/logo/', $logoName);
            }
            if($request->landing_logo)
            {
                $request->validate(
                    [
                        'landing_logo' => 'image|mimes:png|max:20480',
                    ]
                );
                $landingLogoName = 'landing_logo.png';
                $path            = $request->file('landing_logo')->storeAs('uploads/logo/', $landingLogoName);
            }
            if($request->favicon)
            {
                $request->validate(
                    [
                        'favicon' => 'image|mimes:png|max:20480',
                    ]
                );
                $favicon = 'favicon.png';
                $path    = $request->file('favicon')->storeAs('uploads/logo/', $favicon);
            }


            $arrEnv = [
                'SITE_RTL' => !isset($request->SITE_RTL) ? 'off' : 'on',
            ];
            Utility::setEnvironmentValue($arrEnv);

            $settings = Utility::settings();
            if(!empty($request->title_text) || !empty($request->footer_text) || !empty($request->default_language) || isset($request->display_landing_page))
            {
                $post = $request->all();
                if(!isset($request->display_landing_page))
                {
                    $post['display_landing_page'] = 'off';
                }
                unset($post['_token']);
                foreach($post as $key => $data)
                {
                    if(in_array($key, array_keys($settings)))
                    {
                        \DB::insert(
                            'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                         $data,
                                                                                                                                                         $key,
                                                                                                                                                         \Auth::user()->creatorId(),
                                                                                                                                                     ]
                        );
                    }
                }
            }

            return redirect()->back()->with('success', 'Logo successfully updated.');
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function saveEmailSettings(Request $request)
    {
        if(\Auth::user()->can('manage system settings'))
        {
            $request->validate(
                [
                    'mail_driver' => 'required|string|max:255',
                    'mail_host' => 'required|string|max:255',
                    'mail_port' => 'required|string|max:255',
                    'mail_username' => 'required|string|max:255',
                    'mail_password' => 'required|string|max:255',
                    'mail_encryption' => 'required|string|max:255',
                    'mail_from_address' => 'required|string|max:255',
                    'mail_from_name' => 'required|string|max:255',
                ]
            );

            $arrEnv = [
                'MAIL_DRIVER' => $request->mail_driver,
                'MAIL_HOST' => $request->mail_host,
                'MAIL_PORT' => $request->mail_port,
                'MAIL_USERNAME' => $request->mail_username,
                'MAIL_PASSWORD' => $request->mail_password,
                'MAIL_ENCRYPTION' => $request->mail_encryption,
                'MAIL_FROM_NAME' => $request->mail_from_name,
                'MAIL_FROM_ADDRESS' => $request->mail_from_address,
            ];
            Utility::setEnvironmentValue($arrEnv);

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }

    }

    public function saveCompanySettings(Request $request)
    {

        if(\Auth::user()->can('manage company settings'))
        {
            $user = \Auth::user();
            $request->validate(
                [
                    'company_name' => 'required|string|max:255',
                    'company_email' => 'required',
                    'company_email_from_name' => 'required|string',
                ]
            );
            $post = $request->all();
            unset($post['_token']);
            $settings = Utility::settings();

            foreach($post as $key => $data)
            {
                if(in_array($key, array_keys($settings)))
                {
                    \DB::insert(
                        'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                     $data,
                                                                                                                                                     $key,
                                                                                                                                                     \Auth::user()->creatorId(),
                                                                                                                                                 ]
                    );
                }
            }

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function savePaymentSettings(Request $request)
    {

        if(\Auth::user()->can('manage stripe settings'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'currency' => 'required|string|max:255',
                                   'currency_symbol' => 'required|string|max:255',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }


            if(isset($request->enable_stripe) && $request->enable_stripe == 'on')
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'stripe_key' => 'required|string|max:255',
                                       'stripe_secret' => 'required|string|max:255',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

            }
            elseif(isset($request->enable_paypal) && $request->enable_paypal == 'on')
            {


                $validator = \Validator::make(
                    $request->all(), [

                                       'paypal_client_id' => 'required|string',
                                       'paypal_secret_key' => 'required|string',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }
            }


            $arrEnv = [
                'CURRENCY_SYMBOL' => $request->currency_symbol,
                'CURRENCY' => $request->currency,
                'ENABLE_STRIPE' => $request->enable_stripe ?? 'off',
                'STRIPE_KEY' => $request->stripe_key,
                'STRIPE_SECRET' => $request->stripe_secret,
                'ENABLE_PAYPAL' => $request->enable_paypal ?? 'off',
                'PAYPAL_MODE' => $request->paypal_mode,
                'PAYPAL_CLIENT_ID' => $request->paypal_client_id,
                'PAYPAL_SECRET_KEY' => $request->paypal_secret_key,

            ];

            Utility::setEnvironmentValue($arrEnv);

            $post = $request->all();
            unset($post['_token'], $post['stripe_key'], $post['stripe_secret']);

            $settings = Utility::settings();
            foreach($post as $key => $data)
            {
                if(in_array($key, array_keys($settings)))
                {
                    \DB::insert(
                        'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                                                     $data,
                                                                                                                                                                                     $key,
                                                                                                                                                                                     \Auth::user()->creatorId(),
                                                                                                                                                                                     date('Y-m-d H:i:s'),
                                                                                                                                                                                     date('Y-m-d H:i:s'),
                                                                                                                                                                                 ]
                    );
                }
            }

            return redirect()->back()->with('success', __('Stripe successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function saveSystemSettings(Request $request)
    {

        if(\Auth::user()->can('manage company settings'))
        {
            $user = \Auth::user();
            $request->validate(
                [
                    'site_currency' => 'required',
                ]
            );
            $post = $request->all();
            unset($post['_token']);

            if(!isset($post['shipping_display']))
            {
                $post['shipping_display'] = 'off';
            }

            $settings = Utility::settings();

            foreach($post as $key => $data)
            {
                if(in_array($key, array_keys($settings)))
                {
                    \DB::insert(
                        'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                                                     $data,
                                                                                                                                                                                     $key,
                                                                                                                                                                                     \Auth::user()->creatorId(),
                                                                                                                                                                                     date('Y-m-d H:i:s'),
                                                                                                                                                                                     date('Y-m-d H:i:s'),
                                                                                                                                                                                 ]
                    );
                }
            }

            return redirect()->back()->with('success', __('Setting successfully updated.'));

        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function saveBusinessSettings(Request $request)
    {

        if(\Auth::user()->can('manage business settings'))
        {

            $user = \Auth::user();
            if($request->company_logo)
            {

                $request->validate(
                    [
                        'company_logo' => 'image|mimes:png|max:20480',
                    ]
                );

                $logoName     = $user->id . '_logo.png';
                $path         = $request->file('company_logo')->storeAs('uploads/logo/', $logoName);
                $company_logo = !empty($request->company_logo) ? $logoName : 'logo.png';

                \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                 $logoName,
                                                                                                                                                 'company_logo',
                                                                                                                                                 \Auth::user()->creatorId(),
                                                                                                                                             ]
                );
            }


            if($request->company_small_logo)
            {
                $request->validate(
                    [
                        'company_small_logo' => 'image|mimes:png|max:20480',
                    ]
                );
                $smallLogoName = $user->id . '_small_logo.png';
                $path          = $request->file('company_small_logo')->storeAs('uploads/logo/', $smallLogoName);

                $company_small_logo = !empty($request->company_small_logo) ? $smallLogoName : 'small_logo.png';

                \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                 $smallLogoName,
                                                                                                                                                 'company_small_logo',
                                                                                                                                                 \Auth::user()->creatorId(),
                                                                                                                                             ]
                );
            }

            if($request->company_favicon)
            {
                $request->validate(
                    [
                        'company_favicon' => 'image|mimes:png|max:20480',
                    ]
                );
                $favicon = $user->id . '_favicon.png';
                $path    = $request->file('company_favicon')->storeAs('uploads/logo/', $favicon);

                $company_favicon = !empty($request->favicon) ? $favicon : 'favicon.png';

                \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                 $favicon,
                                                                                                                                                 'company_favicon',
                                                                                                                                                 \Auth::user()->creatorId(),
                                                                                                                                             ]
                );
            }

            $settings = Utility::settings();
            if(!empty($request->title_text))
            {
                $post = $request->all();

                unset($post['_token'], $post['company_logo'], $post['company_small_logo'], $post['company_favicon']);
                foreach($post as $key => $data)
                {
                    if(in_array($key, array_keys($settings)))
                    {

                        \DB::insert(
                            'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                         $data,
                                                                                                                                                         $key,
                                                                                                                                                         \Auth::user()->creatorId(),
                                                                                                                                                     ]
                        );
                    }
                }
            }

            return redirect()->back()->with('success', 'Logo successfully updated.');
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function companyIndex()
    {
        if(\Auth::user()->can('manage company settings'))
        {
            $settings = Utility::settings();

            return view('settings.company', compact('settings'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function saveCompanyPaymentSettings(Request $request)
    {

        if(isset($request->enable_stripe) && $request->enable_stripe == 'on')
        {
            $request->validate(
                [
                    'stripe_key' => 'required|string',
                    'stripe_secret' => 'required|string',
                ]
            );
        }
        elseif(isset($request->enable_paypal) && $request->enable_paypal == 'on')
        {
            $request->validate(
                [
                    'paypal_mode' => 'required|string',
                    'paypal_client_id' => 'required|string',
                    'paypal_secret_key' => 'required|string',
                ]
            );
        }


        $post                  = $request->all();
        $post['enable_paypal'] = isset($request->enable_paypal) ? $request->enable_paypal : '';
        $post['enable_stripe'] = isset($request->enable_stripe) ? $request->enable_stripe : '';
        unset($post['_token']);
        $settings = Utility::settings();

        foreach($post as $key => $data)
        {
            if(in_array($key, array_keys($settings)))
            {
                \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                                                                 $data,
                                                                                                                                                                                 $key,
                                                                                                                                                                                 \Auth::user()->creatorId(),
                                                                                                                                                                                 date('Y-m-d H:i:s'),
                                                                                                                                                                                 date('Y-m-d H:i:s'),
                                                                                                                                                                             ]
                );
            }
        }

        return redirect()->back()->with('success', __('Payment setting successfully updated.'));

    }

    public function testMail()
    {
        return view('settings.test_mail');
    }


    public function testSendMail(Request $request)
    {
        $validator = \Validator::make($request->all(), ['email' => 'required|email']);
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        try
        {
            Mail::to($request->email)->send(new testMail());
        }
        catch(\Exception $e)
        {
            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
        }

        return redirect()->back()->with('success', __('Email send Successfully.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));

    }
}
