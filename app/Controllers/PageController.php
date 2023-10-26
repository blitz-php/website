<?php
namespace App\Controllers;

use App\Repositories\Documentation;
use BlitzPHP\Controllers\ApplicationController;

class PageController extends ApplicationController
{  
    public function home()
    {
        return view('home', [
            'versions'        => Documentation::getDocVersions(),
            'currentSection'  => null,
            'canonical'       => null,
            'currentLanguage' => 'fr',
            'languages'       => Documentation::getLanguages(), 
        ]);
    }

    public function goto(string $where)
    {
        $map = [
            'issues' => 'https://github.com/blitz-php/framework/issues',
            'fork' => 'https://github.com/blitz-php/framework/fork',
            // 'blog' => 'http://blog.blitz-php.com',
            // 'learn' => 'http://learn.blitz-php.com',
        ];

        if (!empty($map[$where])) {
            return redirect()->away($map[$where]);
        }

        if (!empty($url = link_to($where))) {
            return redirect()->away($url);
        }

        return redirect()->home();
    }

}