<?php
namespace App\Controllers;

use App\Repositories\Documentation;
use BlitzPHP\Controllers\ApplicationController;
use BlitzPHP\Session\Store;
use BlitzPHP\Utilities\String\Text;

class DocsController extends ApplicationController
{  
    protected Store $session;
    /**
     * Create a new controller instance.
     *
     * @param Documentation  $docs The documentation repository.
     */
    public function __construct(protected Documentation $docs)
    {
        $this->session = session();
    }

    /**
     * Show the documentation index JSON representation.
     */
    public function index($version)
    {
        $major    = Text::before($version, '.');
        $language = $this->session->get('locale', 'fr');
        
        /*
        if (Text::before(array_values(Documentation::getDocVersions())[1], '.') + 1 === (int) $major) {
            $version = $major = 'master';
        }
        dd($major, $version);

        if (! $this->isVersion($version)) {
            return redirect('docs/'.DEFAULT_VERSION.'/index.json', 301);
        }

        if ($major !== 'master' && $major < 9) {
            return [];
        }
        */

        return $this->docs->indexArray($version, $language);
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

        $language = $this->session->get('locale', 'fr');

        $sectionPage = $page ?: 'installation';
        [
            'metadata' => $metadata,
            'content'  => $content
        ] = $this->docs->get($version, $language, $sectionPage);

        if (empty($content)) {
            $otherVersions = $this->docs->versionsContainingPage($language, $page);

            return $this->response->view('404', [
                'title'   => __('Page non trouvée'),
                'otherVersions' => $otherVersions,
                'page'          => $page,
                'currentVersion'  => $version,
                'versions'        => Documentation::getDocVersions(),
                'currentSection'  => $otherVersions->isEmpty() ? '' : $page,
                'canonical'       => null,
                'currentLanguage' => $language,
                'languages'       => Documentation::getLanguages(),
            ], 404);
        }

        $section = '';

        if ($this->docs->sectionExists($version, $language, $page)) {
            $section = $page;
        } elseif (! is_null($page)) {
            return redirect()->to('/docs/' . $version);
        }

        $canonical = null;

        if ($this->docs->sectionExists(DEFAULT_VERSION, $language, $sectionPage)) {
            $canonical = 'docs/'.DEFAULT_VERSION.'/'.$sectionPage;
        }
        
        return view('docs', [
            'metadata'        => $metadata,
            'indexes'         => $this->docs->getIndex($version, $language),
            'content'         => $content,
            'currentVersion'  => $version,
            'versions'        => Documentation::getDocVersions(),
            'currentSection'  => $section,
            'canonical'       => $canonical,
            'currentLanguage' => $language,
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