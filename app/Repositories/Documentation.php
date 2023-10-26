<?php

namespace App\Repositories;

use App\Markdown\GithubFlavoredMarkdownConverter;
use App\Markdown\Renderer;
use BlitzPHP\Cache\Cache;
use BlitzPHP\Container\Services;
use BlitzPHP\Filesystem\Filesystem;
use BlitzPHP\Utilities\Iterable\Collection;

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
    public function getIndex(string $version): array
    {
        return $this->cache->remember('docs.'.$version.'.index', 5, function () use ($version) {
            $path = resource_path('docs/'.$version.'/index.json');

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
     * Get the given documentation page.
     */
    public function get(string $version, string $page): array
    {
        return $this->cache->remember('docs.'.$version.'.'.$page, 5, function () use ($version, $page) {
            $path = resource_path('docs/'.$version.'/'.$page.'.md');

            if ($this->files->exists($path)) {
                return $this->renderer->make($this->files->get($path), $version);
            }

            return ['metadata' => [], 'content' => ''];
        });
    }

    /**
     * Vérifiez si la section donnée existe.
     */
    public function sectionExists(string $version, ?string $page): bool
    {
        if (empty($page)) {
            return false;
        }
        
        return $this->files->exists(
            resource_path('docs/'.$version.'/'.$page.'.md')
        );
    }

    /**
     * Déterminez dans quelles versions une page existe.
     */
    public function versionsContainingPage(?string $page): Collection
    {
        return collect(static::getDocVersions())
            ->filter(fn ($version) => $this->sectionExists($version, $page));
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
