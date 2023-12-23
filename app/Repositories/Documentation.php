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
            $indexes = []; 
            foreach ($this->getIndex($version, $language) as $section => $index) {
                foreach ($index as $title => $url) {
                    $indexes[] = [
                        'section' => $section,
                        'title'   => $title,
                        'url'     => $url
                    ];
                }
            }

           $indexes = collect($indexes)
                ->filter(fn ($index) => Text::contains($index['url'], '/docs/' . $version . '/'))
                ->map(fn ($index) => [
                    ...$index,
                    'path' => resource_path(Text::of($index['url'])->replace('docs/'.$version.'/', 'docs/'.$version.'/'.$language.'/')->append('.md')),
                    'url' => site_url($index['url']),
                ])
                ->filter(fn ($index) => $this->files->exists($index['path']))
                ->map(function ($index) {
                    $contents = $this->files->get($index['path']);

                    ['metadata' => $meta, 'content' => $contents] = $this->renderer->parse($contents);

                    preg_match_all('/<a name="(?<fragments>[^"]+)"><\\/a>\r?\n#+ (?<titles>[^\\n]+)/', $contents, $section);
                    // $contents = preg_replace('/<a name="(?<fragments>[^"]+)"><\\/a>\r?\n#+ (?<titles>[^\\n]+)/', '', $contents);

                    $sections = [];
                    for ($i = 0, $s = count($section['fragments']); $i < $s; $i++) {
                        $sections[] = [
                            'title' => trim($section['titles'][$i]),
                            'fragment' => $section['fragments'][$i],
                        ];
                    }

                    return [
                        'slug'        => (string) Text::of($index['path'])->afterLast(DS)->before('.md'),
                        'title'       => $meta['title'] ?? $index['title'],
                        'description' => $meta['description'] ?? '',
                        'keywords'    => $meta['keywords'] ?? '',
                        'url'         => $index['url'],
                        'section'     => $index['section'],
                        'sections'    => $sections
                    ];
                })
                ->toArray();

            return array_values($indexes);
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
