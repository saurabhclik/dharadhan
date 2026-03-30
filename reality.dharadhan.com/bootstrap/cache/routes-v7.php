<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/pulse' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pulse',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'default.livewire.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4qxQuHjXq6NLcPSO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.min.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eRY7973oKqkVfYdd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.upload-file',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::B01xTlkgiRAz7hgc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DNAU2asU7K0qVg5g',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KpfdH4yB4Q8AyHaE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/revoke-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aiLbr7PMwfz6Ia1i',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'roles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/roles/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.roles.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.permissions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/permissions/groups' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.permissions.groups',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.settings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.settings.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/action-logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.action-logs.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/modules' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.modules.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.login.submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.password.reset.submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout/submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logout.submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clear-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nkl5SzZgf7dxdS8b',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/migrate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PiuRSvNn9yDCB2wz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/seed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ehDoWovQIsmRHZZT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/run-storage-link' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CBvcGvgSQKT0l5uu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/refresh-storage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::07XGcMPA7nyaM7ip',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/submit-rating' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rating.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IdGtzgFjDWmvObwi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax/signup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.signup',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax/send-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.send.otp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax/verify-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.verify.otp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/save-signup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save.signup',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.forgot',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password/send-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.sendOtp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password/verify-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.verifyOtp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset.mobile',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/contact/send' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Cyrp0QCkva2zMmmr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/about' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'about',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'properties',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/post/property' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.property',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'save.post.property',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/post/property/add/post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.property.add.post',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/property/reaction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'property.reaction',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/post/property/primarydetails' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.property.primarydetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/post/property/location' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.property.location',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/post/property/basicdetails' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.property.basicdetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/post/property/photodetails' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.property.photodetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/post/property/features' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.property.features',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/services' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'services',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/privacy-policy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'privacy.policy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/terms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'terms',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/refund-cancellation-policy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'refund.policy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/career' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'career',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/career/apply' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'career.apply',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agents/listing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agents.listing',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/countries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gH0EKQquYWyAqLWA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/newsletter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'newsletter.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/submit-request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'submit.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'store.submit.request',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payment/create-order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.create.order',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payment/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.verify',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payment/success' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.success',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payment/failed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.failed',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payment/webhook' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.webhook',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payment/check-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.check.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/myaccount' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/myaccount/user-profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.store.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/myaccount/change-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.change.password',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.save.password',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/myaccount/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.properties',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/myaccount/add-property' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.add.property',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/myaccount/store-property' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.store.property',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/myaccount/leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/myaccount/transferred-leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.transferred.leads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/modules' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.modules.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/modules/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.modules.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/translations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.translations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.translations.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/translations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.translations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/action-log' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.actionlog.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/editor/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.editor.upload',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/properties/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/properties/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/property/categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.property.categories.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.property.categories.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/property/categories/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.property.categories.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/property/categories/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.property.categories.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/agents' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.agents.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.agents.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/agents/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.agents.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/agents/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.agents.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reviews' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reviews.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reviews.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reviews/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reviews.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reviews/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reviews.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/property-engagements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.engagements.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ratings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.ratings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.ratings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ratings/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.ratings.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ratings/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.ratings.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/career-applications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.career-applications.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.career-applications.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/career-applications/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.career-applications.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/career-applications/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.career-applications.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/activities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.activities.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.activities.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/activities/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.activities.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/activities/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.activities.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.leads.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.leads.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/leads/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.leads.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/leads/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.leads.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/videos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.videos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.videos.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/videos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.videos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/videos/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.videos.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logos.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logos/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logos.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/localities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.localities.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.localities.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/localities/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.localities.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/localities/delete/bulk-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.localities.bulk-delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clear-session' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clear.session',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/docs/api' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scramble.docs.ui',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/docs/api.json' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scramble.docs.document',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/l(?|ivewire/preview\\-file/([^/]++)(*:42)|ocale/([^/]++)(*:63))|/a(?|pi/(?|translations/([^/]++)(*:103)|v1/(?|users/(?|([^/]++)(?|(*:137))|bulk\\-delete(*:158))|roles/([^/]++)(?|(*:184))|p(?|ermissions/([^/]++)(*:216)|osts(?|(?:/([^/]++))?(*:245)|/([^/]++)(?|(*:265)|/(?|([^/]++)(?|(*:288))|bulk\\-delete(*:309)))))|terms/([^/]++)(?|(*:338)|/(?|([^/]++)(?|(*:361))|bulk\\-delete(*:382)))|settings/([^/]++)(*:409)|action\\-logs/([^/]++)(*:438)|modules/([^/]++)(?|(*:465)|/toggle\\-status(*:488)|(*:496)))|admin/terms/([^/]++)(?|(*:529)|/([^/]++)(?|(*:549))))|dmin/(?|p(?|assword/reset/([^/]++)(*:594)|ermissions/([^/]++)(*:621)|osts(?|(?:/([^/]++))?(*:650)|/([^/]++)(?|/(?|create(*:680)|([^/]++)(?|(*:699)|/edit(*:712)|(*:720))|delete/bulk\\-delete(*:748))|(*:757)))|ropert(?|ies/([^/]++)(?|(*:791)|/edit(*:804)|(*:812))|y/categories/([^/]++)(?|(*:845)|/edit(*:858)|(*:866))))|r(?|oles/([^/]++)(?|(*:897)|/edit(*:910)|(*:918))|eviews/([^/]++)(?|(*:945)|/edit(*:958)|(*:966))|atings/([^/]++)(?|(*:993)|/edit(*:1006)|(*:1015)))|modules/(?|toggle\\-status/([^/]++)(*:1060)|([^/]++)(*:1077))|users/(?|([^/]++)(?|(*:1107)|/(?|edit(*:1124)|login\\-as(*:1142))|(*:1152))|switch\\-back(*:1174))|terms/([^/]++)(?|(*:1201)|/(?|([^/]++)(?|/edit(*:1230)|(*:1239))|delete/bulk\\-delete(*:1268))|(*:1278))|a(?|gents/([^/]++)(?|(*:1309)|/edit(*:1323)|(*:1332))|ctivities/([^/]++)(?|(*:1363)|/edit(*:1377)|(*:1386)))|career\\-applications/([^/]++)(?|(*:1429)|/(?|edit(*:1446)|download(*:1463))|(*:1473))|l(?|eads/(?|([^/]++)(?|/edit(*:1511)|(*:1520))|transferred(*:1541)|([^/]++)/transfer(*:1567))|o(?|gos/([^/]++)(?|(*:1596)|/edit(*:1610)|(*:1619))|calities/([^/]++)(?|(*:1649)|/edit(*:1663)|(*:1672))))|videos/([^/]++)(?|(*:1702)|/edit(*:1716)|(*:1725)))|gent/([^/]++)/details(*:1757))|/p(?|roperty/([^/]++)/details(*:1796)|ost/property/delete/([^/]++)(*:1833)|ayment/(?|details/([^/]++)(*:1868)|fetch/([^/]++)(*:1891)))|/s(?|tates/([^/]++)(*:1921)|creenshot\\-login/([^/]++)(*:1955))|/cities/([^/]++)(*:1981)|/myaccount/(?|edit\\-property/([^/]++)/edit(*:2032)|update\\-property/([^/]++)(*:2066)))/?$}sDu',
    ),
    3 => 
    array (
      42 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.preview-file',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      63 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'locale.switch',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      103 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6hRbKR1F0Fi93IWz',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      137 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'users.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      158 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.users.bulk-delete',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      184 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.show',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'roles.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'roles.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      216 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.permissions.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      245 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.posts.index',
            'postType' => NULL,
          ),
          1 => 
          array (
            0 => 'postType',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      265 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.posts.store',
          ),
          1 => 
          array (
            0 => 'postType',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      288 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.posts.show',
          ),
          1 => 
          array (
            0 => 'postType',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.posts.update',
          ),
          1 => 
          array (
            0 => 'postType',
            1 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.posts.destroy',
          ),
          1 => 
          array (
            0 => 'postType',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.posts.bulk-delete',
          ),
          1 => 
          array (
            0 => 'postType',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      338 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.terms.index',
          ),
          1 => 
          array (
            0 => 'taxonomy',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.terms.store',
          ),
          1 => 
          array (
            0 => 'taxonomy',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      361 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.terms.show',
          ),
          1 => 
          array (
            0 => 'taxonomy',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'api.terms.update',
          ),
          1 => 
          array (
            0 => 'taxonomy',
            1 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'api.terms.destroy',
          ),
          1 => 
          array (
            0 => 'taxonomy',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      382 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.terms.bulk-delete',
          ),
          1 => 
          array (
            0 => 'taxonomy',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      409 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.settings.show',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      438 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.action-logs.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      465 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.modules.show',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.modules.toggle-status',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      496 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.modules.destroy',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      529 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.api.terms.store',
          ),
          1 => 
          array (
            0 => 'taxonomy',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      549 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.api.terms.update',
          ),
          1 => 
          array (
            0 => 'taxonomy',
            1 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.api.terms.destroy',
          ),
          1 => 
          array (
            0 => 'taxonomy',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      594 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      621 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      650 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.posts.index',
            'postType' => NULL,
          ),
          1 => 
          array (
            0 => 'postType',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      680 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.posts.create',
          ),
          1 => 
          array (
            0 => 'postType',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      699 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.posts.show',
          ),
          1 => 
          array (
            0 => 'postType',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      712 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.posts.edit',
          ),
          1 => 
          array (
            0 => 'postType',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      720 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.posts.update',
          ),
          1 => 
          array (
            0 => 'postType',
            1 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.posts.destroy',
          ),
          1 => 
          array (
            0 => 'postType',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      748 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.posts.bulk-delete',
          ),
          1 => 
          array (
            0 => 'postType',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      757 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.posts.store',
          ),
          1 => 
          array (
            0 => 'postType',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      791 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.show',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      804 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.edit',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      812 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.update',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.destroy',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      845 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.property.categories.show',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      858 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.property.categories.edit',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      866 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.property.categories.update',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.property.categories.destroy',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      897 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.show',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      910 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.edit',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      918 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      945 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reviews.show',
          ),
          1 => 
          array (
            0 => 'review',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      958 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reviews.edit',
          ),
          1 => 
          array (
            0 => 'review',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      966 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reviews.update',
          ),
          1 => 
          array (
            0 => 'review',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reviews.destroy',
          ),
          1 => 
          array (
            0 => 'review',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      993 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.ratings.show',
          ),
          1 => 
          array (
            0 => 'rating',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.ratings.edit',
          ),
          1 => 
          array (
            0 => 'rating',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1015 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.ratings.update',
          ),
          1 => 
          array (
            0 => 'rating',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.ratings.destroy',
          ),
          1 => 
          array (
            0 => 'rating',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1060 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.modules.toggle-status',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1077 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.modules.delete',
          ),
          1 => 
          array (
            0 => 'module',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1107 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1124 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1142 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.login-as',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1152 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1174 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.switch-back',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1201 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.terms.index',
          ),
          1 => 
          array (
            0 => 'taxonomy',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1230 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.terms.edit',
          ),
          1 => 
          array (
            0 => 'taxonomy',
            1 => 'term',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1239 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.terms.update',
          ),
          1 => 
          array (
            0 => 'taxonomy',
            1 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.terms.destroy',
          ),
          1 => 
          array (
            0 => 'taxonomy',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1268 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.terms.bulk-delete',
          ),
          1 => 
          array (
            0 => 'taxonomy',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1278 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.terms.store',
          ),
          1 => 
          array (
            0 => 'taxonomy',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.agents.show',
          ),
          1 => 
          array (
            0 => 'agent',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.agents.edit',
          ),
          1 => 
          array (
            0 => 'agent',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1332 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.agents.update',
          ),
          1 => 
          array (
            0 => 'agent',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.agents.destroy',
          ),
          1 => 
          array (
            0 => 'agent',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1363 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.activities.show',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1377 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.activities.edit',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1386 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.activities.update',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.activities.destroy',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1429 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.career-applications.show',
          ),
          1 => 
          array (
            0 => 'career_application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1446 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.career-applications.edit',
          ),
          1 => 
          array (
            0 => 'career_application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1463 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.career-applications.download',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1473 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.career-applications.update',
          ),
          1 => 
          array (
            0 => 'career_application',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.career-applications.destroy',
          ),
          1 => 
          array (
            0 => 'career_application',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1511 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.leads.edit',
          ),
          1 => 
          array (
            0 => 'lead',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1520 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.leads.update',
          ),
          1 => 
          array (
            0 => 'lead',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.leads.destroy',
          ),
          1 => 
          array (
            0 => 'lead',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1541 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.leads.transferred',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1567 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.leads.transfer',
          ),
          1 => 
          array (
            0 => 'lead',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1596 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logos.show',
          ),
          1 => 
          array (
            0 => 'logo',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logos.edit',
          ),
          1 => 
          array (
            0 => 'logo',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1619 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logos.update',
          ),
          1 => 
          array (
            0 => 'logo',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logos.destroy',
          ),
          1 => 
          array (
            0 => 'logo',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1649 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.localities.show',
          ),
          1 => 
          array (
            0 => 'locality',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1663 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.localities.edit',
          ),
          1 => 
          array (
            0 => 'locality',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1672 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.localities.update',
          ),
          1 => 
          array (
            0 => 'locality',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.localities.destroy',
          ),
          1 => 
          array (
            0 => 'locality',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1702 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.videos.show',
          ),
          1 => 
          array (
            0 => 'video',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1716 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.videos.edit',
          ),
          1 => 
          array (
            0 => 'video',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.videos.update',
          ),
          1 => 
          array (
            0 => 'video',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.videos.destroy',
          ),
          1 => 
          array (
            0 => 'video',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1757 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.details',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1796 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'property.details',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1833 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post.property.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1868 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.details',
          ),
          1 => 
          array (
            0 => 'paymentId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1891 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.fetch',
          ),
          1 => 
          array (
            0 => 'paymentId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1921 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fq9vfD1wotZX8DFd',
          ),
          1 => 
          array (
            0 => 'country_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1955 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'screenshot.login',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1981 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YOYAl1nQVrkm7sKE',
          ),
          1 => 
          array (
            0 => 'state_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2032 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.edit.property',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2066 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myaccount.update.property',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'pulse' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pulse',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'pulse',
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:158:"function (\\Laravel\\Pulse\\Pulse $pulse, \\Illuminate\\View\\Factory $view) {
                        return $view->make(\'pulse::dashboard\');
                    }";s:5:"scope";s:34:"Laravel\\Pulse\\PulseServiceProvider";s:4:"this";N;s:4:"self";s:32:"0000000000000d310000000000000000";}}',
        'namespace' => NULL,
        'prefix' => 'pulse',
        'where' => 
        array (
        ),
        'as' => 'pulse',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'default.livewire.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/update',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'controller' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'default.livewire.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4qxQuHjXq6NLcPSO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'as' => 'generated::4qxQuHjXq6NLcPSO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eRY7973oKqkVfYdd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.min.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'as' => 'generated::eRY7973oKqkVfYdd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.upload-file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/upload-file',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'as' => 'livewire.upload-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.preview-file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/preview-file/{filename}',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'as' => 'livewire.preview-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6hRbKR1F0Fi93IWz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/translations/{lang}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:314:"function (string $lang) {
    $path = \\resource_path("lang/{$lang}.json");

    if (! \\file_exists($path)) {
        return \\response()->json([\'error\' => \'Language not found\'], 404);
    }

    $translations = \\json_decode(\\file_get_contents($path), true);

    return \\response()->json($translations);
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fbc0000000000000000";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::6hRbKR1F0Fi93IWz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::B01xTlkgiRAz7hgc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::B01xTlkgiRAz7hgc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DNAU2asU7K0qVg5g' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/auth/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@user',
        'controller' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@user',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::DNAU2asU7K0qVg5g',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KpfdH4yB4Q8AyHaE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::KpfdH4yB4Q8AyHaE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aiLbr7PMwfz6Ia1i' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/revoke-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@revokeAll',
        'controller' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@revokeAll',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::aiLbr7PMwfz6Ia1i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'as' => 'users.index',
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'as' => 'users.store',
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'as' => 'users.show',
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'as' => 'users.update',
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'as' => 'users.destroy',
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.users.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/users/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@bulkDelete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.users.bulk-delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'as' => 'roles.index',
        'uses' => 'App\\Http\\Controllers\\Api\\RoleController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\RoleController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'as' => 'roles.store',
        'uses' => 'App\\Http\\Controllers\\Api\\RoleController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\RoleController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'as' => 'roles.show',
        'uses' => 'App\\Http\\Controllers\\Api\\RoleController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\RoleController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/v1/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'as' => 'roles.update',
        'uses' => 'App\\Http\\Controllers\\Api\\RoleController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\RoleController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'as' => 'roles.destroy',
        'uses' => 'App\\Http\\Controllers\\Api\\RoleController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\RoleController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.roles.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/roles/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\RoleController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Api\\RoleController@bulkDelete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.roles.bulk-delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.permissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PermissionController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\PermissionController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.permissions.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.permissions.groups' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/permissions/groups',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PermissionController@groups',
        'controller' => 'App\\Http\\Controllers\\Api\\PermissionController@groups',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.permissions.groups',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.permissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/permissions/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PermissionController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\PermissionController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.permissions.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.posts.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/posts/{postType?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PostController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\PostController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/posts',
        'where' => 
        array (
        ),
        'as' => 'api.posts.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.posts.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/posts/{postType}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PostController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\PostController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/posts',
        'where' => 
        array (
        ),
        'as' => 'api.posts.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.posts.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/posts/{postType}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PostController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\PostController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/posts',
        'where' => 
        array (
        ),
        'as' => 'api.posts.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.posts.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/posts/{postType}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PostController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\PostController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/posts',
        'where' => 
        array (
        ),
        'as' => 'api.posts.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.posts.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/posts/{postType}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PostController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\PostController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/posts',
        'where' => 
        array (
        ),
        'as' => 'api.posts.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.posts.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/posts/{postType}/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PostController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Api\\PostController@bulkDelete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/posts',
        'where' => 
        array (
        ),
        'as' => 'api.posts.bulk-delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.terms.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/terms/{taxonomy}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\TermController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\TermController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/terms',
        'where' => 
        array (
        ),
        'as' => 'api.terms.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.terms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/terms/{taxonomy}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\TermController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\TermController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/terms',
        'where' => 
        array (
        ),
        'as' => 'api.terms.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.terms.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/terms/{taxonomy}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\TermController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\TermController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/terms',
        'where' => 
        array (
        ),
        'as' => 'api.terms.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.terms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/terms/{taxonomy}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\TermController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\TermController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/terms',
        'where' => 
        array (
        ),
        'as' => 'api.terms.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.terms.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/terms/{taxonomy}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\TermController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\TermController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/terms',
        'where' => 
        array (
        ),
        'as' => 'api.terms.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.terms.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/terms/{taxonomy}/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\TermController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Api\\TermController@bulkDelete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1/terms',
        'where' => 
        array (
        ),
        'as' => 'api.terms.bulk-delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.settings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SettingController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\SettingController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.settings.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.settings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/v1/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SettingController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\SettingController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.settings.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.settings.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/settings/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SettingController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\SettingController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.settings.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.action-logs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/action-logs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ActionLogController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\ActionLogController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.action-logs.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.action-logs.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/action-logs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ActionLogController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\ActionLogController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.action-logs.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.modules.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/modules',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ModuleController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\ModuleController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.modules.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.modules.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/modules/{name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ModuleController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\ModuleController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.modules.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.modules.toggle-status' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'api/v1/modules/{name}/toggle-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ModuleController@toggleStatus',
        'controller' => 'App\\Http\\Controllers\\Api\\ModuleController@toggleStatus',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.modules.toggle-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.modules.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/v1/modules/{name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ModuleController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\ModuleController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'api.modules.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.api.terms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/terms/{taxonomy}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth',
          2 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Api\\TermsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Api\\TermsController@store',
        'as' => 'admin.api.terms.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.api.terms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/admin/terms/{taxonomy}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth',
          2 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Api\\TermsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Api\\TermsController@update',
        'as' => 'admin.api.terms.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.api.terms.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/terms/{taxonomy}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth',
          2 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Api\\TermsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Api\\TermsController@destroy',
        'as' => 'admin.api.terms.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Backend\\Auth\\LoginController@showLoginForm',
        'as' => 'admin.login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.login.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Backend\\Auth\\LoginController@login',
        'as' => 'admin.login.submit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Backend\\Auth\\ResetPasswordController@showResetForm',
        'as' => 'admin.password.reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.password.reset.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Backend\\Auth\\ResetPasswordController@reset',
        'as' => 'admin.password.reset.submit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Backend\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'as' => 'admin.password.request',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Backend\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'as' => 'admin.password.email',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logout.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/logout/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Backend\\Auth\\LoginController@logout',
        'as' => 'admin.logout.submit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nkl5SzZgf7dxdS8b' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clear-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:118:"function () 
{
    \\Illuminate\\Support\\Facades\\Artisan::call(\'optimize:clear\');
    return "All cache cleared!";
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f9c0000000000000000";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::nkl5SzZgf7dxdS8b',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PiuRSvNn9yDCB2wz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'migrate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:236:"function () 
{
    try 
    {
        \\Illuminate\\Support\\Facades\\Artisan::call(\'migrate\');
        return \'Migrated successfully!\';
    } 
    catch (\\Exception $e) 
    {
        return \'Error: \' . $e->getMessage();
    }
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f930000000000000000";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::PiuRSvNn9yDCB2wz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ehDoWovQIsmRHZZT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'seed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:236:"function () 
{
    try 
    {
        \\Illuminate\\Support\\Facades\\Artisan::call(\'db:seed\');
        return \'Migrated successfully!\';
    } 
    catch (\\Exception $e) 
    {
        return \'Error: \' . $e->getMessage();
    }
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f910000000000000000";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ehDoWovQIsmRHZZT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CBvcGvgSQKT0l5uu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'run-storage-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:253:"function () 
{
    try 
    {
        \\Illuminate\\Support\\Facades\\Artisan::call(\'storage:link\');
        return \'Storage link created successfully!\';
    } 
    catch (\\Exception $e) 
    {
        return \'Error: \' . $e->getMessage();
    }
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f8f0000000000000000";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::CBvcGvgSQKT0l5uu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::07XGcMPA7nyaM7ip' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'refresh-storage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:204:"function () 
{
    $src = \\storage_path(\'app/public\');
    $dst = \\public_path(\'storage\');
    \\File::deleteDirectory($dst);
    \\File::copyDirectory($src, $dst);
    return \'Storage refreshed!\';
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f8d0000000000000000";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::07XGcMPA7nyaM7ip',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@index',
        'controller' => 'App\\Http\\Controllers\\SiteController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rating.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'submit-rating',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@storeRating',
        'controller' => 'App\\Http\\Controllers\\SiteController@storeRating',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'rating.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IdGtzgFjDWmvObwi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@search',
        'controller' => 'App\\Http\\Controllers\\SiteController@search',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::IdGtzgFjDWmvObwi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ajax/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@ajaxLogin',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@ajaxLogin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.signup' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ajax/signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@ajaxSignup',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@ajaxSignup',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.signup',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.send.otp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ajax/send-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@sendOtp',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@sendOtp',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.send.otp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.verify.otp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ajax/verify-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@verifyOtp',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@verifyOtp',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.verify.otp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save.signup' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'save-signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@saveSignupData',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@saveSignupData',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'save.signup',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.forgot' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\MobileForgotPasswordController@showForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\MobileForgotPasswordController@showForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.forgot',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.sendOtp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password/send-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\MobileForgotPasswordController@sendOtp',
        'controller' => 'App\\Http\\Controllers\\Auth\\MobileForgotPasswordController@sendOtp',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.sendOtp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.verifyOtp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password/verify-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\MobileForgotPasswordController@verifyOtp',
        'controller' => 'App\\Http\\Controllers\\Auth\\MobileForgotPasswordController@verifyOtp',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.verifyOtp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset.mobile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\MobileForgotPasswordController@resetPassword',
        'controller' => 'App\\Http\\Controllers\\Auth\\MobileForgotPasswordController@resetPassword',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset.mobile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@contact',
        'controller' => 'App\\Http\\Controllers\\SiteController@contact',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'contact',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Cyrp0QCkva2zMmmr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'contact/send',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@send',
        'controller' => 'App\\Http\\Controllers\\SiteController@send',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Cyrp0QCkva2zMmmr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'about' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'about',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@about',
        'controller' => 'App\\Http\\Controllers\\SiteController@about',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'about',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'properties' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@properties',
        'controller' => 'App\\Http\\Controllers\\SiteController@properties',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'properties',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'property.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'property/{id}/details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@propertiesDetail',
        'controller' => 'App\\Http\\Controllers\\SiteController@propertiesDetail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'property.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post.property' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post/property',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@postProperty',
        'controller' => 'App\\Http\\Controllers\\SiteController@postProperty',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'post.property',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post.property.add.post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'post/property/add/post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@postPropertyAddPost',
        'controller' => 'App\\Http\\Controllers\\SiteController@postPropertyAddPost',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'post.property.add.post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save.post.property' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'post/property',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@savePostProperty',
        'controller' => 'App\\Http\\Controllers\\SiteController@savePostProperty',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'save.post.property',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'property.reaction' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'property/reaction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PropertyReactionController@toggle',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PropertyReactionController@toggle',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'property.reaction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post.property.primarydetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post/property/primarydetails',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@postPropertyPrimaryDetails',
        'controller' => 'App\\Http\\Controllers\\SiteController@postPropertyPrimaryDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'post.property.primarydetails',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post.property.location' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post/property/location',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@postPropertyLocationDetails',
        'controller' => 'App\\Http\\Controllers\\SiteController@postPropertyLocationDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'post.property.location',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post.property.basicdetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post/property/basicdetails',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@postPropertyBasicDetails',
        'controller' => 'App\\Http\\Controllers\\SiteController@postPropertyBasicDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'post.property.basicdetails',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post.property.photodetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post/property/photodetails',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@postPropertyPhotoDetails',
        'controller' => 'App\\Http\\Controllers\\SiteController@postPropertyPhotoDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'post.property.photodetails',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post.property.features' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'post/property/features',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@postPropertyFeatureDetails',
        'controller' => 'App\\Http\\Controllers\\SiteController@postPropertyFeatureDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'post.property.features',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'post.property.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'post/property/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@postPropertyDelete',
        'controller' => 'App\\Http\\Controllers\\SiteController@postPropertyDelete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'post.property.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'services' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'services',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@services',
        'controller' => 'App\\Http\\Controllers\\SiteController@services',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'services',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'privacy.policy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'privacy-policy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@privacyPolicy',
        'controller' => 'App\\Http\\Controllers\\SiteController@privacyPolicy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'privacy.policy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'terms' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'terms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@terms',
        'controller' => 'App\\Http\\Controllers\\SiteController@terms',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'terms',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'refund.policy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'refund-cancellation-policy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@refundCancellationPolicy',
        'controller' => 'App\\Http\\Controllers\\SiteController@refundCancellationPolicy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'refund.policy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'career' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'career',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@career',
        'controller' => 'App\\Http\\Controllers\\SiteController@career',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'career',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'career.apply' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'career/apply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@applyCareer',
        'controller' => 'App\\Http\\Controllers\\SiteController@applyCareer',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'career.apply',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agents.listing' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agents/listing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@agentListing',
        'controller' => 'App\\Http\\Controllers\\SiteController@agentListing',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'agents.listing',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/{id}/details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\SiteController@agentDetail',
        'controller' => 'App\\Http\\Controllers\\SiteController@agentDetail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'agent.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gH0EKQquYWyAqLWA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'countries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@getCountries',
        'controller' => 'App\\Http\\Controllers\\LocationController@getCountries',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::gH0EKQquYWyAqLWA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fq9vfD1wotZX8DFd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'states/{country_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@getStates',
        'controller' => 'App\\Http\\Controllers\\LocationController@getStates',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::fq9vfD1wotZX8DFd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YOYAl1nQVrkm7sKE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cities/{state_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@getCities',
        'controller' => 'App\\Http\\Controllers\\LocationController@getCities',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::YOYAl1nQVrkm7sKE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'newsletter.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'newsletter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\NewsletterController@store',
        'controller' => 'App\\Http\\Controllers\\NewsletterController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'newsletter.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'submit.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'submit-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\NewsletterController@submitRequest',
        'controller' => 'App\\Http\\Controllers\\NewsletterController@submitRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'submit.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'store.submit.request' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'submit-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\NewsletterController@storeSubmitRequest',
        'controller' => 'App\\Http\\Controllers\\NewsletterController@storeSubmitRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'store.submit.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.create.order' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payment/create-order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@createOrder',
        'controller' => 'App\\Http\\Controllers\\PaymentController@createOrder',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.create.order',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.verify' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payment/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@verifyPayment',
        'controller' => 'App\\Http\\Controllers\\PaymentController@verifyPayment',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.success' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payment/success',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@paymentSuccess',
        'controller' => 'App\\Http\\Controllers\\PaymentController@paymentSuccess',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.success',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.failed' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payment/failed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@paymentFailed',
        'controller' => 'App\\Http\\Controllers\\PaymentController@paymentFailed',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.failed',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payment/details/{paymentId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@getPaymentDetails',
        'controller' => 'App\\Http\\Controllers\\PaymentController@getPaymentDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.fetch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payment/fetch/{paymentId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@fetchRazorpayPayment',
        'controller' => 'App\\Http\\Controllers\\PaymentController@fetchRazorpayPayment',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.fetch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.webhook' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payment/webhook',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@handleWebhook',
        'controller' => 'App\\Http\\Controllers\\PaymentController@handleWebhook',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.webhook',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.check.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payment/check-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@checkPaymentStatus',
        'controller' => 'App\\Http\\Controllers\\PaymentController@checkPaymentStatus',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.check.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myaccount',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@index',
        'as' => 'myaccount.home',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myaccount/user-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@userProfile',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@userProfile',
        'as' => 'myaccount.profile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.store.profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'myaccount/user-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@updateProfile',
        'as' => 'myaccount.store.profile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.change.password' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myaccount/change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@changePassword',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@changePassword',
        'as' => 'myaccount.change.password',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.save.password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'myaccount/change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@savePassword',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@savePassword',
        'as' => 'myaccount.save.password',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.properties' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myaccount/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\FrontendController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\FrontendController@index',
        'as' => 'myaccount.properties',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.add.property' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myaccount/add-property',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\FrontendController@addProperty',
        'controller' => 'App\\Http\\Controllers\\Frontend\\FrontendController@addProperty',
        'as' => 'myaccount.add.property',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.edit.property' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myaccount/edit-property/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\FrontendController@editProperty',
        'controller' => 'App\\Http\\Controllers\\Frontend\\FrontendController@editProperty',
        'as' => 'myaccount.edit.property',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.store.property' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'myaccount/store-property',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\FrontendController@storeProperty',
        'controller' => 'App\\Http\\Controllers\\Frontend\\FrontendController@storeProperty',
        'as' => 'myaccount.store.property',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.update.property' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'myaccount/update-property/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\FrontendController@updateProperty',
        'controller' => 'App\\Http\\Controllers\\Frontend\\FrontendController@updateProperty',
        'as' => 'myaccount.update.property',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myaccount/leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\FrontendController@myLeads',
        'controller' => 'App\\Http\\Controllers\\Frontend\\FrontendController@myLeads',
        'as' => 'myaccount.leads',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myaccount.transferred.leads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'myaccount/transferred-leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\FrontendController@myTransferredLeads',
        'controller' => 'App\\Http\\Controllers\\Frontend\\FrontendController@myTransferredLeads',
        'as' => 'myaccount.transferred.leads',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/myaccount',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\DashboardController@index',
        'as' => 'admin.dashboard',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.roles.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\RolesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\RolesController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.roles.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\RolesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\RolesController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.roles.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\RolesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\RolesController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.roles.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\RolesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\RolesController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles/{role}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.roles.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\RolesController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\RolesController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.roles.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\RolesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\RolesController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.roles.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\RolesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\RolesController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/roles/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\RolesController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\RolesController@bulkDelete',
        'as' => 'admin.roles.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PermissionsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\PermissionsController@index',
        'as' => 'admin.permissions.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PermissionsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\PermissionsController@show',
        'as' => 'admin.permissions.show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.modules.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/modules',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ModulesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ModulesController@index',
        'as' => 'admin.modules.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.modules.toggle-status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/modules/toggle-status/{module}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ModulesController@toggleStatus',
        'controller' => 'App\\Http\\Controllers\\Backend\\ModulesController@toggleStatus',
        'as' => 'admin.modules.toggle-status',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.modules.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/modules/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ModulesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ModulesController@store',
        'as' => 'admin.modules.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.modules.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/modules/{module}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ModulesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ModulesController@destroy',
        'as' => 'admin.modules.delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SettingsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\SettingsController@index',
        'as' => 'admin.settings.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SettingsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\SettingsController@store',
        'as' => 'admin.settings.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.translations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/translations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TranslationController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\TranslationController@index',
        'as' => 'admin.translations.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.translations.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/translations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TranslationController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\TranslationController@update',
        'as' => 'admin.translations.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.translations.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/translations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TranslationController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\TranslationController@create',
        'as' => 'admin.translations.create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.users.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.users.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.users.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.users.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/{user}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.users.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.users.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.users.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/users/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UsersController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\UsersController@bulkDelete',
        'as' => 'admin.users.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.login-as' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/{id}/login-as',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UserLoginAsController@loginAs',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserLoginAsController@loginAs',
        'as' => 'admin.users.login-as',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.switch-back' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/users/switch-back',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UserLoginAsController@switchBack',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserLoginAsController@switchBack',
        'as' => 'admin.users.switch-back',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.actionlog.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/action-log',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActionLogController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActionLogController@index',
        'as' => 'admin.actionlog.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.posts.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/posts/{postType?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsController@index',
        'as' => 'admin.posts.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.posts.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/posts/{postType}/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsController@create',
        'as' => 'admin.posts.create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.posts.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/posts/{postType}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsController@store',
        'as' => 'admin.posts.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.posts.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/posts/{postType}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsController@show',
        'as' => 'admin.posts.show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.posts.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/posts/{postType}/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsController@edit',
        'as' => 'admin.posts.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.posts.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/posts/{postType}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsController@update',
        'as' => 'admin.posts.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.posts.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/posts/{postType}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsController@destroy',
        'as' => 'admin.posts.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.posts.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/posts/{postType}/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PostsController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\PostsController@bulkDelete',
        'as' => 'admin.posts.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.terms.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/terms/{taxonomy}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TermsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\TermsController@index',
        'as' => 'admin.terms.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.terms.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/terms/{taxonomy}/{term}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TermsController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\TermsController@edit',
        'as' => 'admin.terms.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.terms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/terms/{taxonomy}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TermsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\TermsController@store',
        'as' => 'admin.terms.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.terms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/terms/{taxonomy}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TermsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\TermsController@update',
        'as' => 'admin.terms.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.terms.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/terms/{taxonomy}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TermsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\TermsController@destroy',
        'as' => 'admin.terms.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.terms.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/terms/{taxonomy}/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\TermsController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\TermsController@bulkDelete',
        'as' => 'admin.terms.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.editor.upload' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/editor/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EditorController@upload',
        'controller' => 'App\\Http\\Controllers\\Backend\\EditorController@upload',
        'as' => 'admin.editor.upload',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.properties.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.properties.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.properties.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.properties.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties/{property}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.properties.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.properties.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.properties.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/properties/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyController@bulkDelete',
        'as' => 'admin.properties.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.property.categories.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/property/categories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.property.categories.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'admin/property',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.property.categories.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/property/categories/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.property.categories.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'admin/property',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.property.categories.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/property/categories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.property.categories.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'admin/property',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.property.categories.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/property/categories/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.property.categories.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'admin/property',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.property.categories.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/property/categories/{category}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.property.categories.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'admin/property',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.property.categories.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/property/categories/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.property.categories.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'admin/property',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.property.categories.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/property/categories/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.property.categories.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'admin/property',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.property.categories.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/property/categories/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyCategoryController@bulkDelete',
        'as' => 'admin.property.categories.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.agents.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/agents',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.agents.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\AgentController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\AgentController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.agents.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/agents/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.agents.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\AgentController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\AgentController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.agents.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/agents',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.agents.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\AgentController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\AgentController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.agents.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/agents/{agent}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.agents.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\AgentController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\AgentController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.agents.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/agents/{agent}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.agents.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\AgentController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\AgentController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.agents.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/agents/{agent}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.agents.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\AgentController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\AgentController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.agents.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/agents/{agent}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.agents.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\AgentController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\AgentController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.agents.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/agents/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AgentController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\AgentController@bulkDelete',
        'as' => 'admin.agents.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reviews.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reviews',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.reviews.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\ReviewController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReviewController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reviews.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reviews/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.reviews.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\ReviewController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReviewController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reviews.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/reviews',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.reviews.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\ReviewController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReviewController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reviews.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reviews/{review}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.reviews.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\ReviewController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReviewController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reviews.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reviews/{review}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.reviews.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\ReviewController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReviewController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reviews.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/reviews/{review}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.reviews.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\ReviewController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReviewController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reviews.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/reviews/{review}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.reviews.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\ReviewController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReviewController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reviews.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/reviews/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ReviewController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\ReviewController@bulkDelete',
        'as' => 'admin.reviews.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.engagements.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/property-engagements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PropertyEngagementController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\PropertyEngagementController@index',
        'as' => 'admin.engagements.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.ratings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/ratings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.ratings.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\RatingController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\RatingController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.ratings.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/ratings/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.ratings.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\RatingController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\RatingController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.ratings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/ratings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.ratings.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\RatingController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\RatingController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.ratings.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/ratings/{rating}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.ratings.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\RatingController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\RatingController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.ratings.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/ratings/{rating}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.ratings.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\RatingController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\RatingController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.ratings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/ratings/{rating}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.ratings.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\RatingController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\RatingController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.ratings.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/ratings/{rating}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.ratings.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\RatingController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\RatingController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.ratings.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/ratings/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\RatingController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\RatingController@bulkDelete',
        'as' => 'admin.ratings.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.career-applications.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/career-applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.career-applications.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.career-applications.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/career-applications/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.career-applications.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.career-applications.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/career-applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.career-applications.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.career-applications.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/career-applications/{career_application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.career-applications.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.career-applications.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/career-applications/{career_application}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.career-applications.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.career-applications.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/career-applications/{career_application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.career-applications.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.career-applications.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/career-applications/{career_application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.career-applications.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.career-applications.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/career-applications/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@bulkDelete',
        'as' => 'admin.career-applications.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.career-applications.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/career-applications/{id}/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@downloadResume',
        'controller' => 'App\\Http\\Controllers\\Backend\\CareerApplicationController@downloadResume',
        'as' => 'admin.career-applications.download',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.activities.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.activities.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\ActivityController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActivityController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.activities.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activities/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.activities.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\ActivityController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActivityController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.activities.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/activities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.activities.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\ActivityController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActivityController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.activities.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activities/{activity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.activities.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\ActivityController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActivityController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.activities.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activities/{activity}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.activities.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\ActivityController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActivityController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.activities.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/activities/{activity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.activities.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\ActivityController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActivityController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.activities.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/activities/{activity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.activities.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\ActivityController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActivityController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.activities.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/activities/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ActivityController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\ActivityController@bulkDelete',
        'as' => 'admin.activities.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.leads.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.leads.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\LeadController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\LeadController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.leads.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/leads/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.leads.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\LeadController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\LeadController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.leads.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.leads.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\LeadController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\LeadController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.leads.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/leads/{lead}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.leads.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\LeadController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\LeadController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.leads.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/leads/{lead}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.leads.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\LeadController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\LeadController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.leads.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/leads/{lead}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.leads.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\LeadController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\LeadController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.leads.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/leads/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\LeadController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\LeadController@bulkDelete',
        'as' => 'admin.leads.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.leads.transferred' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/leads/transferred',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\LeadController@transferred',
        'controller' => 'App\\Http\\Controllers\\Backend\\LeadController@transferred',
        'as' => 'admin.leads.transferred',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.leads.transfer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/leads/{lead}/transfer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\LeadController@transfer',
        'controller' => 'App\\Http\\Controllers\\Backend\\LeadController@transfer',
        'as' => 'admin.leads.transfer',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.videos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/videos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.videos.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\VideoController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\VideoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.videos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/videos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.videos.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\VideoController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\VideoController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.videos.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/videos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.videos.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\VideoController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\VideoController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.videos.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/videos/{video}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.videos.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\VideoController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\VideoController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.videos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/videos/{video}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.videos.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\VideoController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\VideoController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.videos.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/videos/{video}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.videos.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\VideoController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\VideoController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.videos.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/videos/{video}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.videos.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\VideoController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\VideoController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.videos.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/videos/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\VideoController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\VideoController@bulkDelete',
        'as' => 'admin.videos.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/logos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.logos.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\LogoController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\LogoController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/logos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.logos.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\LogoController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\LogoController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logos.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/logos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.logos.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\LogoController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\LogoController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logos.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/logos/{logo}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.logos.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\LogoController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\LogoController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/logos/{logo}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.logos.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\LogoController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\LogoController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logos.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/logos/{logo}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.logos.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\LogoController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\LogoController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logos.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/logos/{logo}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.logos.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\LogoController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\LogoController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logos.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/logos/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\LogoController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\LogoController@bulkDelete',
        'as' => 'admin.logos.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.localities.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/localities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.localities.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\LocalityController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\LocalityController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.localities.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/localities/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.localities.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\LocalityController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\LocalityController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.localities.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/localities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.localities.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\LocalityController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\LocalityController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.localities.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/localities/{locality}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.localities.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\LocalityController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\LocalityController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.localities.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/localities/{locality}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.localities.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\LocalityController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\LocalityController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.localities.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/localities/{locality}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.localities.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\LocalityController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\LocalityController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.localities.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/localities/{locality}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'as' => 'admin.localities.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\LocalityController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\LocalityController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.localities.bulk-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/localities/delete/bulk-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\LocalityController@bulkDelete',
        'controller' => 'App\\Http\\Controllers\\Backend\\LocalityController@bulkDelete',
        'as' => 'admin.localities.bulk-delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProfilesController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProfilesController@edit',
        'as' => 'profile.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'profile/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProfilesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProfilesController@update',
        'as' => 'profile.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'locale.switch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'locale/{lang}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\LocaleController@switch',
        'controller' => 'App\\Http\\Controllers\\Backend\\LocaleController@switch',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'locale.switch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'screenshot.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'screenshot-login/{email}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'refresh.storage',
          2 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Auth\\ScreenshotGeneratorLoginController@login',
        'controller' => 'App\\Http\\Controllers\\Backend\\Auth\\ScreenshotGeneratorLoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'screenshot.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clear.session' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clear-session',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:154:"function () {
    \\session()->flush();  
    \\session()->regenerate(); 
    return \\redirect(\'/\')->with(\'success\', \'Session cleared successfully.\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000f8b0000000000000000";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'clear.session',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scramble.docs.ui' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'docs/api',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:3:"api";s:7:"default";}s:8:"function";s:337:"function (\\Dedoc\\Scramble\\Generator $generator) use ($api) {
                    $config = \\Dedoc\\Scramble\\Scramble::getGeneratorConfig($api);

                    return view(\'scramble::docs\', [
                        \'spec\' => $generator($config),
                        \'config\' => $config,
                    ]);
                }";s:5:"scope";s:38:"Dedoc\\Scramble\\ScrambleServiceProvider";s:4:"this";N;s:4:"self";s:32:"000000000000110c0000000000000000";}}',
        'as' => 'scramble.docs.ui',
        'middleware' => 
        array (
          0 => 'web',
          1 => 'Dedoc\\Scramble\\Http\\Middleware\\RestrictedDocsAccess',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scramble.docs.document' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'docs/api.json',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:3:"api";s:7:"default";}s:8:"function";s:255:"function (\\Dedoc\\Scramble\\Generator $generator) use ($api) {
                    $config = \\Dedoc\\Scramble\\Scramble::getGeneratorConfig($api);

                    return response()->json($generator($config), options: JSON_PRETTY_PRINT);
                }";s:5:"scope";s:38:"Dedoc\\Scramble\\ScrambleServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000011030000000000000000";}}',
        'as' => 'scramble.docs.document',
        'middleware' => 
        array (
          0 => 'web',
          1 => 'Dedoc\\Scramble\\Http\\Middleware\\RestrictedDocsAccess',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
