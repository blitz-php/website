<?php 

namespace App\Markdown;

class Renderer 
{

    public function make(string $markdown, string $language, string $version): array
    {
        ['metadata' => $metadata, 'content' => $content] = $this->parse($markdown);
        
        $content = (new GithubFlavoredMarkdownConverter())->convert($content);

        $content = $this->replaceLinks($version, $content);
        $content = $this->buildTable($content);
        $content = $this->buildImage($version, $language, $content);
                    
        return ['metadata' => $metadata, 'content'  => $content];    
    }

    

    /**
     * Remplacez l'espace réservé de version dans les liens.
     */
    private function replaceLinks(string $version, string $content): string
    {
        return str_replace([
            '%7B%7Bversion%7D%7D', 
            '%7Bversion%7D',
            '{version}',
            '{{version}}'
        ], $version, $content);
    }

    /**
     * Parse un markdown et renvoie les metadata + le contenu reel
     *
     * @param string $markdown Le contenu markdown
     */
    public function parse(string $markdown): array
    {
        $charactersBetweenGroupedHyphens = '/^---([\s\S]*?)---/';
        preg_match($charactersBetweenGroupedHyphens, $markdown, $metadataMatched);

        $metadata = $metadataMatched[1] ?? '';
        $content  = trim(preg_replace($charactersBetweenGroupedHyphens, '', $markdown));
        
        $metadataLines = explode("\n", $metadata);
        $metadataArray = array_reduce($metadataLines, function ($accumulator, $line) {
            $value = array_map(fn($part) => trim($part), explode(':', $line));
            $key = array_shift($value);
            if ($key) {
                $accumulator[$key] = join(isset($value[1]) ? ':' : '', $value);
            }

            return $accumulator;
        }, []);
        
        return [
            'metadata' => $metadataArray,
            'content' => $content
        ];
    }

    private function buildTable(string $content): string
    {
        return str_replace('<table>', '<table class="table w-100">', $content);
    }

    private function buildImage(string $version, string $language, string $content): string
    {
        if (empty($content)) {
            return $content;
        }

        preg_match_all('/<img ?.* src="([a-zA-Z0-9\-\._]+)" [^>]+>/i', $content, $images);

        if (isset($images[1])) {
            helper('assets');

            foreach (($images[1] ?? []) as $image) {
                if (img_exist('docs/' . $image)) {
                    $src = '/img/docs/' . $image;
                } elseif (img_exist('docs/' . $version . '/' . $image)) {
                    $src = '/img/docs/' . $version . '/' . $image;
                } elseif (img_exist('docs/' . $language . '/' . $image)) {
                    $src = '/img/docs/' . $language . '/' . $image;
                } elseif (img_exist('docs/' . $version . '/' . $language . '/' . $image)) {
                    $src = '/img/docs/' . $version . '/' . $language . '/' . $image;
                } else {
                    $src = $image;
                }

                $content = str_replace($image, $src, $content);
            }
        }

        preg_match_all('/<img ?.* class="([a-zA-Z0-9\-_ ]+)" [^>]+>/i', $content, $classes);
        if (isset($classes[1], $classes[1][0])) {
            $content = str_replace($classes[1][0], $classes[1][0] . ' img-fluid', $content);
        } else {
            $content = str_replace('<img', '<img class="img-fluid"', $content);
        }

        return $content;
    }
}