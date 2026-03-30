<?php return array (
  'App\\Providers\\EventServiceProvider' => 
  array (
    'Illuminate\\Auth\\Events\\Registered' => 
    array (
      0 => 'Illuminate\\Auth\\Listeners\\SendEmailVerificationNotification',
    ),
    'App\\Events\\PaymentCompleted' => 
    array (
      0 => 'App\\Listeners\\SendPaymentCompletedNotification',
    ),
    'App\\Events\\PaymentRefunded' => 
    array (
      0 => 'App\\Listeners\\SendPaymentRefundedNotification',
    ),
  ),
);