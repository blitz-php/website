<?php
namespace App\Controllers;

use App\Repositories\Documentation;
use BlitzPHP\Contracts\Database\ConnectionResolverInterface;
use BlitzPHP\Controllers\ApplicationController;

class DocsController extends ApplicationController
{  
    /**
     * Create a new controller instance.
     *
     * @param Documentation  $docs The documentation repository.
     */
    public function __construct(protected Documentation $docs)
    {
    }

    /**
     * Show a documentation page.
     */
    public function show(string $version, ?string $page = null)
    {
        if (! $this->isVersion($version)) {
            return redirect()->to('docs/' . DEFAULT_VERSION . '/' . $page ?? '', 301);
        }

        if (! defined('CURRENT_VERSION')) {
            define('CURRENT_VERSION', $version);
        }

        $sectionPage = $page ?: 'installation';
        [
            'metadata' => $metadata,
            'content'  => $content
        ] = $this->docs->get($version, $sectionPage);

        if (empty($content)) {
            $otherVersions = $this->docs->versionsContainingPage($page);

            return $this->response->view('404', [
                'title'   => __('Page non trouvée'),
                'otherVersions' => $otherVersions,
                'page'          => $page,
                'currentVersion'  => $version,
                'versions'        => Documentation::getDocVersions(),
                'currentSection'  => $otherVersions->isEmpty() ? '' : $page,
                'canonical'       => null,
                'currentLanguage' => 'fr',
                'languages'       => Documentation::getLanguages(),
            ], 404);
        }

        $section = '';

        if ($this->docs->sectionExists($version, $page)) {
            $section = $page;
        } elseif (! is_null($page)) {
            return redirect()->to('/docs/' . $version);
        }

        $canonical = null;

        if ($this->docs->sectionExists(DEFAULT_VERSION, $sectionPage)) {
            $canonical = 'docs/'.DEFAULT_VERSION.'/'.$sectionPage;
        }
        
        return view('docs', [
            'metadata'        => $metadata,
            'indexes'         => $this->docs->getIndex($version),
            'content'         => $content,
            'currentVersion'  => $version,
            'versions'        => Documentation::getDocVersions(),
            'currentSection'  => $section,
            'canonical'       => $canonical,
            'currentLanguage' => 'fr',
            'languages'       => Documentation::getLanguages(),
        ]);
    }

    /**
     * Déterminez si le segment d'URL donné est une version valide.
     */
    protected function isVersion(string $version): bool
    {
        return array_key_exists($version, Documentation::getDocVersions());
    }
}