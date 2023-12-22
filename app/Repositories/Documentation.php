<?php

namespace App\Repositories;

use App\Markdown\Renderer;
use BlitzPHP\Cache\Cache;
use BlitzPHP\Container\Services;
use BlitzPHP\Filesystem\Filesystem;
use BlitzPHP\Utilities\Iterable\Collection;
use BlitzPHP\Utilities\String\Text;

class Documentation
{
    protected Cache $cache;

    public function __construct(protected Filesystem $files, protected Renderer $renderer)
    {
        $this->cache = Services::cache();
    }

    /**
     * Get the documentation index page.
     */
    public function getIndex(string $version, string $language): array
    {
        return $this->cache->remember('docs.'.$version.'.'.$language.'.index', 5, function () use ($version, $language) {
            $path = resource_path('docs/'.$version.'/'.$language.'/index.json');

            if ($this->files->exists($path)) {
                $indexes = json_decode(file_get_contents($path), true);
                foreach ($indexes as &$chapters) {
                    foreach ($chapters as $k => &$url) {
                        $url = str_replace('{version}', $version, $url);
                        if (!$this->files->exists(resource_path($url . '.md'))) {
                            // unset($chapters[$k]);
                        }
                    }
                }

                return array_filter($indexes);
            }

            return [];
        });
    } 

    /**
     * Get the array based index representation of the documentation.
     */
    public function indexArray(string $version, string $language): array
    {
        return $this->cache->remember('docs-'.$version.'-'.$language.'-index', HOUR, function () use ($version, $language) {
            $path = resource_path('docs/'.$version.'/'.$language.'/index.json');

            if (! $this->files->exists($path)) {
                return [];
            }

            $indexes = [];
            foreach ($this->getIndex($version, $language) as $index) {
                $indexes = array_merge($indexes, $index);
            }
            
            return [
                'pages' => collect($indexes)
                    ->filter(fn ($index) => Text::contains($index, '/docs/' . $version . '/'))
                    ->map(fn ($index) => resource_path(Text::of($index)->replace('docs/'.$version.'/', 'docs/'.$version.'/'.$language.'/')->append('.md')))
                    ->filter(fn ($path) => $this->files->exists($path))
                    ->mapWithKeys(function ($path) {
                        $contents = $this->files->get($path);

                        preg_match('/\# (?<title>[^\\n]+)/', $contents, $page);
                        preg_match_all('/<a name="(?<fragments>[^"]+)"><\\/a>\n#+ (?<titles>[^\\n]+)/', $contents, $section);

                        return [
                            (string) Text::of($path)->afterLast(DS)->before('.md') => [
                                'title' => $page['title'],
                                'sections' => collect($section['fragments'])
                                    ->combine($section['titles'])
                                    ->map(fn ($title) => ['title' => $title])
                            ],
                        ];
                    }),
            ];
        });
    }

    /**
     * Get the given documentation page.
     */
    public function get(string $version, string $language, string $page): array
    {
        return $this->cache->remember('docs.'.$version.'.'.$language.'.'.$page, 5, function () use ($version, $language, $page) {
            if ($this->files->exists($path = $this->docPath($version, $language, $page))) {
                return $this->renderer->make($this->files->get($path), $language, $version);
            }

            return ['metadata' => [], 'content' => ''];
        });
    }

    /**
     * Vérifiez si la section donnée existe.
     */
    public function sectionExists(string $version, string $language, ?string $page): bool
    {
        if (empty($page)) {
            return false;
        }
        
        return $this->files->exists($this->docPath($version, $language, $page));
    }

    /**
     * Chein absolu vers le fichier readme d'une page de documentation
     */
    public function docPath(string $version, string $language, string $page): string
    {
        return  resource_path('docs/' . $version . '/' . $language . '/' . $page . '.md');
    }

    /**
     * Déterminez dans quelles versions une page existe.
     */
    public function versionsContainingPage(string $language, ?string $page): Collection
    {
        return collect(static::getDocVersions())
            ->filter(fn ($version) => $this->sectionExists($version, $language, $page));
    }

    /**
     * Obtenez les versions accessibles au public de la documentation.
     */
    public static function getDocVersions(): array
    {
        return array_unique([
            // 'master'        => 'Master',
            DEFAULT_VERSION => DEFAULT_VERSION,
        ]);
    }

    /**
     * Obtenez les langues accessibles au public de la documentation.
     */
    public static function getLanguages(): array
    {
        return [
            'fr' => 'Français',
            'en' => 'English',
        ];
    }

    
}
